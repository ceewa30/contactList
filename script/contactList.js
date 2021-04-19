var app = angular.module('contactList', []);

app.controller('ContactController', ['$scope', '$http', '$element', '$window', '$timeout', function($scope, $http, $element, $window, $timeout) {
  $scope.showVisible = false;
  $scope.hideMinus = true;
  $scope.hidePlus = false;
  $scope.IsVisible = false;
  $scope.contactAction = true;
  $scope.contactName = true;

  $scope.showContent = function () {
    $scope.showVisible = true;
    $scope.hideMinus = false;
    $scope.hidePlus = true;
    $scope.IsVisible = false;
  }

  $scope.hideContent = function () {
    $scope.showVisible = false;
    $scope.hideMinus = true;
    $scope.hidePlus = false;
    $scope.IsVisible = true;
  }

  $scope.contactDetails = function (id) {
    $scope.contactAction = false;
    console.log(id);
  }

  function viewProfile() {
    $http.get('CURD/fetch.php').then(function(response) {
      $scope.allData = response.data;
      if(Object.keys($scope.allData).length > 0) { //This will check if the object is empty
       // console.log($scope.allData);
       $scope.IsVisible = true;
      }
    });
  }
  // Create an Contact Details
  $scope.createContact = function (contactinfo) {
          $http({
            method: "POST",
            url: "CURD/contactlist.php",
            dataType: 'json',
            data: {contactinfo},
            headers: { "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8" }
        }).then(function(response) {
          //Success
          $scope.createData = response.data;
          viewProfile();
          $scope.showVisible = false;
          $scope.hideMinus = true;
          $scope.hidePlus = false;
          $scope.IsVisible = false;
         }, function(error) {
         //Error
         });
  }

  // Display an User Details
  $http.get('CURD/fetch.php').then(function(response) {
    $scope.allData = response.data;
    if(Object.keys($scope.allData).length > 0) { //This will check if the object is empty
     // console.log($scope.allData);
     $scope.IsVisible = true;
    }
  });

}]);
