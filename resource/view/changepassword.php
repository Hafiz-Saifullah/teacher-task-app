<?php
session_start();
include('includes/header.php');
if(!isset($_SESSION['islogin'])){
    header('location:?n=login');
}
?>
<div class="content">
<div id="bg"></div>

<form style="top: 123px;left: 487px;" action="?n=changepassword" method="POST">
    <span class="error"><?php echo isset($_SESSION['error']) ? $_SESSION['error'] :''; ?></span>
  
  <div class="form-field password">
    <input type="password" name="pass" placeholder="Password" required/>              
           </div>
  
  <div class="form-field">
    <button class="btn" type="submit">Log in</button>
  </div>
</form>

</div>
<?php
include('includes/footer.php')
?>