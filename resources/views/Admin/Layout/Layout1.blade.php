<!DOCTYPE html>
<!--
Shared By Mellatweb
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="fa">
<!-- BEGIN: Head -->
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="/Admin/images/logo.svg" rel="shortcut icon">
    <meta name="csrf-token" content="{{csrf_token()}}">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Midone admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    {!! SEO::generate() !!}
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="/Admin/css/app.css" type="text/css"/>
    <link rel="stylesheet" href="/Admin/css/clock.css" type="text/css"/>
    <link rel="stylesheet" href="/Admin/css/ExtraStyles.css" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">

@yield('css')

    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->
<body class="app" onLoad="initClock()">
<!-- BEGIN: Mobile Menu -->
<div class="mobile-menu md:hidden">
    <div class="mobile-menu-bar">
        <a href="" class="flex mr-auto">
            <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="../../public/Admin/images/logo.svg">
        </a>
        <a href="javascript:;" id="mobile-menu-toggler"> <i data-feather="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
    </div>
    <ul class="border-t border-theme-24 py-5 hidden">
        <li>
            <a href="index.html" class="menu menu--active">
                <div class="menu__icon"> <i data-feather="home"></i> </div>
                <div class="menu__title"> Dashboard </div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="menu">
                <div class="menu__icon"> <i data-feather="box"></i> </div>
                <div class="menu__title"> دسته بندی محصولات <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="index.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Side Menu </div>
                    </a>
                </li>
                <li>
                    <a href="simple-menu-dashboard.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Simple Menu </div>
                    </a>
                </li>
                <li>
                    <a href="top-menu-dashboard.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Top Menu </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="side-menu-inbox.html" class="menu">
                <div class="menu__icon"> <i data-feather="inbox"></i> </div>
                <div class="menu__title"> Inbox </div>
            </a>
        </li>
        <li>
            <a href="side-menu-file-manager.html" class="menu">
                <div class="menu__icon"> <i data-feather="hard-drive"></i> </div>
                <div class="menu__title"> File Manager </div>
            </a>
        </li>
        <li>
            <a href="side-menu-point-of-sale.html" class="menu">
                <div class="menu__icon"> <i data-feather="credit-card"></i> </div>
                <div class="menu__title"> Point of Sale </div>
            </a>
        </li>

        <li>
            <a href="side-menu-post.html" class="menu">
                <div class="menu__icon"> <i data-feather="file-text"></i> </div>
                <div class="menu__title"> Post </div>
            </a>
        </li>
        <li class="menu__devider my-6"></li>
        <li>
            <a href="javascript:;" class="menu">
                <div class="menu__icon"> <i data-feather="edit"></i> </div>
                <div class="menu__title"> Crud <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="side-menu-crud-data-list.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Data List </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-crud-form.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Form </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="menu">
                <div class="menu__icon"> <i data-feather="users"></i> </div>
                <div class="menu__title"> Users <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="side-menu-users-layout-1.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Layout 1 </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-users-layout-2.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Layout 2 </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-users-layout-3.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Layout 3 </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="menu">
                <div class="menu__icon"> <i data-feather="trello"></i> </div>
                <div class="menu__title"> Profile <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="side-menu-profile-overview-1.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Overview 1 </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-profile-overview-2.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Overview 2 </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-profile-overview-3.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Overview 3 </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="menu">
                <div class="menu__icon"> <i data-feather="layout"></i> </div>
                <div class="menu__title"> Pages <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Wizards <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="side-menu-wizard-layout-1.html" class="menu">
                                <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                <div class="menu__title">Layout 1</div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-wizard-layout-2.html" class="menu">
                                <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                <div class="menu__title">Layout 2</div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-wizard-layout-3.html" class="menu">
                                <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                <div class="menu__title">Layout 3</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Blog <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="side-menu-blog-layout-1.html" class="menu">
                                <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                <div class="menu__title">Layout 1</div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-blog-layout-2.html" class="menu">
                                <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                <div class="menu__title">Layout 2</div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-blog-layout-3.html" class="menu">
                                <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                <div class="menu__title">Layout 3</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Pricing <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="side-menu-pricing-layout-1.html" class="menu">
                                <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                <div class="menu__title">Layout 1</div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-pricing-layout-2.html" class="menu">
                                <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                <div class="menu__title">Layout 2</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Invoice <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="side-menu-invoice-layout-1.html" class="menu">
                                <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                <div class="menu__title">Layout 1</div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-invoice-layout-2.html" class="menu">
                                <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                <div class="menu__title">Layout 2</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> FAQ <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="side-menu-faq-layout-1.html" class="menu">
                                <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                <div class="menu__title">Layout 1</div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-faq-layout-2.html" class="menu">
                                <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                <div class="menu__title">Layout 2</div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-faq-layout-3.html" class="menu">
                                <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                <div class="menu__title">Layout 3</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="login-login.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Login </div>
                    </a>
                </li>
                <li>
                    <a href="login-register.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Register </div>
                    </a>
                </li>
                <li>
                    <a href="main-error-page.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Error Page </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-update-profile.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Update profile </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-change-password.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Change Password </div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu__devider my-6"></li>
        <li>
            <a href="javascript:;" class="menu">
                <div class="menu__icon"> <i data-feather="inbox"></i> </div>
                <div class="menu__title"> Components <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Grid <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="side-menu-regular-table.html" class="menu">
                                <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                <div class="menu__title">Regular Table</div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-datatable.html" class="menu">
                                <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                <div class="menu__title">Datatable</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="side-menu-accordion.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Accordion </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-button.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Button </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-modal.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Modal </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-alert.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Alert </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-progress-bar.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Progress Bar </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-tooltip.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Tooltip </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-dropdown.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Dropdown </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-toast.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Toast </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-typography.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Typography </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-icon.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Icon </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-loading-icon.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Loading Icon </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="menu">
                <div class="menu__icon"> <i data-feather="sidebar"></i> </div>
                <div class="menu__title"> Forms <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="side-menu-regular-form.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Regular Form </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-datepicker.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Datepicker </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-select2.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Select2 </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-file-upload.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> File Upload </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-wysiwyg-editor.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Wysiwyg Editor </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-validation.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Validation </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="menu">
                <div class="menu__icon"> <i data-feather="hard-drive"></i> </div>
                <div class="menu__title"> Widgets <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="side-menu-chart.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Chart </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-slider.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Slider </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-image-zoom.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Image Zoom </div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>
<!-- END: Mobile Menu -->
<div class="flex">
    <!-- BEGIN: Side Menu -->
    <nav class="side-nav">
        <a href="{{route('home')}}" class="intro-x flex items-center pl-5 pt-4">
            <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="/Admin/images/logo.svg">
            <span class="hidden xl:block text-white text-lg ml-3"> {{$site_name->English_name}} </span>
        </a>
        <div class="side-nav__devider my-6"></div>
        <ul>
            <li>
                <a href="/dashboard" class="side-menu {{request()->is('dashboard') ? 'side-menu--active' : ''}}">
                    <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                    <div class="side-menu__title"> صفحه اصلی </div>
                </a>
            </li>
            @can('show-categories')
            <li>
                <a href="javascript:;" class="side-menu {{side_menu_active('categories','side-menu--active')}}">
                    <div class="side-menu__icon"> <i data-feather="box"></i> </div>
                    <div class="side-menu__title"> دسته بندی  <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                </a>
                <ul class="{{side_menu_active('categories','side-menu__sub-open')}}">
                    <li>
                            <a href="{{route('categories.index')}}" class="side-menu mr-0 ml-auto foc w-full"  style="color: #c7d2ff;">
                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="side-menu__title"> دسته بندی ها </div>
                            </a>
                    </li>
                    @can('create-category')
                    <li>
                        <a href="{{route('categories.create')}}" class="side-menu ">
                            <div class="side-menu__icon"> <i data-feather="edit-2"></i> </div>
                            <div class="side-menu__title"> ایجاد دسته بندی </div>
                        </a>
                    </li>
                    @endcan


                </ul>
            </li>
            @endcan
            @can('show-brands')
            <li>
                <a href="javascript:;" class="side-menu {{side_menu_active('dashboard/brands','side-menu--active')}} ">
                    <div class="side-menu__icon"> <i data-feather="award"></i> </div>
                    <div class="side-menu__title"> برند  <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                </a>
                <ul class="{{side_menu_active('dashboard/brands','side-menu__sub-open')}}">
                    <li>
                        <form action="{{route('brands.index')}}" method="post">
                            @csrf
                            <button type="submit " class="side-menu mr-0 ml-auto foc " style="color: #c7d2ff">
                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="side-menu__title"> برند ها </div>
                            </button>
                        </form>
                    </li>
                    @can('create-brand')
                    <li>
                        <a href="{{route('brands.create')}}" class="side-menu">
                            <div class="side-menu__icon"> <i data-feather="edit-2"></i> </div>
                            <div class="side-menu__title"> ایجاد برند </div>
                        </a>
                    </li>
                    @endcan

                </ul>
            </li>
            @endcan
            @can('show-products')
            <li>
                <a href="javascript:;" class="side-menu {{side_menu_active(['dashboard/products','dashboard/comments'],'side-menu--active')}}">
                    <div class="side-menu__icon"> <i data-feather="shopping-cart"></i> </div>
                    <div class="side-menu__title"> محصول  <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                </a>
                <ul class="{{side_menu_active(['dashboard/products','dashboard/comments'],'side-menu__sub-open')}}">
                    <li>
                        <form action="{{route('products.index')}}" method="post">
                            @csrf
                            <button type="submit " class="side-menu mr-0 ml-auto foc" style="color: #c7d2ff">
                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="side-menu__title"> محصولات </div>
                            </button>
                        </form>
                    </li>
                    @can('create-product')
                    <li>
                        <a href="{{route('products.create')}}" class="side-menu">
                            <div class="side-menu__icon"> <i data-feather="edit-2"></i> </div>
                            <div class="side-menu__title"> ایجاد محصول </div>
                        </a>
                    </li>
                    @endcan
                    @can('show-comments')
                        <li>
                            <form action="{{route('comments.index')}}" method="post">
                                @csrf
                                <button type="submit " class="side-menu mr-0 ml-auto foc" style="color: #c7d2ff">
                                    <div class="side-menu__icon"> <i data-feather="message-circle"></i> </div>
                                    <div class="side-menu__title"> نظرات </div>
                                </button>
                            </form>
                        </li>
                    @endcan
                </ul>
            </li>
            @endcan

            @can('show-discounts')
                <li>
                    <a href="javascript:;" class="side-menu {{side_menu_active('dashboard/discounts','side-menu--active')}}">
                        <div class="side-menu__icon"> <i data-feather="percent"></i> </div>
                        <div class="side-menu__title"> تخفیف  <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                    </a>
                    <ul class="{{side_menu_active('dashboard/discounts','side-menu__sub-open')}}">
                        <li>
                            <form action="{{route('discounts.index')}}" method="post">
                                @csrf
                                <button type="submit " class="side-menu mr-0 ml-auto foc" style="color: #c7d2ff">
                                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="side-menu__title"> تخفیف ها </div>
                                </button>
                            </form>
                        </li>
                        @can('create-discount')
                            <li>
                                <a href="{{route('discounts.create')}}" class="side-menu">
                                    <div class="side-menu__icon"> <i data-feather="edit-2"></i> </div>
                                    <div class="side-menu__title"> ایجاد تخفیف </div>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan

            @canany(['show-transportations','show-orders','show-paymentGateways'])
                <li>
                    <a href="javascript:;" class="side-menu {{side_menu_active(['dashboard/transportations','dashboard/paymentgateways','dashboard/orders'],'side-menu--active')}}">
                        <div class="side-menu__icon"> <i data-feather="clipboard"></i> </div>
                        <div class="side-menu__title"> سفارشات  <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                    </a>
                    <ul class="{{side_menu_active(['dashboard/transportations','dashboard/paymentgateways','dashboard/orders'],'side-menu__sub-open')}}">
                        <li>
                            <form action="{{route('orders.index')}}" method="post">
                                @csrf
                                <button type="submit " class="side-menu mr-0 ml-auto foc" style="color: #c7d2ff">
                                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="side-menu__title"> جدول سفارشات </div>
                                </button>
                            </form>
                        </li>
                        <li>
                            <form action="{{route('transportations.index')}}" method="post">
                                @csrf
                                <button type="submit " class="side-menu mr-0 ml-auto foc" style="color: #c7d2ff">
                                    <div class="side-menu__icon"> <i data-feather="truck"></i> </div>
                                    <div class="side-menu__title"> حمل و نقل </div>
                                </button>
                            </form>
                        </li>
                        <li>
                            <form action="{{route('paymentgateways.index')}}" method="post">
                                @csrf
                                <button type="submit " class="side-menu mr-0 ml-auto foc" style="color: #c7d2ff">
                                    <div class="side-menu__icon"> <i data-feather="dollar-sign"></i> </div>
                                    <div class="side-menu__title"> درگاه پرداخت </div>
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            @endcan

            @canany(['show-paymentHistories'])
                <li>
                    <a href="javascript:;" class="side-menu {{side_menu_active(['dashboard/financial/payment/history','dashboard/financial/payment/history/success','dashboard/financial/payment/history/failed'],'side-menu--active')}}">
                        <div class="side-menu__icon"> <i data-feather="dollar-sign"></i> </div>
                        <div class="side-menu__title"> بخش مالی  <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                    </a>
                    <ul class="{{side_menu_active(['dashboard/financial/payment/history','dashboard/financial/payment/history/success','dashboard/financial/payment/history/failed'],'side-menu__sub-open')}}">
                        <li>
                            <form action="{{route('financial.paymentsHistory.index')}}" method="post">
                                @csrf
                                <button type="submit " class="side-menu mr-0 ml-auto foc" style="color: #c7d2ff">
                                    <div class="side-menu__icon"> <i data-feather="book-open"></i> </div>
                                    <div class="side-menu__title"> گزارش های پرداخت </div>
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            @endcan


        @canany(['show-categories','show-brands','show-products'])
                <li class="side-nav__devider my-6"></li>
            @endcanany
            @can('show-users')
                <li>
                    <a href="javascript:;" class="side-menu {{side_menu_active('dashboard/users','side-menu--active')}}">
                        <div class="side-menu__icon"> <i data-feather="users"></i> </div>
                        <div class="side-menu__title"> کاربران  <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                    </a>
                    <ul class="{{side_menu_active('dashboard/users','side-menu__sub-open')}}">
                        <li>
                            <form action="{{route('users.index')}}" method="post">
                                @csrf
                                <button type="submit " class="side-menu mr-0 ml-auto foc" style="color: #c7d2ff">
                                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="side-menu__title"> کاربرها </div>
                                </button>
                            </form>
                        </li>
                        @can('create-users')
                            <li>
                                <a href="{{route('users.create')}}" class="side-menu">
                                    <div class="side-menu__icon"> <i data-feather="edit"></i> </div>
                                    <div class="side-menu__title"> ایجاد کاربر </div>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @canany(['show-permissions','show-roles'])
            <li>
                <a href="javascript:;" class="side-menu {{side_menu_active(['dashboard/permissions','dashboard/roles'],'side-menu--active')}}  ">
                    <div class="side-menu__icon"> <i data-feather="alert-octagon"></i> </div>
                    <div class="side-menu__title"> دسترسی ها  <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                </a>
                <ul class="{{side_menu_active(['dashboard/permissions','dashboard/roles'],'side-menu__sub-open')}}">
                    @can('show-permissions')
                    <li>
                        <form action="{{route('permissions.index')}}" method="post">
                            @csrf
                            <button type="submit " class="side-menu mr-0 ml-auto foc " style="color: #c7d2ff">
                                <div class="side-menu__icon"> <i data-feather="lock"></i> </div>
                                <div class="side-menu__title"> همه دسترسی ها  </div>
                            </button>
                        </form>
                    </li>
                    @endcan
                    @can('show-roles')
                    <li>
                        <form action="{{route('roles.index')}}" method="post">
                            @csrf
                            <button type="submit " class="side-menu mr-0 ml-auto foc " style="color: #c7d2ff">
                                <div class="side-menu__icon"> <i data-feather="lock"></i> </div>
                                <div class="side-menu__title"> همه مقام ها  </div>
                            </button>
                        </form>
                    </li>
                  @endcan
                </ul>
            </li>
            @endcanany
            @canany(['show-permissions','show-roles'])
            <li class="side-nav__devider my-6"></li>
            @endcanany
            @can('show-galleries')
            <li>
                <a href="javascript:;" class="side-menu {{side_menu_active('dashboard/galleries','side-menu--active')}}">
                    <div class="side-menu__icon"> <i data-feather="film"></i> </div>
                    <div class="side-menu__title"> رسانه ها  <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                </a>
                <ul class="{{side_menu_active('dashboard/galleries','side-menu__sub-open')}}">
                    <li>
                        <form action="{{route('galleries.index')}}" method="post">
                            @csrf
                            <button type="submit " class="side-menu mr-0 ml-auto foc" style="color: #c7d2ff">
                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="side-menu__title"> رسانه ها </div>
                            </button>
                        </form>
                    </li>
                </ul>
            </li>
                @can('show-fileManager')
                <li>
                    <a href="javascript:;" class="side-menu {{request()->is('pp') ? 'side-menu--active' : ''}} " type="button" id="button-image">
                        <div class="side-menu__icon"> <i data-feather="hard-drive"></i> </div>
                        <div class="side-menu__title">File Manager </div>
                    </a>
                </li>
                @endcan
            @endcan
            @can('show-sliders')
                <li>
                    <a href="{{route('sliders.index')}}" class="side-menu {{side_menu_active('dashboard/sliders','side-menu--active')}} " type="button" id="button-image">
                        <div class="side-menu__icon"> <i data-feather="hard-drive"></i> </div>
                        <div class="side-menu__title">اسلایدر ها  </div>
                    </a>
                </li>
            @endcan
            @can('show-galleries')
            <li class="side-nav__devider my-6"></li>
            @endcan
            @can('show-reports')
                <li>
                    <a href="javascript:;" class="side-menu {{side_menu_active('dashboard/reports','side-menu--active')}}">
                        <div class="side-menu__icon"> <i data-feather="users"></i> </div>
                        <div class="side-menu__title"> گزارشات  <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                    </a>
                    <ul class="{{side_menu_active('dashboard/reports','side-menu__sub-open')}}">
                        <li>
                        <li>
                            <a href="{{route('reports.users')}}" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="users"></i> </div>
                                <div class="side-menu__title"> گزارش کاربران </div>
                            </a>
                        </li>
                        </li>
                            <li>
                                <a href="" class="side-menu">
                                    <div class="side-menu__icon"> <i data-feather="edit"></i> </div>
                                    <div class="side-menu__title"> گزارش محصولات </div>
                                </a>
                            </li>
                        <li>
                            <a href="" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="edit"></i> </div>
                                <div class="side-menu__title"> گزارش سفارشات </div>
                            </a>
                        </li>
                    </ul>
                </li>
            @endcan
            @can('show-setting')
                <li>
                    <a href="{{route('admin.setting.index')}}" class="side-menu {{side_menu_active('dashboard/setting','side-menu--active')}} " type="button" id="button-image">
                        <div class="side-menu__icon"> <i data-feather="settings"></i> </div>
                        <div class="side-menu__title">تنظیمات </div>
                    </a>
                </li>
            @endcan
        </ul>
    </nav>
    <!-- END: Side Menu -->
    <!-- BEGIN: Content -->
    <div class="content">
        <!-- BEGIN: Top Bar -->

        <div class="top-bar ">
            <!-- BEGIN: Notifications -->
            <div class="intro-x dropdown relative sm:mr-6">
                <div class="dropdown-toggle notification notification--bullet cursor-pointer"> <i data-feather="bell" class="notification__icon"></i> </div>
                <div class="notification-content dropdown-box mt-8 absolute top-0 left-0 sm:right-auto sm:right-0 z-20 -ml-10 sm:ml-0">
                    <div class="notification-content__box dropdown-box__content box">
                        <div class="notification-content__title">Notifications</div>
                        <div class="cursor-pointer relative flex items-center ">
                            <div class="w-12 h-12 flex-none image-fit mr-1">
                                <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/Admin/images/profile-13.jpg">
                                <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                            </div>
                            <div class="ml-2 overflow-hidden">
                                <div class="flex items-center">
                                    <a href="javascript:;" class="font-medium truncate mr-5">Angelina Jolie</a>
                                    <div class="text-xs text-gray-500 ml-auto whitespace-no-wrap">05:09 AM</div>
                                </div>
                                <div class="w-full truncate text-gray-600">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 20</div>
                            </div>
                        </div>
                        <div class="cursor-pointer relative flex items-center mt-5">
                            <div class="w-12 h-12 flex-none image-fit mr-1">
                                <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/Admin/images/profile-2.jpg">
                                <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                            </div>
                            <div class="ml-2 overflow-hidden">
                                <div class="flex items-center">
                                    <a href="javascript:;" class="font-medium truncate mr-5">Johnny Depp</a>
                                    <div class="text-xs text-gray-500 ml-auto whitespace-no-wrap">05:09 AM</div>
                                </div>
                                <div class="w-full truncate text-gray-600">It is a long established fact that a reader will be /Adminracted by the readable content of a page when looking at its layout. The point of using Lorem </div>
                            </div>
                        </div>
                        <div class="cursor-pointer relative flex items-center mt-5">
                            <div class="w-12 h-12 flex-none image-fit mr-1">
                                <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/Admin/images/profile-14.jpg">
                                <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                            </div>
                            <div class="ml-2 overflow-hidden">
                                <div class="flex items-center">
                                    <a href="javascript:;" class="font-medium truncate mr-5">Russell Crowe</a>
                                    <div class="text-xs text-gray-500 ml-auto whitespace-no-wrap">01:10 PM</div>
                                </div>
                                <div class="w-full truncate text-gray-600">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 20</div>
                            </div>
                        </div>
                        <div class="cursor-pointer relative flex items-center mt-5">
                            <div class="w-12 h-12 flex-none image-fit mr-1">
                                <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/Admin/images/profile-6.jpg">
                                <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                            </div>
                            <div class="ml-2 overflow-hidden">
                                <div class="flex items-center">
                                    <a href="javascript:;" class="font-medium truncate mr-5">Al Pacino</a>
                                    <div class="text-xs text-gray-500 ml-auto whitespace-no-wrap">05:09 AM</div>
                                </div>
                                <div class="w-full truncate text-gray-600">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomi</div>
                            </div>
                        </div>
                        <div class="cursor-pointer relative flex items-center mt-5">
                            <div class="w-12 h-12 flex-none image-fit mr-1">
                                <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/Admin/images/profile-5.jpg">
                                <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                            </div>
                            <div class="ml-2 overflow-hidden">
                                <div class="flex items-center">
                                    <a href="javascript:;" class="font-medium truncate mr-5">Edward Norton</a>
                                    <div class="text-xs text-gray-500 ml-auto whitespace-no-wrap">01:10 PM</div>
                                </div>
                                <div class="w-full truncate text-gray-600">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Notifications -->
            <!-- BEGIN: Account Menu -->
            @if(auth()->user())
            <div class="intro-x dropdown w-8 h-8 relative">
                <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in">
                    <img alt="Midone Tailwind HTML Admin Template" src="{{str_replace('public','/storage',auth()->user()->gallery->path)}}">
                </div>
                <div class="dropdown-box mt-10 absolute w-56 top-0 left-0 z-20">
                    <div class="dropdown-box__content box bg-theme-38 text-white">
                        <div class="p-4 border-b border-theme-40">
                            <div class="rounded-full" style=" float: right">
                                <img  class="" style="border-radius: 200px; width: 50px; height: auto" src="{{str_replace('public','/storage',auth()->user()->gallery->path)}}">
                            </div>
                            <div class="font-medium text-left">{{auth()->user()->username}}</div>
                            <div class="text-xs text-theme-41 text-left">{{auth()->user()->firstName}} {{auth()->user()->lastName}} </div>
                            <br>
                        </div>
                        <div class="p-2">
                            <form action="{{route('users.edit',\Illuminate\Support\Facades\Auth::user()->id)}}" method="get">
                                @csrf
                                <button  class=" w-full flex-justify-profile items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="user" class="w-4 h-4 mr-2"></i> ویرایش کاربر </button>
                            </form>
                            <a href="{{route('users.create')}}" class="flex-justify-profile items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="edit" class="w-4 h-4 mr-2"></i> حساب کاربری جدید </a>
                            <a href="{{route('profile')}}" class="flex-justify-profile items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="edit" class="w-4 h-4 mr-2"></i> پنل کاربری </a>

                            <form action="{{route('password.request')}}" method="post">
                                @csrf
                            <button type="submit"  class="flex-justify-profile items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md w-full"> <i data-feather="lock" class="w-4 h-4 mr-2"></i> تغییر رمز عبور </button>
                            </form>
                            {{--                            <a href="" class="flex-justify-profile items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="help-circle" class="w-4 h-4 mr-2"></i> پشتیبانی </a>--}}
                        </div>
                        <div class="p-2 border-t border-theme-40">
                            <form action="{{route('logout')}}" method="post">
                                @csrf
                                <button type="submit" href="" class=" w-full flex-justify-profile items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> خروج </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <!-- END: Account Menu -->
            <!-- BEGIN: Search -->
            <div>
                <svg class="toggle-scene" xmlns="http://www.w3.org/2000/svg" preserveaspectratio="xMinYMin" viewBox="0 0 197.451 481.081">
                    <defs>
                        <marker id="e" orient="auto" overflow="visible" refx="0" refy="0">
                            <path class="toggle-scene__cord-end" fill-rule="evenodd" stroke-width=".2666" d="M.98 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                        </marker>
                        <marker id="d" orient="auto" overflow="visible" refx="0" refy="0">
                            <path class="toggle-scene__cord-end" fill-rule="evenodd" stroke-width=".2666" d="M.98 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                        </marker>
                        <marker id="c" orient="auto" overflow="visible" refx="0" refy="0">
                            <path class="toggle-scene__cord-end" fill-rule="evenodd" stroke-width=".2666" d="M.98 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                        </marker>
                        <marker id="b" orient="auto" overflow="visible" refx="0" refy="0">
                            <path class="toggle-scene__cord-end" fill-rule="evenodd" stroke-width=".2666" d="M.98 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                        </marker>
                        <marker id="a" orient="auto" overflow="visible" refx="0" refy="0">
                            <path class="toggle-scene__cord-end" fill-rule="evenodd" stroke-width=".2666" d="M.98 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                        </marker>
                        <clippath id="g" clippathunits="userSpaceOnUse">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4.677" d="M-774.546 827.629s12.917-13.473 29.203-13.412c16.53.062 29.203 13.412 29.203 13.412v53.6s-8.825 16-29.203 16c-21.674 0-29.203-16-29.203-16z"></path>
                        </clippath>
                        <clippath id="f" clippathunits="userSpaceOnUse">
                            <path d="M-868.418 945.051c-4.188 73.011 78.255 53.244 150.216 52.941 82.387-.346 98.921-19.444 98.921-47.058 0-27.615-4.788-42.55-73.823-42.55-69.036 0-171.436-30.937-175.314 36.667z"></path>
                        </clippath>
                    </defs>
                    <g class="toggle-scene__cords">
                        <path class="toggle-scene__cord" marker-end="url(#a)" fill="none" stroke-linecap="square" stroke-width="6" d="M123.228-28.56v150.493" transform="translate(-24.503 256.106)"></path>
                        <path class="toggle-scene__cord" marker-end="url(#a)" fill="none" stroke-linecap="square" stroke-width="6" d="M123.228-28.59s28 8.131 28 19.506-18.667 13.005-28 19.507c-9.333 6.502-28 8.131-28 19.506s28 19.507 28 19.507" transform="translate(-24.503 256.106)"></path>
                        <path class="toggle-scene__cord" marker-end="url(#a)" fill="none" stroke-linecap="square" stroke-width="6" d="M123.228-28.575s-20 16.871-20 28.468c0 11.597 13.333 18.978 20 28.468 6.667 9.489 20 16.87 20 28.467 0 11.597-20 28.468-20 28.468" transform="translate(-24.503 256.106)"></path>
                        <path class="toggle-scene__cord" marker-end="url(#a)" fill="none" stroke-linecap="square" stroke-width="6" d="M123.228-28.569s16 20.623 16 32.782c0 12.16-10.667 21.855-16 32.782-5.333 10.928-16 20.623-16 32.782 0 12.16 16 32.782 16 32.782" transform="translate(-24.503 256.106)"></path>
                        <path class="toggle-scene__cord" marker-end="url(#a)" fill="none" stroke-linecap="square" stroke-width="6" d="M123.228-28.563s-10 24.647-10 37.623c0 12.977 6.667 25.082 10 37.623 3.333 12.541 10 24.647 10 37.623 0 12.977-10 37.623-10 37.623" transform="translate(-24.503 256.106)"></path>
                        <g class="line toggle-scene__dummy-cord">
                            <line marker-end="url(#a)" x1="98.7255" x2="98.7255" y1="240.5405" y2="380.5405"></line>
                        </g>
                        <circle class="toggle-scene__hit-spot" cx="98.7255" cy="380.5405" r="60" fill="transparent"></circle>
                    </g>
                    <g class="toggle-scene__bulb bulb" transform="translate(844.069 -645.213)">
                        <path class="bulb__cap" stroke-linecap="round" stroke-linejoin="round" stroke-width="4.677" d="M-774.546 827.629s12.917-13.473 29.203-13.412c16.53.062 29.203 13.412 29.203 13.412v53.6s-8.825 16-29.203 16c-21.674 0-29.203-16-29.203-16z"></path>
                        <path class="bulb__cap-shine" d="M-778.379 802.873h25.512v118.409h-25.512z" clip-path="url(#g)" transform="matrix(.52452 0 0 .90177 -368.282 82.976)"></path>
                        <path class="bulb__cap" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M-774.546 827.629s12.917-13.473 29.203-13.412c16.53.062 29.203 13.412 29.203 13.412v0s-8.439 10.115-28.817 10.115c-21.673 0-29.59-10.115-29.59-10.115z"></path>
                        <path class="bulb__cap-outline" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4.677" d="M-774.546 827.629s12.917-13.473 29.203-13.412c16.53.062 29.203 13.412 29.203 13.412v53.6s-8.825 16-29.203 16c-21.674 0-29.203-16-29.203-16z"></path>
                        <g class="bulb__filament" fill="none" stroke-linecap="round" stroke-width="5">
                            <path d="M-752.914 823.875l-8.858-33.06"></path>
                            <path d="M-737.772 823.875l8.858-33.06"></path>
                        </g>
                        <path class="bulb__bulb" stroke-linecap="round" stroke-width="5" d="M-783.192 803.855c5.251 8.815 5.295 21.32 13.272 27.774 12.299 8.045 36.46 8.115 49.127 0 7.976-6.454 8.022-18.96 13.273-27.774 3.992-6.7 14.408-19.811 14.408-19.811 8.276-11.539 12.769-24.594 12.769-38.699 0-35.898-29.102-65-65-65-35.899 0-65 29.102-65 65 0 13.667 4.217 26.348 12.405 38.2 0 0 10.754 13.61 14.746 20.31z"></path>
                        <circle class="bulb__flash" cx="-745.343" cy="743.939" r="83.725" fill="none" stroke-dasharray="10,30" stroke-linecap="round" stroke-linejoin="round" stroke-width="10"></circle>
                        <path class="bulb__shine" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="12" d="M-789.19 757.501a45.897 45.897 0 013.915-36.189 45.897 45.897 0 0129.031-21.957"></path>
                    </g>
                </svg>


            </div>
            <div class="intro-x relative mr-3 sm:mr-6" style="margin-left: 5px">

                <div class="search hidden sm:block">
                    <input type="text" class="search__input input placeholder-theme-13" placeholder="...جستجو">
                    <i data-feather="search" class="search__icon"></i>
                </div>
                <a class="notification sm:hidden" href=""> <i data-feather="search" class="notification__icon"></i> </a>
                <div class="search-result">
                    <div class="search-result__content">
                        <div class="search-result__content__title">Pages</div>
                        <div class="mb-5">
                            <a href="" class="flex items-center">
                                <div class="w-8 h-8 bg-theme-18 text-theme-9 flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-feather="inbox"></i> </div>
                                <div class="ml-3">Mail Settings</div>
                            </a>
                            <a href="" class="flex items-center mt-2">
                                <div class="w-8 h-8 bg-theme-17 text-theme-11 flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-feather="users"></i> </div>
                                <div class="ml-3">Users & Permissions</div>
                            </a>
                            <a href="" class="flex items-center mt-2">
                                <div class="w-8 h-8 bg-theme-14 text-theme-10 flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-feather="credit-card"></i> </div>
                                <div class="ml-3">Transactions Report</div>
                            </a>
                        </div>
                        <div class="search-result__content__title">Users</div>
                        <div class="mb-5">
                            <a href="" class="flex items-center mt-2">
                                <div class="w-8 h-8 image-fit">
                                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/Admin/images/profile-13.jpg">
                                </div>
                                <div class="ml-3">Angelina Jolie</div>
                                <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">angelinajolie@left4code.com</div>
                            </a>
                            <a href="" class="flex items-center mt-2">
                                <div class="w-8 h-8 image-fit">
                                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/Admin/images/profile-2.jpg">
                                </div>
                                <div class="ml-3">Johnny Depp</div>
                                <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">johnnydepp@left4code.com</div>
                            </a>
                            <a href="" class="flex items-center mt-2">
                                <div class="w-8 h-8 image-fit">
                                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/Admin/images/profile-14.jpg">
                                </div>
                                <div class="ml-3">Russell Crowe</div>
                                <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">russellcrowe@left4code.com</div>
                            </a>
                            <a href="" class="flex items-center mt-2">
                                <div class="w-8 h-8 image-fit">
                                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/Admin/images/profile-6.jpg">
                                </div>
                                <div class="ml-3">Al Pacino</div>
                                <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">alpacino@left4code.com</div>
                            </a>
                        </div>
                        <div class="search-result__content__title">Products</div>
                        <a href="" class="flex items-center mt-2">
                            <div class="w-8 h-8 image-fit">
                                <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/Admin/images/preview-9.jpg">
                            </div>
                            <div class="ml-3">Samsung Galaxy S20 Ultra</div>
                            <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Smartphone &amp; Tablet</div>
                        </a>
                        <a href="" class="flex items-center mt-2">
                            <div class="w-8 h-8 image-fit">
                                <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/Admin/images/preview-12.jpg">
                            </div>
                            <div class="ml-3">Nike Tanjun</div>
                            <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Sport &amp; Outdoor</div>
                        </a>
                        <a href="" class="flex items-center mt-2">
                            <div class="w-8 h-8 image-fit">
                                <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/Admin/images/preview-10.jpg">
                            </div>
                            <div class="ml-3">Sony Master Series A9G</div>
                            <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Electronic</div>
                        </a>
                        <a href="" class="flex items-center mt-2">
                            <div class="w-8 h-8 image-fit">
                                <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/Admin/images/preview-7.jpg">
                            </div>
                            <div class="ml-3">Samsung Galaxy S20 Ultra</div>
                            <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Smartphone &amp; Tablet</div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- END: Search -->
            <!-- BEGIN: Clock -->
            <div id="timedate flex ">

                <a id="dz" class="hidden">1</a>
                <a id="slash_first" class="hidden">/</a>
                <a id="mon" class="hidden">ماه</a>
                <a id="slash_second" class="hidden">/</a>
                <a id="y" class="hidden">0</a>
                <br/>
                <a id="h" class="hidden">12</a>
                <a id="colon_first" class="hidden">:</a>
                <a id="m" class="hidden">00</a>
                <a id="colon_second" class="hidden">:</a>
                <a id="s" class="hidden">00</a>
            </div>
            <!-- END: Clock -->
            <!-- BEGIN: Breadcrumb -->
            {{$breadcrump}}

            <!-- END: Breadcrumb -->

        </div>
        <x-admin-validation-errors class="mb-4" :errors="$errors" />

        <!-- END: Top Bar -->
        @yield('content')
    </div>

    <!-- END: Content -->
</div>
<!-- BEGIN: JS Assets-->

{{--<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>--}}
{{--<script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>--}}
<script src="/Admin/js/GoogleMapApi.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.0.0/moment.min.js"></script>
<script src="/Admin/js/app.js"></script>
<script src="/Admin/js/clock.js"></script>
<script src="/Admin/js/orders.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {

        document.getElementById('button-image').addEventListener('click', (event) => {
            event.preventDefault();

            window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
        });
    });
    // set file link
    function fmSetLink($url) {
        document.getElementById('image_label').value = $url;
    }
</script>

    @yield('js')
<!-- END: JS Assets-->
</body>
@include('sweetalert::alert')
</html>
