$(function (){

    $.ajaxSetup({
        headers:
        { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });


    $('#Set_position').submit(function(e) {
        e.preventDefault(); // Prevent the default form submission

        // Get the form data
        var formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: "/position/create", // Replace this with your form submission URL
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                // Handle the successful response
                alert(response.message);
                window.location.href = "/dashboard";
            },
            error: function(xhr, status, error) {
                // Handle errors
                console.error(xhr.responseText);
            }
        });
    });


})