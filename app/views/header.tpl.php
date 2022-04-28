<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <!-- Font Bree Serif -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="<?= $absoluteUrl ?>/css/style.css">
    <title>Pokédex</title>
</head>
<body>
    <header>

        <h1>
            <a href="<?= $router->generate('home') ?>">
            Pokédex
            </a>
        </h1>

        <nav>
            <ul>
                <li>
                    <a href="<?= $router->generate('home') ?>">
                        Liste
                    </a>
                </li>
                <li>
                    <a href="<?= $router->generate('types') ?>">
                        Types
                    </a>
                </li>
            </ul>
        </nav>
            

    </header>