(function(){
    'use strict';
    angular
            .module('app')
            .controller('PhoneListController',PhoneListController);
    //this creates a refernect to the phone-list-controller.js file
    
    PhoneListController.$inject = ['PhonesService'];
    //this is making an ajax call and returning the data in the form of a promise,
    //this then will set the vew model for the variable phones to that data
    //this also allows auto-updating while running the pages
    function PhoneListController(PhonesService) {
        //this references the PhoneListController() function
        var vm = this;
        
        vm.phones = [];
        
        activate();
        
        function activate() {
            PhonesService.getPhones().then(function(response) {
                vm.phones = response;
            });
        }
    }
})();