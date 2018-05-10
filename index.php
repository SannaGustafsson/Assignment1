<?php 
namespace App;
require('getData.php');
require('logger.php');
log("Requested info about all unicorns");
?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

</head>
<body>
    <header>
        <div class="container">
            <h1>Enhörningar</h1>
        </div>
        <nav class="bg-dark" navbar-expand-md navbar>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="navlink menu-links" href="/index.php">Visa alla enhörningar</a>
                </li>
                <li class="nav-item">
                    <a class="navlink menu-links" href="/unicorn.php">Sök enhörning</a>
                </li>
            </ul>
        </nav>
    </header>
    <section class="container">
        <h2>Alla enhörningar</h2>
        <ul class="list-group">
        <?php
            foreach (getAllUnicorns() as $unicorn) {
                echo '<li class="list-group-item"><a href="unicorn.php?id=' . $unicorn->id . '">' . $unicorn->name . '</a></li>';
            }
        ?>
        </ul>
    </section>
</body>
</html>
