<?php
$sql = "SELECT  description, value FROM configuration";
$stmt = $con->prepare($sql);
$stmt->execute();
$configuration = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);
?>
<footer id="main-footer" class="pt-5">

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h5>Contáctenos</h5>
                <ul class="list-unstyled">
                    <li class="mt-2">
                        <i class="fas fa-phone"></i>&nbsp;&nbsp;(57 1) 203 9484 - (57 1) 202 2912
                    </li>
                    <li class="mt-2">
                        <i class="fas fa-at"></i>&nbsp;&nbsp;
                        <span id="emq"><a href="mailto:info@novaquim.com">info@novaquim.com</a></span>
                    </li>
                    <li class="mt-2">
                        <i class="fas fa-home"></i> &nbsp; Calle 35 C sur No. 26F - 40<br> Zona Industrial Bravo Páez
                    </li>
                </ul>
            </div>
            <div class="col-md-3">
                <ul id="menu-menu-pie" class="nav flex-column">
                    <li id="menu-item-581" class="nav-item"><a class="nav-link" href="<?= APP_URL?>">Inicio</a></li>
                    <li id="menu-item-582" class="nav-item"><a class="nav-link" href="<?= APP_URL?>quienes-somos/">Quienes somos</a></li>
                    <li id="menu-item-583" class="nav-item"><a class="nav-link" href="<?= APP_URL?>politica-de-privacidad/">Política de privacidad</a></li>
                    <li id="menu-item-584" class="nav-item"><a class="nav-link" href="<?= APP_URL?>contacto/">Contacto</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h5>Redes Sociales</h5></p>
                <ul class="list-unstyled">
                    <li class="mt-2"><a href="<?= $configuration['facebook_url']?>"><img class="social-logo" src="/img/facebook.png" alt="facebook">Facebook</a></li>
                    <li class="mt-2"><a href="<?= $configuration['twitter_url']?>"><img  class="social-logo" src="/img/twitter.png" alt="twitter">Twitter</a></li>
                    <li class="mt-2"><img class="social-logo" src="/img/whatsapp.png" alt="twitter"><?= $configuration['celular_1']?></li>
                </ul>
            </div>
            <div class="col-md-3">
                <img src="/img/logo.png" class="img-fluid" alt="Industrias Novaquim S.A.S." >
            </div>
        </div>


    <div id="footer-bottom" class="py-3">
            <div id="footer-info" class="text-muted">Diseñado por Industrias Novaquim S.A.S. © <?= date("Y") ?></div>
    </div>
</footer>