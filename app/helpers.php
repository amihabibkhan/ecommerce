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

