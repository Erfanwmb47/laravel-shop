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

