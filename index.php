<html>
    <head>
        <link rel="stylesheet" type="text/css" href="styles/main.min.css?<?php echo time(); ?>"/>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.all.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.all.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>

        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css"/>
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/default.min.css"/>
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/semantic.min.css"/>
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/bootstrap.min.css"/>

        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

        <script src="js/ckeditor/ckeditor.js"></script>

        <meta charset="utf-8">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" 
              integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" 
              crossorigin="anonymous">

        <link rel="shortcut icon" type="image/png" href=""/>
    </head>
</html>
<?php
session_start();
include("config.php");
require("includes/connect.inc.php");
require("includes/functions.inc.php");

if($_SESSION['logged'] == true) { // Ha a felhasználó be van lépve
    include("pages/mainpage.php");
} else { // Ha a felhasználó nincs belépve
    include("pages/login.php");
}
?>
