mainApp.factory('UserService', ["$rootScope", function($rootScope) {
        return new function() {
            var _this = this;

            this.token = null;
            this.user = null;
            this.isLoggedIn = false;

            this.setUser = function(userObj, tokenObj) {
                _this.user = userObj;
                _this.token = tokenObj;
                _this.isLoggedIn = true;
                if (!$rootScope.$$phase) {
                    $rootScope.$apply();
                }
            }

            this.getUser = function() {
                return _this.user;
            }

            this.getToken = function() {
                return _this.token;
            }

            this.resetUser = function() {
                _this.user = null;
                _this.token = null;
                _this.isLoggedIn = false;
                if (!$rootScope.$$phase) {
                    $rootScope.$apply();
                }
            }

        };
    }]);