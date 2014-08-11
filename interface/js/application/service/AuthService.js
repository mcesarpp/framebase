mainApp.factory('AuthService', ["CommService", "UserService", "$rootScope", function(CommService, UserService, $rootScope) {
        return new function() {
            var _this = this;

            this.loginCandidate = {
                email: null,
                password: null
            }

            this.resetLoginCandidate = function() {
                _this.loginCandidate.email = null;
                _this.loginCandidate.password = null;
            }

            this.showLogin = function() {
                $('#login-modal-container').modal('show');
                $('#btnLogin', '#login-modal-container').unbind().click(function() {
                    _this.doLogin(_this.loginCandidate.email, _this.loginCandidate.password);
                });

            };

            this.doLogin = function(email, password) {
                var requestObject = {
                    email: email,
                    password: password
                };

                CommService.send('token', 'get', requestObject,
                        function(message, data) {
                            UserService.setUser(data.user, data.token);
                            $('#login-modal-container').modal('hide');
                            _this.resetLoginCandidate();
                        },
                        function(message, data) {

                        }
                );
            };

            this.doLogout = function() {
                UserService.resetUser();
            };
        };
    }]);