<?php

namespace App;

class SimplePriceFormatter implements PriceFormater
{
    public function format($value): string
    {
        return $value . ' руб';
    }

}
