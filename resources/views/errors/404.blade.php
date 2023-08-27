<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/Client/assets/css/errorPages.css" type="text/css" />

</head>
<body>

<div class="error-page">
    <div>
        <!--h1(data-h1='400') 400-->
        <!--p(data-p='BAD REQUEST') BAD REQUEST-->
        <!--h1(data-h1='401') 401-->
        <!--p(data-p='UNAUTHORIZED') UNAUTHORIZED-->
        <!--h1(data-h1='403') 403-->
        <!--p(data-p='FORBIDDEN') FORBIDDEN-->
        <h1 data-h1="404">404</h1>
        <p data-p="صفحه مورد نظر یافت نشد ">صفحه مورد نظر یافت نشد </p>

        <!--h1(data-h1='500') 500-->
        <!--p(data-p='SERVER ERROR') SERVER ERROR-->
    </div>

</div>

<div id="particles-js"></div>
<a class="back" href="{{route('home')}}">
    <div id="container">
        <button class="learn-more">
                <span class="circle" aria-hidden="true">
                  <span class="icon arrow"></span>
                </span>
            <span class="button-text">صفحه اصلی</span>
        </button>
    </div>
</a>
<script src="/Client/assets/js/errorPages.js"></script>
</body>
</html>
