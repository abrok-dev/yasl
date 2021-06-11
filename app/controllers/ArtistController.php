<?php

namespace Controllers;
use Models\DataFromAPI;
use View\BasicView;
use Psr\Http\Message\ResponseInterface as Response;


class ArtistController extends AbstractDataMusicController
{
    
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
