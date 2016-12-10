var app = angular.module('routeAppControllers',[]);
app.controller('indexCtrl',['$scope','$location','$http','$rootScope','$window','$mdSidenav','$route','$interval','serviceConnection','serviceSerie',function ($scope,$location,$http,$rootScope,$window,$mdSidenav,$route,$interval,serviceConnection, serviceSerie) {

    serviceConnection.getConnectionStatus()
        .success(function (data) {
            $scope.connected = data == 1 ? true : false;
        });

    $scope.connect = false;
    $scope.toConnect = function () {
        $location.path('/connexion');
    };

    $scope.registrate = false;
    $scope.toRegistrate = function () {
        $location.path('/registration');
    };

    $scope.home = false;
    $scope.toHome = function () {
        $location.path('/home');
    };

    $scope.toTrack = function () {
        $location.path('/myTracking');
    };

    $scope.goToProfil = function () {
        $location.path('/myProfil');
    };

    $http({
        method: 'GET',
        url : 'home/popularSeries'
    })
    .success(function(data, status, headers, config) {
        $scope.popularSeries = data;
    });

    //
    $scope.inputSearchChange = function () {
        if($scope.inputSearch != "") {
            $http({
                method: 'GET',
                url: 'serieSearch/' + $scope.inputSearch
            })
            .success(function (data, status, headers, config) {
                $scope.serieSearch = data;
            });
        }
    };

    $scope.disconnect = function () {
        $http({
            method: 'GET',
            url : 'disconnect'
        })
        .success(function (data, status, headers, config) {
            localStorage.removeItem('connected');
            location.reload();
            $location.path('/home');
        });
    };

    $scope.displayASerie = function (serieId) {
        serviceSerie.loadSeriePage(serieId);
    };
}]);