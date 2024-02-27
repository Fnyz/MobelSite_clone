import './bootstrap';

$(document).ready(function() {
    // When a file is selected
    $('#image').change(function() {
        var input = this;

        // Check if any file is selected
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            // When file is read
            reader.onload = function(e) {
                $('#imagePreview').attr('src', e.target.result).show();
            };

            // Read the selected file as Data URL
            reader.readAsDataURL(input.files[0]);
        }
    });

    $('#Product__create').submit(function(event) {
        // Prevent default form submission
        event.preventDefault();

        var formData = new FormData($(this)[0]);
   

        $.ajax({
            url: '/create', 
            type: 'POST',
            data: formData,
            processData: false,  
            contentType: false,  
            success: function(response) {
             
                alert('Post created successfully!');
            
            },
            error: function(xhr, status, error) {
                // Handle errors
                console.error(xhr.responseText);
            }
        });
    });










});
