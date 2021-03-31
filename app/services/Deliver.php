<?php

namespace Services;

use GuzzleHttp\Client as Client;

class Deliver
{
    protected $token = "GzhLmjzZ8R7jI66SN4iO52YN3DH8tmZaac9U5PthAA-r9EmIfQgDYagNUgJrhae0";
    protected $header;
    protected Client $client;

    public function __construct()
    {
        $this->header = [
            'Authorization'  => 'Bearer ' . $this->token,
            'Content-Type' => 'application/json'
        ];
        $this->client = new Client([
            'headers' => $this->header
        ]);
    }

    public function searchData(  $query = 'dragonforce', $page = 20)
    {
        $data = $this->client->request('GET', 'https://api.genius.com/search?&q=' . $query . '&per_page=' . $page);
        // $json =  json_decode($data->getBody());
      
        return $data->getBody()->getContents();
    }

    public function getAlbumsfromArtist($request, $response, $artist_id)
    {
        $data = $this->client->request('GET', "https://api.genius.com/artists/$artist_id/albums");
        $response->getBody()->write($data->getBody()->getContents());
        return $response;
    }

    public function getSongsfromAlbum($request, $response, $album_id)
    {
        $data = $this->client->request('GET', "https://api.genius.com/albums/$album_id/tracks");
        $response->getBody()->write($data->getBody()->getContents());
        return $response;
    }

    public function getSongsfromArtist($request, $response, $artist_id, $per_page = 20, $page = 1)
    {
        $data = $this->client->request('GET', "https://api.genius.com/artists/$artist_id/songs");
        $response->getBody()->write($data->getBody()->getContents());
        return $response;
    }
    //(api.genius.com/search/lyrics?q=YOUR_QUERY_HERE)
    public function getLyrics(  $query = "Cry Thunder")
    {
        $data = $this->client->request('GET', "https://api.genius.com/search/lyrics?q=$query");
        return $data->getBody()->getContents();
        
    }
}
