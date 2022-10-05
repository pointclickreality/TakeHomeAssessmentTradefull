<div>


    <!--begin::Hot sales post-->
    <div class="card-xl-stretch me-md-6">
        @php($pic = $root.''.$mediaFolder.''.$product->product_image)
        <!--begin::Overlay-->
        <span class="d-block overlay" data-fslightbox="lightbox-hot-sales"
              wire:click="viewProduct({{$product->id}})"
        >
                        <!--begin::Image-->
                        <div
                            class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px"
                            style="background-image:url('{{$pic}}')"></div>
            <!--end::Image-->
            <!--begin::Action-->
                        <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                            <i class="bi bi-eye-fill fs-2x text-white"></i>
                        </div>
            <!--end::Action-->
                    </span>
        <!--end::Overlay-->
        <!--begin::Body-->
        <div class="mt-5">
            <!--begin::Title-->
            <button type="button" wire:click="viewProduct({{$product->id}})"
                    class="fs-4 text-dark fw-bold text-hover-primary text-dark lh-base">{{$product->name}}</button>
            <!--end::Title-->
            <!--begin::Text-->
            <div class="fw-semibold fs-5 text-gray-600 text-dark mt-3">{{$product->description}}</div>
            <!--end::Text-->
            <!--begin::Text-->
            <div class="fs-6 fw-bold mt-5 d-flex flex-stack">
                <!--begin::Label-->
                <span class="badge border border-dashed fs-2 fw-bold text-dark p-2">
																	<span
                                                                        class="fs-6 fw-semibold text-gray-400">$</span>{{$product->price}}</span>
                <!--end::Label-->
                <!--begin::Action-->
                <button type="button" class="badge border border-dashed fs-2 fw-bold text-dark p-2"><i
                        class="fa fa-usd"></i> {{$product->sales}} Sales
                </button>
                <button type="button" wire:click="increaseLikes({{$product->id}})"
                        class="badge border border-dashed fs-2 fw-bold text-dark p-2"><i
                        class="fa fa-thumbs-up"></i> {{$product->likes}} Likes
                </button>
                <button type="button" wire:click="increaseDislikes({{$product->id}})"
                        class="badge border border-dashed fs-2 fw-bold text-dark p-2"><i
                        class="fa fa-thumbs-down"></i> {{$product->dislikes}} Dislikes
                </button>

                <!--end::Action-->
            </div>
            <!--end::Text-->
        </div>
        <!--end::Body-->
    </div>
    <!--end::Hot sales post-->

</div>
