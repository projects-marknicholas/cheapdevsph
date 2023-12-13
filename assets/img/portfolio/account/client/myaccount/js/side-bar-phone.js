function sidebarPhoneToggle() {
	var sidebar = document.getElementById('sidebar');
	var mainbar = document.getElementById('mainbar');

if (sidebar.style.width === "0%") {
	sidebar.style.width = "20%";
	mainbar.style.width = "80%";
}
else{
	sidebar.style.width = "0%";
	mainbar.style.width = "100%";
}