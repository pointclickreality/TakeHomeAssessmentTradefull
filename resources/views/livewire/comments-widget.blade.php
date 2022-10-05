<div>
    <div class="row">

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
                <h4 class="mb-1 text-info">Comments Crud Component</h4>
                <span>
                            There are some functions available here, on the Comment Widget itself, you can LIKE, DISLIKE,
                <br/>
                or delete any of the existing comments by clicking on the icons, you will notice the UI update & Increment your selection by 1. Try it out..
                   Comments are ordered by newest to oldest.

                          </span>
            </div>
        </div>
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
    </div>
    @foreach($comments->chunk(3) as $c)
        <div class="row">
            @foreach($c as $comment)
                <div class="col-md-4">
                    <div class="card card-flush mb-10" id="kt_widget_{{$loop->iteration}}">
                        <!--begin::Card header-->
                        <div class="card-header pt-9">
                            <!--begin::Author-->
                            <div class="d-flex align-items-center">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-50px me-5">
                                    <img src="{{$root}}{{$avatarsFolder}}{{$comment->author->profile_url}}" class=""
                                         alt="">
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Info-->
                                <div class="flex-grow-1">
                                    <!--begin::Name-->
                                    <a href="#"
                                       class="text-gray-800 text-hover-primary fs-4 fw-bold">{{$comment->author->name}}</a>
                                    <!--end::Name-->
                                    <!--begin::Date-->
                                    <span
                                        class="text-gray-400 fw-semibold d-block">{{$comment->created_at->toDayDateTimeString()}}</span>
                                    <!--end::Date-->
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::Author-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body">
                            <!--begin::Post content-->
                            <div class="fs-6 fw-normal text-gray-700 mb-5">
                                {{$comment->body}}
                            </div>
                            <!--end::Post content-->


                        </div>
                        <!--end::Card body-->
                        <!--begin::Card footer-->
                        <div class="card-footer pt-0">
                            <!--begin::Info-->
                            <div class="mb-6">
                                <!--begin::Separator-->
                                <div class="separator separator-solid"></div>
                                <!--end::Separator-->
                                <!--begin::Nav-->
                                <ul class="nav py-3">

                                    <!--begin::Item-->
                                    <li class="nav-item">
                                  <span
                                      class="nav-link btn btn-sm btn-color-gray-600 btn-active-color-primary fw-bold px-4 me-1"
                                      wire:click="increaseLikes({{$comment->id}})"
                                  >
                                      <i class="bi bi-heart fs-2 me-1"></i>{{$comment->likes}} Likes</span>
                                    </li>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <li class="nav-item">
                                  <span type="button"
                                        class="nav-link btn btn-sm btn-color-gray-600 btn-active-color-primary fw-bold px-4"
                                        wire:click="increaseDislikes({{$comment->id}})"
                                  >
                                      <i class="bi bi-hand-thumbs-down fs-2 me-1"></i> {{$comment->dislikes}}</span>
                                    </li>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <li class="nav-item">
                                  <span
                                      type="button"
                                      class="nav-link btn btn-sm btn-color-gray-600 btn-active-color-primary btn-active-light-primary fw-bold px-4 me-1"
                                      wire:click="deleteComment({{$comment->id}})"
                                  >
                                      <i class="bi bi-trash fs-2 me-1"></i> Delete</span>
                                    </li>
                                    <!--end::Item-->
                                </ul>
                                <!--end::Nav-->
                                <!--begin::Separator-->
                                <div class="separator separator-solid mb-1"></div>
                                <!--end::Separator-->
                                {{--
                                @if($comment->replies()->count())
                                    @foreach($comment->replies as $reply)
                                        <!--begin::Replies-->
                                        <div class="collapse show" id="kt_social_feeds_comments_1" style="">
                                            <!--begin::Comment-->
                                            <div class="d-flex pt-6">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-45px me-5">
                                                    <img src="{{$url}}{{$reply->author->profile_url}}" alt="">
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Wrapper-->
                                                <div class="d-flex flex-column flex-row-fluid">
                                                    <!--begin::Info-->
                                                    <div class="d-flex align-items-center flex-wrap mb-0">
                                                        <!--begin::Name-->
                                                        <a href="#" class="text-gray-800 text-hover-primary fw-bold me-6">{{$reply->author->name}}</a>
                                                        <!--end::Name-->
                                                        <!--begin::Date-->
                                                        <span class="text-gray-400 fw-semibold fs-7 me-5">{{$reply->created_at->toDayDateTimeString()}}</span>
                                                        <!--end::Date-->
                                                        <!--begin::Reply-->
                                                        <span wire:click="deleteComment({{$reply->id}})" class="ms-auto text-gray-400 text-hover-primary fw-semibold fs-7">Delete Reply</span>
                                                        <!--end::Reply-->
                                                    </div>
                                                    <!--end::Info-->
                                                    <!--begin::Text-->
                                                    <span class="text-gray-800 fs-7 fw-normal pt-1"><h4>{{$reply->body}}</h4></span>
                                                    <!--end::Text-->
                                                </div>
                                                <!--end::Wrapper-->
                                            </div>
                                            <!--end::Comment-->

                                        </div>
                                        <!--end::Collapse-->
                                    @endforeach
                                @endif
                                --}}
                            </div>
                            <!--end::Info-->
                            {{---- reply form
                              <form action="" method="post" wire:submit.prevent="createNewComment({{$comment->id}})" id="reply-form" class="ql-quil ql-quil-plain pb-3">
                                  <input wire:model="user_id" type="hidden">
                                  <input wire:model="comment_id" type="hidden">

                                  <!--begin::Comment form-->
                                  <div class="d-flex align-items-center">
                                      <!--begin::Author-->
                                      <div class="symbol symbol-35px me-3">
                                          <img src="{{$url}}{{$comment->author->profile_url}}" alt="">
                                      </div>
                                      <!--end::Author-->
                                      <!--begin::Input group-->
                                      <div class="position-relative w-100">
                                          <!--begin::Input-->
                                          <textarea type="text" wire:model="reply" class="form-control form-control-solid border ps-5" rows="1" name="search" value="" data-kt-autosize="true" placeholder="Write your comment.." data-kt-initialized="1" style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 44px;"></textarea>
                                          @error('reply') <span class="error">{{ $message }}</span> @enderror
                                          <!--end::Input-->
                                          <!--begin::Actions-->
                                          <div class="position-absolute top-0 end-0 translate-middle-x mt-1 me-n14">
                                              <!--begin::Btn-->
                                              <button type="submit" class="btn btn-icon btn-sm btn-color-gray-500 btn-active-color-primary w-25px p-0">
                                                  <i class="fonticon-plus fs-2"></i>
                                              </button>
                                              <!--end::Btn-->
                                              <!--begin::Btn-->
                                              <button class="btn btn-icon btn-sm btn-color-gray-500 btn-active-color-primary w-25px p-0">
                                                  <i class="fonticon-smile fs-2"></i>
                                              </button>
                                              <!--end::Btn-->
                                              <!--begin::Btn-->
                                              <button class="btn btn-icon btn-sm btn-color-gray-500 btn-active-color-primary w-25px p-0">
                                                  <i class="fonticon-gallery fs-2"></i>
                                              </button>
                                              <!--end::Btn-->
                                              <!--begin::Btn-->
                                              <button class="btn btn-icon btn-sm btn-color-gray-500 btn-active-color-primary w-25px p-0">
                                                  <i class="fonticon-location fs-2"></i>
                                              </button>
                                              <!--end::Btn-->
                                          </div>
                                          <!--end::Actions-->
                                      </div>
                                      <!--end::Input group-->
                                  </div>
                                  <!--end::Comment form-->

                              </form>
                              --}}
                        </div>
                        <!--end::Card footer-->
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
</div>
