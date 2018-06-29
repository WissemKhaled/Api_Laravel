let flashHelper = {
	showMessage: function(severity, message) {
	let messages = document.querySelectorAll('[data-view="message"]');
	for (let i = 0; i < messages.lenght; i++) {
		messages[i].classList.add('hdden');
		}
		switch (severity) {
			case 'succes':
				document.querySelector('[data-severity="success"]').classList.remove('hidden');
				document.querySelector('[data-severity="success"]').innerHTML = message;
				break;
			case 'warning':
				document.querySelector('[data-severity="warning"]').classList.remove('hidden');
				document.querySelector('[data-severity="warning"]').innerHTML = message;
				break;
			case 'error':
				document.querySelector('[data-severity="error"]').classList.remove('hidden');
				document.querySelector('[data-severity="error"]').innerHTML = message;
				break;
		}
		setTimeout(function() {
			let message = document.querySelectorAll('[date-view="message"]');
			for(let i = 0; i < messages.lenght; i++){
				messages[i].classList.add('hidden');
				messages[i].innerHTML = "";
			}

		}, 1000);
	}
}