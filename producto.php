<?php
$slugProducto = $_GET['producto'];
$slugCategoria = $_GET['categoria'];
include_once('inc/config_db.php');
$sql = "SELECT title, meta_title, meta_description, image_1, image_2, image_3, description, slug
        FROM product p
        WHERE slug =:slugProducto";
$stmt = $con->prepare($sql);
$stmt->execute(array('slugProducto' => $slugProducto));
$producto = $stmt->fetch(PDO::FETCH_ASSOC);
$sql = "SELECT c.id, c.name, c.slug, count(p.id) productsNumber
        FROM category c
        LEFT JOIN product p on c.id = p.category_id
        GROUP BY c.id";
$stmt = $con->prepare($sql);
$stmt->execute();
$categoriaList = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= $producto['meta_description'] ?>"/>
    <link rel="icon" href="img/favicon.ico" type="image/ico" sizes="16x16">
    <title><?= $producto['meta_title'] ?> | Industrias Novaquim S.A.S. Productos de aseo a la medida de sus
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
                    <h3 class="entry-title text-uppercase mt-4 mb-3"><?= $producto['title'] ?></h3>
                    <hr>
                    <div class="container-fluid">
                        <div class="row pt-4">
                            <div class="col-sm-4 text-center">
                                <div class="et_pb_animation_left et-animated mb-4">
                                    <img class="img-fluid"
                                         src="<?= ADMIN_URL . 'uploads/images/' . $producto['image_1'] ?>"
                                         alt="<?= $producto['title'] ?>">
                                </div>
                                
                                <?php
                                if (isset($producto['image_2']) && $producto['image_2'] != ''):
                                    ?>
                                <div class="et_pb_animation_left et-animated mb-4">
                                    <img class="img-fluid"
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
                                    <img class="img-fluid"
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
                </article>
                <aside class="col-sm-2">
                    <h5>Categorías</h5>
                    <ul class="nav flex-column categoria-list">
                        <?php
                        foreach ($categoriaList as $categoria):
                            ?>
                            <li class="nav-item my-1">
                                <a class="nav-link <?= $categoria['slug'] == $slugCategoria ? 'active' : '' ?>"
                                   href="<?= APP_URL . 'productos/' . $categoria['slug'] ?>"><?= $categoria['name'] ?>
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
>