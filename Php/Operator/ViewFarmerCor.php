<?php
session_start();
include "../db_conn.php";
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
            $id = $_SESSION['ID'];

            $sql = "SELECT * FROM farmer WHERE ADDEDBY='$id' ORDER BY ID DESC";
            $result = mysqli_query($conn, $sql);
            ?>
            <table id="dtHorizontalVerticalExample" class="table table-striped table-bordered table-sm " cellspacing="0" width="350%">
              <thead>
                <tr>
                <th scope="col">Action</th>
                  <th scope="col">S.no</th>
                  <th scope="col">Name</th>
                  <th scope="col">Father's Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Number</th>
                  <th scope="col">Address</th>
                  <th scope="col">Pincode</th>
                  <th scope="col">State</th>
                  <th scope="col">District</th>
                  <th scope="col">Block</th>
                  <th scope="col">GP</th>
                  <th scope="col">Family Member</th>
                  <th scope="col">Education</th>
                  <th scope="col">Caste</th>
                  <th scope="col">Land Holding</th>
                  <th scope="col">Crop</th>
                  <th scope="col">IR</th>
                  <th scope="col">Source</th>
                  <th scope="col">Kisan ID</th>
                  <th scope="col">Document</th>
                  <th scope="col">Doc Number</th>
                  <th scope="col">Doc Image</th>
                  <th scope="col">Self Declaration No</th>
                  <th scope="col">Self Declaration Image</th>
                  <th scope="col">User Image</th>
                  <th scope="col">DOJ</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 0;
                while ($row = $result->fetch_assoc()) { ?>
                  <tr>
                  <td>
                    <a class="btn btn-primary" href="../KishanCard.php?id=<?php echo $row["ID"]; ?>" target="_blank" role="button">View Card</a>
                  </td>
                    <th scope="row"><?php echo ++$i ?></th>
                    <td><?php echo $row["NAME"] ?></td>
                    <td><?php echo $row["FNAME"] ?></td>
                    <td><?php echo $row["EMAIL"] ?></td>
                    <td><?php echo $row["NUMBER"] ?></td>
                    <td><?php echo $row["ADDRESS1"] . " " . $row["ADDRESS2"] ?></td>
                    <td><?php echo $row["PINCODE"] ?></td>
                    <td><?php echo $row["STATE"] ?></td>
                    <td><?php echo $row["DISTRICT"] ?></td>
                    <td><?php echo $row["BLOCK"] ?></td>
                    <td><?php echo $row["GP"] ?></td>
                    <td><?php echo $row["FMEMBER"] ?></td>
                    <td><?php echo $row["EDUCATION"] ?></td>
                    <td><?php echo $row["CASTE"] ?></td>
                    <td><?php echo $row["LANDHOLDING"] ?></td>
                    <td><?php echo $row["CROP"] ?></td>
                    <td><?php echo $row["IR"] ?></td>
                    <td><?php echo $row["SOURCE"] ?></td>
                    <td><?php echo $row["KID"] ?></td>
                    <td><?php echo $row["DOCTYPE"] ?></td>
                    <td><?php echo $row["DOC1NUM"] ?></td>
                    <td><a href="../../uploads/<?php echo $row["DOC1URL"] ?>" target="_blank"> <img src="../../uploads/<?php echo $row["DOC1URL"] ?>" width="50" height="50"/></a></td>
                    <td><?php echo $row["DOC2NUM"] ?></td>
                    <td><a href="../../uploads/<?php echo $row["DOC2URL"] ?>" target="_blank"> <img src="../../uploads/<?php echo $row["DOC2URL"] ?>" width="50" height="50"/></a></td>
                    <td><a href="../../uploads/<?php echo $row["DOC3URL"] ?>" target="_blank"> <img src="../../uploads/<?php echo $row["DOC3URL"] ?>" width="50" height="50"/></a></td>
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
      "scrollY": true,
    });
    $('.dataTables_length').addClass('bs-select');
  });
</script>