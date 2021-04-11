<?php

namespace Controllers;
use Services\DataFromAPI;
use View\BasicView;
use Psr\Http\Message\ResponseInterface as Response;
use Services\Deliver;

class ArtistController
{
    public BasicView $view;
    public Deliver $deliver;
    public function __construct()
    {
        $this->view = new BasicView();
        $this->content = new DataFromAPI();
    }

    public function imageArtistData($request , Response $response , array $args)
    {
        
        $json = $this->content->AlbumsfromArtist($request , $response , $args['id_artist']);
        $albumInfo = json_decode($json , true);
        $response->getBody()->write( $this->view->twig->render('artist.twig' , $albumInfo));
        return $response;
        
    }

}
