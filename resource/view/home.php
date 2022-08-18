<?php
include('includes/header.php');

$month = isset($_GET['month']) ? $_GET['month'] : date('Y-m');
$next_month = date('Y-m', strtotime($month .' +1 month'));
$prev_month = date('Y-m', strtotime($month .' -1 month'));
$month_ = date('n', strtotime($month));
$year = date('Y', strtotime($month));
$totall_days_in_month=cal_days_in_month(CAL_GREGORIAN,$month_,$year);


?>
<div class="content">
    <div class="top-header">
    <div class="header">
        <a href="#default" class="logo">Class Name</a>
        <div class="header-right">
            <form>
            <div class="form-field">
                <select>
                    <option>Select Class</option>
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
                if(in_array($day,$weeklyoff_days)){
                ?>
                 <div class="card" style='background: red;
                         color: white;'>
                    <div class="container">
                        <span><?php echo $i .' '.$day; ?></span>
                        <p>Off Day</p> 
                    
                        
                    </div>
                </div>
                <?php 
                }else if(in_array($date,$off_days)){
                ?>
                <div class="card" style='background: red;
                         color: white;'>
                    <div class="container">
                        <span><?php echo $i .' '.$day; ?></span>
                        <p>Off Day</p> 
                    
                        
                    </div>
                </div>
                <?php 
                }else{
                    ?>
                    <div class="card">
                    <div class="container">
                        <span><?php echo $i .' '.$day ?></span>
                        <p>Interior Designer</p> 
                        <h4><b>Teacher Name</b></h4> 
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