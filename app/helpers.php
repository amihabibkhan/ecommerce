<?php

use App\Option;

// slug maker
function slug_maker($text){
    // creating slug
    $remove_question = str_replace('?', ' ', $text);
    $remove_slash = str_replace('/', ' ', $remove_question);
    $remove_dot = str_replace('.', ' ', $remove_slash);
    $remove_brackets = str_replace('(', ' ', $remove_dot);
    $remove_brackets_2 = str_replace(')', ' ', $remove_brackets);
    $slug = preg_replace('/\s+/u', '-', trim($remove_brackets_2));
    return $slug;
}

// date maker
function date_maker($date, $format){
    return date_format(date_create($date), $format);
}

//rating calculator

function rating_calculator($star, $ratings){
    if ($star == 0 || $ratings == 0){
        return 0;
    }
    $result = $star / $ratings;
    $rounded_result = round($result, 2);
    $whole = floor($rounded_result);
    $fraction = $rounded_result - $whole;
    if ($fraction > .50){
        $fraction = 1;
    }elseif ($fraction > .0){
        $fraction = .5;
    }
    return $whole + $fraction;
}

// social share helpers
function fb_share($link){
    return "https://www.facebook.com/sharer/sharer.php?{$link};src=sdkpreparse";
}
function twitter_share($link){
    return "https://twitter.com/share?ref_src={$link}";
}
function share_to_mail($subject, $link){
    return "mailto:?subject={$subject}&body={$link}";
}

function get_option($name){
    return Option::where('name', $name)->first()->value;
}


if(!function_exists('exists_in_cart')){
    function exists_in_cart($product_id){
        $cart = Gloudemans\Shoppingcart\Facades\Cart::content();
        $cart = (array) $cart;
        foreach ($cart as $item) {
            foreach ($item as $val){
                if($val->id === $product_id){
                    return true;
                }
            }
        }
        return false;
    }
}

function shortText($string,$length = 50){
    $string = strip_tags($string);
    if (strlen($string) > $length) {

        // truncate string
        $stringCut = substr($string, 0, $length);
        $endPoint = strrpos($stringCut, ' ');

        //if the string doesn't contain any space then it will cut without word basis.
        $string = $endPoint? substr($stringCut, 0, $endPoint)."..." : substr($stringCut, 0)."...";
    }
    return $string;
}


if (! function_exists('img')) {

    function img($image_name = '',$empty_img_type = 'product') {

        if ($image_name == '') {
            return empty_img($empty_img_type);
        }

        if (file_exists(public_path().'/storage/'.$image_name)) {
            return asset('/storage/'.$image_name);
        }

        return empty_img($empty_img_type);

    }
}


if (! function_exists('empty_img')) {

    function empty_img($empty_img_type) {

        if ($empty_img_type == 'product'){
            return asset('./images/thumbnail.png');
        }elseif($empty_img_type == 'slider'){
            return asset('./images/thumbnail.png');
        }

    }
}

if(! function_exists('notification_url')){
    function notification_url($url){
        return url($url);
    }
}
