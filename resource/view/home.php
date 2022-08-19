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
$first_class_id = mysqli_fetch_assoc($get_classes)['id'];


$user_id = isset($_SESSION['islogin']) ? $_SESSION['user_id'] : '';
$class_id = isset($_GET['class_id']) ? $_GET['class_id'] : $first_class_id;

?>
<div class="content">
    <div class="top-header">
    <div class="header">
        <a href="#default" class="logo">
            <?php
            if($_SESSION['islogin']){
                echo $_SESSION['email'];
            }else{
                echo 'Class Name';
            }
            ?>

        </a>
        <div class="header-right">
            <form>
            <div class="form-field">
                <select>
                    <option>Select Class</option>
                    <?php while ($row = mysqli_fetch_assoc($first_class_id)){
                        ?>
                        <option value="?n=home&month=<?php echo $month; ?>">Select Class</option>
                        <?php
                    }?>
                </select>
            </div>
            </form>
            <a href="?n=home&month=<?php echo $prev_month; ?>">Prev</a>
            <a href="?n=home&month=<?php echo $next_month; ?>">Next</a>
        </div>
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
                    <div class="card" style='background: yellow;
                         color: white;'>
                        <div class="container">
                            <span style="float: left;"><?php echo ($date == date('Y-m-d')) ? "Today":$i .' '.$day; ?></span>
                            <?php
                            if($_SESSION['islogin']){
                                ?>
                                <span style="float: right;padding-bottom: 5px;font-size: 25px;">+</span>
                                <?php
                            }
                            ?>
                            <p style="float: right;">Today</p>
                            <h4 style="float: left;"><b>Teacher Name</b></h4>

                        </div>
                    </div>
                    <?php
//weeked and today
                    }else if(in_array($day,$weeklyoff_days) && $date == date('Y-m-d') && !in_array($date,$off_days)){
                    ?>
                    <div class="card" style='background: #47AB11;
                         color: white;'>
                        <div class="container">
                            <span><?php echo ($date == date('Y-m-d')) ? "Today":$i .' '.$day; ?></span>
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
                        if($_SESSION['islogin']){
                           ?>
                            <span style="float: right;padding-bottom: 5px;font-size: 25px;cursor: pointer;" onclick="addTask(<?php echo $user_id; ?>,<?php echo $class_id; ?>,<?php echo $date; ?>)">+</span>
                            <?php
                        }
                        ?>

                        <p style="float: right;"> ahdiuw jdhsiakundsikw jhsdbjahbhdj  DBAJSD XAHSBDUSA JBbdjsabchusab buasbjasbdhasbdasjdbh</p>
                        <h4 style="float: left;"><b>Teacher Name</b></h4>
                    </div>
                </div>
                
                    <?php
                }
                ?>
               
        <?php endfor;?>
    </div>

    </div>
    
</div>
<?php

include('includes/footer.php')
?>