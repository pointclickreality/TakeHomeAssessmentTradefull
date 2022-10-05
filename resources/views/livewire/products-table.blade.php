<div>

    <div class="row">
        @if (session()->has('message'))
            <div class="row">
                <div class="alert alert-{{$code}} d-flex align-items-center p-5 mb-10">

                    <span class="svg-icon svg-icon-2hx svg-icon-{{$code}} me-4">
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
                        <h4 class="mb-1 text-{{$code}}">Alert!</h4>
                        <span>
       {{ session('message') }}
                          </span>
                    </div>
                </div>
            </div>
            <hr/>
        @endif
    </div>

    <!--begin::Table container-->
    <div class="table-responsive">
        <!--begin::Table-->
        <table
            class="table table-row-dashed table-striped table-condensed table-row-gray-300 align-middle gs-0 gy-4">
            <!--begin::Table head-->
            <thead>
            <tr class="border-0">
                <th class="w-25 p-0" wire:click="sortByColumn('name')">
                    Name
                    @if ($sortColumn == 'name')
                        <i class="fa fa-fw fa-sort-{{ $sortDirection }}"></i>
                    @else
                        <i class="fa fa-fw fa-sort" style="color:#DCDCDC"></i>
                    @endif
                </th>
                <th class="w-25 p-0 min-w-150px text-end" wire:click="sortByColumn('product_category_id')">
                    Category
                    @if ($sortColumn == 'product_category_id')
                        <i class="fa fa-fw fa-sort-{{ $sortDirection }}"></i>
                    @else
                        <i class="fa fa-fw fa-sort" style="color:#DCDCDC"></i>
                    @endif
                </th>
                <th class="w-25 p-0 min-w-250px" wire:click="sortByColumn('price')">
                    Price
                    @if ($sortColumn == 'price')
                        <i class="fa fa-fw fa-sort-{{ $sortDirection }}"></i>
                    @else
                        <i class="fa fa-fw fa-sort" style="color:#DCDCDC"></i>
                    @endif
                </th>
                <th class="w-25 p-0 min-w-150px" wire:click="sortByColumn('sales')">
                    Sales
                    @if ($sortColumn == 'sales')
                        <i class="fa fa-fw fa-sort-{{ $sortDirection }}"></i>
                    @else
                        <i class="fa fa-fw fa-sort" style="color:#DCDCDC"></i>
                    @endif
                </th>
                <th class="w-25 p-0 min-w-150px">
                    Comments

                </th>
                <th class="w-25 p-0 min-w-150px" wire:click="sortByColumn('likes')">
                    Likes
                    @if ($sortColumn == 'likes')
                        <i class="fa fa-fw fa-sort-{{ $sortDirection }}"></i>
                    @else
                        <i class="fa fa-fw fa-sort" style="color:#DCDCDC"></i>
                    @endif
                </th>
                <th class="w-25 p-0 min-w-150px" wire:click="sortByColumn('dislikes')">
                    Dislikes
                    @if ($sortColumn == 'price')
                        <i class="fa fa-fw fa-sort-{{ $sortDirection }}"></i>
                    @else
                        <i class="fa fa-fw fa-sort" style="color:#DCDCDC"></i>
                    @endif
                </th>
                <th class="w-25 p-0 min-w-150px" wire:click="sortByColumn('user_id')">
                    User
                    @if ($sortColumn == 'user_id')
                        <i class="fa fa-fw fa-sort-{{ $sortDirection }}"></i>
                    @else
                        <i class="fa fa-fw fa-sort" style="color:#DCDCDC"></i>
                    @endif
                </th>
                <th class="w-25 p-0 min-w-150px" wire:click="sortByColumn('description')">
                    Description
                    @if ($sortColumn == 'description')
                        <i class="fa fa-fw fa-sort-{{ $sortDirection }}"></i>
                    @else
                        <i class="fa fa-fw fa-sort" style="color:#DCDCDC"></i>
                    @endif
                </th>
                <th class="w-25 p-0 min-w-150px">
                    Status
                    @if ($sortColumn == 'status')
                        <i class="fa fa-fw fa-sort-{{ $sortDirection }}"></i>
                    @else
                        <i class="fa fa-fw fa-sort" style="color:#DCDCDC"></i>
                    @endif
                </th>
            </tr>
            <tr>
                <td>
                    <input type="text" class="form-control" wire:model="searchColumns.name"
                           placeholder="Search By Name"
                           data-bs-toggle="tooltip"
                           data-bs-custom-class="tooltip-inverse"
                           data-bs-placement="bottom"
                           title="Enter a product name system will filter only similar matches"
                    />
                </td>
                <td class="w-25 min-w-150px">
                    <select class="form-control" wire:model="searchColumns.product_category_id">
                        <option value="">-Category Selection-</option>
                        @foreach($categories as $id => $category)
                            <option value="{{ $id }}">{{ $category }}</option>
                        @endforeach
                    </select>
                </td>
                <td class="w-25 min-w-250px">
                    From
                    <input type="number" class="form-control d-inline mb-2" style="width: 75px"
                           wire:model="searchColumns.price.0"
                           placeholder="Ending Price"
                           data-bs-toggle="tooltip"
                           data-bs-custom-class="tooltip-inverse"
                           data-bs-placement="bottom"
                           title="Enter the starting price range you wish to search"
                    />
                    to
                    <input type="number" class="form-control d-inline" style="width: 75px"
                           wire:model="searchColumns.price.1"
                           placeholder="Ending Price "
                           data-bs-toggle="tooltip"
                           data-bs-custom-class="tooltip-inverse"
                           data-bs-placement="bottom"
                           title="Enter the ending price range you wish to search"
                    />
                </td>
                <td>
                    <input type="number" class="form-control" wire:model="searchColumns.sales"
                           placeholder="# of Sales"
                           data-bs-toggle="tooltip"
                           data-bs-custom-class="tooltip-inverse"
                           data-bs-placement="bottom"
                           title="Find products equal to or greater to provided sales value"
                    />
                </td>
                <td>


                </td>
                <td>
                    <input type="number" class="form-control" wire:model="searchColumns.likes"
                           placeholder="Search By Likes"
                           data-bs-toggle="tooltip"
                           data-bs-custom-class="tooltip-inverse"
                           data-bs-placement="bottom"
                           title="Search by LIKES, equal or greater"

                    />
                </td>
                <td>
                    <input type="number" class="form-control" wire:model="searchColumns.dislikes"
                           placeholder="Search By Dislikes"
                           data-bs-toggle="tooltip"
                           data-bs-custom-class="tooltip-inverse"
                           data-bs-placement="bottom"
                           title="Search by DISLIKES, equal or greater"

                    />
                </td>
                <td class="w-25 min-w-150px">
                    <select class="form-control" wire:model="searchColumns.user_id">
                        <option value="">-User Selection-</option>
                        @foreach($users as $id => $user)
                            <option value="{{ $id }}">{{ $user }}</option>
                        @endforeach
                    </select>
                </td>
                <td></td>
                <td class="w-25 min-w-150px">
                    <select class="form-control" wire:model="searchColumns.status">
                        <option value="">-Status Selection-</option>
                        <option value="featured">Featured</option>
                        <option value="starred">Starred</option>
                        <option value="trending">Trending</option>
                    </select>
                </td>

            </tr>
            </thead>
            <!--end::Table head-->
            <!--begin::Table body-->
            <tbody>

            @foreach($products as $product)
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <!--begin::Avatar-->
                            <div class="symbol symbol-50px me-5">
                                <img alt="{{$product->name}}"
                                     src="{{$root}}{{$mediaFolder}}{{$product->product_image}}">
                            </div>
                            <!--end::Avatar-->
                            <!--begin::Name-->
                            <div class="d-flex justify-content-start flex-column">
                                <a href="#"
                                   class="text-dark fw-bold text-hover-primary mb-1 fs-6">{{$product->name}}</a>
                                <a href="#"
                                   class="text-muted text-hover-primary fw-semibold text-muted d-block fs-7">
                                    <span class="text-dark"> Product</span></a>
                            </div>
                            <!--end::Name-->
                        </div>
                    </td>
                    <td class="text-end">

                        <!--begin::Category-->
                        <div class="d-flex justify-content-start flex-column">
                            <a href="#"
                               class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">{{$product->category->name}}</a>
                            <span class="text-muted fw-semibold text-muted d-block fs-7">Category</span>
                        </div>
                        <!--end::Category-->

                    </td>
                    <td class="text-end  w-25 min-w-250px" style="text-align:center !important">
                        <!--begin::Price-->
                        <div class="d-flex justify-content-start flex-column">
                            <a href="#"
                               class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">${{$product->price}}</a>
                            <span class="text-muted fw-semibold text-muted d-block fs-7">Price</span>
                        </div>
                        <!--end::Price-->

                        <button
                            type="button"
                            wire:click="viewProduct({{$product->id}})"
                            class="btn btn-sm btn-icon btn-bg-light btn-color-info"
                            data-bs-toggle="tooltip"
                            data-bs-custom-class="tooltip-inverse"
                            data-bs-placement="top"
                            title="View Product {{$product->name}}"
                        >
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                            <span class="svg-icon svg-icon-2">
																						<svg width="24" height="24"
                                                                                             viewBox="0 0 24 24"
                                                                                             fill="none"
                                                                                             xmlns="http://www.w3.org/2000/svg">
																							<rect opacity="0.5" x="18"
                                                                                                  y="13" width="13"
                                                                                                  height="2" rx="1"
                                                                                                  transform="rotate(-180 18 13)"
                                                                                                  fill="currentColor"></rect>
																							<path
                                                                                                d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                                                                                fill="currentColor"></path>
																						</svg>
																					</span>
                            <!--end::Svg Icon-->
                        </button>

                        <button
                            type="button"
                            wire:click="editProduct({{$product->id}})"
                            class="btn btn-icon btn-bg-light btn-color-success btn-sm me-1"
                            data-bs-toggle="tooltip"
                            data-bs-custom-class="tooltip-inverse"
                            data-bs-placement="top"
                            title="Edit Product {{$product->name}}"
                        >
                            <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                            <span class="svg-icon svg-icon-3">
																		<svg width="24" height="24" viewBox="0 0 24 24"
                                                                             fill="none"
                                                                             xmlns="http://www.w3.org/2000/svg">
																			<path opacity="0.3"
                                                                                  d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                                                  fill="currentColor"></path>
																			<path
                                                                                d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                                                fill="currentColor"></path>
																		</svg>
																	</span>
                            <!--end::Svg Icon-->
                        </button>
                        <button
                            type="button"
                            wire:click="deleteProduct({{$product->id}})"
                            class="btn btn-icon btn-bg-light btn-color-danger btn-sm"
                            data-bs-toggle="tooltip"
                            data-bs-custom-class="tooltip-inverse"
                            data-bs-placement="top"
                            title="Delete Product {{$product->name}}"
                        >
                            <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                            <span class="svg-icon svg-icon-3">
																		<svg width="24" height="24" viewBox="0 0 24 24"
                                                                             fill="none"
                                                                             xmlns="http://www.w3.org/2000/svg">
																			<path
                                                                                d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                                                                                fill="currentColor"></path>
																			<path opacity="0.5"
                                                                                  d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                                                                                  fill="currentColor"></path>
																			<path opacity="0.5"
                                                                                  d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                                                                                  fill="currentColor"></path>
																		</svg>
																	</span>
                            <!--end::Svg Icon-->
                        </button>
                    </td>

                    <td class="text-end">
                        <a href="#"
                           class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">
                            <h2>{{$product->sales}}</h2></a>
                        <span class="text-muted fw-semibold text-muted d-block fs-7">Total Sales</span>
                    </td>
                    <td class="text-end">
                        <a href="#"
                           class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">

                            <h2>{{$product->comments()->count()}}</h2></a>
                        <span class="text-muted fw-semibold text-muted d-block fs-7">Comments</span>
                    </td>
                    <td class="text-end">
                        <a href="#"
                           class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">
                            <h2>{{$product->likes}}</h2></a>
                        <span class="text-muted fw-semibold text-muted d-block fs-7">Likes</span>
                    </td>
                    <td class="text-end">
                        <a href="#"
                           class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">
                            <h2>{{$product->dislikes}}</h2></a>
                        <span class="text-muted fw-semibold text-muted d-block fs-7">Dislikes</span>
                    </td>
                    <td class="text-end w-25 min-w-150px">
                        <div class="d-flex align-items-center justify-content-end">
                            <div
                                wire:click="viewUserProfile({{$product->user->id}})"
                                class="symbol symbol-30px me-3"
                                data-bs-toggle="tooltip"
                                data-bs-custom-class="tooltip-inverse"
                                data-bs-placement="top"
                                title="View all products for this user {{$product->user->name}}"
                            >
                                <img src="{{$root}}{{$avatarsFolder}}{{$product->user->profile_url}}" class="" alt="">
                            </div>
                            <span class="text-gray-600 fw-bold d-block fs-6">{{$product->user->name}}</span>
                        </div>
                        <a href="#"
                           class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">{{$product->user->job_title}}</a>
                        <span class="text-muted fw-semibold text-muted d-block fs-7">User</span>
                    </td>
                    <td class="text-muted fw-semibold text-end">{{$product->description}}</td>
                    <td class="text-end">
                        @if($product->status == 'starred')
                            @php($color = 'warning') @php($icon = 'fa-star')
                        @elseif($product->status == 'featured')
                            @php($color = 'success') @php($icon = 'fa-plus')
                        @elseif($product->status == 'trending')
                            @php($color = 'info') @php($icon = 'fa-share')
                        @endif
                        <span class="badge badge-light-{{$color}}"><button
                                class="btn btn-sm btn-light-{{$color}}"><i class="fa {{$icon}}"></i> {{$product->status}}</button></span>
                        <span class="text-muted fw-semibold text-muted d-block fs-7">Status</span>
                    </td>

                    <td class="text-end">

                    </td>
                </tr>
            @endforeach
            </tbody>
            <!--end::Table body-->
        </table>
        <!--end::Table-->
    </div>
    <!--end::Table container-->
</div>
