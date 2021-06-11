<?php

namespace Models;

use GuzzleHttp\Client as Client;

class Deliver
{
    protected $token = "0311e1JOzsqu0kZvFp2jnUoo8qWUmSCaqEvqN8PWblFFFF35o5ua2qxO";
    protected $header;
    protected Client $client;

    public function __construct()
    {
        $this->header = [
            'x-happi-key'  => $this->token,
            'Content-Type' => 'application/json'
        ];
        $this->client = new Client([
            'headers' => $this->header
        ]);
    }

    public function searchData(  $query = 'dragon', $limit = 10 , $type = "artist") :string
    {
        $data = $this->client->request('GET', "https://api.happi.dev/v1/music?q=$query&limit=$limit&lyrics=true&type=$type" );
        // $json =  json_decode($data->getBody());
      
        return $data->getBody()->getContents();
    }

    public function getAlbumsfromArtist( $artist_id):string
    {
        $data = $this->client->request('GET', "https://api.happi.dev/v1/music/artists/$artist_id/albums");
        
        return $data->getBody()->getContents();
    }

    public function getSongsfromAlbum( $artist_id , $album_id):string
    {

        $data = $this->client->request('GET', "https://api.happi.dev/v1/music/artists/$artist_id/albums/$album_id/tracks");
        return ($data->getBody()->getContents());
        
    }

    //(api.genius.com/search/lyrics?q=YOUR_QUERY_HERE)
    public function getLyrics( $artist_id , $album_id , $track_id):string
    {
        $data = $this->client->request('GET', "https://api.happi.dev/v1/music/artists/$artist_id/albums/$album_id/tracks/$track_id/lyrics");
        return $data->getBody()->getContents();
        
    }
}
