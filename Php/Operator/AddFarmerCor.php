<?php
session_start();
include "../db_conn.php";
?>
<!DOCTYPE html>
<html lang="en">
<?php include "../Head.php"; ?>

<body id="page-top">
    <div id="wrapper">
        <?php include "LeftMenu.php"; ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php
                include "../Header.php";
                ?>

                <section id="contact" class="contact">
                    <div class="container">
                        <div class="alert alert-primary" role="alert">
                            <b>Farmer Registration<b>
                        </div>
                    </div>

                    <div class="container">
                        <?php if (isset($_GET['error'])) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $_GET['error']; ?>
                            </div>
                        <?php } ?>
                        <?php if (isset($_GET['success'])) { ?>
                            <div class="alert alert-primary" role="alert">
                                <?php echo $_GET['success']; ?>
                            </div>
                        <?php } ?>
                        <form action="Action/AddFarmerAction.php" method="post" enctype='multipart/form-data' role="form" class="php-email-form form1">
                            <div class="form-row">
                                <div class="col-md-4 form-group">
                                    <input required type="text" name="name" class="form-control" id="name" placeholder="Beneficiary  Name" data-rule="minlen:4" data-msg="Please enter a valid name" />
                                    <div class="validate"></div>
                                </div>

                                <div class="col-md-4 form-group">
                                    <input required type="text" name="fname" class="form-control" id="name" placeholder="Father's Name" data-rule="minlen:4" data-msg="Please enter a valid surname" />
                                    <div class="validate"></div>
                                </div>

                                <div class="col-md-4 form-group">
                                    <input required type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                                    <div class="validate"></div>
                                </div>

                                <div class="col-md-4 form-group">
                                    <input required type="text" class="form-control" name="number" id="contact" placeholder="Contact Number" data-rule="email" data-msg="Please enter a valid contact number" />
                                    <div class="validate"></div>
                                </div>

                                <div class="col-md-6 form-group">
                                    <input required type="text" class="form-control" name="address1" id="address1" placeholder="Address Line1" data-rule="email" data-msg="Please enter a valid address" multiline />
                                    <div class="validate"></div>
                                </div>

                                <div class="col-md-6 form-group">
                                    <input type="text" class="form-control" name="address2" id="address2" placeholder="Address Line2" data-rule="email" data-msg="Please enter a valid address" />
                                    <div class="validate"></div>
                                </div>

                                <div class="col-md-4 form-group">
                                    <input required type="text" class="form-control" name="pin" id="address" placeholder="Pin Code" data-rule="email" data-msg="Please enter a valid address" />
                                    <div class="validate"></div>
                                </div>


                                <div class="col-md-4 form-group">
                                    <input required type="text" class="form-control" name="state" id="text" placeholder="State" data-rule="email" data-msg="Please enter a valid address" />
                                    <div class="validate"></div>
                                </div>

                                <div class="col-md-4 form-group">
                                    <input required type="text" class="form-control" name="district" id="text" placeholder="District" data-rule="email" data-msg="Please enter a valid address" />
                                    <div class="validate"></div>
                                </div>

                                <div class="col-md-4 form-group">
                                    <input required type="text" class="form-control" name="block" id="text" placeholder="Block" data-rule="email" data-msg="Please enter a valid address" />
                                    <div class="validate"></div>
                                </div>


                                <div class="col-md-4 form-group">
                                    <input required type="text" class="form-control" name="gp" id="text" placeholder="Gp" data-rule="email" data-msg="Please enter a valid address" />
                                    <div class="validate"></div>
                                </div>

                                <div class="col-md-4 form-group">
                                    <input type="text" class="form-control" name="familymember" id="text" placeholder="Total Family Member" data-rule="email" data-msg="Please enter a valid address" />
                                    <div class="validate"></div>
                                </div>

                                <div class="col-md-4 form-group">
                                    <input type="text" class="form-control" name="education" id="text" placeholder="Education" data-rule="email" data-msg="Please enter a valid address" />
                                    <div class="validate"></div>
                                </div>

                                <div class="col-md-4 form-group">
                                    <input type="text" class="form-control" name="caste" id="text" placeholder="Caste" data-rule="email" data-msg="Please enter a valid address" />
                                    <div class="validate"></div>
                                </div>

                                <div class="col-md-4 form-group">
                                    <input type="text" class="form-control" name="land" id="text" placeholder="Land Holding" data-rule="email" data-msg="Please enter a valid address" />
                                    <div class="validate"></div>
                                </div>

                                <div class="col-md-4 form-group">
                                    <input type="text" class="form-control" name="crop" id="text" placeholder="Crop" data-rule="email" data-msg="Please enter a valid address" />
                                    <div class="validate"></div>
                                </div>

                                <div class="col-md-6 form-group">
                                    <input type="text" class="form-control" name="ir" id="text" placeholder="I/R" data-rule="email" data-msg="Please enter a valid address" />
                                    <div class="validate"></div>
                                </div>

                                <div class="col-md-6 form-group">
                                    <input type="text" class="form-control" name="source" id="text" placeholder="Source" data-rule="email" data-msg="Please enter a valid address" />
                                    <div class="validate"></div>
                                </div>

                                <div class="col-md-4 form-group">
                                    <select required class="form-control" name="doc1name">
                                        <option value="-1">Select Document</option>
                                        <option value="VoterId">VOTER ID</option>
                                        <option value="PanCard">PAN CARD</option>
                                        <option value="AadharCard">AADHAR CARD</option>
                                        <option value="Passport">PASSPORT</option>
                                        <option value="DrivingLicence">DRIVING LICENCE</option>
                                        <option value="GaoborhaCertificate">GAOBORHA CERTIFICATE</option>
                                    </select>
                                    <div class="validate"></div>
                                </div>

                                <div class="col-md-4 form-group">
                                    <input required type="text" class="form-control" name="doc1num" id="text" placeholder="Document Number" data-rule="email" data-msg="Please enter a valid address" />
                                    <div class="validate"></div>
                                </div>

                                <div class="col-md-4 form-group">
                                    <input required type="file" id="myfile" class="form-control" name="doc1image" placeholder="Browse Document" data-msg="Please enter a valid Document" />
                                    <div class="validate"></div>
                                </div>

                                <div class="col-md-4 form-group">
                                    <input required type="text" class="form-control" name="doc2num" id="text" placeholder="Self Declaration No" data-rule="email" data-msg="Please enter a valid address" />
                                    <div class="validate"></div>
                                </div>

                                <div class="col-md-4 form-group">
                                    <input required type="file" id="myfile" class="form-control" name="doc2image" placeholder="Browse Self Declaration" data-msg="Please enter a valid Document" />
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>User Image</label>
                                    <input required type="file" id="myfile" class="form-control" name="doc3image" placeholder="Browse Self Declaration" data-msg="Please enter a valid Document" />
                                    <div class="validate"></div>
                                </div>

                                <div class="col-md-4 form-group">
                                    <input required type="text" class="form-control" name="pin" id="text" placeholder="Enter Pin" data-rule="email" data-msg="Please enter a valid address" />
                                    <div class="validate"></div>
                                </div>

                                <div class="col-md-12 form-group">
                                    <button type="Submit" class="btn btn-success">Add Farmer</button>
                                </div>

                            </div>


                        </form>

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