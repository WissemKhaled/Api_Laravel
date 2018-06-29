let viewHelper = {
	displaySection : function(target){
		let sections = document.querySelectorAll('section');
		for(let i = 0; i < sections.length; i++) {
			if (sections[i].dataset.view == target) {
				sections[i].classList.remove('hidden');
			}else {
				sections[i].classList.add('hidden');
			}
		}
	}
}