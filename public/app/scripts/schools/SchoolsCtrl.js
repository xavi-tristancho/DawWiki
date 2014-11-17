(function(){

  'use strict';

  angular.module('app')
    .controller('SchoolsCtrl', SchoolsCtrl)
    .controller('NewSchoolsCtrl', NewSchoolsCtrl)
    .controller('EditSchoolsCtrl', EditSchoolsCtrl)
    .controller('ShowSchoolsCtrl', ShowSchoolsCtrl);

  function SchoolsCtrl (Schools) {

    var vm = this;

    vm.getSchools = function()
    {
      Schools.all()
      .then(function(data)
      {
        vm.setSchools(data.data);
      });
    };

    vm.getSchools();

    vm.setSchools = function(schools)
    {
      vm.schools = schools;
    };

    vm.destroy = function(id)
      {
        Schools.destroy(id)
          .then(function(data)
          {
            vm.getSchools();
          });
      }

  }

  function NewSchoolsCtrl($location, Schools)
    {
      var vm = this;

      vm.newSchoolObject = {
        name : '',
        url : '',
        free_resources: '',
        free_account: '',
        monthly_cost: '',
        anual_cost: '',
        lifetime_cost: '',
        rate: ''
      };

      vm.createSchoolObject = function()
      {
        Schools.create(vm.newSchoolObject)
          .then(function(data)
          {
            $location.url('schools');
          });
      }
    }

    function EditSchoolsCtrl($routeParams, $location, Schools)
    {
      var vm = this;

      Schools.show($routeParams.name)
        .then(function(data)
        {
          vm.editSchoolObject = data.data;
        });

      vm.updateSchoolObject = function()
      {
        Schools.update(vm.editSchoolObject)
          .then(function(data)
          {
            $location.url('schools');
          });        
      };
    }

    function ShowSchoolsCtrl($routeParams, Schools, Articles)
    {
      var vm = this;

      vm.getSchool = function()
      {
        Schools.show($routeParams.name)
        .then(function(data)
        {
          vm.setSchool(data.data);
        });
      }

      vm.getSchool();

      vm.setSchool = function(school)
      {
        vm.school = school;
      }
    }

})();