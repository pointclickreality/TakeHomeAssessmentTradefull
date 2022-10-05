<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

// SEO

class ProductsController extends Controller
{

    public string $designTemplate;
    public string $user_id;
    public string $route;

    /**
     * We set the designTemplate for the livewire components to use bootstrap or allow for customization of the default styles used.
     * Here we set the user id to null since we are not using auth, because we do not set user_id in controller livewire component
     * will  provide us with a random user & user_id for us when needed, like for creating new products & leaving a comment on a product
     */
    public function __construct()
    {

        $this->designTemplate = request()->design ?? 'bootstrap';
        $this->user_id = '';
        $this->route = 'Controller';

    }

    /**
     * Index view all active products
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request):View
    {

        $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $homeLink = "http://$_SERVER[HTTP_HOST]";
        $homeTitle = 'Take Home assessment';
        $homeShareTitle = 'Take Home assessment - BackEnd Developer - JD Hawkins';
        $homeDescription = 'This is an assessment to show my skill as a Laravel Developer';
        $homeKeywords = 'developer, assetment, livewire, laravel, mysql, php8';
        $homeImage = null;

        // <!--Google-->
        SEOMeta::setTitle($homeTitle);
        SEOMeta::setDescription($homeDescription);
        SEOMeta::setKeywords($homeKeywords);
        SEOMeta::setCanonical($actual_link);

        // <!--FaceBook-->
        OpenGraph::setTitle($homeTitle);
        OpenGraph::setDescription($homeDescription);
        OpenGraph::setUrl($actual_link);
        OpenGraph::setSiteName($homeShareTitle);

        $action = 'viewHome';
        $product_id = null;
        $user_id = $this->user_id;
        $route = 'Livewire';

        return view('dashboard.default', compact('action', 'product_id', 'user_id', 'route'));


    }

    /**
     * Create a new product
     * @param Request $request
     * @return Application|Factory|View
     */
    public function create(Request $request):View
    {

        $user_id = $this->user_id;
        $product_id = null;
        $action = 'createProduct';
        $route = $this->route;

        return view('dashboard.default', compact('product_id', 'action', 'user_id', 'route'));

    }

    /**
     * This route in controller was skipped, the actual store function
     * can be found in the Livewire::products widget.
     * @param Request $request
     * @return void
     */
    public function store(Request $request):View
    {
        //
    }

    /**
     * Display a product by id
     * @param Request $request
     * @param $id
     * @return Application|Factory|View
     */
    public function show(Request $request, $id):View
    {

        $user_id = $this->user_id;
        $product_id = $id;
        // find the product, or show 404
        $product = Product::findOrFail($id);
        $action = 'viewProduct';
        $route = $this->route;

        return view('dashboard.default', compact('product', 'product_id', 'action', 'user_id', 'route'));

    }

    /**
     * Get product by id
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id):View
    {

        $product_id = $id;
        $product = Product::findOrFail($id);
        $user_id = null;
        $action = 'editProduct';
        $route = $this->route;

        return view('dashboard.default', compact('product', 'product_id', 'action', 'user_id', 'route'));

    }

    /**
     * Update function available in livewire Product Component
     * @param Request $request
     * @param $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Delete comment function available in Livewire Product Component
     * @param $id
     * @return void
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Get user by id
     * @param $user_id
     * @return Application|Factory|View
     */
    public function viewUserProfile($user_id):View
    {

        $user = User::findOrFail($user_id);
        $product_id = null;
        $action = 'viewProfile';
        $route = $this->route;

        return view('dashboard.default', compact('user_id', 'action', 'product_id', 'route'));

    }

}
