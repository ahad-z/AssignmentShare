<<<<<<< HEAD

<?php
require_once './dbcon.php';
if(!isset($_SESSION['user_login'])){
    header('location:login.php');
}
?>
<h1 class="text-primary"><i class="fa fa-user"></i>All Assignment =</small></h1>
<ol class="breadcrumb">
    <li> <a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"><i class="fa fa-file"></i> Assignment</li>
</ol>

<div class="table-responsive">
    <table id="data" class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Contract_Number</th>
                <th>Sub_Code</th>
                <th>Faculty</th>
                <th>File</th>
                <th>Action</th>
            </tr>
        </thead>
        <?php

                     $result = mysqli_query($link, "SELECT * FROM `file` WHERE `faculty` = 'eee'");
                     while ($row = mysqli_fetch_assoc($result)) {?>

                     
               <tr>
                    <td>
                       <?php echo $row['id']; ?>
                    </td>
                    <td>
                     <?=$row['name']; ?>
                    </td>
                    <td>
                       <?=$row['contract']; ?>
                    </td>
                    <td>
                        <?=$row['sub_code']; ?>
                    </td>
                    <td>
                       <?=strtoupper($row['faculty']); ?>
                    </td>
                    <td>
                     <a href="../file/<?=$row['file'];?>"><?=$row['file'];?></a>
                    </td>
                     <td>
                    <a href="delete.php?id=<?=base64_encode($row['id']);?>" class="btn btn-primary">Delete</a>
                       
                    </td>
                
                </tr>

              <?php
          }
                ?>

                    


        </tbody>

    </table>
=======

<?php
require_once './dbcon.php';
if(!isset($_SESSION['user_login'])){
    header('location:login.php');
}
?>
<h1 class="text-primary"><i class="fa fa-user"></i>All Assignment =</small></h1>
<ol class="breadcrumb">
    <li> <a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"><i class="fa fa-file"></i> Assignment</li>
</ol>

<div class="table-responsive">
    <table id="data" class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Contract_Number</th>
                <th>Sub_Code</th>
                <th>Faculty</th>
                <th>File</th>
                <th>Action</th>
            </tr>
        </thead>
        <?php

                     $result = mysqli_query($link, "SELECT * FROM `file` WHERE `faculty` = 'eee'");
                     while ($row = mysqli_fetch_assoc($result)) {?>

                     
               <tr>
                    <td>
                       <?php echo $row['id']; ?>
                    </td>
                    <td>
                     <?=$row['name']; ?>
                    </td>
                    <td>
                       <?=$row['contract']; ?>
                    </td>
                    <td>
                        <?=$row['sub_code']; ?>
                    </td>
                    <td>
                       <?=strtoupper($row['faculty']); ?>
                    </td>
                    <td>
                     <a href="../file/<?=$row['file'];?>"><?=$row['file'];?></a>
                    </td>
                     <td>
                    <a href="delete.php?id=<?=base64_encode($row['id']);?>" class="btn btn-primary">Delete</a>
                       
                    </td>
                
                </tr>

              <?php
          }
                ?>

                    


        </tbody>

    </table>
>>>>>>> 1f4d3da489573e5a286349867f04cd46260671da
</div>