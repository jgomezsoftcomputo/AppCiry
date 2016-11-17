var email_destino = "contacto@corpinstitutociry.info";
var url_backend = "https://corpinstitutociry.info/mail.php";

var app = angular.module('contacto', []);

app.controller('ContactoController', ['$scope','$http','$location',function($scope, $http, $location) {
   initContacto();

   $scope.enviarContacto = function(){
      if($scope.formContacto.$valid){
        $scope.contacto.email_destino = email_destino;
        $http({
          url: url_backend, 
          method: "POST", 
          data: $scope.contacto
        }).success(function(data, status) {
            limpiarContacto();
            window.location.href = 'exito.htm';
        }).error(function(data) {
            console.log('Error:' + data);
         });
      }
   };

   function initContacto(){
      limpiarContacto();
   }
   
   function limpiarContacto(){
      $scope.contacto = {};
   };

}]);

