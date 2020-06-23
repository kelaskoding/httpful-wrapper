<?php

namespace kelaskoding\httpfulwrapper;

class HttpfulWrapper {

    protected $baseUrl;
    protected $token;

    public function __construct($baseUrl, $token = null) {
        $this->baseUrl = $baseUrl;
        $this->token = $token;
    }

    public function post($path, $data){
        $path = "$this->baseUrl$path";
        $response = \Httpful\Request::post($path)                
            ->sendsJson()       
            ->addHeaders(array(
                'Content-Type' => 'application/json',              
                'Authorization' => "BEARER $this->token",              
             ))                
            ->body($data)             
            ->send();  
        return json_decode(json_encode($response->body));
    }

    public function get($path, $data=null) {
        $path = "$this->baseUrl$path";
        $response = \Httpful\Request::get($path)                
            ->sendsJson()       
            ->addHeaders(array(
                'Content-Type' => 'application/json',              
                'Authorization' => "BEARER $this->token",              
             ))                
            ->body($data)             
            ->send();  
        return json_decode(json_encode($response->body));
    }

    public function put($path, $data){
        $path = "$this->baseUrl$path";
        $response = \Httpful\Request::put($path)                
            ->sendsJson()       
            ->addHeaders(array(
                'Content-Type' => 'application/json',              
                'Authorization' => "BEARER $this->token",              
            ))                
            ->body($data)             
            ->send();  
        return json_decode(json_encode($response->body));
    }

}