<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Component;


class GlobalSearch extends Component
{
    public string $search = '';

    public array $results = [];

    public array $searchable = [];

    protected array $rules = [
        'search' => 'required|min:1',
    ];

    /**
     * @return void
     */
    public function mount(): void
    {

        /**
         * Here we can add any model that we want to become searchable
         * We only need to identify at least one column that will be displayed to the search results
         *
         */
        $this->searchable = [
            User::class => ['name'],
            Product::class => ['name'],
            //ProductCategory::class => ['name'],
        ];

    }

    /**
     * Reset form fields
     * Validate search field
     * Return search results
     * @return void
     * @throws ValidationException
     */
    public function updatedSearch(): void
    {

        $this->reset('results');
        $this->validateOnly('search');
        $this->getSearchResults();

    }

    /**
     * Show the show route & fields available from the target Model
     * @return void
     */
    public function getSearchResults(): void
    {
        foreach ($this->searchable as $model => $columns) {

            $model_key = Str::camel(class_basename($model));

            $query = (new $model())->query();

            foreach ($columns as $column) {

                $query->orWhere($column, 'LIKE', '%' . $this->search . '%');

            }

            foreach ($columns as $field) {

                $queryResults = $query->take(5)->get();

                if ($queryResults->count() > 0) {

                    $this->results[$model_key] = $queryResults->map(function ($resource) use ($field) {

                        $fields = [];
                        $route_params = [];

                        $field_key = Str::ucfirst($field);

                        $route_key = Str::plural(Str::kebab(class_basename($resource)));

                        $route_params[] = $resource->id;

                        $fields[$field_key] = $resource->{$field};

                        return [
                            'linkTo' => route($route_key . '.show', $route_params),
                            'fields' => $fields,
                        ];
                    });

                }

            }

        }

    }

    /**
     * Reset the form fields & the query results
     * @return void
     */
    public function resetForm(): void
    {

        $this->reset(['search', 'results']);

    }

    public function render()
    {

        return view('livewire.global-search');

    }

}
