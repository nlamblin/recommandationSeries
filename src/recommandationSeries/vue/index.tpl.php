<?php

?>

<!DOCTYPE html>
<html lang="fr" ng-app="MyApp" xmlns="http://www.w3.org/1999/html">
<head>

    <!-- CSS -->
    <link rel="stylesheet" href="web/css/angular-material.min.css">
    <link rel="stylesheet" href="web/css/style.css">

    <!-- Angular Material requires Angular.js Libraries -->
    <script src="web/js/angular/angular.js"></script>
    <script src="web/js/angular/angular-route.js"></script>
    <script src="web/js/angular/angular-animate.min.js"></script>
    <script src="web/js/angular/angular-aria.min.js"></script>
    <script src="web/js/angular/angular-messages.min.js"></script>
    <script src="web/js/angular/angular-sanitize.js"></script>

    <!-- Angular Material Library -->
    <script src="web/js/angular/angular-material.min.js"></script>

    <!-- Custom Script -->
    <script src="web/js/app.js"></script>

    <!-- Controllers -->
    <script src="web/js/controller/indexCtrl.js"></script>
    <script src="web/js/controller/connexionCtrl.js"></script>
    <script src="web/js/controller/registrationCtrl.js"></script>
    <script src="web/js/controller/homeCtrl.js"></script>
    <script src="web/js/controller/seriesCtrl.js"></script>
    <script src="web/js/controller/trackCtrl.js"></script>
    <script src="web/js/controller/profilCtrl.js"></script>

    <!-- Services -->
    <script src="web/js/service/serviceSerie.js"></script>
    <script src="web/js/service/serviceConnection.js"></script>
</head>
<body ng-controller="indexCtrl">
<div class="index">
    <div>
        <md-content>
            <md-toolbar>
                <div class="md-toolbar-tools">
                    <md-button aria-label="Accueil" ng-click="toHome()">
                        Home
                    </md-button>
                    <md-button ng-show="connected" aria-label="My tracking" ng-click="toTrack()">
                        My tracking
                    </md-button>
                    <md-input-container>
                        <form name="formSearch">
                            <label>Find a serie</label>
                            <input type="text" ng-model="inputSearch" ng-change="inputSearchChange()"/>
                        </form>
                        <md-content>
                            <md-list flex>
                                <md-list-item class="md-3-line" ng-repeat="serie in serieSearch" ng-click="null">
                                    <div class="md-list-item-text" layout="column">
                                        <span>{{ serie.name }}</span>
                                    </div>
                                </md-list-item>
                            </md-list>
                        </md-content>
                    </md-input-container>
                    <span flex></span>
                    <div ng-show="!connected">
                        <md-button class="md-raised" aria-label="Sign in" ng-click="toConnect()">
                            Sign in
                        </md-button>
                        <md-button class="md-raised" aria-label="Sign up" ng-click="toRegistrate()">
                            Sign up
                        </md-button>
                    </div>
                    <div ng-show="connected">
                        <md-button class="md-raised" aria-label="Profil" ng-click="goToProfil()">
                            Profil
                        </md-button>
                        <md-button class="md-raised" aria-label="Sign out" ng-click="disconnect()">
                            Sign out
                        </md-button>
                    </div>
                </div>
            </md-toolbar>
        </md-content>
    </div>
    <div class="sidenav" layout="row" flex>
        <md-sidenav layout="column" md-component-id="right" md-is-locked-open="true" class="md-sidenav-right" md-whiteframe="2">
            <div class="menu">
                <h3>Series most popular</h3>
                <md-whiteframe ng-repeat="popularSerie in popularSeries" flex-sm="45" flex-gt-sm="35" flex-gt-md="25" layout layout-align="center center">
                    <span ng-click="displayASerie(popularSerie.id)">
                        <img src="https://image.tmdb.org/t/p/w300{{ popularSerie.poster_path }}"> <br />
                        {{ popularSerie.name }}
                    </span>
                </md-whiteframe>
            </div>
        </md-sidenav>
    </div>
</div>
    <div class="view" ng-view>
    </div>
</body>
</html>