<?php
$sql = "SELECT id, name, slug FROM category";
$stmt = $con->prepare($sql);
$stmt->execute();
$categorias = [];
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $categorias[]=$row;
}
?>


<!-- ============= COMPONENT ============== -->
<div class="row">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark-blue" id="navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="img/logo.png" alt="Industrias Novaquim S.A.S." id="logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"  aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="main_nav">
                <ul class="navbar-nav flex-row flex-wrap ms-md-auto">
                    <li class="nav-item active"> <a class="nav-link" href="#">Inicio </a> </li>
                    <li class="nav-item"><a class="nav-link" href="#"> Quienes somos </a></li>
                    <li class="nav-item dropdown has-megamenu">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"> Productos  </a>
                        <div class="dropdown-menu megamenu" role="menu">
                            <div class="row g-3">
                                <?php
                                foreach ($categorias as $categoria):
                                ?>
                                <div class="col-megamenu col-md-2">
                                    <h6 class="title"><a class="nav-link" href="<?=APP_URL.$categoria['slug']?>"><?=$categoria['name']?></a></h6>
                                    <ul class="list-unstyled">
                                        <li><a class="dropdown-item" href="#">Custom Menu</a></li>
                                        <li><a class="dropdown-item" href="#">Custom Menu</a></li>
                                        <li><a class="dropdown-item" href="#">Custom Menu</a></li>
                                        <li><a class="dropdown-item" href="#">Custom Menu</a></li>
                                        <li><a class="dropdown-item" href="#">Custom Menu</a></li>
                                        <li><a class="dropdown-item" href="#">Custom Menu</a></li>
                                    </ul>
                                </div>  <!-- col-megamenu.// -->
                                <?php
                                endforeach;
                                ?>
                            </div><!-- end row -->
                        </div> <!-- dropdown-mega-menu.// -->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#"> Servicios </a></li>
                    <li class="nav-item"><a class="nav-link" href="#"> Distribuidores </a></li>
                    <li class="nav-item"><a class="nav-link" href="#"> Contacto </a></li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-light" type="submit"><i class="bi bi-search"></i></button>
                </form>
            </div> <!-- navbar-collapse.// -->
        </div> <!-- container-fluid.// -->
    </nav>
</div>


<!-- ============= COMPONENT END// ============== -->
