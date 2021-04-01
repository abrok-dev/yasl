<?php

namespace Controllers;

use GuzzleHttp\Psr7\Request as Request;
use View\BasicView;
require __DIR__.'/../../vendor/autoload.php';
use Services\Deliver;
use Psr\Http\Message\ResponseInterface as Response;


class TestController 
{   
    public Deliver $deliver;
    public BasicView $view;
    public $token ='GzhLmjzZ8R7jI66SN4iO52YN3DH8tmZaac9U5PthAA-r9EmIfQgDYagNUgJrhae0';

    public function __construct()
    {
        $this->view = new BasicView();
       $this->deliver = new Deliver();
    }

   
    public function searchData( $request , Response $response , $query='dragonforce',$page=20)
    {
        $data = $this->deliver->searchData();
         $response->getBody()->write($data);
       // $response->getBody()->write("da");
            return $response;
    }

}