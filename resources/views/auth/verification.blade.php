<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Verification</title>
</head>

<body>

    <p id="message_error" style="color:red;"></p>
    <p id="message_success" style="color:green;"></p>
    <form method="post" id="verificationForm">
        @csrf
        <input type="hidden" name="email" value="{{ $email }}">
        <input type="number" name="otp" placeholder="Enter OTP" required>
        <br><br>
        <input type="submit" value="Verify">

    </form>

    <p class="time"></p>

    <button id="resendOtpVerification">Resend Verification OTP</button>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#verificationForm').submit(function(e) {
                e.preventDefault();

                var formData = $(this).serialize();
                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                console.log(formData);
                console.log(csrfToken);
                $.ajax({
                    url: "/verifiedOtp/",
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    data: formData,
                    success: function(res) {
                        if (res.success) {
                            alert(res.msg);
                            window.open("/", "_self");
                        } else {
                            $('#message_error').text(res.msg);
                            setTimeout(() => {
                                $('#message_error').text('');
                            }, 3000);
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error: ' + textStatus + ' ' + errorThrown);
                    }
                });
            });


            $('#resendOtpVerification').click(function() {
                $(this).text('Wait...');
                var userMail = @json($email);
                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url: "{{ route('resendOtp') }}",
                    method: "GET",
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    data: JSON.stringify({
                        email: userMail
                    }), // Chuyển đổi dữ liệu thành JSON string
                    success: function(res) {
                        $('#resendOtpVerification').text('Resend Verification OTP');
                        if (res.success) {
                            timer();
                            $('#message_success').text(res.msg);
                            setTimeout(() => {
                                $('#message_success').text('');
                            }, 3000);
                        } else {
                            $('#message_error').text(res.msg);
                            setTimeout(() => {
                                $('#message_error').text('');
                            }, 3000);
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error: ' + textStatus + ' ' + errorThrown);
                    }
                });

            });
        });

        function timer() {
            var seconds = 00;
            var minutes = 3;

            var timer = setInterval(() => {

                if (minutes < 0) {
                    $('.time').text('');
                    clearInterval(timer);
                } else {
                    let tempMinutes = minutes.toString().length > 1 ? minutes : '0' + minutes;
                    let tempSeconds = seconds.toString().length > 1 ? seconds : '0' + seconds;

                    $('.time').text(tempMinutes + ':' + tempSeconds);
                }

                if (seconds <= 0) {
                    minutes--;
                    seconds = 59;
                }

                seconds--;

            }, 1000);
        }

        timer();
    </script>

</body>

</html>