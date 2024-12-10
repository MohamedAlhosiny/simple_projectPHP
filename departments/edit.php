<?php
//core
require_once "C:/xampp/htdocs/finalDemo/app/dbconfig.php";

// UI
include "../shared/head.php";
include "../shared/navbar.php";


$message = '';
// if (isset($_POST['submit'])) {
//     $department = $_POST['department'];
//     $insertQuery = "INSERT INTO `departments` VALUES (NULL , '$department')";
//     $insert = mysqli_query($conn, $insertQuery);

//     if ($insert) {
//         $message = "<b>$department</b> added in department successfully";
//     }
// }
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $selectoneQuery = "SELECT * FROM `departments` WHERE id = $id";
    $selectone = mysqli_query($conn, $selectoneQuery);
    $row = mysqli_fetch_assoc($selectone);

    $department = $row['department'];

    if (isset($_POST['update'])) {
        $department = $_POST['department'];
        $updateQuery = "UPDATE `departments` SET `department` = '$department' WHERE id = $id";
        $update = mysqli_query($conn, $updateQuery);
        if ($update) {
            path('departments/index.php');
        }
    }
}
?>
<div class="container col-6 mt-5">
    <h1 class="text-center text-light">Edit Department</h1>


    <?php if (!empty($message)) : ?>
        <div class="alert alert-success">
            <?= $message ?>
        </div>
    <?php endif; ?>
    <div class="card bg-dark text-light">
        <div class="card-body">
            <form method="post">
                <div class="mb-3">
                    <label for="department" class="form-label">Department Name:</label>
                    <input type="text" name="department" value="<?= $department ?>" id="department" placeholder="department name" class="form-control">
                </div>
                <div class="mb-3 text-center">
                    <button class="btn btn-warning" name="update">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>



<?php
include "../shared/scripts.php";
include "../shared/footer.php";

?>