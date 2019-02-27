var imgIndex = 1;
var navIndex = 1;
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

// Take in an integer and move the navigation icons by that many sets of six
function plusNav(n) {
	showNav(navIndex += n);
}

/*function tabHighlight(n) {
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
}*/

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

	// Determine which set of six icons needs to be displayed and
	// update the navigation index
	switch (true) {
		// The first six images
		case imgIndex > 0 && imgIndex <= 6:
			navIndex = 1;
			break;
		// The second six images
		case imgIndex > 6 && imgIndex <= 12:
			navIndex = 2;
			break;
		// The third six images
		case imgIndex > 12 && imgIndex <= 18:
			navIndex = 3;
			break;
		// The last images, with wiggle room between 18 and 24 images
		case imgIndex > 18 && imgIndex <= icons.length:
			navIndex = 4;
			break;
	}

	// Call the showNav function to display the correct set of icons based on
	// the navigation index
	showNav(navIndex);

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

//
function showNav(n) {
	var icons = document.getElementsByClassName("gallery-icon");

	// Loop back to the first icon set when clicking next on the last set
	if (n > Math.ceil(icons.length / 6)) {navIndex = 1;}

	// Loop forward to the last icon set when clicking prev on the first set
	if (n < 1) {navIndex = Math.ceil(icons.length / 6);}

	// Set the display value for each icon to "none"
	for (i = 0; i < icons.length; i++) {
		icons[i].style.display = "none";
	}

	// Determine which set of six icons needs to be displayed and display them
	switch (navIndex) {
		// The first six images
		case 1:
			for (i = 0; i < 6; i++) {
				icons[i].style.display = "inline-block";
			}
			break;
		// The second six or last few images
		case 2:
			if (icons.length > 12) {
				for (i = 6; i < 12; i++) {
					icons[i].style.display = "inline-block";
				}
			} else {
				for (i = 6; i < icons.length; i++) {
					icons[i].style.display = "inline-block";
				}
			}
			break;
		// The third six or last few images
		case 3:
			if (icons.length > 18) {
				for (i = 12; i < 18; i++) {
					icons[i].style.display = "inline-block";
				}
			} else {
				for (i = 12; i < icons.length; i++) {
					icons[i].style.display = "inline-block";
				}
			}
			break;
		// The last images, with wiggle room between 18 and 24 images
		case 4:
			for (i = 18; i < icons.length; i++) {
				icons[i].style.display = "inline-block";
			}
			break;
	}
}

//document.getElementById("tab-1").click();