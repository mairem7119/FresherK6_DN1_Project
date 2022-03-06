<!DOCTYPE html>
<html>

<head>
  <title>Login</title>
  <link rel="stylesheet" href="css/login.css">

  <script src="js/jquery.js"></script>
</head>

<body>
  <div class="container">
    <div class="header">
      <h2>System</h2>
    </div>

    <form id="frm" method="post">

      <div class="body">
        <h1 id="txt_title" style="color: darkblue; text-align: center; padding-top: 180px;">LOGIN</h1>

        <div class="input-group1">
          <label>Email: </label>
          <input type="email" name="email" id="email">
        </div>
        <div class="input-group1">
          <label>Password: </label>
          <input type="password" name="password" id="password">
        </div>

        <div class="input-group1">
          <a href="home.php"><button type="button" class="btn1" name="hombtn">Home</button></a>
          <button type="submit" class="btn1" name="loginbtn" id="loginInp">Login</button>
        </div>

        <div class ="gotoRegister" style="padding-top: 20px;">Already registed?
          <a href="index.php"> register here</a>
        </div>
      </div>

    </form>
    <div class="footer">
      <h3>All Rights Reserved</h3>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      $("#loginInp").click(function(e) {
        e.preventDefault();
        //====== Form Validation
        var email = $("#email").val();
        var password = $("#password").val();
        if ($.trim(email) == "") {
          alert("Enter your email");
          return false;
        }
        if ($.trim(password) == "") {
          alert("Enter your Password");
          return false;
        }
        //======= Submit form using AJAX
        var frm = $("#frm").serialize();
        $.ajax({
          url: "check_login.php",
          type: "post",
          data: frm,
          success: function(data) {
            if (data.indexOf("SUCCESS") > -1) {
              window.location.href = "home.php";
            } else {
              alert("Please check Email and Password.");
            }
          },
          error: function(err) {
            alert("Something Went Wrong");
          }
        })
      });
    });
  </script>

</body>

</html>