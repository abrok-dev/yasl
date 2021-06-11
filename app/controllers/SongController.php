<?php

namespace Controllers;

use Models\DataFromAPI;
use View\BasicView;
use Psr\Http\Message\ResponseInterface as Response;

class SongController extends AbstractDataMusicController
{
    public function __construct()
    {
        $this->view = new BasicView();
        $this->content = new DataFromAPI();
    }

    public function song($request , Response $response , array $args)
    {

        $json = $this->content->Lyrics($request , $response , $args['id_artist'] , $args['id_album'] , $args['id_track']);
        $lyrics = json_decode($json , true);
        

        $response->getBody()->write( $this->view->twig->render('song.twig' , $lyrics));//сделать view
        
    }
}
