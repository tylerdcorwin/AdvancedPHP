/* 
 * We wrap out functions with anonymous functions so nothing becomes
 * global in JavaScript.
 * 
 * We use scrict mode to ensure we are using correct JavaScript standards
 */
(function() {
    
    /* Recommend Style: https://github.com/johnpapa/angular-styleguide */
    'use strict';
    /*
     * This is the main Module.  We will inculde our feature modules to this module.
     */
    angular.module('app', ['ngRoute']);

})();