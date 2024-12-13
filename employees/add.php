<?php
// core
require_once "C:/xampp/htdocs/finalDemo/app/dbconfig.php";
require_once "C:/xampp/htdocs/finalDemo/app/function.php";
// UI
require_once "C:/xampp/htdocs/finalDemo/shared/head.php";

require_once "C:/xampp/htdocs/finalDemo/shared/navbar.php";
$allDepartment = "SELECT * FROM `departments`";
$departments = mysqli_query($conn, $allDepartment);

$message = '';
$errors = [];

if (isset($_POST['submit'])) {

    // data of employees 
    $name = filterString($_POST['name']);
    $email = filterString($_POST['email']);
    $phone = filterString($_POST['phone']);
    $salary = filterString($_POST['salary']);
    $department_id = $_POST['department'];

    if (stringValidation($name, 8)) {
        $errors[] = "name is required and must be at least 8 chars";
    }

    if (stringValidation($email, 2)) {
        $errors[] = "email is required ";
    }
    if (stringValidation($phone, 11)) {
        $errors[] = "phone is required and must be 11 numbers ";
    }
    if (stringValidation($salary, 0)) {
        $errors[] = "salary is required ";
    }
    $image_name = "FinalDemo" . "_" . time() . "_" . $_FILES['image']['name'];
    $size = $_FILES['image']['size'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $location = "./uploads/" . $image_name;
    if (imageValidation($_FILES['image']['name'], $size, 2)) {
        $errors[] = "Image is required and must be less than 2MB";
    }

    // image upload

    if (empty($errors)) {

        //insert Query====
        $insertQuery = "INSERT INTO `employees` VALUES (NULL , '$name' , '$email' , '$phone' , $salary , '$image_name' , $department_id)";
        $insert = mysqli_query($conn, $insertQuery);
        if ($insert) {
            move_uploaded_file($tmp_name, $location);
            $message = "<b> $name </b> added successfully";
        }
    }
}

?>


<div class="container col-6 mt-5">
    <h1 class="text-center text-light">Add New Employee</h1>
    <?php if (!empty($message)) : ?>
        <div class="alert alert-success">
            <?= $message ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($errors)) : ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li>
                        <?= $error ?>
                    </li>
                <?php endforeach; ?>


            </ul>
        </div>
    <?php endif; ?>


    <div class="card bg-dark text-light">
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" name="name" id="name" placeholder="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" name="email" id="email" placeholder="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone:</label>
                    <input type="text" name="phone" id="phone" placeholder="phone" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="salary" class="form-label">Salary:</label>
                    <input type="number" name="salary" id="salary" placeholder="salary" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="department" class="form-label">Department:</label>
                    <select name="department" id="department" class="form-select">
                        <?php foreach ($departments as $department) : ?>
                            <option value="<?= $department['id'] ?>"> <?= $department['department'] ?> </option>

                        <?php endforeach; ?>

                    </select>
                    <div class="mb-3">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                </div>
                <div class="mb-3 text-center">
                    <button class="btn btn-primary" name="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>




<?php
require_once "C:/xampp/htdocs/finalDemo/shared/scripts.php";

require_once "C:/xampp/htdocs/finalDemo/shared/footer.php";
?>