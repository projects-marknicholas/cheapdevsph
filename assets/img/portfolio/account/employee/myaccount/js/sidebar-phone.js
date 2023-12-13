function showPhoneMenu() {
	var phone = document.getElementById('sidebar-phone');

	if (phone.style.width === '100%') {
		phone.style.width = '0%';
	}
	else{
		phone.style.width = '100%';
	}
}