(function(){

	'use strict';

	angular.module('app')
    .factory('FavoritedReddits', FavoritedReddits);

    function FavoritedReddits($http)
    {
    	return {

            destroy : function(username, id)
            {
                return $http.delete('api/users/' + username + '/favorited_reddits/' + id)
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