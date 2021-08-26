<html>
<?php
include "db_conn.php";
if (isset($_GET['id'])) {

  $id = $_GET['id'];
  $sql = "SELECT * FROM farmer WHERE ID='$id'";
  $result = mysqli_query($conn, $sql);
  $row = $result->fetch_assoc();
}
?>

<head>
  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="../assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body>
  <!-- ======= Contact Section ======= -->
  <div class="container">
    <div class="row mt-2">
      <div class="col-lg-6">

        <div class="form-row form2">
          <div class="col-md-7 text-black" style="margin-left: 60px; margin-top: 100px;">
            <h6>Name :<strong style="font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif';">
                <?php echo $row["NAME"] ?></strong></h6>
            <h6>Father's Name : <strong style="font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif';">
                <?php echo $row["FNAME"] ?></strong></h6>

            <h6>Mobile No. : <strong style="font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif';">
                <?php echo $row["NUMBER"] ?> </strong></h6>
            <h6>State : <strong style="font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif';">
                <?php echo $row["GP"].",".$row["BLOCK"].",".$row["STATE"] ?></strong></h6>
            <h6>Date of Issue : <strong style="font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif';">
                <?php echo $row["CREATEDON"] ?></strong>
            </h6>
          </div>

          <div class="col-md-3" style="margin-top: 100px;">
              <img src="../uploads/<?php echo $row["DOC3URL"] ?>" height="100px" width="90px">
          </div>

          <div class="col-md-12 ">
            <h2 class="text-center"><strong style="font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'; color: white; text-shadow: 1px 1px #000;">
                <?php echo $row["KID"] ?></strong>
            </h2>
          </div>
        </div>
        
      </div>

      <div class="col-lg-6">
        <div class="form-row form3">
        </div>
        <div class="row">
          <div class="col-2"></div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <!-- Vendor JS Files -->
  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="../assets/vendor/counterup/counterup.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/venobox/venobox.min.js"></script>
  <script src="../assets/vendor/owl.carousel/owl.carousel.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>

</html>