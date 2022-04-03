<?php
include_once('inc/config_db.php');
$sql = "SELECT id, title, subtitle, background_image, front_image FROM banner";
$stmt = $con->prepare($sql);
$stmt->execute();
$banners = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/favicon.ico" type="image/ico" sizes="16x16">
    <title>Industrias Novaquim S.A.S. | Productos de aseo a la medida de sus necesidades</title>
    <?php include('inc/assets.php') ?>

</head>

<body>
<div id="contenedor" class="container-fluid">
    <?php include 'inc/top-header.php' ?>
    <?php include 'inc/menu.php' ?>


    <section id="carouselSection">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <?php
                foreach ($banners as $key => $banner):
                    ?>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?= $key ?>"
                        <?= $key == 0 ? 'class="active" aria-current="true"' : '' ?>
                            aria-label="Slide <?= $key + 1 ?>"></button>
                <?php
                endforeach;
                ?>
            </div>
            <div class="carousel-inner">
                <?php
                foreach ($banners as $key => $banner):
                    ?>
                    <div class="carousel-item <?= $key == 0 ? 'active' : '' ?>">
                        <img src="<?= ADMIN_URL ?>uploads/images/<?= $banner['background_image'] ?>"
                             class="d-block w-100" alt="<?= $banner['title'] ?>">
                        <div class="et_pb_animation_left et-animated mb-4 image-front">
                            <img class="image-banner" src="<?= ADMIN_URL ?>uploads/images/<?= $banner['front_image'] ?>"
                                 alt="<?= $banner['subtitle'] ?>">
                        </div>
                        <div class="carousel-caption banner-info">
                            <h5><?= $banner['title'] ?></h5>
                            <p><?= $banner['subtitle'] ?></p>
                        </div>
                    </div>
                <?php
                endforeach;
                ?>

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>


    </section>
    <section>
        <div class="container">

            <h5 class="text-center p-md-5 py-3">Industrias Novaquim S.A.S es una compañía con más de 20 años de experiencia en
                el mercado reconocida por la fabricación de insumos líquidos de Higiene y Limpieza para el Mantenimiento
                de pisos, Aseo doméstico, Limpieza general, Lavado de ropa, Limpieza de equipos, Limpieza automotriz y
                Productos Industriales con los más altos estándares de calidad.</h5>

        </div>
    </section>
    <section>
        <div class="container">

            <div class="row">
                <div class="col-sm-3">
                    <h3><span style="color: #000080;">UBICACIÓN</span></h3>
                    <p><strong>Dirección:</strong></p>
                    <p>Calle 35 C Sur No. 26 F - 40</p>
                    <p>Bogotá D.C. Colombia</p>
                    <p><strong>Teléfonos:</strong></p>
                    <p>(+57-601) 203 9484 - (+57-601) 202 2912</p>
                    <p><strong>Celular:</strong></p>
                    <p>(+57) 311 252 6120</p>
                    <p><strong>Email:</strong></p>
                    <p><a href="mailto:info@novaquim.com?target=">info@novaquim.com</a></p>
                </div>
                <div class="col-sm-9">
                    <iframe width="100%" height="450"
                            src="https://embed.waze.com/es/iframe?zoom=17&lat=4.587338722815989&lon=-74.12103295326234&pin=1"></iframe>
                </div>
            </div>

        </div>
    </section>

</div>
<?php include 'inc/footer.php' ?>
<script src="/js/script.js"></script>
</body>

</html>
