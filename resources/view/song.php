<?php

?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/song.css">
    <link rel="stylesheet" type="text/css" href="style/bootstrap.min.css">
    <title>Document</title>
</head>

<body>

    <div class="main-container">
        <div class="block-song">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a @click=" changePane(1)" :class="  tab_original  " id="tab_original" data-toggle="tab" href="#">Основная </a>
                </li>
                <li class="nav-item">
                    <a @click=" changePane(2) " :class="  tab_var2  " id="tab_var2" data-toggle="tab" href="#">Вариант 2 </a>
                </li>
                <li class="nav-item">
                    <a @click=" changePane(3)" :class="  tab_var3  " id="tab_var3" data-toggle="tab" href="#">Вариант 3 </a>
                </li>

            </ul>
            <div class="tab_content">
                <img src="img/pen.svg" href="#" class="edit visible "></img>
                <h3> {{ song_text[0] }} </h3>
            </div>
        </div>
        <div class="block-search">
            <div class="card text-white bg-primary">
                <div class="card-header">Другие песни</div>
                <div class="card-body songs-artist">
                    <input type="text" placeholder="Введите название песни..." class="form-control input ">

                    <a href="#" class="sub-text ">я ломал стекло</a><br>
                    <a href="#" class="sub-text">нужно больше денех</a>
                </div>
            </div>
        </div>
    </div>
    <div class="down-container">
     

    </div>
    <script src="https://unpkg.com/vue@next"> </script>
    <script src="js/song.js"></script>
</body>

</html>