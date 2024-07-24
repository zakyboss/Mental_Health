<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['login_message'] = "Please log in to access the dashboard.";
    header("Location: login.html");
    exit();
}

if (isset($_SESSION['login_success'])) {
    echo "<script>alert('Karibu Sana!');</script>";
    unset($_SESSION['login_success']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tune Me Up Admin Dashboard</title>
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/png">
    <link rel="stylesheet" href="./assets/compiled/css/app.css">
    <link rel="stylesheet" href="./assets/compiled/css/app-dark.css">
    <link rel="stylesheet" href="./assets/compiled/css/table-datatable-jquery.css">
    <link rel="stylesheet" href="assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="assets/extensions/sweetalert2/sweetalert2.min.css">
</head>
<body>
    <script src="assets/static/js/initTheme.js"></script>
    <div id="app">
        <div id="sidebar">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="logo">
                            <a href="index.html"><img src="./assets/images/logo.png" alt="Logo" srcset="" style=""></a>
                        </div>
                        <div class="theme-toggle d-flex gap-2 align-items-center mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                                <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2" opacity=".3"></path>
                                    <g transform="translate(-210 -1)">
                                        <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                        <circle cx="220.5" cy="11.5" r="4"></circle>
                                        <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2"></path>
                                    </g>
                                </g>
                            </svg>
                            <div class="form-check form-switch fs-6">
                                <input class="form-check-input me-0" type="checkbox" id="toggle-dark" style="cursor: pointer">
                                <label class="form-check-label"></label>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" class="iconify iconify--mdi" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                <path fill="currentColor" d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z"></path>
                            </svg>
                        </div>
                        <div class="sidebar-toggler x">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>
                        <li class="sidebar-item active">
                            <a href="dashboard.php" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item has-sub active">
                            <a href="manage-mhp.php" class='sidebar-link'>
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>Manage MHP</span>
                            </a>
                        </li>
                        <ul class="submenu">
                        </ul>
                    </ul>
                </div>
            </div>
        </div>
        <div id="main" class='layout-navbar navbar-fixed'>
            <header>
                <nav class="navbar navbar-expand navbar-light navbar-top">
                    <div class="container-fluid">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-lg-0">
                            </ul>
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                            <h6 class="mb-0 text-gray-600"><?php echo $_SESSION['username']; ?></h6>
                                            <p class="mb0 text-sm text-gray-600"><?php echo $_SESSION['role']; ?></p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="./assets/compiled/jpg/1.jpg">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 11rem;">
                                    <li>
                                        <h6 class="dropdown-header">Hello, <?php echo $_SESSION['username']; ?></h6>
                                    </li>
                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-person me-2"></i> My Profile</a></li>
                                    <hr class="dropdown-divider">
                                    <li><a class="dropdown-item" href="php/logout.php"><i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
            <div id="main-content">
                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3>Manage Mental Health Professionals</h3>
                            </div>
                        </div>
                    </div>
                    <section class="section">
                        <div class="card">
                            <div class="card-header" style="display: flex;">
                                <h4 class="card-title">Our MHPs</h4>
                                <a href="add-mhp.php" class="btn btn-outline-success rounded-pill" style="margin-left: 700px;" role="button">Add MHP</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive datatable-minimal">
                                    <table style="width: 100%; border-collapse: collapse;" class="table" id="table2">
                                        <thead>
                                            <tr style="height: 30px; background-color: palevioletred; text-align: left;">
                                                <th style="padding: 10px;">Id</th>
                                                <th style="padding: 10px;">Photo</th>
                                                <th style="padding: 10px;">Title</th>
                                                <th style="padding: 10px;">Name</th>
                                                <th style="padding: 10px;">Contact</th>
                                                <th style="padding: 10px;">License Number</th>
                                                <th style="padding: 10px;">Specialization</th>
                                                <th style="padding: 10px;">Years of Experience</th>
                                                <th style="padding: 10px;">Location</th>
                                                <th style="padding: 10px;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            require_once 'php/db.php';
                                            $sql = "SELECT * FROM mhp";
                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0):
                                                while ($row = $result->fetch_assoc()):
                                                    $id = $row['id'];
                                                    $photo = $row['photo'];
                                                    $title = $row['title'];
                                                    $name = $row['name'];
                                                    $contact = $row['contact'];
                                                    $license_number = $row['license_number'];
                                                    $special = $row['special'];
                                                    $yos = $row['yos'];
                                                    $location = $row['location'];
                                                    echo "<tr>";
                                                    echo "<td>$id</td>";
                                                    echo "<td><img src='" . htmlspecialchars($photo) . "' alt='Photo' class='img-fluid rounded-3'></td>";
                                                    echo "<td>$title</td>";
                                                    echo "<td>$name</td>";
                                                    echo "<td>$contact</td>";
                                                    echo "<td>$license_number</td>";
                                                    echo "<td>$special</td>";
                                                    echo "<td>$yos</td>";
                                                    echo "<td>$location</td>";
                                                    echo "<td>
                                                    <a  data-bs-toggle='tooltip'title ='Edit $name' href='edit-mhp.php?id=$id' class='btn icon btn-sm btn-outline-info'><i class='bi bi-pencil-square'></i></a>
                                                     "; ?>
                                                    <form onsubmit="return confirm('Do you really want to delete this record?')" action="delete-mhp.php" method="post" id="formDelete<?php echo $id; ?>" style="display:inline;">
                                                  <input type="hidden" name="id" value="<?= $id; ?>">
                                                  <button data-bs-toggle="tooltip" title="Delete <?php echo $name; ?>" type="submit" class="btn icon btn-sm btn-outline-danger">
                                                  <i class="bi bi-trash3-fill"></i>
                                                 </button>

                                                    </form> 
                                                    <?php 
                                                "</td>";
                                                    echo "</tr>";
                                                endwhile;
                                            else:
                                                echo "<tr><td colspan='10'>No records found</td></tr>";
                                            endif;
                                            ?>
                                        </tbody>
                                    </table>
                                </div>                       
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p><?php echo date('Y'); ?> &copy; Tune Me Up</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span> by <a href="#">Zakyboss</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="assets/static/js/components/dark.js"></script>
    <script src="assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/compiled/js/app.js"></script>
    <script src="assets/extensions/jquery/jquery.min.js"></script>
    <script src="assets/extensions/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="assets/static/js/pages/datatables.js"></script>
    <script src="assets/extensions/sweetalert2/sweetalert2.min.js"></script>
    <script src="assets/static/js/pages/sweetalert2.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    }, false);

    <?php if(isset($_SESSION['message'])): ?>
        Swal.fire({
            icon: 'success',
            title: '<?=$_SESSION['message']?>',
            showConfirmButton: false,
            timer: 1500
        });
        <?php unset($_SESSION['message']); ?>
    <?php endif; ?>
    </script>
</body>
</html>
