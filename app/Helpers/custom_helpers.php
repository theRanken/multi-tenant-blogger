<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Request;


if(!function_exists('get_protocol')){
   /**
    * Returns the current protocol
    * @param  bool $withSlashes
    * @return string
    */ 
    function get_protocol(bool $withSlashes = true) : string
    {
        $slashes = ($withSlashes) ? '://' : '';
        $protocol = Request::isSecure() ? 'https':'http';
        return $protocol . $slashes; 
    }
}