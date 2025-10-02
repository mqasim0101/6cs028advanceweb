<!-- app/Views/index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AJAX Example</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<button id="loadClients">Load Clients</button>
<div id="clientList"></div>

<script>
    $(document).ready(function() {
        $('#loadClients').click(function() {
            $.ajax({
                url: '<?= base_url('client/fetchClients') ?>',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    let clientList = '<ul>';
                    $.each(data, function(index, client) {
                        clientList += '<li>' + client.client_name + ' (' + client.client_email + ')</li>';
                    });
                    clientList += '</ul>';
                    $('#clientList').html(clientList);
                },
                error: function() {
                    alert('Error loading clients');
                }
            });
        });
    });
</script>

</body>
</html>