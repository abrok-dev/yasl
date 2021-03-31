<?php

namespace View;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class BasicView {
    protected $dir = __DIR__;
    protected $loader ;
    protected $twig ;

    public function __construct()
    {
        $this->loader =  new FilesystemLoader(__DIR__."/templates");
        $this->twig = new Environment($this->loader);
    }
}