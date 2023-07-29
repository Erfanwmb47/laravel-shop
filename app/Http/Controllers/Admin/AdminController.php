<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Metakey;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class AdminController extends Controller
{

    public function __construct()
    {
        View::share('site_name',json_decode(Metakey::where('key','shop_name')->first()->Setting->object));
        SEOTools::setDescription(json_decode(Metakey::where('key','shop_name')->first()->Setting->object)->Persian_name);

    }

    public function PaginatePagez($object,Request $request,$items,$list)
    {

        //$object= $object::query();
        $object  = $this->SearchItemsInDashboard($object,$request,$items,$list);

        $object = $this->showAdminsList($object,$request);
        //dd($object);
        $this->sortByColumns($object,$request);


        if(!!$request->pagez){
            $request->session()->put([
                'pagez' => $request->pagez,
            ]);
        }

        if (!! $request->session()->get('pagez')){
            $users = $object->paginate($request->session()->get('pagez'));
        }
        else{
            $users = $object->paginate('12');
        }


        $request->session()->reflash('pagez');
        return $users;

    }

    public function localSearch( $object , Request $request,$items,$list= null)
    {
        if($keyword =  request('search')){
           $user= $object->where(function ($query) use ($items,$keyword){
               $query->orwhere(function ($query) use ($items,$keyword){
                   foreach ($items as $item){
                       $query->orwhere($item ,'LIKE',"%{$keyword}%");
                   }
               });
            });
          // dd($user);


            $rel = $list[0];
            array_shift($list);

            foreach ($list as $li){
               // dd();
                $user2=$object->WhereHas($rel , function ($query) use ($keyword,$li){
                    $query->orwhere($li ,'LIKE',"%{$keyword}%");
                });
            }
        }
        //$user2
        //TODO join
        //dd($user->get());
        //dd($user2->get());
       /* $first= $user->get();
        $second=$user2->get();
        $merged = $first->merge($second);
            //dd($second);
        if ($merged->isEmpty()) {
            return  $user;
        }*/
       // return $merged->toQuery();
        return $user;
    }

    public function SearchItemsInDashboard($object,Request $request,$items,$list)
    {
        if (!!request('search')){
            // dd($users);
            return   $this->localSearch($object,$request,$items,$list);
            //  dd($object->paginate('10'));
        }
        else{
            return $object;
        }
    }

    public function showAdminsList($object,Request $request)
    {
        //TODO جابه جایی این تابع
        if (!!request('role')){
//            dd($object);
            return  $object
                ->join('roles', 'roles.id', '=', 'users.role_id')->whereNot('name','user')->select('users.*');

            //  dd($object->paginate('10'));
        }
        else{
            return $object;
        }
    }

    public function sortByColumns($object,Request $request)
    {
        //dd($request->query);
        if($request->query('chevron')=='ascending'){

            return $object->oldest($request->query('order_by'));
        }
        if ($request->query('chevron')=='descending'){

            return $object->latest($request->query('order_by'));
            //dd('نزولی');
        }
        else{

            return $object;
        }
    }
}
