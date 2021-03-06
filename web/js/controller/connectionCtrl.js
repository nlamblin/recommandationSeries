var app = angular.module('routeAppControllers');
app.controller('connectionCtrl',['$scope','$location','$http','$rootScope','$window','$mdSidenav','$route','$interval','serviceConnection',function ($scope,$location,$http,$rootScope,$window,$mdSidenav,$route,$interval,serviceConnection) {

    $scope.connection = {
        email : "",
        password : ""
    };

    serviceConnection.getConnectionStatus()
        .success(function (data) {
            $scope.connected = data == 1 ? true : false;
            if($scope.connected){
                $location.path('/home');
            }
        });

    // function to connect a user
    $scope.toConnect = function() {
        // ajax with datas send in server
        $http({
            method: 'POST',
            data: {
                password: $scope.connection.password,
                email : $scope.connection.email
            },
            url: 'connection'
        })
        .success(function (data, status, headers, config) {
            if(data != 1) {
                $scope.connectionError = "Invalid email / password";
            }
            else {
                location.reload();
            }
        });
    };

    $scope.redirectSignUp = function() {
        $location.path('/registration');
    }

}]);