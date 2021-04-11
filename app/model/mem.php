<?php
namespace Models;

use Predis\Profile\RedisVersion300;

//use Illuminate\Support\Facades\Redis;

class Memory
{
    //search_$query 
    //artist_$id
    //artist_$id_album_$id
    //artist_$id_album_$id_song_$id

    public  $redisClient;
    public function __construct()
    {
        

    }

}