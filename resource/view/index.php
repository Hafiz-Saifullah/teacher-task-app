<?php
session_start();
include('includes/header.php');
if($_SESSION['islogin']){
    header('location:?n=home');
}
?>
<div class="content">
<div id="bg"></div>

<form style="top: 123px;left: 487px;" action="?n=loginAccept" method="POST">
    <span class="error"><?php echo isset($_SESSION['error']) ? $_SESSION['error'] :''; ?></span>
  <div class="form-field email">
    <input type="text" name="email" placeholder="Email / Username" required/>
  </div>
  
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