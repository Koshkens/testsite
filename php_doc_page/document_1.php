<!DOCTYPE html>
<html>
  <head>
    <style>
    body {
        height: 842px;
        width: 595px;
        /* to centre page on screen*/
        margin-left: auto;
        margin-right: auto;
        border:solid 1px;
        font-family: sans-serif;
        font-size: small;
        
        font-size: 16px;
    }
    h1{
        text-align:center;
    }
    input{
        outline:none;
        border:none;
        font-family: sans-serif;
        font-size: 16px;
    }
    </style>
  </head>
  <body>
    <h1>Договор</h1>
    <br>
    <br>
    <br>
    <h2>Введение</h2>
    Здраствуйте  <input type="text" onkeydown="this.style.width = ((this.value.length + 1) * 8) + 'px';" value="<?php echo $_POST["name"]?>">  ацу ацуа цду <b>адц</b> уадцо номер: <?php echo $_POST["number"]?> цуда цужа цу ажц уажц уажлц уал цуал цуоал цужл адццу адц 
    ца цу ацдуо ацуа цу
    
  </body>
</html>