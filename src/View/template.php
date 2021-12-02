<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title ?></title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" crossorigin="anonymous">
        <link rel="stylesheet" href="../../public/css/style.css" crossorigin="anonymous">
        <script defer src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    </head>

    <body>
    <?php
        var_dump($_SESSION);
        include 'nav.php';

        if(App\Vendors\Flash::hasFlash()){
            echo App\Vendors\Flash::getFlash();
        }

        echo $content;
    ?>




    </body>
</html>