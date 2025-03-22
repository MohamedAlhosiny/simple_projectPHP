<?php
// core
require_once "./app/dbconfig.php";
require_once "./app/function.php";



// UI
require_once "./shared/head.php";
require_once "./shared/navbar.php";

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    // print_r($_POST);
    $selectoneQuery = "SELECT * FROM `employees` WHERE `email`='$email' ";
    $oneQuery = mysqli_query($conn, $selectoneQuery);
    $row = mysqli_fetch_assoc($oneQuery);
    $passwordVerify = password_verify($password, $row['password']);
    if ($passwordVerify) {
        $_SESSION['employee'] =  [
            'id' => $row['id'],
            'name' =>  $row['name'],
            'email' => $row['email'],
            'phone' => $row['phone'],
            'salary' => $row['salary'],
            'image' => $row['image'],
            'department_id' => $row['department_id'],
            'rule' => $row['rule_id'], //take care!!!
        ];
        path('index.php');
    } else {
        echo "false";
    }
}
?>


<?php
require_once "./shared/scripts.php";
require_once "./shared/footer.php";

?>




<!-- UI for login (front-end) -->

<div class="container mt-5 col-5">
    <h1 class="text-center">سجل الدخول يا معلم</h1>
    <div class="card card-body bg-dark text-light">
        <form method="post">
            <div class="row">
                <div class="col-6 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>

                <div class="col-6 mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="col-12 text-center">
                    <button class="btn btn-primary" name="login">Login</button>
                </div>
            </div>

        </form>
    </div>
</div>