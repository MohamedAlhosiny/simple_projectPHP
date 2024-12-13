<?php
// core
require_once "C:/xampp/htdocs/finalDemo/app/dbconfig.php";
require_once "C:/xampp/htdocs/finalDemo/app/function.php";
// UI
require_once "C:/xampp/htdocs/finalDemo/shared/head.php";

require_once "C:/xampp/htdocs/finalDemo/shared/navbar.php";
$allDepartment = "SELECT * FROM `departments`";
$departments = mysqli_query($conn, $allDepartment);

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $selectoneQuery = "SELECT * FROM `employees` WHERE id = $id ";
    $selectone = mysqli_query($conn, $selectoneQuery);
    $row = mysqli_fetch_assoc($selectone);
    $name = $row['name'];
    $email = $row['email'];
    $phone = $row['phone'];
    $salary = $row['salary'];
    $department_id = $row['department_id'];


    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $salary = $_POST['salary'];
        $department = $_POST['department'];
        // upload image
        if ($_FILES['image']['name']) {
            $image_name = "FinalDemo" . "_" . time() . "_" . $_FILES['image']['name'];
            $tmp_name = $_FILES['image']['tmp_name'];
            $location = "./uploads/" . $image_name;

            move_uploaded_file($tmp_name, $location);
            // to remove old image in DB
            $old_image = $row['image'];
            unlink("./uploads/" . $old_image);
        } else {
            $image_name = $row['image'];
        }


        $updateQuery = "UPDATE `employees` SET `name` = '$name' , `email` = '$email' , `phone` = '$phone' , `salary` = $salary, `image` = '$image_name' , `department_id` = $department";
        $update = mysqli_query($conn, $updateQuery);

        if ($update) {
            path('employees/index.php');
        }
    }
}


// if (isset($_POST['submit'])) {
//     $name = $_POST['name'];
//     $email = $_POST['email'];
//     $phone = $_POST['phone'];
//     $salary = $_POST['salary'];
//     $department_id = $_POST['department'];
//     $insertQuery = "INSERT INTO `employees` VALUES (NULL , '$name' , '$email' , '$phone' , $salary , $department_id)";
//     $insert = mysqli_query($conn, $insertQuery);

//     if ($insert) {
//         $message = "<b> $name </b> added successfully";
//     }
// }

?>


<div class="container col-6 mt-5">
    <h1 class="text-center text-light">update Employee</h1>
    <?php if (!empty($message)) : ?>
        <div class="alert alert-success">
            <?= $message ?>
        </div>
    <?php endif; ?>


    <div class="card bg-dark text-light">
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" name="name" value="<?= $name ?>" id="name" placeholder="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" name="email" id="email" value="<?= $email ?>" placeholder="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone:</label>
                    <input type="text" name="phone" id="phone" value="<?= $phone ?>" placeholder="phone" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="salary" class="form-label">Salary:</label>
                    <input type="number" name="salary" id="salary" value="<?= $salary ?>" placeholder="salary" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="department" class="form-label">Department:</label>
                    <select name="department" id="department" class="form-select">
                        <?php foreach ($departments as $department) : ?>
                            <?php if ($row['department_id'] == $department['id']) : ?>
                                <option selected value="<?= $department['id'] ?>"> <?= $department['department'] ?> </option>
                            <?php else : ?>
                                <option value="<?= $department['id'] ?>"> <?= $department['department'] ?> </option>
                            <?php endif; ?>
                        <?php endforeach; ?>

                    </select>
                    <div class="mb-3">
                        <label for="image">Image</label>
                        <input type="file" class="form-control mb-2" name="image">
                        <img width="200" src="./uploads/<?= $row['image'] ?>" alt="" />
                    </div>
                </div>
                <div class="mb-3 text-center">
                    <button class="btn btn-warning" name="update">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>




<?php
require_once "C:/xampp/htdocs/finalDemo/shared/scripts.php";

require_once "C:/xampp/htdocs/finalDemo/shared/footer.php";
?>