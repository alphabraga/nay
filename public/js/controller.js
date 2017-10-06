var nay = angular.module('nay', []);

nay.config(function($interpolateProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
});


nay.controller('CartController', function() {
    this.label = "Alfredo Braga";
});