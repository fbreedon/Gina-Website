// Function to open the modal when clicking an image
function openModal() {
	document.getElementById('modal').style.display = "block";
}

// Function to close the modal when clicking the close button
function closeModal() {
	document.getElementById('modal').style.display = "none";
}

// Set the index for the images and call the show function
var modalIndex = 1;
showModal(modalIndex);

// Take in an integer and increase the image index that many times
// Used to scroll through the images
function plusModal(n) {
	showModal(modalIndex += n);
}

// Take in an integer and set the image index equal to it
// Used to open the modal at a specific image
function currentModal(n) {
	showModal(modalIndex = n);
}

// Take in an integer, set variables for the images and info, set the image
// index, clear the images and info, then set the correct image and info to show
function showModal(n) {
	var i;
	var images = document.getElementsByClassName("modal-img");
	var captionText = document.getElementsByClassName("info");

	// Loop back to the first or last image when at either end of the modal
	if (n > images.length) {modalIndex = 1;}
	if (n < 1) {modalIndex = images.length;}

	// Set the display value for each image to "none"
	for (i = 0; i < images.length; i++) {
		images[i].style.display = "none";
	}

	// Check that there is info, and set the display value for each info to "none"
	if(captionText.length > 0) {
		for (i = 0; i < captionText.length; i++) {
			captionText[i].style.display = "none";
		}
	}

	// Set the current image's display value to "block"
	images[modalIndex-1].style.display = "block";
	// Check that there is info, and set the current image's info display value to "block"
	if(captionText.length > 0) {captionText[modalIndex-1].style.display = "block";}
}