<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />
    <title>Bach Hoa Si - SecondHand</title>
    <link rel="icon" href="Image/BHS.png" />
</head>

<body>
    <div class="container">
        <header class="d-flex flex-wrap justify-content-center justify-content-md-between py-3 border-bottom">
            <div class="col-md-3 d-flex ms-md-3 text-dark">
                <img title="Bach hoa si" onclick="location.href='index.php'" src="Image/BHS.png" height="40" width="40" class="me-2" style="border-radius: 5px" role="button" />
                <form class="d-flex input-group w-auto">
                    <input type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                    <button class="btn btn-primary" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
            </div>
            <ul class="nav col-md-auto justify-content-center">
                <li><a href="index.php" class="nav-link px-2 link-dark">Home</a></li>
                <li><a href="?page=shop" class="nav-link px-2 link-dark">Shop</a></li>
                <li><a href="?page=contact" class="nav-link px-2 link-dark">Contact</a></li>
                <li><a href="?page=about" class="nav-link px-2 link-dark">About</a></li>
            </ul>
            <div class="col-md-3 me-md-3 text-end">
                <?php
                if (isset($_SESSION['us']) && $_SESSION['us'] != "") {
                ?>
                    <div class="nav navbar navbar-expand-md justify-content-end">
                        <!-- Icon -->
                        <a class="text-reset me-3" href="?page=logout">
                            <i class="bi bi-cart-fill"></i>
                        </a>

                        <!-- Notifications -->
                        <div class="dropdown">
                            <a class="text-reset me-3" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-bell-fill"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                                <li>
                                    <a class="dropdown-item" href="#">Some news</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">Another news</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </li>
                            </ul>
                        </div>

                        <!-- Avatar -->
                        <div class="dropdown">
                            <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-fill" loading="lazy"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                                <li>
                                    <a class="dropdown-item" href="#">My profile</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">Settings</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="?page=logout">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                <?php
                } else {
                ?>
                    <div class="nav navbar navbar-expand-md" style="justify-content: flex-end">
                        <!-- Icon -->
                        <a class="text-reset me-3" href="?page=logout">
                            <i class="bi bi-cart-fill"></i>
                        </a>

                        <!-- Notifications -->
                        <div class="dropdown">
                            <a class="text-reset me-3" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-bell-fill"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                                <li>
                                    <a class="dropdown-item" href="#">Some news</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">Another news</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </li>
                            </ul>
                        </div>

                        <!-- Avatar -->
                        <div class="dropdown">
                            <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-fill" loading="lazy"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                                <li>
                                    <a class="dropdown-item" href="#">My profile</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">Settings</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="?page=logout">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </header>
        <div class="d-flex navbar navbar-expand-md" style="justify-content: flex-end">
            <!-- Icon -->
            <a class="text-reset me-3" href="#">
                <i class="bi bi-cart-fill"></i>
            </a>

            <!-- Notifications -->
            <div class="dropdown">
                <a class="text-reset me-3" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-bell-fill"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                    <li>
                        <a class="dropdown-item" href="#">Some news</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Another news</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </li>
                </ul>
            </div>

            <!-- Avatar -->
            <div class="dropdown">
                <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-fill" loading="lazy"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                    <li>
                        <a class="dropdown-item" href="#">My profile</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Settings</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>