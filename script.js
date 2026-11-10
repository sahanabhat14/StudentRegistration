
$(document).ready(function() {

    // Fade in the registration form
    $(".container").hide().fadeIn(800);

    // Form validation
    $("#registrationForm").submit(function(event) {

        let phone = $("input[name='phone']").val();

        if (!/^[0-9]{10}$/.test(phone)) {
            alert("Please enter a valid 10-digit phone number.");
            event.preventDefault();
            return false;
        }

        return true;
    });

});
