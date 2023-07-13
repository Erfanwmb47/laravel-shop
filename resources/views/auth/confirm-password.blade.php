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
<html lang="en">
<!-- BEGIN: Head -->
<head>
    <meta charset="utf-8">
    <link href="/Admin/images/logo.svg" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Midone admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>تایید پسورد</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="/Admin/css/app.css" />
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->
<body class="login">
<div class="container sm:px-10">
    <div class="block xl:grid grid-cols-2 gap-4">
        <!-- BEGIN: Login Info -->
        <div class="hidden xl:flex flex-col min-h-screen">
            <a href="" class="-intro-x flex items-center pt-5">
                <img alt="Midone Tailwind HTML /Admin Template" class="w-6" src="/Admin/images/logo.svg">
                <span class="text-white  rtl text-lg ml-3"> sample<span class="font-medium">1</span> </span>
            </a>
            <div class="my-auto">
                <img alt="Midone Tailwind HTML Admin Template" class="-intro-x w-1/2 -mt-16" src="/Admin/images/illustration.svg">
                <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10 ">
                    لطفا برای امنیت بیشتر
                    <br>
                    رمز عبور خود را دوباره وارد کنید
                </div>
                <div class="-intro-x mt-5 text-lg text-white">احراز هویت شما در این مرحله الزامی است</div>
            </div>
        </div>
        <!-- END: Login Info -->
        <!-- BEGIN: Login Form -->
        <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
            <div class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-right rtl">
                    تایید پسورد
                </h2>
                <div class="intro-x mt-2 text-gray-500 xl:hidden text-center rtl">لطفا برای امنیت بیشتر رمز عبور خود را مجددا وارد کنید . احراز هویت شما در این مرحل ه الزامی است</div>
                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf
                <div class="intro-x mt-8">
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <input type="password"  required autocomplete="current-password" name="password" id ="password" class="intro-x login__input input input--lg border border-gray-300 block rtl" placeholder="رمز عبور">
                </div>
                <div class="intro-x flex text-gray-700 text-xs sm:text-sm mt-4">

                </div>
                <div class="intro-x mt-5 xl:mt-8 text-center xl:text-right rtl">
                    <button class="button button--lg w-full xl:w-32 text-white bg-theme-1 xl:mr-3">تایید</button>
                </div>
                <div class="intro-x mt-10 xl:mt-24 text-gray-700 text-center xl:text-right rtl">
                    دسترسی به این بخش به منظور تایید قوانین سایت است
                    <br>
                    <a class="text-theme-1" href="">قوانین </a> و <a class="text-theme-1" href="">مقررات سایت </a>
                </div>
                </form>
            </div>
        </div>
        <!-- END: Login Form -->
    </div>
</div>
<!-- BEGIN: JS Assets-->
<script src="/Admin/js/app.js"></script>
<!-- END: JS Assets-->
</body>
</html>
