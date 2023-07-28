<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Using Push.js to Display Web Browser Notifications</title>
</head>

<body>
    {{--
    <h1>Using Push.js to Display Web Browser Notifications</h1>
    <button class="request-button">Request permissions</button>
    <button class="show-button">Show notification</button>
    --}}
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"
    integrity="sha512-bnIvzh6FU75ZKxp0GXLH9bewza/OIw6dLVh9ICg0gogclmYGguQJWl8U30WpbsGTqbIiAwxTsbe76DErLq5EDQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/1.0.12/push.min.js"
    integrity="sha512-DjIQO7OxE8rKQrBLpVCk60Zu0mcFfNx2nVduB96yk5HS/poYZAkYu5fxpwXj3iet91Ezqq2TNN6cJh9Y5NtfWg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    const requestButton = document.querySelector(".request-button");
    const showButton = document.querySelector(".show-button");

    // function onGranted() {
    //     requestButton.style.background = "green";
    // }

    // function onDenied() {
    //     requestButton.style.background = "red";
    // }

    // requestButton.onclick = function() {
    //     Push.Permission.request(onGranted, onDenied);
    // }

    // showButton.onclick = function() {
        Push.create("Hello from Nguyen Trung Kien", {
            body: "This is a web notification !",
            icon: "{{asset('image/images/mttt.jpg')}}",
            timeout: 5000,
            onClick: function() {
                console.log(this);
            }
        });
    // };
</script>

</html>
