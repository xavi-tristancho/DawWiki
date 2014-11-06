(function(){

	'use strict';

	angular.module('app')
    .factory('Famouses', Famouses);

    function Famouses($http)
    {
    	return {

    		all : function()
    		{
    			return $http.get('api/famouses')
    				.then(function(data)
    				{
    					return data.data;
    				}, function(error)
    				{
    					console.log(error);
    					return error;
    				});
    		},
            create : function(newFamousObject)
            {
                return $http.post('api/famouses', newFamousObject)
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
                return $http.get('api/famouses/' + name + '?embed=articles')
                    .then(function(data)
                    {
                        return data.data;
                    }, function(error)
                    {
                        console.log(error);
                        return error;
                    });
            },
            update : function(editFamousObject)
            {
                return $http.put('api/famouses/' + editFamousObject.id, editFamousObject)
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
                return $http.delete('api/famouses/' + id)
                    .then(function(data)
                    {
                        return data.data;
                    }, function(error)
                    {
                        console.log(error);
                        return error;
                    });
            },

    	}
    }
})();