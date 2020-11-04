<?php


// slug maker
function slug_maker($text){
    // creating slug
    $remove_question = str_replace('?', ' ', $text);
    $remove_slash = str_replace('/', ' ', $remove_question);
    $remove_dot = str_replace('.', ' ', $remove_question);
    $slug = preg_replace('/\s+/u', '-', trim($remove_dot));
    return $slug;
}

