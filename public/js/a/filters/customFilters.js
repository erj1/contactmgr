/**
 * Created by ericjones on 9/9/14.
 */
angular.module('customFilters', [])
    .filter('searchFullName', function () {
        return function (contacts, search) {
            if (angular.isArray(contacts) && angular.isString(search)) {
                var results = [],
                    regExSearch = new RegExp(search, 'i');
                for (var i = 0, c = contacts.length; i < c; i++) {
                    var name = contacts[i].firstName + ' ' + contacts[i].lastName;
                    if (regExSearch.test(name)) {
                        results.push(contacts[i]);
                    }
                }
                return results;
            } else {
                return contacts;
            }
        }
    });
