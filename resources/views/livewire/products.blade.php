<div>

    @if($migrationTable)
        <div wire:key="global-search">
            <div class="alert alert-info d-flex align-items-center p-5 mb-10">
                <!--begin::Svg Icon | path: icons/duotune/general/gen048.svg-->
                <span class="svg-icon svg-icon-2hx svg-icon-info me-4">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
															<path opacity="0.3"
                                                                  d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z"
                                                                  fill="currentColor"></path>
															<path
                                                                d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z"
                                                                fill="currentColor"></path>
														</svg>
													</span>
                <!--end::Svg Icon-->
                <div class="d-flex flex-column">
                    <h4 class="mb-1 text-info">Global Search Livewire Component</h4>
                    <span>
                The Global Search Livewire Component below allows you to search multiple models & generate query results via one query.

                    <br/>
                    This means if you search for users & products that are similar you will see both results rendered in UI. You can click either, to visit the showRoute for that model.

                </span>
                </div>
            </div>
            @livewire('global-search')

        </div>
        <hr/>
    @endif
    <div class="card mb-5 row">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold fs-3 mb-1">{{$homeTitle}}</span>
                <span
                    class="text-muted mt-1 fw-semibold fs-7">{{$homeDescription}} {{-- {{$products->count()}} new products--}}</span>
            </h3>
            <div class="card-toolbar">


            </div>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body">
            @include('livewire.product-buttons')
            @if($action == 'viewProfile')
                @include('livewire.user-widget', ['user_id' => $user_id])
            @elseif($action == 'editProduct' OR $action == 'createProduct')
                @include('livewire.product-form', ['product_id' => $product_id])
            @elseif($action == 'viewProduct')
                @include('livewire.view-product', ['action' => $action, 'product_id' => $product_id])
            @else
                <!-- begin::Pagination -->
                @if($migrationTable)
                    {{ $products->links() }}
                    <hr/>
                    <!-- end::Pagination -->
                    <div class="alert alert-info d-flex align-items-center p-5 mb-10">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen048.svg-->
                        <span class="svg-icon svg-icon-2hx svg-icon-info me-4">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
															<path opacity="0.3"
                                                                  d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z"
                                                                  fill="currentColor"></path>
															<path
                                                                d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z"
                                                                fill="currentColor"></path>
														</svg>
													</span>
                        <!--end::Svg Icon-->
                        <div class="d-flex flex-column">
                            <h4 class="mb-1 text-info">Products Table Livewire Component</h4>
                            <span>
                                The products component is a paginated collection of Product Models, these models can also be searched per column or via a combination of columns, using the available fields below.
                                <br/>
                         The functions in this component also contain all the logic necessary to perform CRUD operations. You can View, Edit, Delete products directly from this view.
                                <br>
                                This component contains the following params : <br/>
                                productName, productCategory, productLikes, productDislikes, productSales, productCommentsCount, productUser, & productStatus.
                                <br/>
                                You can also use the form fields found below to dynamically search the products by their columns, these for fields can also be combined.

                          </span>
                        </div>
                    </div>
                    <!--begin::Table container-->
                    @include('livewire.products-table', ['products' => $products])
                    <!--end::Table container-->
                @else

                    <div class="row">
                        @if (session()->has('message'))
                            <div class="alert alert-{{$code}} d-flex align-items-center p-5 mb-10">

                    <span class="svg-icon svg-icon-2hx svg-icon-danger me-4">
                        <svg width="24" height="24"
                             viewBox="0 0 24 24" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
<path opacity="0.3"
      d="M2 4V16C2 16.6 2.4 17 3 17H13L16.6 20.6C17.1 21.1 18 20.8 18 20V17H21C21.6 17 22 16.6 22 16V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4Z"
      fill="currentColor"/>
<path
    d="M18 9H6C5.4 9 5 8.6 5 8C5 7.4 5.4 7 6 7H18C18.6 7 19 7.4 19 8C19 8.6 18.6 9 18 9ZM16 12C16 11.4 15.6 11 15 11H6C5.4 11 5 11.4 5 12C5 12.6 5.4 13 6 13H15C15.6 13 16 12.6 16 12Z"
    fill="currentColor"/>
</svg>
</span>


                                <div class="d-flex flex-column">
                                    <h4 class="mb-1 text-{{$code}}">You are missing Migration & Seeder!</h4>
                                    <span>
      {{ session('message') }}
                     </span>
                                </div>
                            </div>
                        @endif
                        <hr/>
                        <button type="button" class="btn btn-info btn-block" wire:click="runMigration()"><i
                                class="fa fa-computer"></i> Click Me To Run Migration & Seeder
                        </button>
                        <div wire:loading>
                            <hr/>
                            <div class="alert alert-success d-flex align-items-center p-5 mb-10">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen048.svg-->
                                <span class="svg-icon svg-icon-2hx svg-icon-info me-4">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
															<path opacity="0.3"
                                                                  d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z"
                                                                  fill="currentColor"></path>
															<path
                                                                d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z"
                                                                fill="currentColor"></path>
														</svg>
													</span>
                                <!--end::Svg Icon-->
                                <div class="d-flex flex-column">
                                    <h4 class="mb-1 text-info">Migration & Database Seeder is being ran</h4>
                                    <span>
                              Please wait patiently. The migration is running & the seeder will process after that. The component will refresh & you will have new products, comments, & users!!

                                        Happy CRUD-ding!!!

                          </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <!--begin::Body-->
                        <div class="card-body p-10 p-lg-15">
                            <!--begin::Content main-->
                            <div class="mb-14">
                                <!--begin::Heading-->
                                <div class="mb-15">
                                    <!--begin::Title-->
                                    <h1 class="fs-2x text-dark mb-6">Welcome!! Laravel Back-End Developer Take Home
                                        Assestment - by JD Hawkins</h1>
                                    <!--end::Title-->
                                    <!--begin::Text-->
                                    <div class="fs-5 text-gray-600 fw-semibold">
                                        Products Table Livewire Component
                                    </div>
                                    <!--end::Text-->
                                </div>
                                <!--end::Heading-->
                                <!--begin::Body-->


                                <!--begin::Block-->
                                <div class="mb-20 pb-lg-20">

                                    <!--begin::Title-->
                                    <h2 class="fw-bold text-dark mb-7">Introduction</h2>
                                    <!--end::Title-->
                                    <!--begin::List-->
                                    <ul>
                                        <li>
                                            <span class="fs-4 fw-semibold text-danger ">IMPORTANT!!!! The above button will perform the Migration, but if you would like to learn more about this app before we start. Please read below.</span>
                                        </li>
                                    </ul>
                                    <!--end::List-->
                                    <!--begin::Text-->
                                    <div class="fs-4 fw-semibold text-gray-900 mb-13">
                                        Thanks for allowing me the oppurtunity to apply for this position.
                                        Although this position is for Backend Developer, this app should show the range
                                        of my skillset as a FullStack Developer.
                                        <br/>
                                        This includes the Front-End UI, Back-End database, & the application logic.
                                        The end result will be a Dynamic Searchable Crud Table
                                        <br/>
                                        There are two approaches to crud within this app, the livewire component,
                                        performs the crud
                                        operations without hitting any other endpoints, but if you do happen to hit the
                                        Controller
                                        routes
                                        the Products Livewire Component will dynamically render its' state based on the
                                        current
                                        controller routes (viewProduct, EditProduct, DeleteProduct).
                                        <br/>Go ahead and click the button above to perform the DB Migration & Seeder
                                        without
                                        having to use
                                        the CLI. After the app reloads, this section will be replaced with your newly
                                        populated
                                        products.
                                    </div>
                                    <!--end::Text-->
                                    <!--begin::Title-->
                                    <h2 class="fw-bold text-dark mb-8">Skills Shown In This Assestment:</h2>
                                    <!--end::Title-->
                                    <!--begin::List-->
                                    <ul class="fs-4 fw-semibold mb-6">
                                        <li>
                                            <span class="text-gray-700">Back-End </span>
                                        </li>
                                        <ul class="fs-4 fw-semibold mb-6">
                                            <li class="my-2">
                                                <span class="text-gray-700">PHP 8</span>
                                            </li>
                                            <li>
                                                <span class="text-gray-700">MySQL 8</span>
                                            </li>
                                            <li>
                                                <span class="text-gray-700">Laravel CRUD Resource Routes</span>
                                            </li>
                                        </ul>
                                    </ul>

                                    <ul class="fs-4 fw-semibold mb-6">
                                        <li>
                                            <span class="text-gray-700">Front-End </span>
                                        </li>
                                        <ul class="fs-4 fw-semibold mb-6">
                                            <li>
                                                <span class="text-gray-700">Laravel 8</span>
                                            </li>
                                            <li>
                                                <span class="text-gray-700">Livewire (Substitute for Vue JS)</span>
                                            </li>
                                            <li>
                                                <span class="text-gray-700">Livewire Centric CRUD Operations</span>
                                            </li>
                                            <li>
                                                <span class="text-gray-700">Boostrap 4</span>
                                            </li>
                                            <li>
                                                <span class="text-gray-700">Icon Sets</span>
                                            </li>
                                        </ul>


                                    </ul>

                                    <!--begin::Title-->
                                    <h2 class="fw-bold text-dark mb-8">What relationships exist:</h2>
                                    <!--end::Title-->
                                    <!--end::List-->
                                    <div class="mb-14">
                                        <!--begin::Table container-->
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <table
                                                class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                                <!--begin::Table head-->
                                                <thead>
                                                <tr class="fw-bold fs-6 text-gray-800 text-center border-0 bg-light">
                                                    <th class="min-w-200px rounded-start"></th>
                                                    <th class="min-w-140px">Model</th>
                                                    <th class="min-w-120px">Relationship</th>
                                                    <th class="min-w-100px rounded-end">Soft Deletes</th>
                                                </tr>
                                                </thead>
                                                <!--end::Table head-->
                                                <!--begin::Table body-->
                                                <tbody class="border-bottom border-dashed">
                                                <tr class="fw-semibold fs-6 text-gray-800 text-center">
                                                    <td class="text-start ps-6 fs-4">User Model</td>
                                                    <td>Products, Comments</td>
                                                    <td>HasMany, HasMany</td>
                                                    <td>No</td>
                                                </tr>
                                                <tr class="fw-semibold fs-6 text-gray-800 text-center">
                                                    <td class="text-start ps-6 fs-4">Product Model</td>
                                                    <td>User, Comments</td>
                                                    <td>BelongsTo, HasMany</td>
                                                    <td>YES</td>
                                                </tr>
                                                <tr class="fw-semibold fs-6 text-gray-800 text-center">
                                                    <td class="text-start ps-6 fs-4">Comment Model</td>
                                                    <td>Products, User, Comments(Reply)</td>
                                                    <td>HasMany, BelongsTo, HasMany</td>
                                                    <td>YES</td>
                                                </tr>
                                                </tbody>
                                                <!--end::Table body-->
                                            </table>
                                            <!--end::Table-->
                                        </div>
                                        <!--end::Table container-->
                                    </div>

                                    <!--begin::Text-->
                                    <div class="fs-4 fw-semibold text-gray-700 mb-13">
                                        Above are the 3 Models that are available in this app.
                                        <br/>
                                        Each User Model hasMany Product Models, each Product Model belongsTo a User
                                        Model.
                                        <br/>
                                        Each Product Model hasMany Comment Models, each Comment Model belongsTo a
                                        Product Model
                                        <br/>
                                        Each Comment belongsTo a User Model, each Comment Model belongsTo a Product
                                        Model

                                    </div>
                                    <!--end::Text-->

                                    <!--begin::Title-->
                                    <h2 class="fw-bold text-dark mb-8">What to expect in this app:</h2>
                                    <!--end::Title-->
                                    <!--begin::List-->
                                    <ul class="fs-4 fw-semibold mb-6">
                                        <li>
                                            <span class="text-gray-700">Livewire CRUD Operations</span>
                                        </li>
                                        <li class="my-2">
                                            <span
                                                class="text-gray-700">Laravel Controller Routes for Crud (fallback)</span>
                                        </li>
                                        <li>
                                            <span class="text-gray-700">Dynamic/Hot Reloading</span>
                                        </li>
                                        <li>
                                            <span class="text-gray-700">Real-time Updates shown to UI</span>
                                        </li>
                                        <li>
                                            <span class="text-gray-700">Dynamic Form Validation</span>
                                        </li>
                                    </ul>
                                    <!--end::List-->
                                    <!--begin::Text-->
                                    <div class="fs-4 fw-semibold text-gray-700">

                                        This app will display a component, that will show xx number of products. Each
                                        products can be edited, updated, or deleted. You can also create new products

                                        <ul class="fs-4 fw-semibold mb-6">
                                            <li>
                                                <span class="text-gray-700">View All Products via Livewire (https://domain.com/* any route)</span>
                                            </li>
                                            <li>
                                                <span class="text-gray-700">View All Products via Laravel Routing (https://domain.com/products)</span>
                                            </li>
                                            <li>
                                                <span class="text-gray-700">View Product w Comments By ID Livewire (accessible at any route)</span>
                                            </li>
                                            <li>
                                                <span class="text-gray-700">View Product w Comments by ID via Laravel Route (https://domain.com/products/{product_id})</span>
                                            </li>
                                            <li>
                                                <span class="text-gray-700">Edit Product by ID via Livewire (accessible at any route)</span>
                                            </li>
                                            <li>
                                                <span class="text-gray-700">Edit Product by ID via Laravel Route (https://domain.com/products/{product_id}/edit)</span>
                                            </li>
                                            <li>
                                                <span class="text-gray-700">View Product by ID w Comments via Laravel Route (https://domain.com/products/{product_id}/show)</span>
                                            </li>
                                            <li>
                                                <span class="text-gray-700">View User Profile by ID  via Laravel Route (https://domain.com/user-profile/{user_id})</span>
                                            </li>
                                            <li>
                                                <span class="text-gray-700">View User Profile by ID  via Livewire (accessible at any route)</span>
                                            </li>
                                            <li>
                                                <span class="text-gray-700">View User Profile by ID  via Livewire (accessible at any route)</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <!--end::Text-->
                                </div>
                                <!--end::Block-->
                                <!--end::Body-->
                            </div>
                            <!--end::Content main-->


                        </div>
                        <!--end::Body-->
                    </div>
                @endif
            @endif
        </div>
        <!--begin::Body-->
    </div>
</div>


