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
              <b>View Pin<b>
            </div>
          </div>
          <div class="container">
            <?php
            //execute the SQL query and return records
            $sql = "SELECT * FROM pin ORDER BY ID DESC";
            $result = mysqli_query($conn, $sql);
            ?>
            <table id="dtHorizontalVerticalExample" class="table table-striped table-bordered table-sm " cellspacing="0" width="50%">
              <thead>
                <tr>
                  <th scope="col">S.no</th>
                  <th scope="col">Pin</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 0;
                while ($row = $result->fetch_assoc()) { ?>
                  <tr>
                    <th scope="row"><?php echo ++$i ?></th>
                    <td><?php echo $row["VALUE"]?></td>
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