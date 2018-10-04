<script type="text/javascript">
      "use strict";
      var app = angular.module('myApp', ['ngMessages','ngAnimate', 'ngSanitize', 'ui.bootstrap']);

      //Cannot Access White Spaces to be call in a form disallow-spaces
      app.directive('disallowSpaces', function() {
          return {
              restrict: 'A',

              link: function($scope, $element) {
                  $element.bind('keydown', function(e) {
                      if (e.which === 32) {
                          e.preventDefault();
                      }
                  });
              }
          }
      });    

      //Cannot Access Alphabetics Keys to be call in a form disallow-alphabetics
      app.directive('allowOnlyNumbers', function () {
            return {  
                restrict: 'A',  
                link: function (scope, elm, attrs, ctrl) {  
                    elm.on('keydown', function (event) {  
                        if (event.which == 64 || event.which == 16) {  
                            // to allow numbers  
                            return false;  
                        } else if (event.which >= 48 && event.which <= 57) {  
                            // to allow numbers  
                            return true;  
                        } else if (event.which >= 96 && event.which <= 105) {  
                            // to allow numpad number  
                            return true;  
                        } else if ([8, 13, 27, 37, 38, 39, 40].indexOf(event.which) > -1) {  
                            // to allow backspace, enter, escape, arrows  
                            return true;  
                        } else {  
                            event.preventDefault();  
                            // to stop others  
                            return false;  
                        }  
                    });  
                }  
            }  
      });

      //Check the Password Match check
      app.directive('passwordVerify', function (){
        return {
        restrict: 'A', // only activate on element attribute
        require: '?ngModel', // get a hold of NgModelController
        link: function(scope, elem, attrs, ngModel) {
          if (!ngModel) return; // do nothing if no ng-model

          // watch own value and re-validate on change
          scope.$watch(attrs.ngModel, function() {
            validate();
          });

          // observe the other value and re-validate on change
          attrs.$observe('passwordVerify', function(val) {
            validate();
          });

          var validate = function() {
            // values
            var val1 = ngModel.$viewValue;
            var val2 = attrs.passwordVerify;

            // set validity
            ngModel.$setValidity('passwordVerify', val1 === val2);
          };
        }
      }      
      });  

      app.controller('myCtrl', function ($scope) 
      {
        /*$scope.onlyAlpha     = "/^[a-zA-Z\s]*$/";
        $scope.onlyNumeric   = "/^[0-9]*$/";
        $scope.pincodeVal    = "/^[0-9]{6}$/";
        $scope.mobileVal     = "/^[0-9]{10}$/";
        $scope.mobileCodeVal = "/\+\d{2}-\d{10}/";
        $scope.validUrl      = "/^(http[s]?:\/\/){0,1}(www\.){0,1}[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,5}[\.]{0,1}/";
        $scope.passwdVal     = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z_@!%*./#&+-]{8,}$/";*/        

        //When Submitted Form Throw Error
        $scope.submited = function(form){
            if ($scope[form].$valid) {
              alert("Submitted");
            } else {
              $(':required').addClass('customfocus');
              $scope.showMsgs = true;
            }    
        };        
      });

      app.controller('ModalCtrl', function ($uibModal, $log, $document) {
      var $ctrl = this;

      $ctrl.open = function (size='lg', parentSelector) {
          var parentElem = parentSelector ? 
            angular.element($document[0].querySelector('.modal-angular ' + parentSelector)) : undefined;
          var modalInstance = $uibModal.open({
            ariaLabelledBy: 'modal-title',
            ariaDescribedBy: 'modal-body',
            templateUrl: 'http://localhost/testAngular/angular/ajax_form',
            controller: 'ModalInstanceCtrl',
            controllerAs: '$ctrl',
            size: size,
            appendTo: parentElem,            
          });        
        };  
      });

     app.controller('ModalInstanceCtrl', function ($uibModalInstance) {
        var $ctrl = this;        

        $ctrl.ok = function () {
          $uibModalInstance.close();
        };

        $ctrl.cancel = function () {
          $uibModalInstance.dismiss('cancel');
        };
      });
</script>