(function(){

  'use strict';

  angular.module('app')
    .controller('FamousesCtrl', FamousesCtrl)
    .controller('NewFamousesCtrl', NewFamousesCtrl)
    .controller('ShowFamousesCtrl', ShowFamousesCtrl)
    .controller('EditFamousesCtrl', EditFamousesCtrl);

    function FamousesCtrl(Famouses)
    {
      var vm = this;

      vm.famouses = {};

      vm.getFamouses = function()
      {
        Famouses.all()
        .then(function(data)
        {
          vm.setFamouses(data.data);
        });
      }

      vm.getFamouses();

      vm.setFamouses = function(famouses)
      {
        vm.famouses = famouses;
      }

      vm.destroy = function(id)
      {
        Famouses.destroy(id)
          .then(function(data)
          {
            vm.getFamouses();
          });
      }
    }

    function NewFamousesCtrl($location, Famouses)
    {
      var vm = this;

      vm.newFamousObject = {
        name : '',
        web : '',
        photo : '',
        description : '',
        wikipedia : '',
        twitter : '',
        github : ''
      };

      vm.createFamousObject = function()
      {
        Famouses.create(vm.newFamousObject)
          .then(function(data)
          {
            $location.url('famouses');
          });
      }
    }

    function ShowFamousesCtrl($routeParams, Famouses)
    {
      var vm = this;

      Famouses.show($routeParams.name)
        .then(function(data)
        {
          vm.famous = data.data;
        });
    }

    function EditFamousesCtrl($routeParams, $location, Famouses)
    {
      var vm = this;

      Famouses.show($routeParams.name)
        .then(function(data)
        {
          vm.editFamousObject = data.data;
        });

      vm.updateFamousObject = function()
      {
        Famouses.update(vm.editFamousObject)
          .then(function(data)
          {
            $location.url('famouses');
          });        
      };
    }

})();
