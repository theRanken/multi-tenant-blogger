<?php

use Illuminate\Support\Facades\Request;


if(!function_exists('current_protocol')){
   /**
    * Returns the current protocol
    * @param bool $withSlashes
    * @return string
    */ 
    function current_protocol(bool $withSlashes = true) : string
    {
        $slashes = ($withSlashes) ? '://' : '';
        $protocol = Request::isSecure() ? 'https':'http';
        return $protocol . $slashes; 
    }
}