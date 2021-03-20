<?php

use GuzzleHttp\Client as Client;
use GuzzleHttp\Psr7\Request as Request;

class TestController
{
    public $token ='GzhLmjzZ8R7jI66SN4iO52YN3DH8tmZaac9U5PthAA-r9EmIfQgDYagNUgJrhae0';

    public function searchData($query,$page=20)
    {
        $header = [
            'Authorization'  => 'Bearer ' . $this->token,
            'Content-Type' => 'application/json'
        ];
        $client = new Client([
            'headers' => $header
        ]);
        $data = $client->request('GET' , 'https://api.genius.com/search?&q=' . $query .'&per_page='. $page);
            
        $json =  json_decode($data->getBody());


        return $data->getBody();

}

