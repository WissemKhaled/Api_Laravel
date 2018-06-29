let runtime = {
	toggleView: function() {
		// If there is a token saved
		if(authHelper.getToken() !== null) {
			requestHelper.get("http://192.168.10.10/?token=" + authHelper.getToken(), function(data) {
				// if the api send back success, we are connected
				if (data.success !== null) {
					viewHelper.displaySection('main');
				}
				// Else we are not connected 
				else {
					// we are not connected
					viewHelper.displaySection('login');
				}
			})
		}else {
			viewHelper.displaySection('login');
		}
		// We are not connected
	},
	addEventListeners: function() {
	document.querySelector('body').addEventListener('click', function (el) {
		if(el.target.dataset.action == 'login'){
			let user = document.querySelector('[data-value="name"]').value;
			let pass = document.querySelector('[data-value="pass"]').value;

			if(user !== "" && pass !== "") {
				requestHelper.post('http://192.168.10.10/login', {name: user, password: pass}, function(data){
					if (data.error == undefined) {
						authHelper.setToken(data.successMessage);
					}else {
						authHelper.removeToken;
					}
					runtime.toggleView();
					});
				}
			}
		});
	}
}