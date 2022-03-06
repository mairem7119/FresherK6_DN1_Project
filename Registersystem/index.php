<!DOCTYPE html>
<html>

<head>
  <title>Registration</title>
  <link rel="stylesheet" href="css/style.css">
  <script src="js/jquery.js"></script>
</head>

<body>
  <div class="container">
    <div class="header">
      <h2>System</h2>
    </div>

    <form method="post" autocomplete="off" id="form">
      <?php include('config.php'); ?>
      <div class="body">
        <h1 id="txt_title" style="color: darkblue; text-align: center; padding-top: 60px;">REGISTER USER</h1>

        <div class="input-group">
          <label>Name: </label>
          <input type="text" name="username" id="username">

        </div>
        <div class="input-group">
          <label>Email: </label>
          <input type="email" name="email" id="email">

        </div>
        <div class="input-group">
          <label>Password: </label>
          <input type="password" name="password_1" id="password_1">
        </div>
        <div class="input-group">
          <label>Confirm password: </label>
          <input type="password" name="password_2" id="password_2">
        </div>
        <div class="input-group">
          <button type="reset" class="btn" name="reg_user">Clear</button>
          <button type="submit" class="btn" name="reg_user" id="reg_user">Register</button>
        </div>
        <div id="message"></div>
      </div>
    </form>
    <div class="footer">
      <h3>All Rights Reserved</h3>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      $("#reg_user").click(function(e) {
        e.preventDefault();
        var username = $("#username").val();
        var email = $("#email").val();
        var password = $("#password_1").val();
        var cfmpassword = $("#password_2").val();
        if ($.trim(username) == "") {
          alert("Enter your username!");
          return false;
        }
        if ($.trim(email) == "") {
          alert("Enter your email!");
          return false;
        }
        if ($.trim(password) == "") {
          alert("Enter your password!");
          return false;
        }
        if ($.trim(cfmpassword) == "") {
          alert("Enter Confirm password!");
          return false;
        }

        var form = $("#form").serialize();
        $.ajax({
          url: "errors.php",
          type: "POST",
          data: form,
          success: function(data) {
            if (data.indexOf("SUCCESS") > -1) {
              window.location.href = "Outpage.php";
            } else {
              alert(data);
            }
          }
        })
      });
    });
  </script>

</body>

</html>