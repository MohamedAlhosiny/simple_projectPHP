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

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $salary = $_POST['salary'];
    $department_id = $_POST['department'];
    $insertQuery = "INSERT INTO `employees` VALUES (NULL , '$name' , '$email' , '$phone' , $salary , $department_id)";
    $insert = mysqli_query($conn, $insertQuery);

    if ($insert) {
        $message = "<b> $name </b> added successfully";
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


    <div class="card bg-dark text-light">
        <div class="card-body">
            <form method="post">
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