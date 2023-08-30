@extends('Client.Profile.layout')


@section('left-content')

    <button class="btn left-dashboard-show btn-animation btn-md fw-bold d-block mb-4 d-lg-none">نمایش منو</button>
    <div class="dashboard-right-sidebar">
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-dashboard" role="tabpanel"
                 aria-labelledby="pills-dashboard-tab">
                <div class="dashboard-order">
                    <div class="title">
                        <h2>نظرات من</h2>
                        <span class="title-leaf title-leaf-gray">
                                            <svg class="icon-width bg-gray">
                                                <use xlink:href="/Client/assets/svg/leaf.svg#leaf"></use>
                                            </svg>
                                        </span>
                    </div>

                    <div class="order-contain">
                        @foreach($comments as $comment)
                            <div class="order-box dashboard-bg-box w-100">
                                <div class="order-container">
                                    <div class="order-icon">
                                        <i data-feather="message-square"></i>
                                    </div>

                                    <div class="order-detail">
                                        <div class="flex-space-between">
                                            <h4>{{$comment->product->name}} <span class="@if($comment->product->countRate!= 0) {{comment_rating_color($comment->rate)[1]}} @endif"> {{faNumber($comment->rate.'.0')}}</span></h4>
                                        </div>
                                        <h6 class="text-content">{{jdate($comment->created_at)->ago()}} @if($comment->status == 0) (در انتظار تایید ) @endif</h6>
                                    </div>
                                    <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#editComment" id="editCommentBtn" comment-id="{{$comment->id}}" class="btn btn-sm btn-dark float-end me-auto " ><i class="fa fa-edit" ></i></a>

                                </div>

                                <div class="product-order-detail @if($comment->status == 0) bg-comment-status-0 @endif">
                                    <a href="product-left-thumbnail.html" class="order-image">
                                        <img src="{{str_replace('public','/storage',optional($comment->product->gallery)->path)}}"
                                             class="blur-up lazyload w-10" alt="">
                                    </a>

                                    <div class="order-wrap w-100">
                                        <div class="flex-space-between w-100">
                                            <h3>{{$comment->title}}</h3>
                                            <p class="opacity-100">
                                                <i class="fa fa-thumbs-o-up " id="like"></i>
                                                <span >{{$comment->like}}</span>
                                                <i class="me-3 fa fa-thumbs-o-down" id="dislike" ></i>
                                                <span>{{$comment->dislike}}</span>
                                            </p>
                                        </div>
                                        <p class="text-content">{{$comment->text}}</p>
                                        <div class="row mt-2">
                                            @if($comment->positive != 'null')
                                                <div class="col-6">
                                                    @foreach(json_decode($comment->positive) as $item)
                                                        <div class="flex"><i class="fa fa-plus text-success mx-1"></i> <h6 class="text-black-50 text-sm-end">{{$item}}</h6></div>
                                                    @endforeach
                                                </div>
                                            @endif
                                                @if($comment->negative != 'null')
                                                <div class="col-6">
                                                    @foreach(json_decode($comment->negative) as $item)
                                                        <div class="flex"><i class="fa fa-minus text-danger mx-1"></i> <h6 class="text-black-50 text-sm-end">{{$item}}</h6></div>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- ویرایش نظر Start -->
        <div class="modal fade theme-modal" id="editComment" tabindex="-1" aria-labelledby="exampleModalLabel2"
             aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered modal-fullscreen-sm-down">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel2">ویرایش نظر</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                    <form method="post" id="commentEdit" action="{{route('profile.comments.edit',5)}}">
                        @csrf
{{--                        @method('PATCH')--}}
                        <div class="modal-body" id="commentDetailTable">
{{--                            <input type="hidden" name="_method" value="PATCH">--}}
{{--                            <input hidden="hidden" value="" readonly name="product_id">--}}
                            <div class="row g-4">
                                <div class="col-md-6 row">
                                    <div class="col-md-12">
                                        <div class="feedback w-100 m-auto">
                                            <div class="ratingComment">
                                                <div style="position: absolute;bottom:3rem ;right: 0; width: 100%; display: flex; justify-content: space-around;" >
                                                    <div>خیلی ضعیف</div>
                                                    <div>ضعیف</div>
                                                    <div>خوب</div>
                                                    <div>خیلی خوب</div>
                                                    <div>عالی</div>
                                                </div>
                                                <input type="radio" value="5" name="rating" id="rating-5">
                                                <label for="rating-5"></label>
                                                <input type="radio" value="4" name="rating" id="rating-4">
                                                <label for="rating-4"></label>
                                                <input type="radio" value="3" name="rating" id="rating-3">
                                                <label for="rating-3"></label>
                                                <input type="radio" value="2" name="rating" id="rating-2">
                                                <label for="rating-2"></label>
                                                <input type="radio" value="1" name="rating" id="rating-1">
                                                <label for="rating-1"></label>
                                                <div class="emoji-wrapper mb-2">
                                                    <div class="emoji">
                                                        <svg class="rating-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <circle cx="256" cy="256" r="256" fill="#ffd93b"/>
                                                            <path d="M512 256c0 141.44-114.64 256-256 256-80.48 0-152.32-37.12-199.28-95.28 43.92 35.52 99.84 56.72 160.72 56.72 141.36 0 256-114.56 256-256 0-60.88-21.2-116.8-56.72-160.72C474.8 103.68 512 175.52 512 256z" fill="#f4c534"/>
                                                            <ellipse transform="scale(-1) rotate(31.21 715.433 -595.455)" cx="166.318" cy="199.829" rx="56.146" ry="56.13" fill="#fff"/>
                                                            <ellipse transform="rotate(-148.804 180.87 175.82)" cx="180.871" cy="175.822" rx="28.048" ry="28.08" fill="#3e4347"/>
                                                            <ellipse transform="rotate(-113.778 194.434 165.995)" cx="194.433" cy="165.993" rx="8.016" ry="5.296" fill="#5a5f63"/>
                                                            <ellipse transform="scale(-1) rotate(31.21 715.397 -1237.664)" cx="345.695" cy="199.819" rx="56.146" ry="56.13" fill="#fff"/>
                                                            <ellipse transform="rotate(-148.804 360.25 175.837)" cx="360.252" cy="175.84" rx="28.048" ry="28.08" fill="#3e4347"/>
                                                            <ellipse transform="scale(-1) rotate(66.227 254.508 -573.138)" cx="373.794" cy="165.987" rx="8.016" ry="5.296" fill="#5a5f63"/>
                                                            <path d="M370.56 344.4c0 7.696-6.224 13.92-13.92 13.92H155.36c-7.616 0-13.92-6.224-13.92-13.92s6.304-13.92 13.92-13.92h201.296c7.696.016 13.904 6.224 13.904 13.92z" fill="#3e4347"/>
                                                        </svg>
                                                        <svg class="rating-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <circle cx="256" cy="256" r="256" fill="#ffd93b"/>
                                                            <path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z" fill="#f4c534"/>
                                                            <path d="M328.4 428a92.8 92.8 0 0 0-145-.1 6.8 6.8 0 0 1-12-5.8 86.6 86.6 0 0 1 84.5-69 86.6 86.6 0 0 1 84.7 69.8c1.3 6.9-7.7 10.6-12.2 5.1z" fill="#3e4347"/>
                                                            <path d="M269.2 222.3c5.3 62.8 52 113.9 104.8 113.9 52.3 0 90.8-51.1 85.6-113.9-2-25-10.8-47.9-23.7-66.7-4.1-6.1-12.2-8-18.5-4.2a111.8 111.8 0 0 1-60.1 16.2c-22.8 0-42.1-5.6-57.8-14.8-6.8-4-15.4-1.5-18.9 5.4-9 18.2-13.2 40.3-11.4 64.1z" fill="#f4c534"/>
                                                            <path d="M357 189.5c25.8 0 47-7.1 63.7-18.7 10 14.6 17 32.1 18.7 51.6 4 49.6-26.1 89.7-67.5 89.7-41.6 0-78.4-40.1-82.5-89.7A95 95 0 0 1 298 174c16 9.7 35.6 15.5 59 15.5z" fill="#fff"/>
                                                            <path d="M396.2 246.1a38.5 38.5 0 0 1-38.7 38.6 38.5 38.5 0 0 1-38.6-38.6 38.6 38.6 0 1 1 77.3 0z" fill="#3e4347"/>
                                                            <path d="M380.4 241.1c-3.2 3.2-9.9 1.7-14.9-3.2-4.8-4.8-6.2-11.5-3-14.7 3.3-3.4 10-2 14.9 2.9 4.9 5 6.4 11.7 3 15z" fill="#fff"/>
                                                            <path d="M242.8 222.3c-5.3 62.8-52 113.9-104.8 113.9-52.3 0-90.8-51.1-85.6-113.9 2-25 10.8-47.9 23.7-66.7 4.1-6.1 12.2-8 18.5-4.2 16.2 10.1 36.2 16.2 60.1 16.2 22.8 0 42.1-5.6 57.8-14.8 6.8-4 15.4-1.5 18.9 5.4 9 18.2 13.2 40.3 11.4 64.1z" fill="#f4c534"/>
                                                            <path d="M155 189.5c-25.8 0-47-7.1-63.7-18.7-10 14.6-17 32.1-18.7 51.6-4 49.6 26.1 89.7 67.5 89.7 41.6 0 78.4-40.1 82.5-89.7A95 95 0 0 0 214 174c-16 9.7-35.6 15.5-59 15.5z" fill="#fff"/>
                                                            <path d="M115.8 246.1a38.5 38.5 0 0 0 38.7 38.6 38.5 38.5 0 0 0 38.6-38.6 38.6 38.6 0 1 0-77.3 0z" fill="#3e4347"/>
                                                            <path d="M131.6 241.1c3.2 3.2 9.9 1.7 14.9-3.2 4.8-4.8 6.2-11.5 3-14.7-3.3-3.4-10-2-14.9 2.9-4.9 5-6.4 11.7-3 15z" fill="#fff"/>
                                                        </svg>
                                                        <svg class="rating-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <circle cx="256" cy="256" r="256" fill="#ffd93b"/>
                                                            <path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z" fill="#f4c534"/>
                                                            <path d="M336.6 403.2c-6.5 8-16 10-25.5 5.2a117.6 117.6 0 0 0-110.2 0c-9.4 4.9-19 3.3-25.6-4.6-6.5-7.7-4.7-21.1 8.4-28 45.1-24 99.5-24 144.6 0 13 7 14.8 19.7 8.3 27.4z" fill="#3e4347"/>
                                                            <path d="M276.6 244.3a79.3 79.3 0 1 1 158.8 0 79.5 79.5 0 1 1-158.8 0z" fill="#fff"/>
                                                            <circle cx="340" cy="260.4" r="36.2" fill="#3e4347"/>
                                                            <g fill="#fff">
                                                                <ellipse transform="rotate(-135 326.4 246.6)" cx="326.4" cy="246.6" rx="6.5" ry="10"/>
                                                                <path d="M231.9 244.3a79.3 79.3 0 1 0-158.8 0 79.5 79.5 0 1 0 158.8 0z"/>
                                                            </g>
                                                            <circle cx="168.5" cy="260.4" r="36.2" fill="#3e4347"/>
                                                            <ellipse transform="rotate(-135 182.1 246.7)" cx="182.1" cy="246.7" rx="10" ry="6.5" fill="#fff"/>
                                                        </svg>
                                                        <svg class="rating-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <circle cx="256" cy="256" r="256" fill="#ffd93b"/>
                                                            <path d="M407.7 352.8a163.9 163.9 0 0 1-303.5 0c-2.3-5.5 1.5-12 7.5-13.2a780.8 780.8 0 0 1 288.4 0c6 1.2 9.9 7.7 7.6 13.2z" fill="#3e4347"/>
                                                            <path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z" fill="#f4c534"/>
                                                            <g fill="#fff">
                                                                <path d="M115.3 339c18.2 29.6 75.1 32.8 143.1 32.8 67.1 0 124.2-3.2 143.2-31.6l-1.5-.6a780.6 780.6 0 0 0-284.8-.6z"/>
                                                                <ellipse cx="356.4" cy="205.3" rx="81.1" ry="81"/>
                                                            </g>
                                                            <ellipse cx="356.4" cy="205.3" rx="44.2" ry="44.2" fill="#3e4347"/>
                                                            <g fill="#fff">
                                                                <ellipse transform="scale(-1) rotate(45 454 -906)" cx="375.3" cy="188.1" rx="12" ry="8.1"/>
                                                                <ellipse cx="155.6" cy="205.3" rx="81.1" ry="81"/>
                                                            </g>
                                                            <ellipse cx="155.6" cy="205.3" rx="44.2" ry="44.2" fill="#3e4347"/>
                                                            <ellipse transform="scale(-1) rotate(45 454 -421.3)" cx="174.5" cy="188" rx="12" ry="8.1" fill="#fff"/>
                                                        </svg>
                                                        <svg class="rating-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <circle cx="256" cy="256" r="256" fill="#ffd93b"/>
                                                            <path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z" fill="#f4c534"/>
                                                            <path d="M232.3 201.3c0 49.2-74.3 94.2-74.3 94.2s-74.4-45-74.4-94.2a38 38 0 0 1 74.4-11.1 38 38 0 0 1 74.3 11.1z" fill="#e24b4b"/>
                                                            <path d="M96.1 173.3a37.7 37.7 0 0 0-12.4 28c0 49.2 74.3 94.2 74.3 94.2C80.2 229.8 95.6 175.2 96 173.3z" fill="#d03f3f"/>
                                                            <path d="M215.2 200c-3.6 3-9.8 1-13.8-4.1-4.2-5.2-4.6-11.5-1.2-14.1 3.6-2.8 9.7-.7 13.9 4.4 4 5.2 4.6 11.4 1.1 13.8z" fill="#fff"/>
                                                            <path d="M428.4 201.3c0 49.2-74.4 94.2-74.4 94.2s-74.3-45-74.3-94.2a38 38 0 0 1 74.4-11.1 38 38 0 0 1 74.3 11.1z" fill="#e24b4b"/>
                                                            <path d="M292.2 173.3a37.7 37.7 0 0 0-12.4 28c0 49.2 74.3 94.2 74.3 94.2-77.8-65.7-62.4-120.3-61.9-122.2z" fill="#d03f3f"/>
                                                            <path d="M411.3 200c-3.6 3-9.8 1-13.8-4.1-4.2-5.2-4.6-11.5-1.2-14.1 3.6-2.8 9.7-.7 13.9 4.4 4 5.2 4.6 11.4 1.1 13.8z" fill="#fff"/>
                                                            <path d="M381.7 374.1c-30.2 35.9-75.3 64.4-125.7 64.4s-95.4-28.5-125.8-64.2a17.6 17.6 0 0 1 16.5-28.7 627.7 627.7 0 0 0 218.7-.1c16.2-2.7 27 16.1 16.3 28.6z" fill="#3e4347"/>
                                                            <path d="M256 438.5c25.7 0 50-7.5 71.7-19.5-9-33.7-40.7-43.3-62.6-31.7-29.7 15.8-62.8-4.7-75.6 34.3 20.3 10.4 42.8 17 66.5 17z" fill="#e24b4b"/>
                                                        </svg>
                                                        <svg class="rating-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <g fill="#ffd93b">
                                                                <circle cx="256" cy="256" r="256"/>
                                                                <path d="M512 256A256 256 0 0 1 56.8 416.7a256 256 0 0 0 360-360c58 47 95.2 118.8 95.2 199.3z"/>
                                                            </g>
                                                            <path d="M512 99.4v165.1c0 11-8.9 19.9-19.7 19.9h-187c-13 0-23.5-10.5-23.5-23.5v-21.3c0-12.9-8.9-24.8-21.6-26.7-16.2-2.5-30 10-30 25.5V261c0 13-10.5 23.5-23.5 23.5h-187A19.7 19.7 0 0 1 0 264.7V99.4c0-10.9 8.8-19.7 19.7-19.7h472.6c10.8 0 19.7 8.7 19.7 19.7z" fill="#e9eff4"/>
                                                            <path d="M204.6 138v88.2a23 23 0 0 1-23 23H58.2a23 23 0 0 1-23-23v-88.3a23 23 0 0 1 23-23h123.4a23 23 0 0 1 23 23z" fill="#45cbea"/>
                                                            <path d="M476.9 138v88.2a23 23 0 0 1-23 23H330.3a23 23 0 0 1-23-23v-88.3a23 23 0 0 1 23-23h123.4a23 23 0 0 1 23 23z" fill="#e84d88"/>
                                                            <g fill="#38c0dc">
                                                                <path d="M95.2 114.9l-60 60v15.2l75.2-75.2zM123.3 114.9L35.1 203v23.2c0 1.8.3 3.7.7 5.4l116.8-116.7h-29.3z"/>
                                                            </g>
                                                            <g fill="#d23f77">
                                                                <path d="M373.3 114.9l-66 66V196l81.3-81.2zM401.5 114.9l-94.1 94v17.3c0 3.5.8 6.8 2.2 9.8l121.1-121.1h-29.2z"/>
                                                            </g>
                                                            <path d="M329.5 395.2c0 44.7-33 81-73.4 81-40.7 0-73.5-36.3-73.5-81s32.8-81 73.5-81c40.5 0 73.4 36.3 73.4 81z" fill="#3e4347"/>
                                                            <path d="M256 476.2a70 70 0 0 0 53.3-25.5 34.6 34.6 0 0 0-58-25 34.4 34.4 0 0 0-47.8 26 69.9 69.9 0 0 0 52.6 24.5z" fill="#e24b4b"/>
                                                            <path d="M290.3 434.8c-1 3.4-5.8 5.2-11 3.9s-8.4-5.1-7.4-8.7c.8-3.3 5.7-5 10.7-3.8 5.1 1.4 8.5 5.3 7.7 8.6z" fill="#fff" opacity=".2"/>
                                                        </svg>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <div class="form-floating theme-form-floating">
                                            <input type="text" class="form-control" id="name" name="title"
                                                   placeholder="Name" value="">
                                            <label for="name" class="right-0">عنوان نظر </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 border border-1 rounded float-start">
                                    <h6>
                                        دیگران را با نوشتن نظرات خود، برای انتخاب این محصول راهنمایی کنید.

                                        لطفا پیش از ارسال نظر، خلاصه قوانین زیر را مطالعه کنید:

                                        لازم است محتوای ارسالی منطبق برعرف و شئونات جامعه و با بیانی رسمی و عاری از لحن تند، تمسخرو توهین باشد.
                                        از ارسال لینک‌ سایت‌های دیگر و ارایه‌ی اطلاعات شخصی نظیر شماره تماس، ایمیل و آی‌دی شبکه‌های اجتماعی پرهیز کنید.
                                        در نظر داشته باشید هدف نهایی از ارائه‌ی نظر درباره‌ی کالا ارائه‌ی اطلاعات مشخص و مفید برای راهنمایی سایر کاربران در فرآیند انتخاب و خرید یک محصول است.
                                        با توجه به ساختار بخش نظرات، از پرسیدن سوال یا درخواست راهنمایی در این بخش خودداری کرده و سوالات خود را در بخش «پرسش و پاسخ» مطرح کنید.
                                        افزودن عکس و ویدیو به نظرات:
                                        با مطالعه‌ی این لینک می‌توانید مفید‌ترین الگوی عکاسی از کالایی که خریداری کرده‌اید را مشاهده کنید.
                                        پیشنهاد می‌شود قوانین کامل ویرایش نظر را در این صفحه مطالعه کنید.
                                    </h6>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating theme-form-floating">
                                                                <textarea class="form-control" name="text"
                                                                          placeholder="Leave a comment here"
                                                                          id="floatingTextarea2"
                                                                          style="height: 150px"></textarea>
                                        <label for="floatingTextarea2" class="right-0">نظر شما</label>
                                    </div>
                                </div>
                                <div class="col-xxl-6  mt-4">
                                    <div class=" border rounded border-1 flex-space-between">
                                        <div class="form-floating theme-form-floating">
                                            <input class="form-control border-0" type="text" id="positiveFramework" placeholder="نکته را وارد کنید" autocomplete="off">
                                            <label for="positiveFramework" class="right-0" >نکات مثبت:</label>
                                        </div>
                                        <button class="btn" type="button" id="positiveBtnAdd"><i class="fa fa-plus"></i></button>
                                    </div>
                                    <div id="ShowPList">

                                    </div>

                                    <select class="form-control" id="positiveList" name="positive[]" hidden="hidden" multiple>

                                    </select>
                                    {{--                        <label for="positiveList">لیست نکات مویرایش:</label>--}}
                                    {{--                        <button class="btn btn-success" type="button" id="positiveBtnRemove">حذف نکته مویرایش</button>--}}
                                </div>
                                <div class="col-xxl-6 mt-4">
                                    <div class=" border rounded border-1 flex-space-between">
                                        <div class="form-floating theme-form-floating">
                                            <input class="form-control border-0" type="text" id="negativeFramework" placeholder="نکته را وارد کنید" autocomplete="off">
                                            <label for="negativeFramework" class="right-0">نکات منفی:</label>
                                        </div>
                                        <button class="btn" type="button" id="negativeBtnAdd"><i class="fa fa-plus"></i></button>
                                    </div>
                                    <div id="ShowNList">

                                    </div>
                                    <select class="form-control" id="negativeList" name="negative[]" hidden="hidden" multiple>

                                    </select>
                                    {{--                            <button type="button" id="negativeBtnRemove">حذف نکته منفی</button>--}}
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-animation btn-md fw-bold"
                                    data-bs-dismiss="modal">ویرایش نظر</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- ویرایش نظر End -->
    </div>
@endsection

@section('js')
    <!-- jquery ui-->
    <script src="/Client/assets/js/jquery-ui.min.js"></script>

    <!-- Slick js-->
    <script src="/Client/assets/js/slick/slick-animation.min.js"></script>
    <script src="/Client/assets/js/bootstrap/bootstrap-notify.min.js"></script>
    <script src="/Client/assets/js/custom-slick-animated.js"></script>

    <!-- Timer Js -->
    <script src="/Client/assets/js/timer1.js"></script>

    <!-- Price Range Js -->
    <script src="/Client/assets/js/ion.rangeSlider.min.js"></script>

    <!-- Zoom Js -->
    <script src="/Client/assets/js/jquery.elevatezoom.js"></script>
    <script src="/Client/assets/js/zoom-filter.js"></script>

    <!-- sidebar open js -->
    <script src="/Client/assets/js/filter-sidebar.js"></script>

    <!-- Quantity js -->
    <script src="/Client/assets/js/quantity-2.js"></script>

    <!-- WOW js -->
    <script src="/Client/assets/js/wow.min.js"></script>
    <script src="/Client/assets/js/custom-wow.js"></script>


    <script src="/Client/assets/js/sticky-cart-bottom.js"></script>

    {{--    Add to Cart js --}}
    <script src="/Client/assets/js/Cart.js"></script>

    <script src="/Client/assets/js/profile.js"></script>
    <script src="/Client/assets/js/comment.js"></script>


@endsection
