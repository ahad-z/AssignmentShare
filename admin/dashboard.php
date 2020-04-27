<<<<<<< HEAD
<?php
require_once './dbcon.php';
if(!isset($_SESSION['user_login'])){
header('location:login.php');
    
}


?>

 <h1 class="text-primary"><i class="fa fa-dashboard"></i> Dashboard <small>Statistics Overview</small></h1>
<ol class="breadcrumb">
    <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
</ol>
                <?php 
                    $query = "SELECT faculty, count(*) as count FROM `file` GROUP BY `faculty`";
                    $result = mysqli_query($link , $query);
                   $count = [];

                    while ( $row = mysqli_fetch_assoc($result)) {
                        $count[$row['faculty']] = $row['count'];
                    }
                ?>
               


 <div class="row">
            <div class="col-sm-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-file fa-5x" aria-hidden="true"></i>
                            </div>
                            <div class="col-xs-9">
                                <div class="pull-right" style="font-size:30px">
                                   <!--  <?php
                                    // if(isset($count['cse'])){
                                    //     echo $count['cse'];
                                    // }else
                                    // {
                                    //     echo 0;
                                    // }


                                     ?> -->
                                    <?= isset($count['cse']) ? $count['cse'] : 0;?>
                                </div>
                                <div class="clearfix"></div>
                                <div class="pull-right"><span style="font-size:15px" >CSE</span></div>
                            </div>
                        </div>
                    </div>
                    <a href="index.php?page=cse">
                        <div class="panel-footer">
                            <span class="pull-left">All Assignment</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-o-right"></i></span>
                             <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-file fa-5x"></i>
                            </div>
                            <div class="col-xs-9">
                                <div class="pull-right" style="font-size:30px">
                                 <?= isset($count['ece']) ? $count['ece'] : 0;?>
                                </div>
                                <div class="clearfix"></div>
                                <div class="pull-right"><span style="font-size: 15px">ECE</span></div>
                            </div>
                        </div>
                    </div>
                    <a href="index.php?page=ece">
                        <div class="panel-footer">
                            <span class="pull-left">All Asignment</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-o-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

		 <div class="col-sm-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-file fa-5x"></i>
                            </div>
                            <div class="col-xs-9">
                                <div class="pull-right" style="font-size:30px">
                                     <?= isset($count['eee']) ? $count['eee'] : 0;?>
                                </div>
                                <div class="clearfix"></div>
                                <div class="pull-right"><span style="font-size: 15px">EEE</span></div>
                            </div>
                        </div>
                    </div>
                    <a href="index.php?page=eee">
                        <div class="panel-footer">
                            <span class="pull-left">All Assignment</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-o-right"></i></span>
                             <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>


             <div class="col-sm-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-file fa-5x"></i>
                            </div>
                            <div class="col-xs-9">
                                <div class="pull-right" style="font-size:30px">
                                    <?= isset($count['civil']) ? $count['civil'] : 0;?>
                                </div>
                                <div class="clearfix"></div>
                                <div class="pull-right"><span style="font-size: 15px">CIVIL</span></div>
                            </div>
                        </div>
                    </div>
                    <a href="index.php?page=civil">
                        <div class="panel-footer">
                            <span class="pull-left">All Assignment</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-o-right"></i></span>
                             <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
             <div class="col-sm-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-file fa-5x"></i>
                            </div>
                            <div class="col-xs-9">
                                <div class="pull-right" style="font-size:30px">
                                 <?= isset($count['bba']) ? $count['bba'] : 0;?>
                                </div>
                                <div class="clearfix"></div>
                                <div class="pull-right"><span style="font-size: 15px">BBA</span></div>
                            </div>
                        </div>
                    </div>
                    <a href="index.php?page=bba">
                        <div class="panel-footer">
                            <span class="pull-left">All Assignment</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-o-right"></i></span>
                             <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

=======
<?php
require_once './dbcon.php';
if(!isset($_SESSION['user_login'])){
header('location:login.php');
    
}


?>

 <h1 class="text-primary"><i class="fa fa-dashboard"></i> Dashboard <small>Statistics Overview</small></h1>
<ol class="breadcrumb">
    <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
</ol>
                <?php 
                    $query = "SELECT faculty, count(*) as count FROM `file` GROUP BY `faculty`";
                    $result = mysqli_query($link , $query);
                   $count = [];

                    while ( $row = mysqli_fetch_assoc($result)) {
                        $count[$row['faculty']] = $row['count'];
                    }
                ?>
               


 <div class="row">
            <div class="col-sm-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-file fa-5x" aria-hidden="true"></i>
                            </div>
                            <div class="col-xs-9">
                                <div class="pull-right" style="font-size:30px">
                                   <!--  <?php
                                    // if(isset($count['cse'])){
                                    //     echo $count['cse'];
                                    // }else
                                    // {
                                    //     echo 0;
                                    // }


                                     ?> -->
                                    <?= isset($count['cse']) ? $count['cse'] : 0;?>
                                </div>
                                <div class="clearfix"></div>
                                <div class="pull-right"><span style="font-size:15px" >CSE</span></div>
                            </div>
                        </div>
                    </div>
                    <a href="index.php?page=cse">
                        <div class="panel-footer">
                            <span class="pull-left">All Assignment</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-o-right"></i></span>
                             <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-file fa-5x"></i>
                            </div>
                            <div class="col-xs-9">
                                <div class="pull-right" style="font-size:30px">
                                 <?= isset($count['ece']) ? $count['ece'] : 0;?>
                                </div>
                                <div class="clearfix"></div>
                                <div class="pull-right"><span style="font-size: 15px">ECE</span></div>
                            </div>
                        </div>
                    </div>
                    <a href="index.php?page=ece">
                        <div class="panel-footer">
                            <span class="pull-left">All Asignment</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-o-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

		 <div class="col-sm-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-file fa-5x"></i>
                            </div>
                            <div class="col-xs-9">
                                <div class="pull-right" style="font-size:30px">
                                     <?= isset($count['eee']) ? $count['eee'] : 0;?>
                                </div>
                                <div class="clearfix"></div>
                                <div class="pull-right"><span style="font-size: 15px">EEE</span></div>
                            </div>
                        </div>
                    </div>
                    <a href="index.php?page=eee">
                        <div class="panel-footer">
                            <span class="pull-left">All Assignment</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-o-right"></i></span>
                             <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>


             <div class="col-sm-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-file fa-5x"></i>
                            </div>
                            <div class="col-xs-9">
                                <div class="pull-right" style="font-size:30px">
                                    <?= isset($count['civil']) ? $count['civil'] : 0;?>
                                </div>
                                <div class="clearfix"></div>
                                <div class="pull-right"><span style="font-size: 15px">CIVIL</span></div>
                            </div>
                        </div>
                    </div>
                    <a href="index.php?page=civil">
                        <div class="panel-footer">
                            <span class="pull-left">All Assignment</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-o-right"></i></span>
                             <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
             <div class="col-sm-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-file fa-5x"></i>
                            </div>
                            <div class="col-xs-9">
                                <div class="pull-right" style="font-size:30px">
                                 <?= isset($count['bba']) ? $count['bba'] : 0;?>
                                </div>
                                <div class="clearfix"></div>
                                <div class="pull-right"><span style="font-size: 15px">BBA</span></div>
                            </div>
                        </div>
                    </div>
                    <a href="index.php?page=bba">
                        <div class="panel-footer">
                            <span class="pull-left">All Assignment</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-o-right"></i></span>
                             <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

>>>>>>> 1f4d3da489573e5a286349867f04cd46260671da
        