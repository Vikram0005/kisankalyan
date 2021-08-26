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
                            <b>Coordinator Registration<b>
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
                        <form action="Action/AddOperatorAction.php" method="post" enctype='multipart/form-data' role="form" class="php-email-form form1">
                            <div class="form-row">
                                <div class="col-md-4 form-group">
                                    <input type="text" name="fname" class="form-control" id="name" placeholder="First Name" data-rule="minlen:4" data-msg="Please enter a valid name" />
                                    <div class="validate"></div>
                                </div>

                                <div class="col-md-4 form-group">
                                    <input type="text" name="lname" class="form-control" id="name" placeholder="Last Name" data-rule="minlen:4" data-msg="Please enter a valid surname" />
                                    <div class="validate"></div>
                                </div>

                                <div class="col-md-4 form-group">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                                    <div class="validate"></div>
                                </div>

                                <div class="col-md-4 form-group">
                                    <input type="text" class="form-control" name="number" id="contact" placeholder="Contact Number" data-rule="email" data-msg="Please enter a valid contact number" />
                                    <div class="validate"></div>
                                </div>

                                <div class="col-md-4 form-group">
                                    <input type="text" class="form-control" name="password" id="password" placeholder="Password" data-rule="email" data-msg="Please enter a valid password" />
                                    <div class="validate"></div>
                                </div>


                                <div class="col-md-4 form-group">
                                    <input type="date" class="form-control" id="date" name="date" value="YYYY-MM-DD" data-msg="Please enter a valid Date" />
                                    <div class="validate"></div>
                                </div>

                                <div class="col-md-6 form-group">
                                    <input type="text" class="form-control" name="address1" id="address1" placeholder="Address Line1" data-rule="email" data-msg="Please enter a valid address" multiline />
                                    <div class="validate"></div>
                                </div>

                                <div class="col-md-6 form-group">
                                    <input type="text" class="form-control" name="address2" id="address2" placeholder="Address Line2" data-rule="email" data-msg="Please enter a valid address" />
                                    <div class="validate"></div>
                                </div>

                                <div class="col-md-4 form-group">
                                    <input type="text" class="form-control" name="address3" id="address3" placeholder="Address Line3" data-rule="email" data-msg="Please enter a valid address" />
                                    <div class="validate"></div>
                                </div>

                                <div class="col-md-4 form-group">
                                    <input type="text" class="form-control" name="pin" id="address" placeholder="Pin Code" data-rule="email" data-msg="Please enter a valid address" />
                                    <div class="validate"></div>
                                </div>

                                <div class="col-md-4 form-group">
                                    <select class="form-control" name="position">
                                        <option value="-1">Select Position</option>
                                        <option value="4">OPERATOR</option>
                                    </select>
                                    <div class="validate"></div>
                                </div>

                                <div class="col-md-4 form-group">
                                    <input type="text" class="form-control" name="state" id="text" placeholder="Working State" data-rule="email" data-msg="Please enter a valid address" />
                                    <div class="validate"></div>
                                </div>

                                <div class="col-md-4 form-group">
                                    <input type="text" class="form-control" name="district" id="text" placeholder="Working District" data-rule="email" data-msg="Please enter a valid address" />
                                    <div class="validate"></div>
                                </div>

                                <div class="col-md-4 form-group">
                                    <input type="text" class="form-control" name="block" id="text" placeholder="Working Block" data-rule="email" data-msg="Please enter a valid address" />
                                    <div class="validate"></div>
                                </div>


                                <div class="col-md-4 form-group">
                                    <input type="text" class="form-control" name="gp" id="text" placeholder="Working Gp" data-rule="email" data-msg="Please enter a valid address" />
                                    <div class="validate"></div>
                                </div>

                                <div class="col-md-4 form-group">
                                    <select class="form-control" name="document">
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
                                    <input type="text" class="form-control" name="dnumber" id="text" placeholder="Document Number" data-rule="email" data-msg="Please enter a valid address" />
                                    <div class="validate"></div>
                                </div>

                                <div class="col-md-6 form-group">
                                    <input type="file" id="myfile" class="form-control" name="doc" placeholder="Browse Document" data-msg="Please enter a valid Document" />
                                    <div class="validate"></div>
                                </div>

                                <div class="col-md-4 form-group">
                                    <input type="text" class="form-control" name="pin" id="text" placeholder="Pin Number" data-rule="email" data-msg="Please enter a valid address" />
                                    <div class="validate"></div>
                                </div>
                                
                                <div class="col-md-12 form-group">
                                    <button type="Submit" class="btn btn-success">Add District Coordinator</button>
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