function openTab(event, tabName) {
	var i;

	// Define a new array from the html class and set each index's display style to none
	var tabcontent = document.getElementsByClassName("tab-content");
	for (i = 0; i< tabcontent.length; i++) {
		tabcontent[i].style.display = "none";
	}

	// Define a new array from the html class and get rid of the active class in each index
	var tablinks = document.getElementsByClassName("tab-link");
	for (i = 0; i < tablinks.length; i++) {
		tablinks[i].className = tablinks[i].className.replace(" active", "");
	}

	// Set the clicked tab to display in a grid and add the active class to it
	document.getElementById(tabName).style.display = "inline-grid";
	event.currentTarget.className += " active";
}

// Get the tab with the default-tab id and click it so it's open by default
document.getElementById("default-tab").click();