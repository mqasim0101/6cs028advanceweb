$(document).ready(function() {
    $('#myForm').on('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        $.ajax({
            url: 'your-server-side-script.php', // Change this to your server-side script
            type: 'POST',
            data: $(this).serialize(), // Serialize form data
            success: function(response) {
                $('#response').html(response); // Display the response
            },
            error: function(xhr, status, error) {
                $('#response').html('An error occurred: ' + error);
            }
        });
    });
});