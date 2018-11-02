var collapse = document.getElementsByClassName("collapsible");
var i;

// For each element with the collapsible class, listen for one to be
// clicked, then toggle it to open or close
for (i = 0; i < collapse.length; i++) {
	// Listen for one of the collapsible elements to be clicked
  	collapse[i].addEventListener("click", function() {
  		// Set the element to be active or inactive
    	this.classList.toggle("active");
    	// Get the element's next sibling, which is the paragraph text
    	var content = this.nextElementSibling;
    	// If the text is already displayed, hide it
    	if (content.style.display === "block") {
    	  	content.style.display = "none";
    	// Otherwise, show the text
    	} else {
      		content.style.display = "block";
    	}
  	});
}