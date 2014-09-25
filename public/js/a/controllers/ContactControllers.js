/**
 * Created by ericjones on 8/5/14.
 */
angular.module('ContactMgrApp')

.controller('ContactsCtrl', ['$scope', '$location', 'Contact', function ($scope, $location, Contact) {
    
    $scope.data = {};
    
    Contact.query(function (contacts) {
        $scope.data.contacts = contacts;
    }, function (response) {
        $scope.data.error = response.data;
    });

    $scope.hasBirthday = function(is_birthday) {
        return (is_birthday) ? 'birthday' : '';
    };

}])

.controller('contactCreateCtrl', ['$scope', '$location', 'Contact', function ($scope, $location, Contact) {

    $scope.contact = {};
    
    $scope.addContact = function () {

        Contact.save($scope.contact, function (contact) {

            $scope.data.contacts.push(contact);
            $location.url('/');

        }, function (response) {

            $scope.validation = response.data;

        });

    };
}])

.controller('contactEditCtrl', ['$scope', '$location', '$routeParams', 'Contact', function($scope, $location, $routeParams, Contact) {

    var contactId = $routeParams.contactId;

    Contact.get({ id: contactId }, function (contact) {
        $scope.contact = contact;
    }, function (response) {
        $scope.validation.error = response.data;
    });

    $scope.updateContact = function () {
        Contact.update({ id: contactId }, $scope.contact, function () {
            
            angular.forEach($scope.data.contacts, function (contact, i) {
                if (contact.id == contactId) {
                    $scope.data.contacts[i] = $scope.contact;
                }
            });

            $location.url('/');
        }, function (response) {
            $scope.validation = response.data;
        });
    };
}]);
