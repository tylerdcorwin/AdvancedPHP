(function() {

    'use strict';
    angular
        .module('app.corp')
        .factory('CorpService', CorpService);

    CorpService.$inject = ['$http', 'REQUEST'];

    /*
     * We will do as much logic here as we can.
     */
    function CorpService($http, REQUEST) {

        var url = REQUEST.Corp;

        var service = {
            'getAllCorps' : getAllCorps,
            'getCorp' : getCorp,
            'postCorp' : postCorp,
            'deleteCorp' : deleteCorp,
            'putcorp' : putCorp

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
         function getAllCorps() {
             return $http.get(url)
                        .then(handleSuccess, handleFailed);                    

                function handleSuccess (response) { 
                    return response.data.data;
                }

                function handleFailed(error) {
                    return [];
                }            
            }
         function getCorp(address_id) {
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
         function postCorp(corp_id, corp, incorp_dt, email, owner, phone, location) {
                var model = {};
                //might be just corp
                model.id = corp_id;
                model.corp = corp;
                model.incorp_dt = incorp_dt;
                model.email = email;
                model.owner = owner;
                model.phone = phone;
                model.location = location;
                return $http.post(url, model);
            }
            function deleteCorp(corp_id) {
                var _url = url + corp_id;
                return $http.delete(_url);
            }
            function putCorp(corp_id, corp, incorp_dt, email, owner, phone, location) {  
                var _url = url + '/' + corp_id;
                var model = {};
                model.id = corp_id;
                model.corp = corp;
                model.incorp_dt = incorp_dt;
                model.email = email;
                model.owner = owner;
                model.phone = phone;
                model.location = location;
                return $http.put(_url, model);
            }
    }

})();