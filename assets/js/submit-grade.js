function setGrade(operatorId, starPos) {
	let gradeDiv = document.querySelector('#grade-' + operatorId);
	let gradeStars = gradeDiv.querySelectorAll(' i');

	let j = 2;
	gradeStars.forEach((star, i) => {
		if (j <= starPos) {
			star.innerHTML = 'star';
		} else {
			star.innerHTML = 'star_border';
		}
		star.classList.add('setstar');
		j += 2;
	});
}

function getGrade(operatorId) {
	let gradeDiv = document.querySelector('#grade-' + operatorId);
	let gradeStars = gradeDiv.querySelectorAll(' i');

	gradeStars.forEach((star) => {
		if (star.classList.contains('star')) {
			star.innerHTML = 'star';
		} else if (star.classList.contains('star-half')) {
			star.innerHTML = 'star_half';
		} else if (star.classList.contains('star-border')) {
			star.innerHTML = 'star_border';
		}
		star.classList.remove('setstar');
	});
}

function submitGrade(operatorId, grade) {
	fetch(`../assets/fetch/submit-grade.php?operatorid=${operatorId}&grade=${grade}`)
		.then(function(response) {
			return response.text();
		})
		.then(function(data) {
			$alert = document.querySelector('#alert-' + operatorId);
			document.querySelector('#grade-' + operatorId).innerHTML = data;
			$alert.classList.remove('hidden');
			setTimeout(() => {
				$alert.classList.add('hidden');
			}, 2000);
		});
}
