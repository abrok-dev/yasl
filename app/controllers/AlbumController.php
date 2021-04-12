<?php

namespace Controllers;
use Services\DataFromAPI;
use View\BasicView;
use Psr\Http\Message\ResponseInterface as Response;

class AlbumController
{
    public function __construct()
    {
        $this->view = new BasicView();
        $this->content = new DataFromAPI();
    }

    public function album($request , Response $response , array $args )
    {
        $json = $this->content->AlbumsfromArtist($request , $response , $args['id_artist'] , $args['id_album']);
        $albumSongs = json_decode($json , true);
        $response->getBody()->write( $this->view->twig->render('song.twig' , $albumSongs));//сделать view
        
    }

}