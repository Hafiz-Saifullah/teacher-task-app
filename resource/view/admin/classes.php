<?php
session_start();
include(dirname(__DIR__).'/includes/header.php');




$user_id = isset($_SESSION['islogin']) ? $_SESSION['user_id'] : '';



$query_classes = "SELECT * FROM `class`";
$run_query_classes  = mysqli_query($con,$query_classes);

?>
<div class="content">
    <div class="top-header">
    <div class="header">
        <a href="#default" class="logo">
            <?php
            
                echo 'Classes';
            
            ?>

        </a>
      
        <div class="header-right">
                <button onclick="addClass('Class Name',0)">Add New</button>
        </div>
        </div>
    </div>
    <div class="cards">
            
    <?php while ($row = mysqli_fetch_assoc($run_query_classes)){
                        ?>
                        <div class="card" style='background: gray;
                         color: white;'>
                        <div class="container">
                            <span style="float: left;"><?php echo $row['id']; ?></span>
                           
                                <span style="float: right;font-size: 25px;cursor: pointer;">
                                 <a href="javascript:void(0)" onclick="addClass('<?php echo $row['class_name']; ?>',<?php echo $row['id']; ?>)">edit</a>
                                 <a href="?n=delclass&id=<?php echo $row['id']; ?>">delete</a>
                                </span>

                            <h4 style="margin-top: 23px;"><b><?php echo $row['class_name']; ?></b></h4>
                             <p>
                                <a style="color:aliceblue;cursor: pointer;" href="?n=home&class_id=<?php echo $row['id']; ?>">View</a>
                             </p>
                            

                        </div>
                    </div>
                        <?php
                    }?>
                 
                   
    </div>

    </div>
    
</div>
<script>
   function  addClass(name,id){
    var htmlbody = '';
   
    htmlbody = htmlbody + '<form class="modal-content animate" action="?n=addclass" method="post">';
    htmlbody = htmlbody + '<div class="imgcontainer">';
   
    htmlbody = htmlbody + '</div>';
    htmlbody = htmlbody + '<div class="container form-html" style=" display: flex;flex-direction: column;">';
    htmlbody = htmlbody + '<input type="hidden"  name="id" value="'+id+'" >';
    htmlbody = htmlbody + '<input type="text" name="name" id="" value="'+name+'" required>';       
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