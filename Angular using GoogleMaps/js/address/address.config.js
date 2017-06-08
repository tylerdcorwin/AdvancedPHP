(function() {
    'use strict';

    /*
     * This will allow us to have constants that will not change throughout the app.
     * good references for API locations
     */
    angular
        .module('app.address')
        .constant('REQUEST', {
            'Address' : '../../week5/demo/api/v1/address'
        });
        
})();
