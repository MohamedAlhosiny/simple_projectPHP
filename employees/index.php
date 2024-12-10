<?php
// core
require_once "C:/xampp/htdocs/finalDemo/app/dbconfig.php";

// UI
require_once "C:/xampp/htdocs/finalDemo/shared/head.php";
require_once "C:/xampp/htdocs/finalDemo/shared/navbar.php";

$selectQuery = "SELECT * FROM `employees_departments`  ";

$select = mysqli_query($conn, $selectQuery);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $deleteQuery = "DELETE FROM `employees` WHERE id = $id";
    $delete = mysqli_query($conn, $deleteQuery);

    if ($delete) {
        path('employees/index.php');
    }
}



?>


<div class="container mt-5">
    <div class="card bg-dark text-light">
        <div class="card-body table-resposive">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Salary</th>
                        <th>Department</th>
                    </tr>
                </thead>
                <?php foreach ($select as $i => $emp) : ?>
                    <tbody>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= $emp['name'] ?></td>
                            <td><?= $emp['email'] ?></td>
                            <td><?= $emp['phone'] ?></td>
                            <td><?= $emp['salary'] ?> $ </td>
                            <td><?= $emp['department'] ?></td>
                            <td><a href="edit.php?edit=<?= $emp['id'] ?>" class="btn btn-warning">Edit</a>
                                <a href="?delete=<?= $emp['id'] ?>" class="btn btn-danger">Delete</a>
                            </td>

                        </tr>
                    </tbody>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>






<?php
require_once "../shared/scripts.php";
require_once "../shared/footer.php";
?>