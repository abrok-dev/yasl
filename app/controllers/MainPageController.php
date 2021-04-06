<?php
namespace Controllers;

use View\BasicView;
use Psr\Http\Message\ResponseInterface as Response;

class MainPageController
{
    public BasicView $view;

    public function __construct()
    {
        $this->view = new BasicView();
    }

    public function render($request , Response $response)
    {
        $response->getBody()->write( $this->view->twig->render('main-page.html'));
        return $response;
    }
}

