// Get the modal element
var modal = document.getElementById("bookingModal");

// Get the button that opens the modal
var btn = document.querySelector(".hotel-details button");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// Function to open the modal
function openBookingForm() {
    modal.style.display = "block";
}

// Function to close the modal
function closeBookingForm() {
    modal.style.display = "none";
}

// When the user clicks on the button, open the modal
btn.onclick = function() {
    openBookingForm();
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    closeBookingForm();
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        closeBookingForm();
    }
}
