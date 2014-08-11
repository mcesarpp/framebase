mainApp.factory('CommService', ["$http", "UserService", function($http, UserService) {
        return new function() {
            var _this = this;
            var apiUrl = config.apiUrl;
            _this.send = function(controller, action, requestData, successCallback, errorCallback) {
                var url = apiUrl + controller + '/' + action;
                var responseObj = $http({
                    method: 'POST',
                    url: url,
                    headers: {
                        token: UserService.token
                    }
                });

                if (config.debug) {
                    console.log('Request:', requestData);
                }

                responseObj.success(function(responseData, status) {
                    if (responseData.status) {
                        if (typeof successCallback === 'function') {
                            successCallback(responseData.message, responseData.data);
                        }
                    } else {

                        if (typeof errorCallback === 'function') {
                            errorCallback(responseData.message, responseData.data);
                        }
                    }
                });
                responseObj.error(function(responseData, status) {
                    if (typeof errorCallback === 'function') {
                        errorCallback(responseData.message, responseData.data);
                    }
                });
            }
        }

    }]);
