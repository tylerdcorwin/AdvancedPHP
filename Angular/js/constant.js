(function() {
    'use strict';
    //this is adding a url reference to the .json files to relay where the index.html
    //will read the files from
    angular
        .module('app')
        .constant('REQUEST', {
            'Phones' : './data/phones.json'
        });
})();