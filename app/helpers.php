<?php
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

