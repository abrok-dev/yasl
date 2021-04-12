<?php

namespace Services;

use Predis\Client;
use Services\Deliver;

class DataFromAPI
{

    public Deliver $deliver;
    public Client $mem;

    public function __construct()
    {
        $this->mem = new Client();
        $this->deliver = new Deliver();
    }


    public function searchArtist($query = 'dragon', $limit = 10, $type = "artist")
    {
        return  $this->deliver->searchData($query, $limit, $type);
    }

    public function AlbumsfromArtist($request, $response, $artist_id)
    {   
        $key = "artist:" . $artist_id;
        if ($this->mem->exists($key)) {
            return $this->mem->get($key);
        } else {
            $data = $this->deliver->getAlbumsFromArtist($request, $response, $artist_id);
            $this->mem->set($key, $data); //86400
            $this->mem->expire($key, 86400);
            return $data;
        }
    }

    public function SongsfromAlbum($request, $response, $artist_id, $album_id)
    {   $key = "artist:" . $artist_id . "album:" . $album_id;
        if ($this->mem->exists($key)) {
            return $this->mem->get($key);
        } else {
            $data = $this->deliver->getSongsFromAlbum($request, $response, $artist_id, $album_id);
            $this->mem->set($key); //86400
            $this->mem->expire($key, 86400);
            return $data;
        }
    }

    public function SongsfromArtist($request, $response, $artist_id)
    {
    }

    public function Lyrics($request, $response, $artist_id, $album_id, $track_id)
    {
        $key = "artist:" . $artist_id . "album:" . $album_id . "song:" . $track_id . "lyrics";
        if ($this->mem->exists($key)) {
            return $this->mem->get($key);
        } else {
            $data = $this->deliver->getLyrics($request, $response, $artist_id, $album_id, $track_id);
            $this->mem->set($key , $data); //86400
            $this->mem->expire($key, 86400);
            return $data;
        }
    }
}
