<?php
// core
require_once "C:/xampp/htdocs/finalDemo/app/dbconfig.php";

// UI
require_once "C:/xampp/htdocs/finalDemo/shared/head.php";
require_once "C:/xampp/htdocs/finalDemo/shared/navbar.php";

$selectQuery = "SELECT * FROM `departments`  ";

$select = mysqli_query($conn, $selectQuery);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $deleteQuery = "DELETE FROM `departments` WHERE id = $id";
    $delete = mysqli_query($conn, $deleteQuery);

    if ($delete) {
        path('departments/index.php');
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
                        <th>Department</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php foreach ($select as $i => $hamada) : ?>
                    <tbody>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= $hamada['department'] ?></td>
                            <td><a href="edit.php?edit=<?= $hamada['id'] ?>" class="btn btn-warning">Edit</a>
                                <a href="?delete=<?= $hamada['id'] ?>" class="btn btn-danger">Delete</a>
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