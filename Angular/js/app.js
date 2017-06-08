(function() {
    'use strict';
    angular
            .module('app', ['ngRoute'])
            .config(config);
    
    config.$inject = ['$routeProvider'];
    
    function config($routeProvider){
        $routeProvider.
                //the when instances are used to direct the correct modules to the correct js and html
                //templates, this works like an if()else statement.
            when('/', {
                templateUrl: 'js/phone-list.template.html',
                controller: 'PhoneListController',
                controllerAs: 'vm'
            }).
            when('/phones/:phoneId', {
                templateUrl: 'js/phone-detail.template.html',
                controller: 'PhoneDetailController',
                controllerAs: 'vm'
            }).    
            otherwise({
                redirectTo: '/'
            });
    }
})();