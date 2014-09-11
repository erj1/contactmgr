<!DOCTYPE html>
<html lang="en-US" ng-app="ContactMgrApp">
<head>
    <meta charset="UTF-8">
    <title>Contact Manager Application</title>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/style.css">

    <script type="text/javascript" src="/js/a/angular.js"></script>
    <script type="text/javascript" src="/js/a/ngmodules/angular-route.js"></script>
    <script type="text/javascript" src="/js/a/ngmodules/angular-resource.js"></script>
    <script type="text/javascript" src="/js/a/ContactMgr.js"></script>
    <script type="text/javascript" src="/js/a/controllers/ContactControllers.js"></script>
    <script type="text/javascript" src="/js/a/filters/customFilters.js"></script>
</head>
<body ng-controller="ContactsCtrl">

    <div class="container" ng-show="data.error">
        <div class="row" >
            <div class="alert alert-danger">
                Error {{ data.error }}. The contact data could not be loaded.
            </div>
        </div>
    </div>

    <div ng-hide="data.error"><ng-view/></div>

</body>
</html>