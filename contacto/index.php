<?php
include_once('../inc/config_db.php');
$sql = "SELECT  description, value FROM configuration";
$stmt = $con->prepare($sql);
$stmt->execute();
$configuration = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/img/favicon.ico" type="image/ico" sizes="16x16">
    <title>Contacto | Industrias Novaquim S.A.S. Productos de aseo a la medida de sus necesidades</title>
    <?php include('../inc/assets.php') ?>
    <script src="https://www.google.com/recaptcha/api.js?hl=es&render=<?=$configuration['google_recaptcha_site_key']?>"></script>


</head>

<body>
<div id="contenedor" class="container-fluid">
    <?php include '../inc/top-header.php' ?>
    <?php include '../inc/menu.php' ?>

    <section class="mt-5">
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
    <section>
        <div class="container">

            <div class="my-5">
                <?php include '../inc/contact_form.php' ?>
            </div>

        </div>
    </section>


</div>
<?php include '../inc/footer.php' ?>
<script src="../js/script.js"></script>
</body>

</html>
