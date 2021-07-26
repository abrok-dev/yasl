<?php

namespace Controllers;

use Models\DataFromAPI;
use View\BasicView;
use Psr\Http\Message\ResponseInterface as Response;

class SongOfArtistController extends AbstractDataMusicController
{
    public function __construct()
    {
        $this->view = new BasicView();
        $this->content = new DataFromAPI();
    }

    public function allSongs($request , Response $response , array $args)
    {
        
       $result =  $this->content->SongsOfArtist($args['id_artist']);
        
        $response->getBody()->write($result);
        return $response;
       
    }
}
