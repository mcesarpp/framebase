<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <base href="/slim/interface/">

        <!-- SCROLLS -->
        <!-- load bootstrap and fontawesome via CDN -->
        <link rel="stylesheet" href="css/vendor-cosmo/bootstrap.min.css" />
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.0/css/font-awesome.css" />

        <!-- SPELLS -->
        <!-- load angular via CDN -->
        <script src="js/vendor/jquery-2.1.1.js"></script>
        <script src="js/vendor/bootstrap.js"></script>
        <script src="js/vendor/angular.js"></script>
        <script src="js/vendor/angular-ngRoute.js"></script>
        <script src="js/application/main.js"></script>
        <script src="js/application/service/AuthService.js"></script>
        <script src="js/application/service/CommService.js"></script>
        <script src="js/application/service/UserService.js"></script>
        <script src="js/application/controller/mainController.js"></script>
        <script src="js/application/controller/homeController.js"></script>
        <script src="js/application/controller/testController.js"></script>

    </head>
    <body ng-app="mainApp">

        <div id="modalContainer" style="display: none">
            <button id="__modalBtnTemplate" type="button" class="btn btn-default"></button>
            <div 
                class="modal fade" 
                id="__genericModalTemplate" 
                tabindex="-1" role="dialog" 
                aria-labelledby="myModalLabel"
                aria-hidden="true"
                style="display: none;"
                >
                <div class="modal-dialog">
                    <div class="modal-content" >
                        <div  id="__genericModal-header" class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 id="__genericModal-title" class="modal-title"></h4>
                        </div>
                        <div id="__genericModal-body" class="modal-body" style=" max-height: 400px; overflow-y: auto; ">

                        </div>
                        <div id="__genericModal-footer" class="modal-footer">

                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>



        <div ng-controller="mainController">

            <div id="login-modal-container" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title">Login</h4>
                        </div>
                        <div class="modal-body">
                            <div class="input-group">
                                <span class="input-group-addon">E-mail</span>
                                <input  ng-model="AuthService.loginCandidate.email" type="text" class="form-control" placeholder="e-mail">
                            </div>
                            <br>
                            <div class="input-group">
                                <span class="input-group-addon">Senha</span>
                                <input  ng-model="AuthService.loginCandidate.password" type="password" class="form-control" placeholder="senha">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button id="btnLogin" type="button" class="btn btn-primary">Login</button>
                        </div>
                    </div>
                </div>
            </div>

            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#/">Home</a>
                    </div>

                    <ul class="nav navbar-nav navbar-default">
                        <li><a href="#/test"><i class="fa fa-shield"></i> Test</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right" ng-if="UserService.isLoggedIn">
                        <li><a>Bem vindo, {{UserService.user.nickname}}</a></li>
                        <li><a ng-click="AuthService.doLogout()"><i class="fa fa-user"></i> Logout</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right" ng-if="!UserService.isLoggedIn">
                        <li><a ng-click="AuthService.showLogin()"><i class="fa fa-user"></i> Login</a></li>
                    </ul>
                </div>
            </nav>

            <div ng-view></div> 
        </div> 



    </body>
</html>