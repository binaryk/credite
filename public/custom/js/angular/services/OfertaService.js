;
app.factory('oferta', ['$rootScope','$http','$timeout', function($rootScope, $http, $timeout){
    var mixin      = {};
    mixin.revenues = [];

    mixin.create = function(nr_oferte){

        var promise = $http.post($rootScope.config.r_post_oferte_template, { nr_oferte: nr_oferte }).then(function(response){
            return response.data;
        });
        return promise;

    }

    return mixin;

}])