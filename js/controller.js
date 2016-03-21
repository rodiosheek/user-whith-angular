app.controller('sendForm', function ($scope, $http, $location) {
    $scope.user = {};
    var result = [];
    $scope.submit = function () {
        if ($scope.form.$valid) {
            $http.post('php-includes/send-form.php', $scope.user)
                .success(function (data) {
                    result = data;
                })
                .error(function (data, status, headers, config) {
                    console.log(data);
                    console.log(status);
                    console.log(headers);
                    console.log(config);
                });
            $location.path('/list');
        } else {
            console.log('form invalid');
        }
    }
});

app.controller('userList', function ($scope, $http, $location) {
    $http.post('php-includes/getInfo.php')
        .success(function (data) {
            $scope.tasks = data;
        })
        .error(function (data, status, headers, config) {
            console.log(data);
            console.log(status);
            console.log(headers);
            console.log(config);
        });

    $scope.editUser = function (id) {
        $location.path('/edit/' + id);
    }
});

app.controller('edit', function ($scope, $http, $location, $routeParams) {
    var id = $routeParams.id;
    $http.post('php-includes/get-one.php', id)
        .success(function (data) {
            $scope.user = data;
        });

    $scope.deleteUser = function () {
        $http.post('php-includes/deleteUser.php', id)
            .success(function () {
                $location.path('/list/');
            })
            .error(function (data, status, headers, config) {
                console.log(data);
                console.log(status);
                console.log(headers);
                console.log(config);
            })
    };

    $scope.userEdit = function () {
        $scope.user.id = id;
        $http.post('php-includes/update.php/', $scope.user)
            .success(function () {
                $location.path('/list/');
            })
            .error(function (data, status, headers, config) {
                console.log(data);
                console.log(status);
                console.log(headers);
                console.log(config);
            })
    }
});


