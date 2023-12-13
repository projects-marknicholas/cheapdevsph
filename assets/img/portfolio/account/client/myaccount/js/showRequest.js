function showRequest(argument) {
	var modal = document.getElementById('request-modal');

	if (modal.style.display === "flex") {
		modal.style.display = "none";
	}
	else{
		modal.style.display = "flex";
	}
}