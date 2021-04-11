<?php

namespace Controllers;

use Services\DataFromAPI;
use GuzzleHttp\Psr7\Request as Request;
use View\BasicView;
//require __DIR__.'/../../vendor/autoload.php';
use Services\Deliver;
use Psr\Http\Message\ResponseInterface as Response;


class SearchController 
{   
    public DataFromAPI $content;
    public BasicView $view;
    public $token ='0311e1JOzsqu0kZvFp2jnUoo8qWUmSCaqEvqN8PWblFFFF35o5ua2qxO';

    public function __construct()
    {
        $this->view = new BasicView();
        $this->content = new DataFromAPI();
      
    }

   
    public function searchData( $request , Response $response )
    {   
      //http://127.0.0.1/search?q=dragon&limit=10&type=artist
        $params = $request->getQueryParams();
        $json = $this->content->searchArtist($params['q'] , $params['limit']  , $params['type']);

        $data = json_decode( $json , true);
       $response->getBody()->write( $this->view->twig->render('search_artist.twig' , $data));

       //$response->getBody()->write(gettype($data));
       return $response;
    }

}