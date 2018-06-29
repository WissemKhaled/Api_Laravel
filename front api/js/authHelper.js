let authHelper = {
	setToken: function(token) {
		localStorage.setItem('token', token);
	},
	getToken: function() {
		return localStorage.getItem('token');
	},
	removeToken: function () {
		localStorage.clear();
	}
}