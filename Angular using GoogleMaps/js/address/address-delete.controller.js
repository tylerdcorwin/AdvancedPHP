(function () {
    
    'use strict';
    angular
        .module('app.address')
        .controller('AddressDeleteController', AddressDeleteController);

    AddressDeleteController.$inject = ['AddressService', $routeParams];
    /*
     * Simple controller to get information for the view.
     */
    function AddressDeleteController(AddressService) {
        var vm = this;

        vm.message = [];
        
        var addressId = $routeParams.addressId;

        activate();

        ////////////

        function activate() {
            AddressService.deleteAddress(addressId).then(function (response) {
                vm.message = 'Address Deleted';
            }, function (error) {
                vm.message = 'Address was NOT deleted';
            });
        }

    }
    
})();