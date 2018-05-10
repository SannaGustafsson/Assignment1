<?php 
namespace App;
require('getData.php');
require('logger.php');
if (isset($_GET["id"])) 
{
    $unicorn = getUnicorn($_GET["id"]);

	if (!$unicorn) 
	{
        log("Requested an unknown unicorn");
    } 
	else
	{
        log("Requested info about: " . $unicorn->name);
    }
} 
else 
{
    log("Requested to search for unicorn");
}
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
        <div class="row center-row search-form">
            <form action="unicorn.php" method="get" class="row">
                <input type="text" name="id" placeholder="Enhörnings Id" />
                <input type="submit" value="Sök" />
            </form>
        </div>
        <?php if ($unicorn === false): ?>
            <p class="alert col-sm-12">Enhörningen du sökte har rymt, försök igen</p>
        <?php endif; ?>
        <article class="row center-row">

            <?php if (!is_null($unicorn)): ?>
                <div class="col-md col-xs-12">
                    <h2><?= $unicorn->name ?></h2>
                    <p><?= $unicorn->description ?></p>
                    <p><span class="bold">Sågs:</span> <?= date("Y-m-d", strtotime($unicorn->spottedWhen)) ?> av <?= $unicorn->reportedBy ?></p>
                </div>
                <img src=<?php echo $unicorn->image ?> alt="Bild" class="col-md col-xs-12">
            <?php endif; ?>
        </article>
    </section>
</body>
</html>


