var App = angular.module('app', ['ui.router']);
App.config(function($stateProvider, $urlRouterProvider) {
    $stateProvider
        .state('dashboard', {
            url: '/dashboard',
            views: {
                nav: {
                    templateUrl: 'navs/nav.html'
                },
                content: {
                    templateUrl: 'dashboard.html'
                }
            }
        })
        .state('about', {
            url: '/about',
            views: {
                nav: {
                    templateUrl: 'navs/nav.html'
                },
                content: {
                    templateUrl: 'about.html'
                }
            }
        }).state('landingpage', {
        url: '/landingpage',
        views: {
            content: {
                templateUrl: 'landingpage.html'
            }
        }
    });
    $urlRouterProvider.otherwise('/dashboard');
});

App.controller('stateController', ['$scope', function($scope) {
    $scope.dashboard = function () {
        $state.go('about');
    };
}]);


