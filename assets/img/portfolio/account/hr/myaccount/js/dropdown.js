function dropdownToggle() {
	var dropdown = document.getElementById('sidebar-dropdown');

	if (dropdown.style.height === "auto") {
		dropdown.style.height = "0%";
	}
	else{
		dropdown.style.height = "auto";
	}
}