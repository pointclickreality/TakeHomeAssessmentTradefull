<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use DB;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination, WithFileUploads;

    public $homeTitle = 'Products List';

    // params that are updates as the state of the component is changed
    public $homeShareTitle = 'Senior BackEnd Developer - Assestment';
    public $homeDescription;
    public $homeImage;
    public $homeKeyWords;
    public $root;
    public $product;

    // presets that help us get url pattern for product & user images
    public $action = 'viewHome';
    public $actual_link;
    public $homeLink;
    public $avatarsFolder = '/assets/media/avatars/';
    public $mediaFolder = '/assets/media/stock/900x600/';
    public $url;
    public $profile_url = '300-1.jpg';
    // default image when no users exist.
    public $withTrashed;
    public $categories = [];
    public $sortColumn = 'name';
    // set default search field
    public $sortDirection = 'asc';

    public $searchColumns = [
        'name' => '',
        'price' => ['', ''],
        'description' => '',
        'sales' => '',
        'likes' => '',
        'dislikes' => '',
        'user_id' => '',
        'product_category_id' => 0,
        'status' => '',
    ];

    // array of columns that we are able to use for searching
    public $migrationTable;
    public $hasRun;
    public $errorMessage;
    public $project, $user_id, $product_category_id;
    // params related to product, provides 2-way data binding with product form when performing patch & store crud operations
    public $name, $product_image, $likes, $dislikes, $price, $sales, $description, $status;

    protected $paginationTheme = 'bootstrap';

    // validation rules!
    protected $rules = [
        'name' => 'required|min:6',
        'status' => 'required',
        'price' => 'required',
        'description' => 'required',
        'user_id' => 'required',
        'product_category_id' => 'required',
    ];

    /**
     * When mounting the component, similar to vue, mounting properties
     * we are able to define some preset on inititalization of component, that may not have already been set
     * @return void
     */
    public function mount($action = null, $user_id = null, $product_id = null): void
    {

        // we first check if a table exists on database
        $this->migrationTable = Schema::hasTable('products');
        //$this->hasRun = DB::table('migrations')->where('migration', '2022_09_30_233600_create_products_table')->exists();

        if ($this->migrationTable == false) {

            $this->errorMessage = 'It looks like your app is missing the required database & seeder. Please use the button below to automatically run migration & seeder. Upon refresh, you will see the newly created data!';

        } else {

            /**
             * Based on the params present in the incoming request,
             * we will automatically change the state of the component, to match the route,
             * this way we DRY, & we are able to use the laravel components in our actual Controller function, show, edit, delete, index etc cool right?! :)
             */
            if ($product_id) {

                $product = Product::where('id', $product_id)->with('comments')->exists();

                if ($product) {

                    // set the state based on incoming requests params, this way we can display the correct state when accessing the route via controller.
                    $this->product_id = $product_id;

                    if ($this->action == 'viewProduct') {

                        $this->viewProduct($product_id);

                    } elseif ($this->action == 'editProduct') {

                        $this->editProduct($product_id);

                    } elseif ($this->action == 'deleteProduct') {

                        $this->deleteProduct($product_id);

                    }

                }

            } else {

                // set default values, if not product id is present
                $this->resetResults();

            }
            // get products & comments for a provided user_id
            if ($user_id) {

                $this->products = Product::with('comments')
                    ->where('user_id', $user_id)
                    ->get();

            }

            $this->categories = ProductCategory::pluck('name', 'id');
            $this->users = User::pluck('name', 'id');
            // get the url of the server, where the app is running
            $this->actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $this->homeLink = "https://$_SERVER[HTTP_HOST]";
            $this->root = URL::to('/');

        }

    }

    /**
     * View product by ID
     * @param $product_id
     * @return void
     */
    public function viewProduct($product_id): void
    {

        $this->product = Product::where('id', $product_id)
            ->with('user')
            ->first();

        if (!$this->product) {

            $this->errorMessage = "That product is not found!!";

        } else {

            $this->product_id = $product_id;
            // set the proper params to update the component state, so that it will be reflected on view dynamically :)
            $this->action = 'viewProduct';
            $this->homeTitle = 'Viewing Product ' . $this->product->name;
            $this->homeDescription = 'Viewing the details of a product, such as price, sales, likes, dislikes, & # of sales';

        }

    }

    /**
     * Edit the product by ID
     * @param $product_id
     * @return void
     */
    public function editProduct($product_id): void
    {

        $this->product = Product::where('id', $product_id)->with('comments')->first();

        if (!$this->product) {

            $this->errorMessage = "That product is not found!!";

        } else {

            $this->product_id = $product_id;
            $this->action = 'editProduct';
            //set params to reuse create form, but for editing, by prefilling the params the form expects
            $this->name = $this->product->name;
            $this->user_id = $this->product->user_id;
            $this->product_category_id = $this->product->product_category_id;
            $this->product_image = $this->product->product_image;
            $this->dislikes = $this->product->dislikes;
            $this->likes = $this->product->likes;
            $this->sales = $this->product->sales;
            $this->description = $this->product->description;
            $this->status = $this->product->status;
            $this->price = $this->product->price;
            $this->homeTitle = 'Editing Product ' . $this->product->name;
            $this->homeDescription = 'You are currently editing an existing product!';

        }

    }

    /**
     * Delete the product & its comments
     * @param $product_id
     * @return void
     */
    public function deleteProduct($product_id): void
    {

        if ($product_id) {

            $product = Product::findOrFail($product_id)->delete();

            $this->action = 'viewHome';
            session()->flash('message', 'Product Deleted!.');
            $this->resetResults();
            redirect()->route('products.index');

        }

    }

    /**
     * Set app state to default
     * @return void
     */
    public function resetResults(): void
    {

        $this->action = 'viewHome';
        $this->homeTitle = 'Products List';
        $this->homeDescription = 'This is my submission to Tradefull assestment, for BackEnd Developer role!';
        $this->emitSelf('refreshComponent');
        $this->emit('refreshComponent');

    }

    public function render()
    {

        // get deleted products, if the request asks for them
        if ($this->withTrashed) {
            $products = Product::with([
                'category',
                'comments',
                'user',
            ])
                ->with('comments')
                ->with('category')
                ->withTrashed();

        } else {

            // get active products only
            $products = Product::with([
                'category',
                'comments',
                'user',
            ])
                ->with('comments')
                ->with('category');
        }

        // loop products when search columns are present so that we can filter the results based on provided params
        foreach ($this->searchColumns as $column => $value) {

            if (!empty($value)) {
                // search products within the range of the provided price values
                if ($column == 'price') {

                    if (is_numeric($value[0])) {

                        $products->where($column, '>', $value[0]);

                    }

                    if (is_numeric($value[1])) {

                        $products->where($column, '<', $value[1]);

                    }

                    // get products greater or equal to the given numeric values
                } elseif ($column == 'sales') {

                    if (is_numeric($value)) {

                        $products->where($column, '>=', $value);

                    }

                } elseif ($column == 'likes') {

                    if (is_numeric($value)) {

                        $products->where($column, '>=', $value);

                    }

                } elseif ($column == 'dislikes') {

                    if (is_numeric($value)) {

                        $products->where($column, '>=', $value);

                    }

                } elseif ($column == 'comments') {

                    if (is_numeric($value)) {

                        $products->where($column, '>=', $value);

                    }

                } else if ($column == 'product_category_id') {

                    $products->where($column, $value);

                } else {

                    $products->where('products.' . $column, 'LIKE', '%' . $value . '%');

                }

            }

        }

        $products->orderBy($this->sortColumn, $this->sortDirection);

        // if the migration hasn't been ran, we set the products to an empty array, so that it does not throw errors when attempting to paginate.
        if ($this->migrationTable == true) {

            $products;

        } else {

            $products = [];

        }

        return view('livewire.products', [

            'products' => $products ? $products->paginate(10) : [],
        ]);

    }

    /**
     * Reveal the product creation form
     * @return void
     */
    public function createProduct(): void
    {

        $this->clearForms();

        $this->product_id = null;
        // select a random product image as one of the existing images available
        $this->product_image = rand(1, 79) . '.jpg';
        $this->action = 'createProduct';
        $this->homeTitle = 'Create Products Form';
        $this->homeDescription = 'You are about to create a new NFT product to place on marketplace !';

    }

    /**
     * Clear form fields
     * @return void
     */
    public function clearForms()
    {

        $this->description = null;
        $this->name = null;
        $this->product_category_id = null;
        $this->status = null;
        $this->likes = 0;
        $this->dislikes = 0;
        $this->sales = 0;
        $this->price = null;
    }

    /**
     * Store the product in database
     * @return void
     */
    public function saveProduct(): void
    {

        // check validation
        $this->validate();

        // create new product if one does not already exist matching the expected params
        $product = Product::firstOrNew([
            'name' => $this->name,
            'price' => $this->price,
            'status' => $this->status,
            'product_category_id' => $this->product_category_id,
        ]);

        // only update these params if the incoming data is expecting to create the product
        if ($this->action == 'createProduct') {

            // save the other params associated with product, such as user & category
            $product->user_id = $this->user_id;
            $product->dislikes = 0;
            $product->likes = 0;
            $product->sales = 0;

        } else {

            $product->user_id = $this->product->user_id;
            $product->likes = $this->product->likes;
            $product->dislikes = $this->product->dislikes;
            $product->sales = $this->product->sales;

        }

        $product->description = $this->description;
        $product->product_image = $this->product_image;
        $product->save();

        // if product is found, immediately after creation, redirect component state to show the product
        if ($product) {

            $this->product = $product;
            $this->viewProduct($this->product->id);
        }

    }

    /**
     * Function that allows you ro dynamically sort the products table, by any of the available columns
     * @param $column
     * @return void
     */
    public function sortByColumn($column): void
    {
        if ($this->sortColumn == $column) {

            $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc';

        } else {

            $this->reset('sortDirection');
            $this->sortColumn = $column;

        }

    }

    /**
     * When the component refreshes, or receives an update, it automatically triggers the function to clear the fields
     * @param $value
     * @param $name
     * @return void
     */
    public function updating($value, $name): void
    {

        $this->resetPage();
    }

    /**
     * Increase the number of likes
     * @return void
     */
    public function increaseLikes($product_id): void
    {
        $this->product = Product::find($product_id);

        if (!$this->product) {

            $this->errorMessage = "That product is not found!!";

        } else {

            $this->product->addLike();

        }

        $this->emitSelf('refreshComponent');

    }

    /**
     * Increase the number of dislikes
     * @return void
     */
    public function increaseDislikes($product_id): void
    {
        $this->product = Product::find($product_id);

        if (!$this->product) {

            $this->errorMessage = "That product is not found!!";

        } else {

            $this->product->addDislike();

        }

    }

    /**
     * Run the artisan migration command
     * Seed the database after the migration
     * Redirect back to page after migration & seeder is complete
     * @return void
     */
    public function runMigration(): void
    {
        Artisan::call('migrate');

        $seeder = new DatabaseSeeder();
        $seeder->run();
        redirect()->route('products.index');
    }

    /**
     * Restore all deleted products
     * @return void
     */
    public function restoreAll(): void
    {
        $this->products = Product::onlyTrashed()->restore();
        $this->resetResults();
    }

    /**
     * restore specific product
     *
     * @return void
     */
    public function restore($product_id): void
    {
        $this->product = Product::withTrashed()->find($product_id)->restore();

        if (!$this->product) {

            $this->errorMessage = "That product is not found!!";

        } else {

            $this->viewProduct($this->product->id);
            $this->resetResults();

        }

    }
}