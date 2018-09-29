var modal = document.getElementsByClassName("archive-modal");

var img = document.getElementsByClassName("archive-img");
var modalImg = document.getElementsByClassName("modal-img");
var captionText = document.getElementById("modal-caption");
img.onclick = function() {
	modal.style.display = "block";
	modalImg.src = this.src;
	captionText.innerHTML = this.alt;
}

var span = document.getElementsByClassName("modal-close")[0];

span.onclick = function() {
	modal.style.display = "none";
}