<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php
include "../Head.php";
include "../db_conn.php"
?>
<link href="hori.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>

<body id="page-top">
  <div id="wrapper">
    <?php
    include "LeftMenu.php";
    ?>
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <?php include "../Header.php"; ?>
        <section id="contact" class="contact">
          <div class="container">
            <div class="alert alert-primary" role="alert">
              <b>View Coordinators<b>
            </div>
          </div>
          <div class="container">
            <?php
            //execute the SQL query and return records
            $sql = "SELECT * FROM register WHERE USERTYPE=3 ORDER BY ID DESC";
            $result = mysqli_query($conn, $sql);
            ?>
            <table id="dtHorizontalVerticalExample" class="table table-striped table-bordered table-sm " cellspacing="0" width="200%">
              <thead>
                <tr>
                  <th scope="col">Delete</th>
                  <th scope="col">Approve</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Number</th>
                  <th scope="col">Password</th>
                  <th scope="col">Address</th>
                  <th scope="col">Pincode</th>
                  <th scope="col">State</th>
                  <th scope="col">District</th>
                  <th scope="col">Block</th>
                  <th scope="col">GP</th>
                  <th scope="col">Document</th>
                  <th scope="col">Doc Number</th>
                  <th scope="col">Doc Image</th>
                  <th scope="col">DOJ</th>
                </tr>
              </thead>
              <tbody>
                <?php
                while ($row = $result->fetch_assoc()) { ?>
                  <tr>
                    <td>
                      <a class="btn btn-danger" href="Action/Delete.php?id=<?php echo $row["ID"]; ?> && type=BLOCK" role="button">Delete</a>
                    </td>
                    <td>
                      <?php if ($row["ACTIVE"] == 0) { ?>
                        <a class="btn btn-danger" href="Action/Approve.php?active=1 && type=BLOCK && id=<?php echo $row["ID"]; ?>" role="button">Approve</a>
                      <?php } else { ?>
                        <a class="btn btn-success" href="Action/Approve.php?active=0 && type=BLOCK && id=<?php echo $row["ID"]; ?>" role="button">Deney</a>
                      <?php } ?>
                    </td>
                    <td><?php echo $row["FNAME"] . " " . $row["LNAME"] ?></td>
                    <td><?php echo $row["EMAIL"] ?></td>
                    <td><?php echo $row["NUMBER"] ?></td>
                    <td><?php echo $row["PASSWORD"] ?></td>
                    <td><?php echo $row["ADDRESS1"] . " " . $row["ADDRESS2"] . " " . $row["ADDRESS3"] ?></td>
                    <td><?php echo $row["PIN"] ?></td>
                    <td><?php echo $row["STATE"] ?></td>
                    <td><?php echo $row["DISTRICT"] ?></td>
                    <td><?php echo $row["BLOCK"] ?></td>
                    <td><?php echo $row["GP"] ?></td>
                    <td><?php echo $row["IDENTITY"] ?></td>
                    <td><?php echo $row["IDNUMBER"] ?></td>
                    <td><a href="../../uploads/<?php echo $row["PHOTO"] ?>" target="_blank"> <img src="../../uploads/<?php echo $row["PHOTO"] ?>" width="50" height="50" /></a></td>
                    <td><?php echo $row["CREATEDON"] ?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </section>
      </div>
    </div>
  </div>
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
</body>

</html>
<script>
  $(document).ready(function() {
    $('#dtHorizontalVerticalExample').DataTable({
      "scrollX": true,
      "scrollY": 200,
    });
    $('.dataTables_length').addClass('bs-select');
  });
</script>