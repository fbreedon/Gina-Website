var slideIndex = 0;
slideShow();

function slideShow() {
	// Define variables for the array index and get the slides from the html class label
	var i;
	var slides = document.getElementsByClassName("slide-img");

	// Set the display value for each slide to "none"
	for (i = 0; i < slides.length; i++) {
		slides[i].style.display = "none";
	}

	// Increment the slideshow
	slideIndex++;

	// Loop back to the first image after reaching the last image
	if (slideIndex > slides.length) {
		slideIndex = 1;
	}

	slides[slideIndex-1].style.display = "block";
	// Change the image every 4 seconds
	setTimeout(slideShow, 6000);
}