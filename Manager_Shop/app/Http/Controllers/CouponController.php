<?php

namespace App\Http\Controllers;

use App\Components\CouponRecusive;
use App\Models\Coupon;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;


class CouponController extends Controller
{
    use DeleteModelTrait;
    private $coupon;

    public function __construct(Coupon $coupon)
    {
        $this->coupon = $coupon;
    }

    public function index()
    {
        $coupons = $this->coupon->latest()->paginate(5);
        // dd($coupons);

        return view('admin.coupon.index', compact('coupons'));
    }

    public function getTypeCoupon(){
        $type_coupon = $this->coupon->distinct()->get(['discount_type']);
        $coupon_recusive = new CouponRecusive($type_coupon);
        $htmlOption = $coupon_recusive->couponRecusive();
        return $htmlOption;
    }

    public function create()
    {
        $coupon_types = $this->getTypeCoupon();
        return view('admin.coupon.add',compact('coupon_types'));
    }

    public function store(Request $request){
        $this->coupon->create([
            'code' => $request->code,
            'discount_type' => $request->discount_type,
            'discount_amount' => $request->discount_amount,
            'discount_percentage' => $request->discount_percentage,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'description' => $request->description,
        ]);

        // dd($coupon);
        return redirect()->route('coupon.index');
    }
    public function destroy(string $id)
    {
        return $this->deleteModelTrait($id, $this->coupon);
    }
}
