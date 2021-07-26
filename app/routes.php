<?php

//use App\Container\Controllers;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Routing\RouteContext;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;



return function (App $app){
    $app->get('/' , \MainPageController::class . ':render');
    $app->get('/search' ,\SearchController::class . ':searchData');
    $app->get('/artist/{id_artist}' , \ArtistController::class . ':imageArtistData');
    $app->get('/artist/{id_artist}/album/{id_album)' , \AlbumController::class . ':album');
    $app->get('/artist/{id_artist}/album/{id_album)/track/{id_track}' , \SongController::class . ':song');
    $app->get('/artist/{id_artist}/tracks' , \SongOfArtistController::class . ':allSongs');

};

