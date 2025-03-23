<?php
$sql = "SELECT id, name, slug FROM category";
$stmt = $con->prepare($sql);
$stmt->execute();
$categoriasMenu = $stmt->fetchAll(PDO::FETCH_UNIQUE | PDO::FETCH_ASSOC);
foreach ($categoriasMenu as $key => $categoria) {
    $sql2 = "SELECT title, slug FROM product
            WHERE category_id=:category_id";
    $stmt2 = $con->prepare($sql2);
    $stmt2->execute(array('category_id' => $key));
    $categoriasMenu[$key]['productos'] = $stmt2->fetchAll(PDO::FETCH_ASSOC);
}
$sql3 = "SELECT id, name, slug FROM mercado";
$stmt3 = $con->prepare($sql3);
$stmt3->execute();
$mercadosMenu = $stmt3->fetchAll(PDO::FETCH_UNIQUE | PDO::FETCH_ASSOC);
foreach ($mercadosMenu as $key => $mercado) {
    $sql4 = "SELECT title, slug FROM product
            WHERE mercado_id=:mercado_id";
    $stmt4 = $con->prepare($sql4);
    $stmt4->execute(array('mercado_id' => $key));
    $mercadosMenu[$key]['productos'] = $stmt4->fetchAll(PDO::FETCH_ASSOC);
}
?>


<!-- ============= COMPONENT ============== -->
<div class="row">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark-blue" id="navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= APP_URL ?>"><img src="/img/logo.png" alt="Industrias Novaquim S.A.S." id="logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="main_nav">
                <ul class="navbar-nav flex-wrap">
                    <li class="nav-item active"><a class="nav-link" href="<?= APP_URL ?>">Inicio </a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= APP_URL ?>quienes-somos/"> Quiénes somos </a></li>
                    <li class="nav-item dropdown has-megamenu">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"> Productos </a>
                        <div class="dropdown-menu megamenu" role="menu">
                            <div class="row g-3">
                                <?php
                                foreach ($categoriasMenu as $categoria):
                                    ?>
                                    <div class="col-megamenu col-md-2">
                                        <h6 class="title fw-bold"><a class="nav-link"
                                                             href="<?= APP_URL .'productos/categoria/'. $categoria['slug'] . '/'?>"><?= $categoria['name'] ?></a>
                                        </h6>
                                        <ul class="list-unstyled">
                                            <?php
                                                foreach ($categoria['productos'] as $productoMenu):
                                                    ?>
                                                    <li class="ps-2"><a class="nav-link"
                                                           href="<?= APP_URL .'productos/' . $productoMenu['slug']. '/' ?>"><?= $productoMenu['title'] ?></a>
                                                    </li>
                                                <?php
                                                endforeach;
                                            ?>
                                        </ul>
                                    </div>  <!-- col-megamenu.// -->
                                <?php
                                endforeach;
                                ?>
                            </div><!-- end row -->
                        </div> <!-- dropdown-mega-menu.// -->
                    </li>
                    <li class="nav-item dropdown has-megamenu">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"> Mercados </a>
                        <div class="dropdown-menu megamenu" role="menu">
                            <div class="row g-3">
                                <?php
                                foreach ($mercadosMenu as $mercado):
                                    ?>
                                    <div class="col-megamenu col-md-2">
                                        <h6 class="title fw-bold"><a class="nav-link"
                                                             href="<?= APP_URL .'productos/mercado/'. $mercado['slug']. '/' ?>"><?= $mercado['name'] ?></a>
                                        </h6>
                                        <ul class="list-unstyled">
                                            <?php
                                                foreach ($mercado['productos'] as $productoMenu):
                                                    ?>
                                                    <li class="ps-2"><a class="nav-link"
                                                           href="<?= APP_URL .'productos/' . $productoMenu['slug']. '/' ?>"><?= $productoMenu['title'] ?></a>
                                                    </li>
                                                <?php
                                                endforeach;
                                            ?>
                                        </ul>
                                    </div>  <!-- col-megamenu.// -->
                                <?php
                                endforeach;
                                ?>
                            </div><!-- end row -->
                        </div> <!-- dropdown-mega-menu.// -->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="<?= APP_URL?>servicios/"> Servicios </a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= APP_URL?>distribuidores/"> Distribuidores </a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= APP_URL?>formas-de-pago/"> Formas de pago </a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= APP_URL?>contacto/"> Contacto </a></li>
                </ul>
                <!--<form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-light" type="submit"><i class="bi bi-search"></i></button>
                </form>-->
            </div> <!-- navbar-collapse.// -->
        </div> <!-- container-fluid.// -->
    </nav>
</div>


<!-- ============= COMPONENT END// ============== -->
