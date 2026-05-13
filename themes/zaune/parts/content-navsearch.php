<style>
        .navbar {
            background-color: #005ac1; /* Blue background */
        }
        .search-bar {
            max-width: 400px;
        }
        .dropdown-toggle {
            background-color: #d90000; /* Red category dropdown */
            color: white;
            border: none;
        }
        .dropdown-toggle:hover {
            background-color: #b00000;
        }
    </style>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand fw-bold" href="#">
            <img src="logo.png" alt="Logo" width="50"> FIXXER
        </a>

        <!-- Search Bar -->
        <form class="d-flex mx-auto search-bar">
            <div class="input-group">
                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown">All Categories</button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Category 1</a></li>
                    <li><a class="dropdown-item" href="#">Category 2</a></li>
                </ul>
                <input class="form-control" type="search" placeholder="Search">
                <button class="btn btn-danger" type="submit"><i class="bi bi-search"></i></button>
            </div>
        </form>

        <!-- Icons -->
        <div>
            <a href="#" class="text-white me-3"><i class="bi bi-heart"></i> Wishlist</a>
            <a href="#" class="text-white me-3"><i class="bi bi-cart"></i> Your Cart</a>
            <a href="#" class="text-white"><i class="bi bi-person"></i> Sign In</a>
        </div>
    </div>
</nav>

<!-- Submenu -->
<div class="bg-light py-2">
    <div class="container">
        <ul class="nav">
            <li class="nav-item"><a class="nav-link" href="#">Headlight</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Radiator</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Car Spares</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Car Battery</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Premium Products</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Engine Parts</a></li>
        </ul>
    </div>
</div>