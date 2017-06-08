(function() {
    'use strict';

    /*
     * This will allow us to have constants that will not change throughout the app.
     * good references for API locations
     */
    angular
        .module('app.corp')
        .constant('REQUEST', {
            'Corp' : '../../week5/Lab5/api/v1/corp'
    //end could be CorpResource
        });
        
})();
