<?php
include_once('../inc/config_db.php');
$sql = "SELECT id, distribuidor, contacto, telefono, celular, direccion, longitud, latitud FROM distribuidor WHERE estado=1";
$stmt = $con->prepare($sql);
$stmt->execute();
$distribuidores = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/img/favicon.ico" type="image/ico" sizes="16x16">
    <title>Distribuidores | Industrias Novaquim S.A.S. Productos de aseo a la medida de sus necesidades</title>
    <?php include('../inc/assets.php') ?>
    <script type="text/javascript">
        var distribuidores = <?php echo json_encode($distribuidores ); ?>;
    </script>

    <script type="module" src="/js/map.js"></script>


</head>

<body>
<div id="contenedor" class="container-fluid">
    <?php include '../inc/top-header.php' ?>
    <?php include '../inc/menu.php' ?>


    <section>
        <div class="container">

            <div class="row my-5">
                <div class="col-sm-5">
                    <hr/>
                </div>
                <div class="col-sm-2"><h4>DISTRIBUIDORES</h4></div>
                <div class="col-sm-5">
                    <hr/>
                </div>
            </div>

            <!--The div element for the map -->
            <div id="map" data-map="<?=str_replace('"', "'", json_encode($distribuidores, true ))?>"></div>

        </div>
    </section>


</div>
<?php include '../inc/footer.php' ?>
<script src="../js/script.js"></script>
<script async
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0Xve7mmgRVjfFSmHrCIB1qdu1nKYR3jA&region=CO&language=es&callback=initMap">
</script>

</body>

</html>
