<?php
namespace Services;

use Predis\Client;
use Services\Deliver;

class DataFromAPI
{


    public Client $mem ;

    public function __construct()
    {
        $this->mem = new Client();
        $this->deliver = new Deliver();
    }


    public function searchArtist(  $query = 'dragon', $limit = 10 , $type = "artist")
    {
      return  $this->deliver->searchData( $query , $limit  , $type);
    }

    public function AlbumsfromArtist($request, $response, $artist_id)
    {
        if($this->mem->exists($artist_id)){
            return $this->mem->get($artist_id);
        }
        else{
           $data= $this->deliver->getAlbumsFromArtist($request, $response, $artist_id);
            $this->mem->set($artist_id , $data );//86400
            $this->mem->expire($artist_id , 86400);
            return $data;
        }
    }

    public function SongsfromAlbum($request, $response, $artist_id , $album_id)
    {
        
    }

    public function SongsfromArtist($request, $response, $artist_id)
    {
        
    }
    
    public function Lyrics( $artist_id , $album_id , $track_id)
    {
        
        
    }
}