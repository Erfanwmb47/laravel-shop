<?php

namespace App\Http\Controllers\Admin\Discount;

use App\Http\Controllers\Admin\AdminController;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Discount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiscountController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        dd(\auth()->user()->discounts()->count());
        return view('Admin.Discounts.Index',[
           'discounts' =>$this->PaginatePagez(Discount::query(),$request,['name','code'],['']),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Discounts.Create',[
            'categories' => Category::all(),
            'brands' => Brand::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $discount = Discount::query()->create([
           'name' => $request->get('name'),
           'code' => $request->get('code'),
           'percent' => $request->get('percent'),
           'price' => $request->get('price'),
           'maxUse' => $request->get('maxUse'),
           'maxUserUsage' => $request->get('maxUserUsage'),
           'maxCost' => $request->get('maxCost') ,
           'expired_at' => $request->get('expired_at'),
        ]);
//        $discount->users()->attach($request->users);
//        $discount->products()->attach($request->products);
        $discount->categories()->attach($request->categories);
        $discount->brands()->attach($request->brands);
        toast('کد تخفیف با موفقیت افزوده شد','success');
        return redirect()->route('discounts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function show(Discount $discount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function edit(Discount $discount)
    {
        return view('Admin.Discounts.Edit',
            [
                'discount' => $discount,
//                'categories' => Category::all(),
//                'brands' => Brand::all()
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Discount $discount)
    {
//        dd($request->get('expired_at'));
        $discount->update([
                'name' => $request->get('name'),
                'code' => $request->get('code'),
                'percent' => $request->get('percent'),
                'price' => $request->get('price'),
                'maxUse' => $request->get('maxUse'),
                'maxUserUsage' => $request->get('maxUserUsage'),
                'maxCost' => $request->get('maxCost') ,
                'expired_at' => $request->get('expired_at'),
        ]);
        toast('کد تخفیف با موفقیت ویرایش شد','success');
        return redirect()->route('discounts.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discount $discount)
    {
        $discount->delete();
        toast('کد تخفیف مورد نظر با موفقیت حذف شد','success');
        return back();
    }

    public function deleteUserDiscount(Request $request)
    {
       $discount= Discount::query()->find($request->discountId);
        $discount->users()->detach($request->userId);
        return response()->json(['status' => 'success']);
    }

    public function deleteProductDiscount(Request $request)
    {
        $discount= Discount::query()->find($request->discountId);
        $discount->products()->detach($request->productId);
        return response()->json(['status' => 'success']);
    }
    public function deleteCategoryDiscount(Request $request)
    {
        $discount= Discount::query()->find($request->discountId);
        $discount->categories()->detach($request->categoryId);
        return response()->json(['status' => 'success']);
    }

    public function deleteBrandDiscount(Request $request)
    {
        $discount= Discount::query()->find($request->discountId);
        $discount->brands()->detach($request->brandId);
        return response()->json(['status' => 'success']);
    }

    public function deleteTransportationDiscount(Request $request)
    {
        $discount= Discount::query()->find($request->discountId);
        $discount->transportations()->detach($request->transportationId);
        return response()->json(['status' => 'success']);
    }
}
