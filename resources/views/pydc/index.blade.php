<!DOCTYPE html>
<html>
<head>
    <title>Chatbox</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Simple Chatbox</h1>
        <div id="chatbox">
            <!-- Chat messages will be displayed here -->
        </div>
        <form id="message-form">
            <input type="text" id="message" class="form-control" placeholder="Type your message...">
            <button type="submit" class="btn btn-primary mt-2">Send</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function(){
            // AJAX request to load chat messages
            $.get("/api/messages", function(data){
                $('#chatbox').html(data);
            });

            // Submit message form via AJAX
            $('#message-form').submit(function(e){
                e.preventDefault();
                var message = $('#message').val();
                $.post("/api/messages", {message: message}, function(data){
                    $('#chatbox').html(data);
                    $('#message').val('');
                });
            });
        });
    </script>
</body>
</html>
