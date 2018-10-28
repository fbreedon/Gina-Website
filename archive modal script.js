function openModal() {
	document.getElementById('modal').style.display = "block";
}

function closeModal() {
	document.getElementById('modal').style.display = "none";
}

var modalIndex = 1;
showModal(modalIndex);

function plusModal(n) {
	showModal(modalIndex += n);
}

function currentModal(n) {
	showModal(modalIndex = n);
}

function showModal(n) {
	var i;
	var images = document.getElementsByClassName("modal-img");
	var captionText = document.getElementsByClassName("info");

	if (n > images.length) {modalIndex = 1;}
	if (n < 1) {modalIndex = images.length;}

	for (i = 0; i < images.length; i++) {
		images[i].style.display = "none";
	}

	for (i = 0; i < captionText.length; i++) {
		captionText[i].style.display = "none";
	}

	images[modalIndex-1].style.display = "block";
	captionText[modalIndex-1].style.display = "block";
}