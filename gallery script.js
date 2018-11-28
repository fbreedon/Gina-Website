var imgIndex = 1;
showImgs(imgIndex);

// Take in an integer and increase the image index that many times
// Used to scroll through the images
function plusImg(n) {
	showImgs(imgIndex += n);
}

// Take in an integer and set the image index equal to it
// Used to jump to an image
function currentImg(n) {
	showImgs(imgIndex = n);
}

function tabHighlight(n) {
	var tab1 = document.getElementById("tab-1");
	var tab2 = document.getElementById("tab-2");
	tab1.className = tab1.className.replace(" active", "");
	tab2.className = tab2.className.replace(" active", "");
	
	if (n == 1) {
		tab1.className += " active";
		tab2.className = tab2.className.replace(" active", "");
	}
	else if (n == 2) {
		tab2.className += " active";
		tab1.className = tab1.className.replace(" active", "");
	}
}

// Take in an integer, create variables for the images, icons, info, and tabs,
// set the image index, clear all the images and infos, remove the highlight,
// then set the correct image and info to show
function showImgs(n) {
	var i;
	var x = document.getElementsByClassName("gallery-img");
	var icons = document.getElementsByClassName("gallery-icon");
	var info = document.getElementsByClassName("info");
	//var tablinks = document.getElementsByClassName("tab-link");

	// Loop back to the first image when clicking next on the last image
	if (n > x.length) {imgIndex = 1;}

	// Loop forward to the last image when clicking prev on the first image
	if (n < 1) {imgIndex = x.length;}

	// Set the display value for each image to "none"
	for (i = 0; i < x.length; i++) {
		x[i].style.display = "none";
	}

	// Set the display value for each info to "none"
	// This is a seperate function in case there is no info
	if(info.length > 0) {
		for (i = 0; i < info.length; i++) {
			info[i].style.display = "none";
		}
	}

	// Check that there are tabs,
	// then get rid of the active class in each tab index
	/*if (tablinks.length > 0) {
		for (i = 0; i < tablinks.length; i++) {
			tablinks[i].className = tablinks[i].className.replace(" active", "");
		}
	}*/

	// Remove the highlight from the icons
	for (i = 0; i < icons.length; i++) {
		icons[i].className = icons[i].className.replace(" highlight", "");
	}

	// Set the current image's display value to "block"
	x[imgIndex-1].style.display = "block";
	// Add "highlight" to the current nav icon's class name
	icons[imgIndex-1].className += " highlight";
	// Check that there is info, 
	// then set the current image's info display value to "block"
	if(info.length > 0) {info[imgIndex-1].style.display = "block";}
	// Check that there are tabs, find out which tab the current image belongs to,
	// then set the correct tab to be active if it isn't already active
	/*if (tablinks.length > 0) {
		if (x[imgIndex-1].className == "gallery-img first" &&
			tablinks[0].className != "tab-link active") {
			tablinks[0].className += " active";
		}
		if (x[imgIndex-1].className == "gallery-img second" &&
			tablinks[1].className != "tab-link active") {
			tablinks[1].className += " active";
		}
	}*/
}

document.getElementById("tab-1").click();