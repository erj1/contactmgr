angular.module('ContactMgrApp', ['ngRoute', 'ngResource', 'customFilters'])

.constant('contactsDataUrl', 'http://contactmgr.app:8000/contact/')

.config(['$routeProvider', function ($routeProvider) {

    $routeProvider.when('/contact/create', {
        templateUrl: "js/a/views/contactCreate.html",
        controller: 'contactCreateCtrl'
    });

    $routeProvider.when('/contact/:contactId/edit', {
        templateUrl: "js/a/views/contactEdit.html",
        controller: 'contactEditCtrl'
    });

    $routeProvider.otherwise({
        templateUrl: "js/a/views/contactMain.html"
    });
}])

.factory('Contact', ['$resource', 'contactsDataUrl', function ($resource, contactsDataUrl) {
    return $resource(contactsDataUrl + ':id', null,
        {
            'update': { method: 'PUT' }
        });
}]);