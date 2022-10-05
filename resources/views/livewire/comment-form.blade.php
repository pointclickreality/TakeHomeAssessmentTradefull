<div>


    <div class="card card-flush mb-10">
        <!--begin::Header-->
        <div class="card-header justify-content-start align-items-center pt-4">
            <!--begin::Photo-->
            <div class="symbol symbol-45px me-5">

                <img src="{{$randomImage}}" class="" alt="">
            </div>
            <!--end::Photo-->
            <span class="text-gray-400 fw-semibold fs-6">{{$randomName }} | {{$jobTitle}}</span>
        </div>
        <!--end::Header-->
        <form action="" method="post" wire:submit.prevent="createNewComment" id="kt_forms_widget_1_form"
              class="ql-quil ql-quil-plain pb-3">

            <!--begin::Body-->
            <div class="card-body pt-2 pb-0">

                <input type="hidden" wire:model="user_id" id="user_id">
                <input type="hidden" wire:model="product_id" id="product_id"><!--begin::Input-->
                <textarea wire:model="body" class="form-control bg-transparent border-0 px-0"
                          id="kt_social_feeds_post_input" name="message" data-kt-autosize="true" rows="1"
                          placeholder="Type your message..." data-kt-initialized="1"
                          style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 44px;"></textarea>
                <!--end::Input-->
                @error('body') <span class="error">{{ $message }}</span> @enderror
                @error('user_id') <span class="error">{{ $message }}</span> @enderror
                @error('product_id') <span class="error">{{ $message }}</span> @enderror
            </div>
            <!--end::Body-->
            <!--begin::Footer-->
            <div class="card-footer d-flex justify-content-end pb-5">
                <!--begin::Post action-->
                <button type="submit" class="btn btn-sm btn-primary"
                        @if($users->count() < 1) disabled="disabled" @endif>
                    <!--begin::Indicator label-->
                    <span class="indicator-label">{{$commentLabel}}</span>
                    <!--end::Indicator label-->
                    <!--begin::Indicator progress-->
                    <span class="indicator-progress">Please wait...
				<span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                </span>
                    <!--end::Indicator progress-->
                </button>
                <!--end::Post action-->
            </div>
            <!--end::Footer-->
        </form>
    </div>

</div>
