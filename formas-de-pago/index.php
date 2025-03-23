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
    <title>Formas de pago | Industrias Novaquim S.A.S. Productos de aseo a la medida de sus necesidades</title>
    <?php include('../inc/assets.php') ?>
<style>
   /* .qr ul {
        list-style: none;
    }
    .qr ul li::before {
        content: "✅";
        display: inline-block;
        margin-right: 0.2rem;
    }

    .qr ul ul li::before {
        content: "📌";
    }
    .qr ul ul ul li::before {
        content: "🤷‍♀️";
    }*/
   .check-list li, .plus-list li {
       list-style-type: none;
       padding: 7px 0 7px 24px;
       font-size: 14px;
       line-height: 1.5;
   }
   .check-list li:before, .plus-list li:before {
       content: "";
       width: 14px;
       height: 12px;
       background: url(/img/icon-global-863d50621b14046616519056916ec67ac8a680fcb1c994a27ec6c1a92e9569d5.svg) no-repeat -155px -50px;
       float: left;
       margin: 5px 0 0 -24px;
   }
</style>

</head>

<body>
<div id="contenedor" class="container-fluid">
    <?php include '../inc/top-header.php' ?>
    <?php include '../inc/menu.php' ?>

    <section class="my-5">
        <div class="container">

            <div class="row qr">
                <div class="col-sm-6">
                    <h3><span style="color: #000080;">PAGO CÓDIGO QR</span></h3>
                    <p><strong>Dirección:</strong></p>
                    <p>Puedes cancelar utilizando el código QR a partir la aplicación de tu banco en tu celular</p>
                    <ul class="check-list">
                        <li>Puedes pagar en cualquier momento.</li>
                        <li>No hay necesidad de ingresar la información financiera.</li>
                        <li>Es una manera segura de pagar tus facturas.</li>
                    </ul>
                    <p><string>Sin costo</string> desde la app de cualquier entidad habilitada</p>
                    <img src="/img/entidades.jpg" alt="app habilitadas" style="border-radius: 10px;">
                </div>
                <div class="col-sm-6">
                    <img src="/img/novaquim-qr.jpg" alt="codigo QR" >
                </div>
            </div>

        </div>
    </section>

</div>
<?php include '../inc/footer.php' ?>
<script src="../js/script.js"></script>
</body>

</html>
