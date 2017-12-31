<?php
  require_once('db_connect.php');

  if(isset($_POST['submit'])) {
    if(!isset($_POST['name'], $_POST['status'], $_POST['email'], $_POST['pass'], $_POST['pass2'], $_POST['terms'])) {
      die('You did not complete all of the required fields');
    }
    $usercheck = mysqli_real_escape_string($conn, $_POST['email']);
    $check = mysqli_query($conn, "SELECT email FROM users WHERE email='$usercheck'");
    $check2 = mysqli_num_rows($check);
    if($check2 != 0) {
      die('Sorry, the email '.$_POST['email'].' is already in use.');
    }
    if($_POST['pass'] != $_POST['pass2']) {
      die('Your passwords did not match.');
    }
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['pass']);
    $insert = "INSERT INTO users (email, name, status, password, member_since) VALUES ('" . $email . "', '" . mysqli_real_escape_string($conn, $_POST['name']) . "', '" . mysqli_real_escape_string($conn, $_POST['status']) . "', '" . $password . "', CURDATE())";
    $add = mysqli_query($conn, $insert);
?>
<h1>Registered</h1>
<p>Thank you, you have registered - you may now login</a>.</p>
<?php
  } else {
?>
<div id="register_box">
  <div style="background-color: #4C70A0; color: white;">Registration</div>
  <h1 style="text-align: center;">[ Register ]</h1>
  <p style="margin: auto; width: 90%;">
  <br />
To register for thefacebook.com, just fill in the four fields below. You will have a chance to enter additional information and submit a picture once you have registered.
  </p>

  <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <table>
      <tr>
        <td>Name </td>
        <td><input type="text" name="name" /></td>
      </tr>
      <tr>
        <td>Status </td>
        <td>
          <select name="status">
            <option></option>
            <option value="Student">Student</option>
            <option value="Alumnus">Alumnus/Alumna</option>
            <option value="Faculty">Faculty</option>
            <option value="Staff">Staff</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>Email: </td>
        <td><input type="text" name="email" /></td>
      </tr>
      <tr>
        <td style="width: 150px;">Password*: (not afs)</td><td><input type="password" name="pass" maxlegnth="10"></td>
      </tr>
      <tr>
        <td style="width: 150px;">Confirm Password </td><td><input type="password" name="pass2" maxlegnth="10"></td>
      </tr>
    </table>
    <div id="register_box_info">
      <p id="register_links">
        <input type="checkbox" name="terms"/>I have read and understood the <a href="terms.php">Terms of Use</a>, and I agree to them.
      </p>
      <p>
      * You can choose any password. It does not have to be, and should not be, your AFS password.
      </p>
      <div id="fb_button" style="text-align: center;"><input type="submit" name="submit" value="Register Now!" /></div>
      </div>
  </form>
</div>
<?php 
  }
?>