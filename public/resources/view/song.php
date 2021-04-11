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
                    <a class="nav-link active" id="tab_var1" data-toggle="tab" href="#">Основная </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="tab_var2" data-toggle="tab" href="#">Вариант 2 </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="tab_var3" data-toggle="tab" href="#">Вариант 3 </a>
                </li>
            </ul>
            <div class="tab_content">
                <!-- <img src="img/pen.svg" href="#" class="edit visible "></img> -->
                <p class="text_song"></p>
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
    <script>
        var textList = new Map([
            ['tab_var1', "sometext1"],
            ['tab_var2', "sometext2"],
            ['tab_var3', "sometext3"]
        ]);
        var tab1 = document.querySelector("#tab_var1");
        var tab2 = document.querySelector("#tab_var2");
        var tab3 = document.querySelector("#tab_var3");

        function clickTabHandler(event) {

            tab1.classList.remove("active");
            tab2.classList.remove("active");
            tab3.classList.remove("active");
            console.log(textList.get(event.target.id.toString()));
            event.target.classList.add("active");
            document.querySelector(".text_song").innerHTML = textList.get(event.target.id.toString());

        }
        tab1.addEventListener('click', clickTabHandler);
        tab2.addEventListener('click', clickTabHandler);
        tab3.addEventListener('click', clickTabHandler);

        document.addEventListener('DOMContentLoaded', (event) => {
            document.querySelector(".text_song").innerHTML = textList.get('tab_var1');
            // console.log(json.tab_var1);
        });
    </script>
</body>

</html>