<?php



if (! function_exists('side_menu_active')){
     function side_menu_active($isroute,$setclass) {
         if (is_array($isroute)){
              return in_array(request()->path(),$isroute) ? $setclass : '';
         }
        return strstr(request()->path(),$isroute) ? $setclass : '';
     }
}




if (! function_exists('order_status')){
    function order_status($status){

            if($status =='unpaid'){
            return ['در انتظار پرداخت','bg-theme-17 text-theme-11'];
        }
        else if ($status =='paid'){
            return ['پرداخت شده','bg-theme-14 text-theme-10'];
        }
        else if ($status =='preparation'){
            return ['در حال آماده سازی','bg-theme-7 text-theme-2'];
        }
        else if ($status =='posted'){
            return ['ارسال شده','bg-theme-18 text-theme-32'];
        }
        else if ($status =='received'){
            return ['دریافت شده','bg-theme-33 text-theme-2'];
        }
        else if ($status =='canceled'){
            return ['لغو شده','bg-theme-31 text-theme-6'];
        }
    }

}



if (! function_exists('gallery_flag')){
    function gallery_flag($flag){


        //'brands','categories','users','products','sliders','countries'
        if($flag =='Brands'){
            return 'برندها';
        }
        else if ($flag =='Categories'){
            return 'دسته بندی ها';
        }
        else if ($flag =='Users'){
            return 'کاربران';
        }
        else if ($flag =='Products'){
            return 'محصولات';
        }
        else if ($flag =='Sliders'){
            return 'اسلایدرها';
        }
        else if ($flag =='Countries'){
            return 'کشورها';
        }
        else if ($flag =='Uncategorized'){
            return 'بدون دسته بندی';
        }
        else
            return '';
    }

}

if (! function_exists('faNumber')){
    function faNumber($number){

        $number = str_replace("1","۱",$number);
        $number = str_replace("2","۲",$number);
        $number = str_replace("3","۳",$number);
        $number = str_replace("4","۴",$number);
        $number = str_replace("5","۵",$number);
        $number = str_replace("6","۶",$number);
        $number = str_replace("7","۷",$number);
        $number = str_replace("8","۸",$number);
        $number = str_replace("9","۹",$number);
        $number = str_replace("0","۰",$number);
        return $number;
    }

}

if (! function_exists('side_menu_profile_active')){
    function side_menu_profile_active($segment) {
        if (url()->current() == 'http://user.localhost:8000'.$segment){
            return 'active';
        }
        return '';
    }
}

// profile order status

if (! function_exists('profile_order_status')){
    function profile_order_status($status) {
        if($status =='unpaid'){
            return ['پرداخت نشده','','سفارش شما همچنان در انتظار پرداخت است '];
        }
        else if ($status =='paid'){
            return ['پرداخت شده','success-bg','سفارش شما در وضعیت پرداخت شده قرار دارد و به زودی وارد مرحله آماده سازی میشود'];
        }
        else if ($status =='preparation'){
            return ['در حال آماده سازی','success-bg','سفارش شما در حال آماده سازی است و پس از آن ارسال خواهد شد'];
        }
        else if ($status =='posted'){
            return ['ارسال شده','success-bg','سفارش ما ارسال شده است و به زودی به دست شما خواهد رسید'];
        }
        else if ($status =='received'){
            return ['دریافت شده','success-bg','ممنون از این که سینویا را برای خرید خود انتخاب کردید'];
        }
        else if ($status =='canceled'){
            return ['لغو شده','','سفارش توسط مشتری لغو شده است '];
        }
        return '';
    }
}

if (! function_exists('tracking_order_status')){
    function tracking_order_status($status) {
        if($status =='unpaid'){
            return ['پرداخت نشده','',''];
        }
        else if ($status =='paid'){
            return ['پرداخت شده','success-bg','سفارش شما در وضعیت پرداخت شده قرار دارد و به زودی وارد مرحله آماده سازی میشود'];
        }
        else if ($status =='preparation'){
            return ['در حال آماده سازی','success-bg','سفارش شما در حال آماده سازی است و پس از آن ارسال خواهد شد'];
        }
        else if ($status =='posted'){
            return ['ارسال شده','success-bg','سفارش ما ارسال شده است و به زودی به دست شما خواهد رسید'];
        }
        else if ($status =='received'){
            return ['دریافت شده','success-bg','ممنون از این که سینویا را برای خرید خود انتخاب کردید'];
        }
        else if ($status =='canceled'){
            return ['لغو شده','','سفارش توسط مشتری لغو شده است '];
        }
        return '';
    }
}
if (! function_exists('comment_rating_color')){
    function comment_rating_color($rate) {
        if($rate == 5){
            return ['عالی','comment-rating-excellent'];
        }
        else if ($rate <5 && $rate>=4){
            return ['خیلی خوب','comment-rating-very-good'];
        }
        else if ($rate<4 && $rate>=3){
            return ['خوب','comment-rating-good'];
        }
        else if ($rate<3 && $rate>=2){
            return ['ضعیف','comment-rating-poor'];
        }
        else if ($rate<2){
            return ['خیلی ضعیف','comment-rating-very-poor'];
        }
        return '';
    }
}


