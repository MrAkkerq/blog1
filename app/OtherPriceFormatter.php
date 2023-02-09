<?php

namespace App;

class OtherPriceFormatter implements PriceFormater
{
    public function format($value): string
    {
        return number_format($value, 2, '.', ' ') . ' руб';
    }

}
