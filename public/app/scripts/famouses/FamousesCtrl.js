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

    function ShowFamousesCtrl($routeParams, Famouses, Articles)
    {
      var vm = this;

      vm.getFamous = function()
      {
        Famouses.show($routeParams.name)
        .then(function(data)
        {
          vm.setFamous(data.data);
        });
      }

      vm.getFamous();

      vm.setFamous = function(famous)
      {
        vm.famous = famous;
      }

      vm.getTweets = function()
      {
        Famouses.tweets($routeParams.name)
        .then(function(data)
        {
          vm.setTweets(data.data);
        });
      }

      vm.getTweets();

      vm.setTweets = function(tweets)
      {
        vm.tweets = tweets;
      }

      vm.destroyArticle = function(id)
      {
        Articles.destroy(id)
          .then(function(data)
          {
            vm.getFamous();
          });
      }
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
