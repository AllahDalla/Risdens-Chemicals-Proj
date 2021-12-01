<?php

$test = "--my==@#$% is &^%$#--- Al-Romario Davis--";

function validate($variable, $sanitize=FILTER_SANITIZE_STRIPPED){
    
    // echo filter_var($variable, $sanitize);
   if($sanitize == FILTER_SANITIZE_STRIPPED){
       echo filter_var($variable, $sanitize, FILTER_FLAG_STRIP_HIGH);
       return filter_var($variable, $sanitize, FILTER_FLAG_STRIP_HIGH);
   }

   if($sanitize == FILTER_VALIDATE_EMAIL){
       if(filter_var($variable, $sanitize)){
           return filter_var($variable, FILTER_SANITIZE_EMAIL);
       }else{
           return "Input was not a valid email";
       }
   }

   if($sanitize == FILTER_SANITIZE_SPECIAL_CHARS){
    //    echo filter_var($variable, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_ENCODE_HIGH);
        return filter_var($variable, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_ENCODE_HIGH);
   }
}


validate($test);

?>