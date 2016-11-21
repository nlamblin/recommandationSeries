<?php

require "vendor/autoload.php";

conf\DbConf::init();

$app = new \Slim\Slim(
    array(
        'templates.path' => './web/html/'
    )
);

$app->get('/',function() use ($app){
    $app->render('index.tpl.php');
});

$app->get('/v1/home', function() {
    echo 'test ok !';
});

$app->run();

?>