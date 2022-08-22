<?php
session_start();
include('includes/header.php');

$month = isset($_GET['month']) ? $_GET['month'] : date('Y-m');
$next_month = date('Y-m', strtotime($month .' +1 month'));
$prev_month = date('Y-m', strtotime($month .' -1 month'));
$month_ = date('n', strtotime($month));
$year = date('Y', strtotime($month));
$totall_days_in_month=cal_days_in_month(CAL_GREGORIAN,$month_,$year);

$query_all_classes = "SELECT * FROM `class` ";
$get_classes = mysqli_query($con,$query_all_classes);
$get_classe = mysqli_query($con,$query_all_classes);
$first_class_id = mysqli_fetch_assoc($get_classe)['id'];


$user_id = isset($_SESSION['islogin']) ? $_SESSION['user_id'] : '';
$class_id = isset($_GET['class_id']) ? $_GET['class_id'] : $first_class_id;


$query_tasks = "SELECT * FROM `task` WHERE class_id = '".$class_id."'  AND date like '%".$month."%'";
$run_query_tasks = mysqli_query($con,$query_tasks);

$task_arr = array();
while ($row = mysqli_fetch_assoc($run_query_tasks)){
    $query_user = "SELECT * FROM `user` WHERE  `id` ='".$row['user_id']."'";
    $run_query_user = mysqli_query($con,$query_user);
    $row_user = mysqli_fetch_assoc($run_query_user);
    $row["user"] =  $row_user;
    $task_arr[$row['date']] = $row;
  
}
?>
<div class="content">
    <div class="top-header">
    <div class="header">
        <a href="#default" class="logo">
            <?php
            if(isset($_SESSION['islogin'])){
                echo $_SESSION['email'];
            }else{
                echo 'Class Name';
            }
            ?>

        </a>
      
        <div class="header-right">
            <form>
            <div class="form-field">
                <select onchange="location = this.value;">
                    <option  disabled>Select Class</option>
                    <?php while ($row = mysqli_fetch_assoc($get_classes)){
                        ?>
                        <option <?php echo (isset($_GET['class_id']) && $_GET['class_id'] == $row['id'])? 'selected':'';?>  value="?n=home&month=<?php echo $month; ?>&class_id=<?php echo $row['id']; ?>"><?php echo $row['class_name']; ?></option>
                        <?php
                    }?>
                </select>
            </div>
            </form>
            <a href="?n=home&month=<?php echo $prev_month; ?>&class_id=<?php echo $class_id; ?>">Prev</a>
            <a href="?n=home&month=<?php echo $next_month; ?>&class_id=<?php echo $class_id; ?>">Next</a>
        </div>
        <h2><?php echo $month; ?></h2>
        </div>
    </div>
    <div class="cards">
        <?php for($i = 1; $i <= $totall_days_in_month; $i++):?>
            <?php 
                $date = $month.'-'.$i;
                $date = date('Y-m-d', strtotime($date));
                $day = date('D', strtotime($date));
                $weeklyoff_days = ['Sun','Sat'];
                $off_days = [];
//                weeked
                if(in_array($day,$weeklyoff_days) && $date != date('Y-m-d') && !in_array($date,$off_days)){
                ?>
                 <div class="card" style='background: red;
                         color: white;'>
                    <div class="container">
                        <span><?php echo $i .' '.$day; ?></span>
                        <p>Weeked</p>
                    
                        
                    </div>
                </div>
                    <?php
//today
                }else if(!in_array($day,$weeklyoff_days) && $date == date('Y-m-d') && !in_array($date,$off_days)){
                    ?>
                    <div class="card" style='background: gray;
                         color: white;'>
                        <div class="container">
                            <span style="float: left;"><?php echo ($date == date('Y-m-d')) ? "Today":$i .' '.$day; ?></span>
                            <?php
                            if((isset($_SESSION['islogin']) && empty($task_arr[$date]))  || $user_id == $task_arr[$date]['user_id']){
                                ?>
                                 <span style="float: right;font-size: 25px;cursor: pointer;" onclick="addTask(<?php echo (int)(!empty($task_arr[$date])) ? $task_arr[$date]['id']:0; ?>,<?php echo $user_id; ?>,<?php echo $class_id; ?>,'<?php echo (int)(!empty($task_arr[$date])) ? $task_arr[$date]['dis']:''; ?>','<?php echo $date; ?>')">+</span>
                                 <?php
                             }
                             ?>
     
                             <p style="margin-top: 23px;"> <?php  echo (!empty($task_arr[$date])) ? $task_arr[$date]['dis']:'Add task info';  ?></p>
                             <h4 ><b><?php echo (!empty($task_arr[$date])) ? $task_arr[$date]['user']['email']:'Teacher Name'; ?></b></h4>

                        </div>
                    </div>
                    <?php
//weeked and today
                    }else if(in_array($day,$weeklyoff_days) && $date == date('Y-m-d') && !in_array($date,$off_days)){
                    ?>
                    <div class="card" style='background: #47AB11;
                         color: white;'>

                    <div class="container">
                        <span><?php echo $i .' '.$day; ?></span>
                        <p>Weeked And Today</p>
                    
                        
                    </div>
                </div>

                   
                <?php
//                    public off
                }else if(!in_array($day,$weeklyoff_days) && $date != date('Y-m-d') && in_array($date,$off_days)){
                ?>
                <div class="card" style='background: red;
                         color: white;'>
                    <div class="container">
                        <span><?php echo ($date == date('Y-m-d')) ? "Today":$i .' '.$day; ?></span>
                        <p>Off Day</p> 
                    
                        
                    </div>
                </div>
                <?php
//                    other days
                }else{
                    ?>
                    <div class="card">
                    <div class="container">
                        <span style="float: left;"><?php echo ($date == date('Y-m-d')) ? "Today":$i .' '.$day; ?></span>
                        <?php
                      
                        if((isset($_SESSION['islogin']) && empty($task_arr[$date]))  || (isset($_SESSION['islogin']) && $user_id == $task_arr[$date]['user_id'])){
                           ?>
                            <span style="float: right;font-size: 25px;cursor: pointer;" onclick="addTask(<?php echo (int)(!empty($task_arr[$date])) ? $task_arr[$date]['id']:0; ?>,<?php echo $user_id; ?>,<?php echo $class_id; ?>,'<?php echo (int)(!empty($task_arr[$date])) ? $task_arr[$date]['dis']:''; ?>','<?php echo $date; ?>')">+</span>
                            <?php
                        }
                        ?>

                        <p style="margin-top: 23px;"> <?php  echo (!empty($task_arr[$date])) ? $task_arr[$date]['dis']:'Add task info';  ?></p>
                        <h4 ><b><?php echo (!empty($task_arr[$date])) ? $task_arr[$date]['user']['email']:'Teacher Name'; ?></b></h4>
                    </div>
                </div>
                
                    <?php
                }
                ?>
               
        <?php endfor;?>
    </div>

    </div>
    
</div>
<script>
    function  addTask(task_id,user_id,class_id,dis,dates){
    var htmlbody = '';
   
    htmlbody = htmlbody + '<form class="modal-content animate" action="?n=addtask" method="post">';
    htmlbody = htmlbody + '<div class="imgcontainer">';
    htmlbody = htmlbody + '<span onclick="cloneModel();" class="close" title="Close Modal">&times;</span>';
    htmlbody = htmlbody + '</div>';
    htmlbody = htmlbody + '<input type="hidden"  name="task_id" value="'+task_id+'" >';
    htmlbody = htmlbody + '<input type="hidden"  name="user_id" value="'+user_id+'" >';
    htmlbody = htmlbody + '<input type="hidden" name="class_id" value="'+class_id+'" >';
    htmlbody = htmlbody + '<input type="hidden"  name="date" value="'+dates+'" >';
    htmlbody = htmlbody + '<div class="container form-html" style=" display: flex;flex-direction: column;">';
    htmlbody = htmlbody + '<label for="task"><b>Enter your task</b></label>';
    htmlbody = htmlbody + '<textarea name="task" id="" cols="30" rows="10">'+dis+'</textarea>';       
    htmlbody = htmlbody + '<button type="submit">Save</button>';
      
    htmlbody = htmlbody+ '</div>';
    htmlbody = htmlbody+ '</form>';
//   console.log(htmlbody);
  document.getElementById('id01').innerHTML = htmlbody;
  document.getElementById('id01').style.display = 'block';
}
</script>
<?php

include('includes/footer.php')
?>