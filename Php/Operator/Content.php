 <!-- Begin Page Content -->
 <div class="container-fluid">
     <?php
        include "../db_conn.php";
        ?>
     <!-- Content Row -->
     <div class="row">
         <!-- Earnings (Monthly) Card Example -->
         <div class="col-xl-3 col-md-6 mb-4">
             <div class="card border-left-primary shadow h-100 py-2">
                 <div class="card-body">
                     <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                             <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                 Farmer</div>
                             <?php
                                //execute the SQL query and return records
                                $id = $_SESSION['ID'];
                                $sql = "SELECT COUNT(ID) AS count FROM farmer where ADDEDBY='$id'";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($result);
                                ?>
                             <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row['count'] ?></div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <!-- /.container-fluid -->