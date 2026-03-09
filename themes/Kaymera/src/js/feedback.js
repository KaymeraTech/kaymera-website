document.addEventListener('submit', function(event) {
    var form = event.target;
    
    // Check if the submitted form is one of our contact forms
    if (form.id === 'contactform' || form.id === 'contactformModal') {
        
        event.preventDefault(); // KEEP THIS to stop page reload and let HubSpot work

        // --- NEW LOGIC START ---
        var responseDiv = form.querySelector('.response');
        var submitButton = form.querySelector('[type="submit"]');
        
        var successMessage = "Thank you! We've received your inquiry and will be in touch shortly.";

        // 1. Display the success message
        if (responseDiv) {
            // Restore button and write message to the div
            responseDiv.innerHTML = '<span style="color:#00e676; font-weight:bold;">' + successMessage + '</span>';
            responseDiv.style.display = 'block';
        }

        // 2. Clear the input fields for a clean form state
        form.reset(); 

        // 3. Optional: Re-enable and reset the button text if it was disabled (Good practice)
        if (submitButton) {
            submitButton.disabled = false;
            // Assuming your button text is defined by ACF, you may need a separate line 
            // to reset the text if you implemented a "Please wait..." state.
            // submitButton.querySelector('.mdc-button__label').innerHTML = 'Contact now'; 
        }
        // --- NEW LOGIC END ---
    }
});

