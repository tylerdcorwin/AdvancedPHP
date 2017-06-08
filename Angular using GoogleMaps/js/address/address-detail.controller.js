(function () {
    
    'use strict';
    angular
        .module('app.address')
        .controller('AddressDetailController', AddressDetailController);

    AddressDetailController.$inject = ['$routeParams','AddressService'];

    /*
     * This controller will find the details of an address from the address service.
     */
    function AddressDetailController($routeParams, AddressService) {
        var vm = this;

        vm.address = {};
        var addressID = $routeParams.addressId;

        activate();

        ////////////

        function activate() {
            AddressService.getAddress(addressID).then(function (response) {
                vm.address = response;
                if (vm.address.hasOwnProperty('birthday')) {
                    vm.address.birthday = new Date(vm.address.birthday);
                }
                console.log(vm.address);                
                loadMap('41.8239890,-71.4128340');
            });
        }
               
        function loadMap(location) {

            var lat = location.split(',')[0];
            var long = location.split(',')[1];

            var myCenter = new google.maps.LatLng(lat, long);

            var mapProp = {
                center: myCenter,
                zoom: 10,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.querySelector('.googleMap'), mapProp);
            var marker = new google.maps.Marker({
                position: myCenter
            });
            marker.setMap(map);

        }

    }
    
})();