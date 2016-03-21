var app = angular.module('app', ['ngRoute']);
app.config(function ($routeProvider) {
    $routeProvider
        .when('/form', {
            templateUrl: 'view/form.html'
        })
        .when('/list', {
            templateUrl: 'view/list.html'
        })
        .when('/edit/:id', {
            templateUrl: 'view/edit.html'
        })
})