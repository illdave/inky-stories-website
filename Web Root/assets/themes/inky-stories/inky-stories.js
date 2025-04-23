// Get the container element
var anchorlinkContainer = document.getElementById("anchor-list");

// Get all buttons with class="btn" inside the container
var anchorlinks = anchorlinkContainer.getElementsByClassName("anchor-link");

// Loop through the buttons and add the active class to the current/clicked button
for (var i = 0; i < anchorlinks.length; i++) {
	anchorlinks[i].addEventListener("click", function() {
		var current = document.getElementsByClassName("active");
		current[0].className = current[0].className.replace(" active", "");
		this.className += " active";
	});
}

