<?php
//core
require_once "C:/xampp/htdocs/finalDemo/app/function.php";


//Logout Button =====

if (isset($_GET['logout'])) {
    session_unset();
    path('login.php');
}
?>


<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="<?php url('index.php') ?>">company</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Departments
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?php url('departments/add.php') ?>">add department</a></li>
                            <li><a class="dropdown-item" href="<?php url('departments/index.php') ?>">List Department</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <!--  -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Employees
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?php url('employees/add.php') ?>">Add Employee</a></li>
                            <li><a class="dropdown-item" href="<?php url('employees/index.php') ?>">List Employees</a></li>
                            <li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>

                        </ul>
                    </li>
                    <!--  -->

                    <!-- ===== -->
                    <?php if (isset($_SESSION['employee'])): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img width="40" class="rounded-circle" src="<?= url('employees/uploads/') . $_SESSION['employee']['image'] ?>" alt="">
                                <?= $_SESSION['employee']['name'] ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="text-center"><a class=" btn btn-danger" href="?logout">Logout</a></li>

                            <?php else: ?>
                                <li class="nav-item ">
                                    <a class="btn btn-success " href="<?= url('login.php') ?>">
                                        Login
                                    </a>
                                <?php endif; ?>


                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                        </li>
                </ul>

            </div>
        </div>
    </nav>
</header>