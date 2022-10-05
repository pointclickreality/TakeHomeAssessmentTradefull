<div>
    <!-- productImage path including server domain & mediaFolder -->
    @php($pic = $root.''.$mediaFolder.''.$product_image)

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
            <h4 class="mb-1 text-info">{{$homeTitle}}</h4>
            <span>
                @if($action == 'editProduct')
                    You can edit the following params for a product: <br/>
                    productName, productPrice, productDescription, productCategory, productStatus.
                    <br/>
                    The likes, dislikes, & sales, cannot be modified this way.

                @elseif($action == 'createProduct')
                    The product image is randomly selected when creating a product, from a range of 80 images available.
                    <br/>
                    You can edit the following params for a product: <br/>
                    productName, productPrice, productDescription, productCategory, productStatus.
                    <br/>
                    The likes, dislikes,  & sales are set to 0 by default. You can increase likes, or dislikes via UI
                    when viewing this newly created product.
                @endif
                          </span>
        </div>
    </div>
    <form action="" method="post" @if($action == 'editProduct' && $product) wire:submit.prevent="updateProduct()"
          @else wire:submit.prevent="saveProduct()" @endif id="product_form"
          class="form d-flex flex-column flex-lg-row fv-plugins-bootstrap5 fv-plugins-framework">

        <!-- only show product id in form if this is edit page -->
        @if($action == 'editProduct' && $product)
            <input type="hidden" wire:model="product_id" id="product_id">
        @endif
        <input type="hidden" wire:model="action">
        <input type="hidden" wire:model="user_id">

        <!--begin::Aside column-->
        <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10 col-xl-4 col-md-4">
            <div class="card-body text-center pb-5">
                <!--begin::Overlay-->
                <a class="d-block overlay" data-fslightbox="lightbox-hot-sales" href="{{$pic}}">
                    <!--begin::Image-->
                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded mb-7"
                         style="height: 266px;background-image:url({{$pic}})"></div>
                    <!--end::Image-->
                    <!--begin::Action-->
                    <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                        <i class="bi bi-eye-fill fs-2x text-white"></i>
                    </div>
                    <!--end::Action-->
                </a>
                <!--end::Overlay-->

            </div>
            <div class="card card-flush py-4">

                <div class="card-header">
                    <div class="card-title">
                        <h2>Product Category</h2>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <label class="form-label">Categories</label>
                    <select class="form-control" wire:model="product_category_id">
                        <option value="null">-Category Selection-</option>
                        @foreach($categories as $id => $category)
                            <option value="{{ $id }}">{{ $category }}</option>
                        @endforeach
                    </select>
                    <div class="text-muted fs-7 mb-7">Add product to a category.</div>
                    @error('product_category_id')
                    <div class="fv-plugins-message-container invalid-feedback">{{$message}}</div> @enderror

                </div>
            </div>
            <div class="card card-flush py-4">
                <div class="card-header">
                    <div class="card-title">
                        <h2>Product Status</h2>
                    </div>
                    <div class="card-toolbar">
                        <div class="rounded-circle bg-success w-15px h-15px" id="status"></div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <label class="required form-label">Product Status</label>
                    <select class="form-control mb-2" wire:model="status">
                        <option value="null">-Choose Status-</option>
                        <option value="featured">Featured</option>
                        <option value="starred">Starred</option>
                        <option value="trending">Trending</option>
                        </option>
                    </select>
                    <div class="text-muted fs-7">Set the product status.</div>
                    @error('status')
                    <div class="fv-plugins-message-container invalid-feedback">{{$message}}</div> @enderror


                </div>
            </div>
        </div>
        <!--end::Aside column-->
        <!--begin::Main column-->
        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10 col-xl-8 col-md-8">
            <!--begin::Tab content-->
            <div class="tab-content">
                <div class="d-flex flex-column gap-7 gap-lg-10">
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>{{$homeTitle}}</h2>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-10 fv-row fv-plugins-icon-container">
                                        <label class="required form-label">Product Name</label>
                                        <input type="text" wire:model="name" class="form-control mb-2"
                                               placeholder="Product name" value="">
                                        <div class="text-muted fs-7">
                                            A product name is required and recommended to be unique.
                                        </div>
                                        @error('name')
                                        <div
                                            class="fv-plugins-message-container invalid-feedback">{{$message}}</div> @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-10 fv-row fv-plugins-icon-container">
                                        <label class="required form-label">Product Price</label>
                                        <input
                                            type="text"
                                            wire:model="price"
                                            class="form-control mb-2"
                                            placeholder="Product Price"
                                        >
                                        <div class="text-muted fs-7">Product Price</div>
                                        @error('price')
                                        <div
                                            class="fv-plugins-message-container invalid-feedback">{{$message}}</div> @enderror
                                    </div>
                                </div>
                            </div>

                            <div>

                                <label class="form-label">Description</label>
                                <div class="form-floating">
                                    <div class="form-floating">
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="description"
                                            placeholder="Enter your description here"
                                            wire:model="description"
                                        />
                                        <label for="floatingInputValue">Product Description</label>
                                    </div>
                                    @error('description')
                                    <div
                                        class="fv-plugins-message-container invalid-feedback">{{$message}}</div> @enderror
                                </div>

                                <div class="text-muted fs-7">
                                    Set a description to the product for better visibility.
                                </div>

                            </div>

                        </div>

                    </div>


                    <div class="card card-flush py-4">

                        <div class="card-header">
                            <div class="card-title">
                                <h2>Additional Product Details</h2>
                            </div>
                        </div>

                        <div class="card-body pt-0">
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="mb-10 fv-row fv-plugins-icon-container">
                                        <label class="required form-label">Total Likes</label>
                                        <input
                                            type="text"
                                            wire:model="likes"
                                            class="form-control mb-2"
                                            placeholder="# of likes"
                                            readonly="readonly"
                                        >

                                        <div class="text-muted fs-7">Total Number of Likes</div>

                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-10 fv-row fv-plugins-icon-container">
                                        <label class="required form-label">Total Dislikes</label>
                                        <input
                                            type="text"
                                            wire:model="likes"
                                            class="form-control mb-2"
                                            placeholder="# of likes"
                                            readonly="readonly"
                                        >

                                        <div class="text-muted fs-7">Total Number of Dislikes</div>

                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-10 fv-row fv-plugins-icon-container">
                                        <label class="required form-label">Total Sales</label>
                                        <input
                                            type="text"
                                            wire:model="sales"
                                            class="form-control mb-2"
                                            placeholder="# of sales"
                                            readonly="readonly"
                                        >

                                        <div class="text-muted fs-7">Total Number of Sales</div>

                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                </div>
            </div>
            <!--end::Tab content-->
            <div class="d-flex justify-content-end">

                <button type="button" wire:click="resetResults()"
                        id="cancel_product" class="btn btn-light me-5">Cancel
                </button>

                <button type="submit" id="add_product_submit" class="btn btn-primary">
                    <span class="indicator-label">Save Changes</span>
                    <span class="indicator-progress">Please wait...
					<span
                        class="spinner-border spinner-border-sm align-middle ms-2"></span>
                    </span>
                </button>
            </div>
        </div>
        <!--end::Main column-->
    </form>

</div>
