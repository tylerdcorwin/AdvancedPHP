(function() {
    
    /* Recommend Style: https://github.com/johnpapa/angular-styleguide */
    'use strict';
    /*
     * Lets create a new feature module and add it to the main module
     */
    angular.module('app.address', []);
    
    angular.module('app').requires.push('app.address');

})();