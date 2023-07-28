<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
      //   Pusher.logToConsole = true;

      let pusher = new Pusher('41632d5a8f20577491a8', {
        cluster: 'ap1'
      });
      console.log('pusher: ', pusher);

      let channel = pusher.subscribe('register-channel');
      console.log('channel: ', channel);
      channel.bind('register-event', function(data) {
         console.log('register-event: ', data);
        alert(JSON.stringify(data));
      });
    </script>
    <title>DEMO PUSHER REALTIME NOTIFICATION WITH PUSHER</title>
</head>

<body>

</body>

</html>
