var config = {
    apiUrl: 'http://localhost/slim/api/public/index.php/api/',
    debug: true
}

var mainApp = angular.module('mainApp', ['ngRoute']);

mainApp.config(['$routeProvider', function($routeProvider) {
        $routeProvider.
                when("/", {templateUrl: "pages/home.html", controller: "homeController"}).
                when("/test/", {templateUrl: "pages/about.html", controller: "testController"}).
                otherwise({redirectTo: '/'});
    }]);











