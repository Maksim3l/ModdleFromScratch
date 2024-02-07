<!DOCTYPE html>
<head>
<link REL="Icon" href="icon.ico"> 
<title> Origami </title>
<meta name= "viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">

<link rel="stylesheet" href="css.css">

</head>
<style>


</style>
<body>
<div class ="container">
<div class ="header">
<button class="button" onclick="window.location.href='Home.php'">
 Home
</button>
<button class="button" onclick="window.location.href='Forum.php'">
 Forum
</button>
<button class="button" onclick="window.location.href='Contact.php'">
 Contact
</button>
<button class="button" onclick="window.location.href='Login.php'">
 Login
</button>
</div>
<div class ="left">
</br></br></br></br>
</br></br></br></br>
<h3> If you need to contact us, please do so immediately!!!</h3>
</div>
<div class ="right">
<center>
<form id="my form" action="" method="post">
    <h2>Send an Email</h2>

    <label>Name</label>
    <input id="name" type="text" placeholder="Enter Name" name="Name">
    <br><br>

    <label>Email</label>
    <input id="email" type="text" placeholder="Enter Email" name="Email">
    <br><br>

    <label>Subject</label>
    <input id="subject" type="text" placeholder=" Enter Subject" name="subject">
    <br><br>

    <p>Message</p>
    <textarea id="body" rows="7" placeholder="Type Message" name="message" ></textarea>
    <br><br>

    <button type="button" onclick="sendEmail()" value="Send An Email">Submit</button>
</form>
</center>
<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
        function sendEmail() {
            var name = $("#name");
            var email = $("#email");
            var subject = $("#subject");
            var body = $("#body");

            if (isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)) {
                $.ajax({
                   url: 'sendEmail.php',
                   method: 'POST',
                   dataType: 'json',
                   data: {
                       name: name.val(),
                       email: email.val(),
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

</div>
<div class ="leg">
"leg"
</div>
</div>
</body>
</html>