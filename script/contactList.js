var app = angular.module('contactList', []);

app.controller('ContactController', ['$scope', '$http', '$element', '$window', '$timeout', function($scope, $http, $element, $window, $timeout) {
  $scope.showVisible = false;
  $scope.hideMinus = true;
  $scope.hidePlus = false;
  $scope.IsVisible = false;
  $scope.contactAction = false;
  $scope.contactName = true;
  $scope.butn = "Add";
  $scope.success = false;

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

  $scope.contactDetails = function (inx) {
    inx.contactAction = true;
    inx.contactName = true;
  }

  $scope.actionDetails = function (inx) {
    inx.contactAction = false;
    inx.contactName = false;
  }

  $scope.editDetails = function (inx) {
    $scope.contactinfo = inx;
    $scope.butn = "Update";
    console.log(inx);
    $scope.showVisible = true;
    $scope.hideMinus = false;
    $scope.hidePlus = true;
    $scope.IsVisible = false;
  }

  $scope.deleteDetails = function (inx) {
    if(confirm("Are you sure you want to remove it?")) {
      $http({
        method: "post",
        url: "CURD/delete.php",
        dataType: 'json',
        data: {id:inx},
        headers: { "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8" }
    }).then(function(response) {
      //Success
      $scope.success = true;
      $scope.viewProfile();
     }, function(error) {
     //Error
     });
    }
  }

  $scope.viewProfile = function() {
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
    if(!contactinfo.id) {
      console.log(contactinfo);
      $scope.createDataContact(contactinfo);
    } else {
      console.log(contactinfo);
      $scope.editContact(contactinfo);
    }
  }
    $scope.createDataContact = function(contact) {
      // console.log(contact.firstName);
      $http({
        method: "POST",
        url: "CURD/contactlist.php",
        dataType: 'json',
        data: {"firstName":contact.firstName,"lastName":contact.lastName,"phone":contact.phone},
        headers: { "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8" }
    }).then(function(response) {
      //Success
      console.log(response);
      $scope.success = true;
      $scope.createData = response.data;
      $scope.showVisible = false;
      $scope.hideMinus = true;
      $scope.hidePlus = false;
      $scope.IsVisible = false;
      $scope.viewProfile();
      $scope.contact = {};
     }, function(error) {
     //Error
     });
    }
    
    $scope.editContact = function(editdata){
      $http({
        method: "POST",
        url: "CURD/editlist.php",
        dataType: 'json',
        data: {"firstName":editdata.firstName,"lastName":editdata.lastName,"phone":editdata.phone,"id":editdata.id,"updated_at":editdata.updated_at},
        headers: { "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8" }
    }).then(function(response) {
      //Success
      console.log(response);
      $scope.success = true;
      $scope.createData = response.data;
      $scope.showVisible = false;
      $scope.hideMinus = true;
      $scope.hidePlus = false;
      $scope.IsVisible = false;
      $scope.viewProfile();
      $scope.data = {};
     }, function(error) {
     //Error
     });
    }
}]);
