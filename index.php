<?php

require "vendor/autoload.php";

\conf\DbConf::init();

$app = new \Slim\Slim(
    array(
        'templates.path' => './src/recommandationSeries/vue'
    )
);

session_start();

include("src/recommandationSeries/routes/commonRoutes.php");

if(isset($_SESSION['user_id'])) {
    // routes when user is connected
    // $loggedController

    include ("src/recommandationSeries/routes/loggedRoutes.php");
}
else {
    // routes when user is not connected
    // $guestController

    include ("src/recommandationSeries/routes/guestRoutes.php");
}

$app->run();

?>