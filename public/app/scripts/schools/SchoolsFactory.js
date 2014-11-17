(function(){

	'use strict';

	angular.module('app')
    .factory('Schools', Schools);

    function Schools($http)
    {
    	return {

    		all : function()
    		{
    			return $http.get('api/schools')
    				.then(function(data)
    				{
    					return data.data;
    				}, function(error)
    				{
    					console.log(error);
    					return error;
    				});
    		},
        create : function(newSchoolObject)
        {
          return $http.post('api/schools', newSchoolObject)
              .then(function(data)
              {
                  return data.data;
              }, function(error)
              {
                  console.log(error);
                  return error;
              });
        },
        show : function(name)
        {
          return $http.get('api/schools/' + name)
              .then(function(data)
              {
                  return data.data;
              }, function(error)
              {
                  console.log(error);
                  return error;
              });
        },
        update : function(editSchoolObject)
        {
          return $http.put('api/schools/' + editSchoolObject.id, editSchoolObject)
              .then(function(data)
              {
                  return data.data;
              }, function(error)
              {
                  console.log(error);
                  return error;
              });
        },
        destroy : function(id)
        {
          return $http.delete('api/schools/' + id)
              .then(function(data)
              {
                  return data.data;
              }, function(error)
              {
                  console.log(error);
                  return error;
              });
        }
    	}
    }
})();
