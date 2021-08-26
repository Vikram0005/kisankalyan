 <!-- Begin Page Content -->
 <div class="container-fluid">
     <?php
        include "../db_conn.php";
        ?>
     <!-- Earnings (Monthly) Card Example -->
     <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-info shadow h-100 py-2">
             <div class="card-body">
                 <div class="row no-gutters align-items-center">
                     <div class="col mr-2">
                         <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                             Operators
                         </div>
                         <?php
                            //execute the SQL query and return records
                            $block = $_SESSION['BLOCK'];
                            $sql = "SELECT COUNT(USERTYPE) AS count FROM register where USERTYPE=4 AND BLOCK='$block'";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            ?>
                         <div class="row no-gutters align-items-center">
                             <div class="col-auto">
                                 <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $row['count'] ?></div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>

     <!-- Earnings (Monthly) Card Example -->
     <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-info shadow h-100 py-2">
             <div class="card-body">
                 <div class="row no-gutters align-items-center">
                     <div class="col mr-2">
                         <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                             Kishan
                         </div>
                         <?php
                            //execute the SQL query and return records
                            $sql = "SELECT COUNT(ID) AS count FROM farmer where BLOCK='$block'";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            ?>
                         <div class="row no-gutters align-items-center">
                             <div class="col-auto">
                                 <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $row['count'] ?></div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- Content Row -->

     <!-- /.container-fluid -->