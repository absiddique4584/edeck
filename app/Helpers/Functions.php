<?php

/**
 * @param $text
 * @return string
 */
function slugify($text)
{
    // replace non letter or digits by -
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);

    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    // trim
    $text = trim($text, '-');

    // remove duplicate -
    $text = preg_replace('~-+~', '-', $text);

    // lowercase
    $text = strtolower($text);

    if (empty($text)) {
        return 'n-a';
    }

    return $text;
}




/**
 * @param $type
 * @param $message
 */
function setMessage($type, $message){
   session()->flash('type',$type);
    session()->flash('message',$message);
}




/**
 * @param $status
 * @return string
 */
   function randomColor($status)
   {
      $color = [
           "pending" => "x-danger",
           "success" => "x-success",
           "return"  => "x-warning",
           "shipped" => "x-info",
      ];

    return $color[$status];
   }


   function orderStatus()
   {
       $status = [
           "pending",
           "success",
           "return",
           "shipped",
      ];

    return $status;
   }
