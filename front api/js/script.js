let xhttp;
xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function () {
	if (this.readyState == 4 && this.status == 200) {
		let ul = document.createElement('ul');
		for (var i = 0; i < JSON.parse(this.responseText).length; i++) {
			console.log(JSON.parse(this.responseText)[i]);

			let li = document.createElement('li');
			let div1 = document.createElement('div');			
			let p = document.createElement('p');
			let button = document.createElement('button');

			let div2 = document.createElement('div');
			let input = document.createElement('input');
			let button2 = document.createElement('button');

			let buttonUpdate = document.createElement('button');

			p.innerHTML = JSON.parse(this.responseText)[i].name;

			button.innerHTML = 'SUPP';
			button2.innerHTML = 'Update';

			button.dataset.action = 'delete';
			div2.classList.add('hidden');
			button2.dataset.action ='update';
			li.classList.add('user-list');

			button.setAttribute('name', 'delete');
			button.setAttribute('id', JSON.parse(this.responseText)[i].id);

			button2.dataset.id = JSON.parse(this.responseText)[i].id;
			
			input.setAttribute('name', 'nameUpdate');
			input.setAttribute('value', JSON.parse(this.responseText)[i].name);

			buttonUpdate.setAttribute('name', 'update');
			buttonUpdate.dataset.action = 'showUpdate';
			buttonUpdate.innerHTML ='MàJ';

			div2.appendChild(input);
			div2.appendChild(button2);

			div1.appendChild(p);
			div1.appendChild(button);
			div1.appendChild(buttonUpdate);

			li.appendChild(div1);
			li.appendChild(div2);
			ul.appendChild(li);
		}
		document.querySelector('[data-view="home"]').appendChild(ul);
	}
};

xhttp.open("GET","http://192.168.10.10/", true);
xhttp.send();

document.querySelector('body').addEventListener('click', function(el) {
	if(el.target.nodeName == 'BUTTON' && el.target.dataset.action == 'delete') {
		let id = el.target.getAttribute('id');
		let xhttp;
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				location.reload();
			}
		}
		xhttp.open("DELETE", "http://192.168.10.10/user?id=" + id, true);
		xhttp.send();
	} else if(el.target.nodeName == 'BUTTON' && el.target.dataset.action == 'showUpdate'){
		let divs = el.target.parentElement.parentElement.querySelectorAll('div');
		for (var i = 0; i < divs.length ; i++) {
			divs[i].classList.toggle('hidden');
		}
	}else if(el.target.nodeName == 'BUTTON' && el.target.dataset.action == 'update') {
		let id = el.target.dataset.id;
		let newName = el.target.previousSibling.value;

		let xhttp;
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				location.reload();
			}
		}
		xhttp.open("POST","http://192.168.10.10/user/update/" +id, true);
		xhttp.setRequestHeader('Content-Type', 'application/json');
		xhttp.send(JSON.stringify({name: newName}));
	}
});

document.querySelector('[data-action="insert"]').addEventListener('click', function () {
	if(document.querySelector('input[name=name]').value !== '') {
		let xhttp;
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				response = JSON.parse(this.responseText);
				if (response.success !== undefined) {
					alert('Nouveau mot de pass: ' + response.succesMessage);
					location.reload();
				} else {
					alert(response.errorMessage);
					location.reload();
				}
			}
		}
		xhttp.open("POST","http://192.168.10.10/user/insert", true);
		xhttp.setRequestHeader('Content-Type', 'application/json');
		xhttp.send(JSON.stringify({name: document.querySelector('input[name=name]').value}));
	}
});

