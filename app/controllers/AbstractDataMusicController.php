<?php
 namespace Controllers;
 use View\BasicView;
 use Models\DataFromAPI;
abstract class AbstractDataMusicController
{
    protected BasicView $view;
    protected DataFromAPI $content;

}
