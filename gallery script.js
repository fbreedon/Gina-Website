var imgIndex = 1;
showImgs(imgIndex);

function plusImg(n) {
	showImgs(imgIndex += n);
}

function currentImg(n) {
	showImgs(imgIndex = n);
}

function showImgs(n) {
	var i;
	var x = document.getElementsByClassName("gallery-img");
	//var icons = document.getElementsByClassName("gallery-icon");

	// Loop back to the first image when clicking next on the last image
	if (n > x.length) {
		imgIndex = 1;
	}

	// Loop forward to the last image when clicking prev on the first image
	if (n < 1) {
		imgIndex = x.length;
	}

	// Set the css display value for each image to "none"
	for (i = 0; i < x.length; i++) {
		x[i].style.display = "none";
	}

	// Highlight the current image icon in the nav by replacing the html class
	/*for (i = 0; i < icons.length; i++) {
		icons[i].className = icons[i].className.replace();
	}*/

	// Set the current image's display value to "block"
	x[imgIndex-1].style.display = "block";
	// Set the current nav icon's class name to highlight
	//icons[imgIndex-1].className += "highlight";
}