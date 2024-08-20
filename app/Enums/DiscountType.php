<?php

namespace App\Enums;

enum DiscountType:String

{
    case COUPON_CODE = "Coupon code";

    case PROMOTION = "Promotion";


    public static function getValues(): array
    {
        return array_column(DiscountType::cases(), 'value');
    }

    public static function getKeyValues():array
    {
        return array_column(DiscountType::cases(), 'value','key');
    }
}