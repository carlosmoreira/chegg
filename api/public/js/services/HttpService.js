app.service('HttpService', function ($http) {
    var get = function (url, success, error) {
        $http.get('books')
            .then(success, error)
            .catch(function (error) {
                console.log('catch', error);
            });
    };

    return {
        get: get
    }
});