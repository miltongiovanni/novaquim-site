<?php
include_once('../inc/config_db.php');
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
    <link rel="icon" href="/img/favicon.ico" type="image/ico" sizes="16x16">
    <title>Quienes Somos | Industrias Novaquim S.A.S. Productos de aseo a la medida de sus necesidades</title>
    <?php include('../inc/assets.php') ?>

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
                <div class="col-sm-2"><h4>QUIÉNES SOMOS</h4></div>
                <div class="col-sm-5">
                    <hr/>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-sm-3 text-center">
                    <img class="img-fluid et_pb_animation_left et-animated" src="/img/logoCompleto.png" alt="Industrias Novaquim S.A.S.">
                </div>
                <div class="col-sm-9">
                    <h5>
                        Industrias Novaquim S.A.S. es una empresa dinámica con grandes ideales, fuertes principios,
                        inmenso potencial y talento humano para brindar productos que superen las expectativas de
                        nuestros clientes. La empresa está formada por un grupo de profesionales multidisciplinarios,
                        que le apostamos al país con el objetivo social de generar nuevas oportunidades de empleo.
                        Nuestro objetivo es la fabricación de productos para la Higiene y Limpieza doméstica e
                        institucional, éstos son elaborados siguiendo los más exigentes estándares de calidad, lo cual
                        nos permite ofrecer buenos productos a los mejores precios cumpliendo así una de nuestras
                        premisas: “Excelente calidad a buen precio, es posible”.
                    </h5>

                </div>
            </div>

            <div class="row my-5">
                <div class="col-sm-5">
                    <hr/>
                </div>
                <div class="col-sm-2"><h4>VISIÓN</h4></div>
                <div class="col-sm-5">
                    <hr/>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-sm-3 text-center">
                    <img class="img-fluid et_pb_animation_left et-animated" src="/img/vision.png" alt="Vision Industrias Novaquim S.A.S.">
                </div>
                <div class="col-sm-9">
                    <h5>
                        Para el año 2021, queremos ser una empresa reconocida en el mercado local por la elaboración y
                        comercialización de productos de Higiene y Limpieza de calidad y la aplicación de innovación
                        permitiendo tener un portafolio de productos especializados para satisfacer las necesidades de
                        cada cliente.
                    </h5>

                </div>
            </div>
            <div class="row my-5">
                <div class="col-sm-5">
                    <hr/>
                </div>
                <div class="col-sm-2"><h4>MISIÓN</h4></div>
                <div class="col-sm-5">
                    <hr/>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-sm-3 text-center">
                    <img class="img-fluid et_pb_animation_left et-animated" src="/img/mision.png" alt="Mision Industrias Novaquim S.A.S.">
                </div>
                <div class="col-sm-9">
                    <h5>
                        Industrias Novaquim S.A.S aplica el conocimiento, talento humano y tecnología en la elaboración
                        y comercialización de productos de Higiene y Limpieza creando soluciones que satisfacen las
                        expectativas de nuestros clientes a través de la innovación y el mejoramiento continuo de los
                        procesos productivos, la investigación y el desarrollo de productos amigables con el medio
                        ambiente con la más alta calidad, buscando crecimiento y rentabilidad.
                    </h5>

                </div>
            </div>
            <div class="row my-5">
                <div class="col-sm-5">
                    <hr/>
                </div>
                <div class="col-sm-2"><h4>VALORES</h4></div>
                <div class="col-sm-5">
                    <hr/>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-sm-3 text-center">
                    <img class="img-fluid et_pb_animation_left et-animated" src="/img/valores.png" alt="Valores Industrias Novaquim S.A.S.">
                </div>
                <div class="col-sm-9">
                    <ul class="h5">
                        <li><strong>Respeto:</strong> Tratar humanamente a las personas valorando sus opiniones,
                            creencias, estilos de vida y autonomía.
                        </li>
                        <li><strong>Responsabilidad:</strong> Cumplir con los compromisos y obligaciones adquiridas
                            dando respuestas adecuadas y oportunas preservando el medio ambiente.
                        </li>
                        <li><strong>Calidad:</strong> Enfocar productos y procesos acordes a las mejores prácticas y
                            estándares cumpliendo las expectativas del cliente.
                        </li>
                        <li><strong>Confianza:</strong> Generar pertenencia de todos los empleados y clientes generando
                            lealtad y aprecio a la organización.
                        </li>
                        <li><strong>Honestidad:</strong> Actuar rectamente, lo que denota sinceridad y coherencia entre
                            lo que se piensa, se dice y lo que se hace.
                        </li>
                        <li><strong>Trabajo en Equipo:</strong> Unión de esfuerzos para alcanzar una meta común
                            aportando lo mejor de sus competencias.
                        </li>
                    </ul>

                </div>
            </div>

        </div>
    </section>
    <section>
        <div class="container">

            <h5 class="text-center p-5">Para el año 2024, queremos seguir siendo una empresa reconocida en el mercado
                local por la
                elaboración y comercialización de productos de Higiene y Limpieza de calidad y la aplicación de
                innovación permitiendo tener un portafolio de productos especializados para satisfacer las necesidades
                de cada cliente.</h5>

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
<?php include '../inc/footer.php' ?>
<script src="../js/script.js"></script>
</body>

</html>
