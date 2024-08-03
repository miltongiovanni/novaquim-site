<?php
$slugTipo = $_GET['tipo'];
$slugDescripcion = $_GET['descripcion'];
include_once('inc/config_db.php');
if ($slugTipo === 'categoria'){
    $sql = "SELECT p.id, p.category_id, p.title, p.meta_title, p.meta_description, p.image_1, p.description, p.slug, c.id, c.name, c.slug
        FROM product p
        LEFT JOIN category c on c.id = p.category_id
        WHERE c.slug=:slugCategoria";
}elseif ($slugTipo === 'mercado'){
    $sql = "SELECT p.id, p.category_id, p.title, p.meta_title, p.meta_description, p.image_1, p.description, p.slug, m.id, m.name, m.slug
        FROM product p
        LEFT JOIN mercado m on m.id = p.mercado_id
        WHERE m.slug=:slugCategoria";
}

$stmt = $con->prepare($sql);
$stmt->execute(array('slugCategoria' => $slugDescripcion));
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
if ($slugTipo === 'categoria'){
    $sql = "SELECT c.id, c.name, c.slug, count(p.id) productsNumber
        FROM category c
        LEFT JOIN product p on c.id = p.category_id
        GROUP BY c.id";
}elseif ($slugTipo === 'mercado'){
    $sql = "SELECT m.id, m.name, m.slug, count(p.id) productsNumber
        FROM mercado m
        LEFT JOIN product p on m.id = p.mercado_id
        GROUP BY m.id";
}

$stmt = $con->prepare($sql);
$stmt->execute();
$categoriaList = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/img/favicon.ico" type="image/ico" sizes="16x16">
    <title><?= $productos[0]['name'] ?> | Industrias Novaquim S.A.S. Productos de aseo a la medida de sus
        necesidades</title>
    <?php include('inc/assets.php') ?>

</head>

<body>
<div id="contenedor" class="container-fluid">
    <?php include 'inc/top-header.php' ?>
    <?php include 'inc/menu.php' ?>
    <section>
        <div class="container">
            <div class="row pt-3 pb-4">
                <article class="col-sm-10 pb-5">
                    <?php
                    foreach ($productos as $producto):
                    ?>

                    <h3 class="entry-title text-uppercase mt-4 mb-3"><?= $producto['title'] ?></h3>
                    <hr>
                    <div class="container-fluid">
                        <div class="row pt-4">
                            <div class="col-sm-4 text-center">
                                <div class="et_pb_animation_left et-animated mb-4">
                                    <img class="img-fluid img-prod"
                                         src="<?= ADMIN_URL . 'uploads/images/' . $producto['image_1'] ?>"
                                         alt="<?= $producto['title'] ?>">
                                </div>

                                <?php
                                if (isset($producto['image_2']) && $producto['image_2'] != ''):
                                    ?>
                                    <div class="et_pb_animation_left et-animated mb-4">
                                        <img class="img-fluid img-prod"
                                             src="<?= ADMIN_URL . 'uploads/images/' . $producto['image_2'] ?>"
                                             alt="<?= $producto['title'] ?>">
                                    </div>


                                <?php
                                endif;
                                ?>
                                <?php
                                if (isset($producto['image_3']) && $producto['image_3'] != ''):
                                    ?>
                                    <div class="et_pb_animation_left et-animated mb-4">
                                        <img class="img-fluid img-prod"
                                             src="<?= ADMIN_URL . 'uploads/images/' . $producto['image_3'] ?>"
                                             alt="<?= $producto['title'] ?>">
                                    </div>


                                <?php
                                endif;
                                ?>
                            </div>
                            <div class="col-sm-8">
                                <?= $producto['description'] ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    endforeach;
                    ?>

                </article>
                <aside class="col-sm-2 px-0">
                    <h5><?= $slugTipo === 'categoria' ? 'Categorías' : 'Mercados'?></h5>
                    <ul class="nav flex-column categoria-list">
                        <?php
                        foreach ($categoriaList as $categoria):
                            ?>
                            <li class="nav-item my-1">
                                <a class="nav-link <?= $categoria['slug'] == $slugDescripcion ? 'active' : '' ?>"
                                   href="<?= APP_URL . 'productos/' . $slugTipo . '/' . $categoria['slug'] ?>"><?= $categoria['name'] ?>
                                    (<?= $categoria['productsNumber'] ?>)</a>
                            </li>
                        <?php
                        endforeach;
                        ?>


                    </ul>
                </aside>
            </div>


        </div>
    </section>
</div>
<?php include 'inc/footer.php' ?>
<script src="/js/script.js"></script>
</body>

</html>
