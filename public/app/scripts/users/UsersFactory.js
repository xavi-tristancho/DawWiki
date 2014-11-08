(function(){

	'use strict';

	angular.module('app')
    .factory('Users', Users);

    function Users($http)
    {
    	return {

            create : function(newUsersObject)
            {
                return $http.post('api/users', newUsersObject)
                    .then(function(data)
                    {
                        return data.data;
                    }, function(error)
                    {
                        console.log(error);
                        return error;
                    });
            },
            favoritedReddits : function(name)
            {
                return $http.get('api/users/' + name + '/favorited_reddits?embed=reddit')
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