(function() {
    //use strict makes sure that you are using proper javascript syntax
    'use strict';
    angular
            .module('app')
            .controller('PhoneDetailController', PhoneDetailController);
    //makes connection to the app in order to inject the correct elements into the page
    PhoneDetailController.$inject = ['$routeParams', 'PhonesService'];
    
    function PhoneDetailController($routeParams, PhonesService){
        var vm = this;
        
        vm.phone = {};
        var id = $routeParams.phoneId;
        
        activate();
        
        function activate() {
            PhonesService.findPhone(id).then(function(response) {
                vm.phone = response;
            });
        }
    }
    
})();