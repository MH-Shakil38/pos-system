<?php

    function CurrencyFormate($value){
        return moneyIcon().number_format($value,2);
    }



    if(!function_exists('moneyIcon')){
        function moneyIcon(){

            return '৳ ';
        }
    }


if(!function_exists('addIconSVG')){
    function addIconSVG()
    {

        return "https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/plus1.svg";
    }
}
