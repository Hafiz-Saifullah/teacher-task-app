<script> let data = []; </script>
<?php
session_start();
include(dirname(__DIR__).'/includes/header.php');




$user_id = isset($_SESSION['islogin']) ? $_SESSION['user_id'] : '';



$query_teachers = "SELECT * FROM `user` WHERE id != 1";
$run_query_teachers = mysqli_query($con,$query_teachers);

$query_roles = "SELECT * FROM `role`";
$run_query_roles = mysqli_query($con,$query_roles);

?>

<?php while ($row = mysqli_fetch_assoc($run_query_roles)){  ?>
<script> data = [...data,<?php echo json_encode($row)?>]; </script>
<?php } ?>
<div class="content">
    <div class="top-header">
    <div class="header">
        <a href="#default" class="logo">
            <?php
            
                echo 'Teachers';
            
            ?>

        </a>
      
        <div class="header-right">
            
              <button onclick="addTeacher('Teacher Name',0)">Add New</button>
            
        </div>
        </div>
    </div>
    <div class="cards">

                <?php while ($row = mysqli_fetch_assoc($run_query_teachers)){
                        ?>
                        <div class="card" style='background: gray;
                         color: white;'>
                        <div class="container">
                            <span style="float: left;"><?php echo $row['id']; ?></span>
                           
                                <span style="float: right;font-size: 25px;cursor: pointer;">
                                 <a href="javascript:void(0)" onclick="addTeacher('<?php echo $row['email']; ?>',<?php echo $row['id']; ?>)">edit</a>
                                 <a href="?n=delteacher&id=<?php echo $row['id']; ?>">delete</a>
                                </span>

                            <h4 style="margin-top: 23px;"><b><?php echo $row['email']; ?></b></h4>
                             <p>
                                view
                             </p>
                            

                        </div>
                    </div>
                        <?php
                    }?>
                 
                   


                    
                   
    </div>

    </div>
    
</div>
<script>
    // console.log(data);
    function  addTeacher(name,id){
    var htmlbody = '';
   
    htmlbody = htmlbody + '<form class="modal-content animate" action="?n=addteacher" method="post">';
    htmlbody = htmlbody + '<div class="imgcontainer">';
    
    htmlbody = htmlbody + '</div>';
    htmlbody = htmlbody + '<div class="container form-html" style=" display: flex;flex-direction: column;">';
    htmlbody = htmlbody + '<input type="hidden"  name="id" value="'+id+'" >';
    htmlbody = htmlbody + '<input type="text" name="name" id="" value="'+name+'" required>'; 
    htmlbody = htmlbody + '<input type="password" name="pass" placeholder="Password" required>'; 
    htmlbody = htmlbody + '<div class="form-field">';
    htmlbody = htmlbody + '<select name="role_id" required>'; 
    htmlbody = htmlbody + '<option selected disabled value="">Select Role</option>'; 
    htmlbody = htmlbody + '<option value="1">Admin</option>'; 
    htmlbody = htmlbody + '<option value="2">Teacher</option>'; 
    htmlbody = htmlbody + '</select>';      
    htmlbody = htmlbody + '</div>'; 
    htmlbody = htmlbody + '<button type="submit">Save</button>';
      
    htmlbody = htmlbody+ '</div>';
    htmlbody = htmlbody+ '</form>';
//   console.log(htmlbody);
  document.getElementById('id01').innerHTML = htmlbody;
  document.getElementById('id01').style.display = 'block';
}
</script>
<?php

include(dirname(__DIR__).'/includes/footer.php')
?>