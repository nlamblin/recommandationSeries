var app = angular.module('routeAppControllers');

app.controller('homeCtrl',['$scope','$location','$http','$rootScope','$window','$mdSidenav','$route','$interval',function ($scope,$location,$http,$rootScope,$window,$mdSidenav,$route,$interval) {

    $http({
        method: 'GET',
        url : 'home/genres'
    })
    .success(function(data, status, headers, config) {
        $scope.genresArray = data;

        $http({
            method: 'GET',
            url: 'home/allSeries'
        })
        .success(function(data, status, headers, config) {
            $scope.allSeries = data;
        });
    });

    $scope.displayInfoSerie = function (genre) {
        console.log(genre);
        /*$http({
            method: 'GET',
            data: {
                genre : genre
            },
            url: '/home/infoSeriesByGenre'
        })
        .success(function(data, status, headers, config) {
            $scope.infoSeriesGenres = data;
        });*/
    };

}]);