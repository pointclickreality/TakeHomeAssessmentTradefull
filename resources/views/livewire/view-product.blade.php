<div>
    <div class="card card-flush h-xl-100">
        <!--begin::Body-->
        <div class="card-body py-9">
            <!--begin::Row-->
            <div class="row gx-9 h-100">

                @if (session()->has('message'))
                    <div class="row">
                        <div class="alert alert-{{$code}} d-flex align-items-center p-5 mb-10">

                    <span class="svg-icon svg-icon-2hx svg-icon-{{$code}} me-4"><svg width="24" height="24"
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
                                <h4 class="mb-1 font-weight-bold text-{{$code}}">{{strtoupper($code)}}</h4>
                                <span>
       {{ session('message') }}
                          </span>
                            </div>
                        </div>
                    </div>
                @endif
                <hr/>

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
                          You are viewing the product, here you will find the likes, sales, dislikes, price, description, & comments associated with the product model.
                            <br/>
                            You can perform LIKE, DISLIKE, EDIT/PATCH, or DELETE  CRUD operations using the buttons available above, & it will update the UI dynamically just like a Vue component.
                          </span>
                    </div>
                </div>

                <!--begin::Col-->
                <div class="col-sm-6 mb-10 mb-sm-0">
                    <!--begin::Overlay-->
                    <a class="d-block overlay h-100" data-fslightbox="lightbox-hot-sales"
                       href="{{$mediaFolder}}{{$product->product_image}}">
                        <!--begin::Image-->
                        <div
                            class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-200px h-100"
                            style="background-image:url({{$mediaFolder}}{{$product->product_image}})">

                        </div>
                        <!--end::Image-->
                        <!--begin::Action-->
                        <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                            <i class="bi bi-eye-fill fs-2x text-white"></i>
                        </div>
                        <!--end::Action-->
                    </a>
                    <!--end::Overlay-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-sm-6">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column h-100">
                        <!--begin::Header-->
                        <div class="mb-7">
                            <!--begin::Title-->
                            <div class="mb-6">
                                <span
                                    class="text-gray-400 fs-7 fw-bold me-2 d-block lh-1 pb-1">NFT ID: {{$product->uuid}}</span>
                                <a href=""
                                   class="text-gray-800 text-hover-primary fs-1 fw-bold">NAME: {{$product->name}}</a>
                            </div>
                            <!--end::Title-->
                            <!--begin::Items-->
                            <div class="d-flex align-items-center flex-wrap d-grid gap-2">
                                <!--begin::Item-->
                                <div class="d-flex align-items-center me-5 me-xl-13">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-30px symbol-circle me-3">
                                        <img src="{{$homeLink}}{{$avatarsFolder}}{{$product->user->profile_url}}"
                                             class="" alt="">
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Info-->
                                    <div class="m-0">
                                        <span
                                            class="fw-semibold text-gray-400 d-block fs-8">{{$product->user->name}}</span>
                                        <a href=""
                                           class="fw-bold text-gray-800 text-hover-primary fs-7">{{$product->user->gender}}
                                            | {{$product->user->phone}} </a>
                                    </div>
                                    <!--end::Info-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-30px symbol-circle me-3">
																				<span class="symbol-label bg-success">
																					<!--begin::Svg Icon | path: icons/duotune/abstract/abs042.svg-->
																					<span
                                                                                        class="svg-icon svg-icon-5 svg-icon-white">
																						<svg width="24" height="24"
                                                                                             viewBox="0 0 24 24"
                                                                                             fill="none"
                                                                                             xmlns="http://www.w3.org/2000/svg">
																							<path
                                                                                                d="M18 21.6C16.6 20.4 9.1 20.3 6.3 21.2C5.7 21.4 5.1 21.2 4.7 20.8L2 18C4.2 15.8 10.8 15.1 15.8 15.8C16.2 18.3 17 20.5 18 21.6ZM18.8 2.8C18.4 2.4 17.8 2.20001 17.2 2.40001C14.4 3.30001 6.9 3.2 5.5 2C6.8 3.3 7.4 5.5 7.7 7.7C9 7.9 10.3 8 11.7 8C15.8 8 19.8 7.2 21.5 5.5L18.8 2.8Z"
                                                                                                fill="currentColor"></path>
																							<path opacity="0.3"
                                                                                                  d="M21.2 17.3C21.4 17.9 21.2 18.5 20.8 18.9L18 21.6C15.8 19.4 15.1 12.8 15.8 7.8C18.3 7.4 20.4 6.70001 21.5 5.60001C20.4 7.00001 20.2 14.5 21.2 17.3ZM8 11.7C8 9 7.7 4.2 5.5 2L2.8 4.8C2.4 5.2 2.2 5.80001 2.4 6.40001C2.7 7.40001 3.00001 9.2 3.10001 11.7C3.10001 15.5 2.40001 17.6 2.10001 18C3.20001 16.9 5.3 16.2 7.8 15.8C8 14.2 8 12.7 8 11.7Z"
                                                                                                  fill="currentColor"></path>
																						</svg>
																					</span>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Info-->
                                    <div class="m-0">
                                        <span class="fw-semibold text-gray-400 d-block fs-8">Instant Price</span>
                                        <a href="#"
                                           class="fw-bold text-gray-800 text-hover-primary fs-7">${{$product->price}}</a>
                                    </div>
                                    <!--end::Info-->
                                </div>
                                <!--end::Item-->
                            </div>
                            <!--end::Items-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div
                            class="d-flex flex-column border border-1 border-gray-300 text-center pt-5 pb-7 mb-8 card-rounded">
                            <span class="fw-semibold text-gray-600 fs-7 pb-1">Latest Price</span>
                            <span class="fw-bold text-gray-800 fs-2hx lh-1 pb-1">${{$product->price}} USD</span>
                            <span class="fw-bold text-gray-600 fs-4 pb-5">
                                <i class="fa fa-usd"></i> Total Sales: {{$product->sales}}
                                <hr/>
                                <i class="fa fa-thumbs-up"></i> Likes:  {{$product->likes}} | <i
                                    class="fa fa-thumbs-o-down"></i> Dislikes:  {{$product->dislikes}}
                            </span>

                            <span>
                                <blockquote>
                                    {{$product->description}}
                                </blockquote>                            </span>
                            <span class="fw-semibold text-gray-600 fs-7 pb-1">Category</span>
                            <span class="fw-bold text-gray-800 fs-3">{{$product->category->name}}</span>
                        </div>
                        <!--end::Body-->
                        <!--begin::Footer-->
                        <div class="d-flex flex-stack mt-auto bd-highlight">
                            <button
                                type="button"
                                wire:click="viewUserProfile({{$product->user->id}})"
                                class="btn btn-primary btn-sm flex-shrink-0 me-3">
                                View Products for {{$product->user->name}}
                            </button>
                            <button type="button"
                                    wire:click="resetResults()"
                                    class="btn btn-info btn-sm flex-shrink-0 me-3">Go Back
                            </button>
                        </div>
                        <!--end::Footer-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->


            <div class="row" wire:key="comments-crud-widget">
                @livewire('comment-crud-widget', ['product_id' => $product->id])
            </div>
        </div>
        <!--end::Body-->
    </div>


</div>
