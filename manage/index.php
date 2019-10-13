<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        if(isset($_POST["form"])){
            $_SESSION["same"] = $_POST["same"];
            header('location: ./index.php');
        }
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
    echo $_SESSION["same"];
    ?>
    <form id="form" name="form" action="./index.php" method="post">
            <input type="text" name="same">
    </form>
    <input type="button" id="click" value="click">
    
    <script>
        var from = document.getElementById("form");
        var click = document.getElementById("click");

        click.onclick = function(){
            from.submit();
        };

    </script>
</body>
</html>