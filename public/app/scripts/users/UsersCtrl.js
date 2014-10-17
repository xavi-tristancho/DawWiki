(function(){

  'use strict';

  angular.module('app')
    .controller('CreateUsersCtrl', CreateUsersCtrl);

    function CreateUsersCtrl($routeParams, Users, $location) {

      var vm = this;

      vm.newUserObject = {
        username : '',
        email : '',
        role : 'member'
      };

      vm.createUserObject = function()
      {

        vm.disableCreateButton = true;

        Users.create(vm.newUserObject)
          .then(function(data)
          {
            $location.url('/');
          });
      }

    }

})();
