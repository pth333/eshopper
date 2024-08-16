<?php

namespace App\Components;


class CouponRecusive
{
    private $coupon;
    private $html;
    public function __construct($coupon)
    {
        $this->coupon = $coupon;
    }

    public function couponRecusive()
    {
        foreach ($this->coupon as $coupon) {
            if ($coupon['discount_type'] == 'percentage') {
                $this->html .= "<option value='" . $coupon['discount_type'] . "'>" . $coupon['discount_type'] . "</option>";
            }
            if ($coupon['discount_type'] == 'fixed') {
                $this->html .= "<option value='" . $coupon['discount_type'] . "'>" . $coupon['discount_type'] . "</option>";
            }
        }
        return $this->html;
    }
}
