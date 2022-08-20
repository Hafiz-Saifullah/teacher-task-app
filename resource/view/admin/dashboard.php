<?php
session_start();
include(dirname(__DIR__).'/includes/header.php');
// echo dirname(__DIR__).'/includes/header.php';die;

$date = isset($_GET['month']) ? $_GET['month'] : date('Y-m-d');


// $query_all_classes = "SELECT * FROM `class` ";
// $get_classes = mysqli_query($con,$query_all_classes);

$month = isset($_GET['month']) ? $_GET['month'] : date('Y-m');

$user_id = isset($_SESSION['islogin']) ? $_SESSION['user_id'] : '';

$query_all_classes = "SELECT * FROM `class` ";
$get_classes = mysqli_query($con,$query_all_classes);

?>
<div class="content">
    <div class="top-header">
    <div class="header">
        <a href="#default" class="logo">
            <?php
            if($_SESSION['islogin']){
                echo $_SESSION['email'];
            }
            ?>

        </a>
      
        <div class="header-right">
            <form>
            <div class="form-field">
                <select onchange="location = this.value;">
                    <option selected disabled>Select Class</option>
                    <?php while ($row = mysqli_fetch_assoc($get_classes)){
                        ?>
                        <option <?php echo (isset($_GET['class_id']) && $_GET['class_id'] == $row['id'])? 'selected':'';?>  value="?n=home&month=<?php echo $month; ?>&class_id=<?php echo $row['id']; ?>"><?php echo $row['clas_name']; ?></option>
                        <?php
                    }?>
                </select>
            </div>
            </form>
            
        </div>
        <h2><?php echo $date; ?></h2>
        </div>
    </div>
    <div class="cards">
    <div class="card" style='background: gray;
                         color: white;'>
                        <div class="container">
                            <span style="float: left;">ytyi</span>
                           
                                 <span style="float: right;font-size: 25px;cursor: pointer;" onclick="addRole()">sjsnj</span>
     
                             <p style="margin-top: 23px;">name</p>
                             <h4 ><b>wjnqwjnwnj</b></h4>

                        </div>
                    </div>


                    
                    <div class="card" style='background: gray;
                         color: white;'>
                        <div class="container">
                            <span style="float: left;">ytyi</span>
                           
                                 <span style="float: right;font-size: 25px;cursor: pointer;" onclick="addRole()">sjsnj</span>
     
                             <p style="margin-top: 23px;">name</p>
                             <h4 ><b>wjnqwjnwnj</b></h4>

                        </div>
                    </div>

                    
                    <div class="card" style='background: gray;
                         color: white;'>
                        <div class="container">
                            <span style="float: left;">ytyi</span>
                           
                                 <span style="float: right;font-size: 25px;cursor: pointer;" onclick="addRole()">sjsnj</span>
     
                             <p style="margin-top: 23px;">name</p>
                             <h4 ><b>wjnqwjnwnj</b></h4>

                        </div>
                    </div>

                    
                    <div class="card" style='background: gray;
                         color: white;'>
                        <div class="container">
                            <span style="float: left;">ytyi</span>
                           
                                 <span style="float: right;font-size: 25px;cursor: pointer;" onclick="addRole()">sjsnj</span>
     
                             <p style="margin-top: 23px;">name</p>
                             <h4 ><b>wjnqwjnwnj</b></h4>

                        </div>
                    </div>

                    
                    <div class="card" style='background: gray;
                         color: white;'>
                        <div class="container">
                            <span style="float: left;">ytyi</span>
                           
                                 <span style="float: right;font-size: 25px;cursor: pointer;" onclick="addRole()">sjsnj</span>
     
                             <p style="margin-top: 23px;">name</p>
                             <h4 ><b>wjnqwjnwnj</b></h4>

                        </div>
                    </div>

                    
                    <div class="card" style='background: gray;
                         color: white;'>
                        <div class="container">
                            <span style="float: left;">ytyi</span>
                           
                                 <span style="float: right;font-size: 25px;cursor: pointer;" onclick="addRole()">sjsnj</span>
     
                             <p style="margin-top: 23px;">name</p>
                             <h4 ><b>wjnqwjnwnj</b></h4>

                        </div>
                    </div>

    </div>

    </div>
    
</div>

<?php

include(dirname(__DIR__).'/includes/footer.php')
?>