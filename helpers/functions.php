<?php

function formatPriceToDatabase($price)
{
    if($price == ''){
        return $price = null;
    }
    return str_replace(['.',','], ['','.'], $price);
}