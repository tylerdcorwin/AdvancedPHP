//wrapping the function in () makes it so you dont create globals accidentally
(function() {
    
    'use strict';
    angular
        .module('app.address')
        .config(config);
  
    config.$inject = ['$routeProvider'];

    /*
     * We set out custom feature with a starting page and pages
     * that go from there.  then the URL matches the route, we update
     * that view and process the controller
     */
    function config($routeProvider) {
       $routeProvider.
            when('/address', {
                templateUrl: 'js/address/addresses.template.html',
                controller: 'AddressController',
                controllerAs: 'vm'
            }).
            when('/address/:addressId', {
                templateUrl: 'js/address/address-detail.template.html',
                controller: 'AddressDetailController',
                controllerAs: 'vm'
            }).
            when('/address/delete/:addressId', {
                templateUrl: 'js/address/address-delete.template.html',
                controller: 'AddressDeleteController',
                controllerAs: 'vm'
            });
    }

})();