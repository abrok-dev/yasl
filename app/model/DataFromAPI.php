<?php

namespace Models;

use Predis\Client as RedisClient;
use Models\Deliver;
use MongoDB\Client as MongoClient;
class DataFromAPI
{

    protected Deliver $deliver;
    protected RedisClient $mem;
    protected MongoClient $connection;
    
    public function __construct()
    {
        $this->mem = new RedisClient();
        $this->deliver = new Deliver();
        $this->connection = new MongoClient();
    }


    public function searchArtist($query = 'dragon', $limit = 10, $type = "artist"):string
    {
        $key = "query:$query"."limit:$limit"."type:$type";
        if ($this->mem->exists($key)) {
            return $this->mem->get($key);
        } 
        $data=$this->deliver->searchData($query, $limit, $type);

        $this->mem->set($key, $data); //86 400 sec /1 day
        $this->mem->expire($key, 4000);
        return  $data;

    }

    public function AlbumsfromArtist($request, $response, $artist_id):string
    {   
        $key = "artist:" . $artist_id;
        if ($this->mem->exists($key)) {
            return $this->mem->get($key);
        } 
        $collection = $this->connection->selectCollection("albums","yasl");
        $data = $collection->findOne(["id_artist"=>"$artist_id"]);
        if ($data == null) {
            $data = $this->deliver->getAlbumsfromArtist( $artist_id);
            $collection->insertOne($data);
        }
            $this->mem->set($key, $data); //86 400 sec /1 day
            $this->mem->expire($key, 86400);
            return $data;
        
    }

    public function SongsfromAlbum($request, $response, $artist_id, $album_id):string
    {   $key = "artist:" . $artist_id . "album:" . $album_id;
        if ($this->mem->exists($key)) {
            return $this->mem->get($key);
        } 
        $collection = $this->connection->selectCollection("songs","yasl");
        $data = $collection->findOne(["id_artist"=>"$artist_id","id_album"=>"$album_id"]);
        if ($data == null) {
            $data = $this->deliver->getSongsFromAlbum( $artist_id, $album_id);
            $collection->insertOne($data);
        }
            $this->mem->set($key, $data); //86 400 sec /1 day
            $this->mem->expire($key, 86400);
            return $data;
       
            
    }

    public function SongsOfArtist( $artist_id)//songsOfArtist
    {

        /*
        "result": {
    "album": text,
    "id_album": integer,
    "id_artist": integer,
    "artist": text,
    "cover": text,
    "label": text,
    "explicit": bolean,
    "api_artist": text,
    "api_albums": text,
    "api_album": text,
    "api_tracks": text,
    "length": integer,
    "tracks": [
      {
        "id_track": integer,
        "track": text,
        "bpm": integer, // Tempo
        "api_track": text,
        "api_lyrics": text      
      }
    ]
  }
        */
        $key = "songs_of_artist:$artist_id";
        if ($this->mem->exists($key)) {
            return $this->mem->get($key);
        } 
        $collection = $this->connection->selectCollection("songsOfArtist","yasl");
        $data = $collection->findOne(["id_artist"=>"$artist_id"]);
        if ($data == null) {
            $albums = $this->AlbumsfromArtist(null ,null,$artist_id);
            $json = json_decode($albums,true);
            $data = [];
            foreach($json['albums'] as $value){

                $temp = $this->SongsfromAlbum(null,null, $artist_id,$value['id_album']);
                $temp = json_decode($temp , true);
                
                array_push($data,$temp['result']);
                
            }
            $collection->insertOne($data);
        }
            $this->mem->set($key, $data);  //86 400 sec /1 day
            $this->mem->expire($key, 4000);
            return $data;

    }

    public function Lyrics($request, $response, $artist_id, $album_id, $track_id):string
    {
        $key = "artist:" . $artist_id . "album:" . $album_id . "song:" . $track_id . "lyrics";
        if ($this->mem->exists($key)) {
            return $this->mem->get($key);
        } 
        $collection = $this->connection->selectCollection("lyrics","yasl");
        $data = $collection->findOne(["id_artist"=>"$artist_id","id_album"=>"$album_id" , "id_track" =>"$track_id"]);
        if ($data == null) {
            $data = $this->deliver->getLyrics( $artist_id, $album_id , $track_id);
            $collection->insertOne($data);
        }
            $this->mem->set($key, $data); //86 400 sec /1 day
            $this->mem->expire($key, 86400);
            return $data;
        
    }
}
