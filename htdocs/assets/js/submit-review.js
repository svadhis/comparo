function submitReview(operatorId) {
	let message = document.querySelector('#message-' + operatorId).value;
	let author = document.querySelector('#name-' + operatorId).value;
	fetch(`../assets/fetch/submit-review.php?operatorid=${operatorId}&message=${message}&author=${author}`)
		.then(function(response) {
			return response.text();
		})
		.then(function(data) {
			let allData = data.split('|');
			document.querySelector('#button-' + operatorId).innerHTML = `<b>Avis des clients (${allData[1]})</b>`;
			document.querySelector('#reviewstable-' + operatorId).innerHTML = allData[0];
			document.querySelector('#reviewform-' + operatorId).style.display = 'none';
		});
}
