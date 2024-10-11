<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/welcome.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="container-fluid m-0 p-3">
        <div class="chatbot-header">
            <span class="bot-name">CHATBOT</span>
        </div>
        <div id="content-box" class="p-2">
            {{-- output --}}
        </div>
        <div class="chat-input p-2">
            <input type="text" id="input" placeholder="Type a message...">
            <button id="button-submit" class="btn">SEND</button>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.3.js"></script>
    <script>
        //setup csrf token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#button-submit').on('click',function() {
            var value = $('#input').val();
        

        $('#content-box').append(`<div class="user-message float-right">` + value + `</div> <div style="clear: both;"></div>`);
        $('#input').val('');
        $.ajax({
            url: '/send',
            method: 'POST',
            data: {
                'input': value
            },
            success: function(response) {
                $('#content-box').append(`<div class="bot-message float-left"><img src="" alt="bot">${response}</div> <div style="clear: both;"></div>`);
                $('#content-box').scrollTop($('#content-box')[0].scrollHeight);
            }
        });
    });
    </script>
</body>

</html>
