<?php
session_start();
include "../db_conn.php"
?>
<!DOCTYPE html>
<html lang="en">
<?php
include "../Head.php";
?>

<body id="page-top">
    <div id="wrapper">
        <?php
        include "LeftMenu.php";
        ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php
                include "../Header.php";
                ?>
                <?php
                include "Content.php";
                ?>

            </div>
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
</body>

</html>