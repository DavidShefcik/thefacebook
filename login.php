<?php
  require('db_connect.php');
  // Check if cookie is set to log user in
  if(isset($_COOKIE['id_my_site'])) {
    $email = $_COOKIE['id_my_site'];
    $pass = $_COOKIE['key_my_site'];
    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$pass'";
    $check = mysqli_query($conn, $query);
    if($check) {
      while($info = mysqli_fetch_array($check)) {
        if($pass != $info['password']) {
          header("Location: login.php");
        } else {
          header("Location: profile.php?");
          exit;
        }
      }
    } else {
      echo "Failed!"; // Remove when done building
      die();
    }
  }
  // Login form has been submitted
  if(isset($_POST['submit'])) {
    if(empty($_POST['email']) || empty($_POST['pass'])) {
      die('<div style="margin-top: 50px; text-align: center;">You did not fill in a required field.</div>');
    }
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);
    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$pass'";
    $check = mysqli_query($conn, $query);
    $check2 = mysqli_num_rows($check);
    if($check2 == 0) {
      die('<div style="text-align: center; margin-top: 50px;">That user does not exist in our database. </div>');
    }
    while($info = mysqli_fetch_array($check)) {
      $hour = time() + 3600;
      setcookie('id_my_site', $_POST['email'], $hour);
      setcookie('key_my_site', $_POST['pass'], $hour);
      setcookie('current_user_id', $info['id'], $hour);
      header('Location: profile.php?uid=' . $info['id']);
      exit;
    }
  }
?>
<?php include 'head_data.php'; ?>
  <body>
    <div id="content">
    <?php include 'header.php'; ?>

<div id="login_page_box">
 <div style="background-color: #4C70A0; color: white;">Thefacebook Login </div>
  <h1 style="text-align: center;">[ Login ] </h1>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">

  <table>

   <tr>
    <td style="width: 60px;">Email: </td>
    <td><input type="text" name="email" /></td>
   </tr>
   <tr>
    <td>Password: </td>
    <td><input type="password" name="pass" /></td>
    </tr>
  </table>

  <table id="login_page_links">
   <tr>
     <td style="text-align: right; padding-right: 5px;"><div id="fb_button"><input type="submit" name="submit" value="Login" /></div></td>
   <td style="text-align: left; padding-left: 5px;">&nbsp;</td>
   </tr>
   <tr>
    <td colspan="2">
 <br />
If you have forgotten your password, click <a href="reset.php">here</a> to reset it.
    </td>
   </tr>
  </table>

 </form>
</div>

<div id="footer">

 <p>
   <a href="about_us.php">about</a> &nbsp;
   <a href="contact.php">contact</a> &nbsp;
   <a href="faq.php">faq</a> &nbsp;
   <a href="terms.php">terms</a> &nbsp;
   <a href="privacy.php">privacy</a> &nbsp;
   <br />
   a Mark Zuckerberg production
   <br />
   Thefacebook &copy; 2004
 </p>
</div>
