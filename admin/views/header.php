    <?php
    include("models/Admins.php");
    
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
            integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link rel="stylesheet" href="assets/css/style.css">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script>
        $(document).ready(function() {
            $(".navbar-toggler").click(function() {
                $(".navbar-nav .nav-item").toggle();
            });

            $(".sidebar-toggler").click(function() {
                $(".sidebar-wrapper").toggleClass("collapsed");
            });
        });
        </script>

    </head>
    <style>
body {
    padding-top: 60px;
}

.navbar {
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 100;
}

.sidebar {
    position: fixed;
    top: 60px;
    left: 0;
    bottom: 0;
    width: 240px;
    background-color: #f8f9fa;
    padding: 15px;
    z-index: 99;
    overflow-y: auto;
}

.content {
    margin-left: 240px;
    padding: 15px;
}

.sidebar .nav-link {
    color: #000;

}

.sidebar .nav-link:hover {
    background-color: #555;
}

.sidebar .active {
    background-color: #04AA6D;
    color: #fff;
}

.sidebar .active:hover {
    background-color: #007bff;
}

.sidebar {
    background-color: #f8f9fa;
}

.sidebar-wrapper {
    padding: 20px;
}

.sidebar-nav .nav-link {
    color: #007bff;
}



.sidebar {
    background-color: #f1f1f1;
    padding: 20px;
}

.sidebar-nav .nav-link {
    color: #007bff;
    border-radius: 10px;
    font-weight: normal;
}

.sidebar-nav .nav-link:hover {
    background-color: #007bff;
    color: #fff;

    box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
}

.content {
    padding: 20px;
}

.product-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.product-table th,
.product-table td {
    padding: 10px;
    text-align: left;
}

.product-table th {
    background-color: #f8f9fa;
    font-weight: bold;
}

.product-table td {
    border-bottom: 1px solid #ddd;
}

.product-table td:first-child {
    width: 50px;
}

.product-card {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 20px;
    margin-bottom: 20px;
}

.product-card h3 {
    margin-top: 0;
}

.product-card p {
    margin-bottom: 0;
}

body {
    padding-top: 50px;
}

.profile-container {
    max-width: 600px;
    margin: 0 auto;
}

.profile-card {
    padding: 20px;
    margin-bottom: 20px;
}

.profile-card p {
    margin-bottom: 5px;
}

.logout-btn {
    margin-top: 20px;
}
    </style>

    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary px-4" style="background-color: #e3f2fd;">
            <div class="container">
                <a class="navbar-brand" href="home">Admin</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="?controller=admins&action=profile">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?controller=home&action=logout">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Sidebar -->
        <div class="col-lg-3 col-md-4 sidebar ">
            <div class="sidebar-wrapper0">
                <ul class="nav flex-column sidebar-nav">
                    <?php if(Admins::checkrole($_SESSION["idadmin"])):?>
                    <li class="nav-item">
                        <a class="nav-link" href="admins">Admin</a>
                    </li>
                    <?php endif ?>
                    <li class="nav-item">
                        <a class="nav-link" href="categories">Danh mục</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="brands">Nhãn hiệu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="products">Sản phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Orders">Đơn hàng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Stores">Cửa hàng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="customers">Khách hàng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?controller=home&action=thongke">Thống kê</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-lg-9 col-md-8 content">









            <script>
            function toggleSidebar() {
                $(".sidebar-wrapper").toggleClass("collapsed");
            }
            </script>

            <style>
            .sidebar-wrapper.collapsed .nav-link {
                display: none;
            }

            .sidebar-wrapper.collapsed {
                width: 75px;
            }

            .sidebar-wrapper .nav-link {
                padding: 0.5rem 1rem;
            }

            .sidebar-toggler {
                display: none;
            }

            @media (max-width: 991.98px) {
                .navbar-nav .nav-item {
                    display: none;
                }

                .navbar-nav .nav-item.show {
                    display: block;
                }

                .navbar-toggler {
                    display: block;
                }

                .sidebar-wrapper.collapsed .nav-link {
                    display: block;
                }

                .sidebar-wrapper.collapsed .sidebar-toggler {
                    display: block;
                }

                .sidebar-wrapper.collapsed {
                    width: 100%;
                }

            }
            </style>