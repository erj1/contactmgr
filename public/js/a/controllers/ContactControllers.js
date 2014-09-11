/**
 * Created by ericjones on 8/5/14.
 */
angular.module('ContactMgrApp')

.controller('ContactsCtrl', ['$scope', '$location', 'Contact', function ($scope, $location, Contact) {
    $scope.validation = {};

    Contact.query(function(data) {
        $scope.contacts = data;
    });

    $scope.hasBirthday = function(is_birthday) {
        return (is_birthday) ? 'birthday' : '';
    };

    $scope.selectContact = function(contact) {
        $scope.contact = contact;
        $location.url('contact/'+contact.id+'/edit');
    };

}])

.controller('contactCreateCtrl', ['$scope', '$location', 'Contact', function ($scope, $location, Contact) {

    $scope.addContact = function() {
        Contact.save($scope.contact, function (newContact) {
            $scope.contacts.push(newContact);
            $location.url('/');
        }, function (response) {
            $scope.validation.error = response.data;
        });
    };
}])

.controller('contactDetailCtrl', ['$scope', '$http', '$routeParams', 'contactsDataUrl', function ($scope, $http, $routeParams, contactsDataUrl) {

    if (!angular.isDefined($scope.data.contact) || $scope.data.contact.id != $routeParams.contactId) {
            $scope.selectContact($routeParams.contactId);

            $http.get(contactsDataUrl + $scope.selectedContact)
                .success(function(data) {
                    $scope.data.contact = data;
                })
                .error(function(error) {
                    $scope.data.error = error;
                });
        }
}])

.controller('contactEditCtrl', ['$scope', '$location', '$routeParams', 'Contact', function($scope, $location, $routeParams, Contact) {

    var contactId = $routeParams.contactId;

    if (!$scope.contact) {
        // get the contact from the server
        Contact.get({ id: contactId }, function (contact) {
            $scope.contact = contact;
        }, function (response) {
            $scope.validation.error = response.data;
        });
    }

    $scope.updateContact = function () {
        Contact.update({ id: contactId }, $scope.contact, function () {
            Contact.query(function (contacts) {
                $scope.contacts = contacts;
            });
            $location.url('/');
        }, function (response) {
            $scope.validation.error = response.data;
        });
    };
}]);
