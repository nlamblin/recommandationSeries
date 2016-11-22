<?php

require "vendor/autoload.php";

use \recommandationSeries\control\GuestController;

\conf\DbConf::init();

$app = new \Slim\Slim(
    array(
        'templates.path' => './src/recommandationSeries/vue'
    )
);

$app->get('/',function() use ($app){
    $app->render('index.tpl.php');
});

$app->get('/home/genres', function() {
    $guestContr = new GuestController();
    echo $guestContr->getGenresSeries();
	//echo $guestContr->testGetSeriesEtGenres();
});

$app->get('/home/allSeries', function() {
    $guestContr = new GuestController();
    echo $guestContr->getAllSeries();
});

/*$app->get('/home/informationsSeries', function() {
    $guestContr = new GuestController();
    echo $guestContr->getNamesImagesSeries();
});*/

$app->run();

?>
