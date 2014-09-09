<!DOCTYPE html>
<html>
    <head>
        <base href="/slim/interface/">

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>SB Admin - Bootstrap Admin Template</title>

        <!-- SCROLLS -->
        <!-- load bootstrap and fontawesome via CDN -->
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/sb-admin.css" >
        <link rel="stylesheet" href="css/font-awesome-4.1.0/css/font-awesome.min.css" />

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
        <div id="wrapper" ng-controller="mainController">           
            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="btn btn-default btn-sm" ng-click="menuToggle()">
                        <span class="glyphicon glyphicon-align-left"></span>
                    </button>
                </div>
                <!-- Top Menu Items -->
                <ul class="nav navbar-right top-nav">

                </ul>
                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <div ng-if="UserService.isLoggedIn">
                            <p class="navbar-text">Bem vindo, {{UserService.user.nickname}}</p>
                            <a ng-click="AuthService.doLogout()"><i class="fa fa-user"></i> Logout</a>
                        </div>
                        <div ng-if="!UserService.isLoggedIn">
                            <a ng-click="AuthService.showLogin()"><i class="fa fa-user"></i> Login</a>
                        </div>
                        <li class="active">
                            <a href="#/"><i class="fa fa-fw fa-dashboard"></i>Home</a>
                        </li>
                        <li >
                            <a href="#/test"><i class="fa fa-shield"></i> Test</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>


            <div id="page-wrapper" style="height: 100%">
                <div ng-view></div>
            </div>


            <!--Login Container-->

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


            <!--Generic modal container-->

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



        </div>

    </body>
</html>