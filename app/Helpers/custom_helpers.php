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

if(!function_exists('get_tenant_sitename')){
    function get_tenant_sitename(){
        $subdomain = Request::get('subdomain');
        $alias = ucwords(null ?? $subdomain);
        return $alias;
    }
}

if(!function_exists('get_tenant_domain_url')){
    function get_tenant_domain_url(){
        $tenant = \App\Models\Tenant::find(auth()->id());

        // Just Get The First Domain
        $subdomain = $tenant->domains()->first()->domain;

        // Generate domain with or without port
        $port = $_SERVER['SERVER_PORT'] ? ':' . $_SERVER['SERVER_PORT'] : '';
        $domain = config('tenancy.central_domains')[1] . $port;

        //Generate The Destination Domain
        $destination_domain = current_protocol() . "$subdomain." . $domain;

        return $destination_domain;
    }
}
