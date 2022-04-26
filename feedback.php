<!DOCTYPE html>
<html>
<head>
    <title>Send an Email</title>
</head>
<body>
<link rel="stylesheet" type="text/css" href="f.css">
  <center>
    <h4 class="sent-notification"></h4>
    <form id="myForm">
      <h2>Send an Email</h2>
      <label>Email</label>
      <input id="email" type="text" placeholder="Enter Email">
      <br><br>
      
        <label>Name</label>
      <input id="name" type="text" placeholder="Enter Name">
      <br><br>

      <label>Subject</label>
      <input id="subject" type="text" placeholder=" Enter Subject"> 
      <br><br>

      <p>Message</p>
      <textarea id="body" rows="5" placeholder="Type Message"></textarea>
      <br><br>

      <button type="button" onclick="sendEmail()" value="Send An Email" class="button">Отправить</button> 
    </form>
  </center>

	<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
        function sendEmail() {
            var email = $("#email");
                  var name = $("#name");
            var subject = $("#subject");
            var body = $("#body");

            if (isNotEmpty(email) && isNotEmpty(name) && isNotEmpty(subject) && isNotEmpty(body)) {
                $.ajax({
                   url: 'sendEmail.php',
                   method: 'POST',
                   dataType: 'json',
                   data: {
                       email: email.val(),
                             name: name.val(),
                       subject: subject.val(),
                       body: body.val()
                   }, success: function (response) {
                        $('#myForm')[0].reset();
                        $('.sent-notification').text("Message Sent Successfully.");
                   }
                });
            }
        }
        function isNotEmpty(caller) {
            if (caller.val() == "") {
                caller.css('border', '1px solid red');
                return false;
            } else
                caller.css('border', '');

            return true;
        }
    </script>

</body>
</html>