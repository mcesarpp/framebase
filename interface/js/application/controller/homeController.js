mainApp.controller('homeController', function($scope, UserService, CommService) {
    if (UserService.isLoggedIn) {
        $scope.message = 'Bem vindo,' + UserService.user.nickname;
    } else {
        $scope.message = 'Faça login';
    }

    $scope.testeA = function() {
        CommService.send('teste', 'testeA', null, function(message, data) {
            console.log('Teste A');
            console.info(data);
        });

     }
    $scope.testeB = function() {
        CommService.send('teste', 'testeB', function(message, data) {
            console.log('Teste B');
            console.info(data);
        });
    }
});