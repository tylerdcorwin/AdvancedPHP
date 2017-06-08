(function() {

    'use strict';
    angular
        .module('app.address')
        .factory('AddressService', AddressService);

    AddressService.$inject = ['$http', 'REQUEST'];

    /*
     * We will do as much logic here as we can.
     */
    function AddressService($http, REQUEST) {

        var url = REQUEST.Address;

        var service = {
            'getAllAddresses' : getAllAddresses,
            'getAddress' : getAddress,
            'postAddress' : postAddress,
            'deleteAddress' : deleteAddress,
            'putAddress' : putAddress

        };
        return service;

        ////////////

        /*
         * With the http call it returns a promise.  The promise will either get data from the server, or an error.
         * 
         * The frist then function will be for our sucess call, which then we want to return the correct data for the view page.
         * 
         * the second paramter for then is for the error.  We just return back an empty data set, and optionally can also display an error
         * or handle the error in another way.
         * 
         * So we return the promise, which in turn when the promise is complete will return a response for us to use.
         */
         function getAllAddresses() {
             return $http.get(url)
                        .then(handleSuccess, handleFailed);                    

                function handleSuccess (response) { 
                    return response.data.data;
                }

                function handleFailed(error) {
                    return [];
                }            
            }
         function getAddress(address_id) {
                var _url = url + '/' + address_id;

                return $http.get(_url)
                        .then(handleSuccess, handleFailed); 

                function handleSuccess (response) { 
                    return response.data.data;
                }

                function handleFailed(error) {
                    return {};
                }  
            }
         function postAddress(fullname, email, addressline1, city, state, zip, birthday) {
                var model = {};
                model.fullname = fullname;
                model.email = email;
                model.addressline1 = addressline1;
                model.city = city;
                model.state = state;
                model.zip = zip;
                model.birthday = birthday;
                return $http.post(url, model);
            }
            function deleteAddress(address_id) {
                var _url = url + address_id;
                return $http.delete(_url);
            }
            function putAddress(address_id, fullname, email, addressline1, city, state, zip, birthday ) {  
                var _url = url + '/' + address_id;
                var model = {};
                model.fullname = fullname;
                model.email = email;
                model.addressline1 = addressline1;
                model.city = city;
                model.state = state;
                model.zip = zip;
                model.birthday = birthday;
                return $http.put(_url, model);
            }
    }

})();