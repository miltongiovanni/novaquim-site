<?php
$sql = "SELECT  description, value FROM configuration";
$stmt = $con->prepare($sql);
$stmt->execute();
$configuration = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);
?>
<footer id="main-footer" class="pt-5">

    <div class="container">
        <div class="row">
            <div class="col-md-3 navbar-dark">
                <h5>Contáctenos</h5>
                <ul class="flex-column navbar-nav">
                    <li class="nav-item">
                        <i class="fas fa-phone"></i>&nbsp;&nbsp;(57 601) 203 9484 - (57 601) 202 2912
                    </li>
                    <li class="nav-item">
                        <i class="fas fa-at"></i>&nbsp;&nbsp;
                        <span id="emq"><a class="nav-link d-inline-block" href="mailto:info@novaquim.com">info@novaquim.com</a></span>
                    </li>
                    <li class="nav-item">
                        <i class="fas fa-home"></i> &nbsp; Calle 35 C sur No. 26F - 40<br> Zona Industrial Bravo Páez
                    </li>
                </ul>
            </div>
            <div class="col-md-3 navbar-dark">
                <ul class="flex-column navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="<?= APP_URL?>">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= APP_URL?>quienes-somos/">Quienes somos</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= APP_URL?>politica-de-privacidad/">Política de privacidad</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= APP_URL?>contacto/">Contacto</a></li>
                </ul>
            </div>
            <div class="col-md-3 navbar-dark">
                <h5>Redes Sociales</h5>
                <ul class="flex-column navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="<?= $configuration['facebook_url']?>"><img class="social-logo" src="/img/facebook.png" alt="facebook">Facebook</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= $configuration['twitter_url']?>"><img  class="social-logo" src="/img/twitter.png" alt="twitter">Twitter</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= $configuration['instagram_url']?>"><img  class="social-logo" src="/img/instagram.png" alt="twitter">Instagram</a></li>
                    <li class="nav-item py-2"><img class="social-logo" src="/img/whatsapp.png" alt="twitter"><?= $configuration['celular_1']?></li>
                </ul>
            </div>
            <div class="col-md-3">
                <img src="/img/logo.png" class="img-fluid" alt="Industrias Novaquim S.A.S." >
            </div>
        </div>


    <div id="footer-bottom" class="py-3">
            <div id="footer-info" class="text-muted">Diseñado por Industrias Novaquim S.A.S. © <?= date("Y") ?></div>
    </div>
        <!-- WhatsApp personalizado -->
        <div class="whatsapp-chat" onclick="openWhatsApp()">
            <svg width="32" height="32" viewBox="0 0 90 90" fill="#4FCE5D"><path d="M90 43.841c0 24.213-19.779 43.841-44.182 43.841a44.256 44.256 0 0 1-21.357-5.455L0 90l7.975-23.522a43.38 43.38 0 0 1-6.34-22.637C1.635 19.628 21.416 0 45.818 0 70.223 0 90 19.628 90 43.841zM45.818 6.982c-20.484 0-37.146 16.535-37.146 36.859 0 8.065 2.629 15.534 7.076 21.61L11.107 79.14l14.275-4.537A37.122 37.122 0 0 0 45.819 80.7c20.481 0 37.146-16.533 37.146-36.857S66.301 6.982 45.818 6.982zm22.311 46.956c-.273-.447-.994-.717-2.076-1.254-1.084-.537-6.41-3.138-7.4-3.495-.993-.358-1.717-.538-2.438.537-.721 1.076-2.797 3.495-3.43 4.212-.632.719-1.263.809-2.347.271-1.082-.537-4.571-1.673-8.708-5.333-3.219-2.848-5.393-6.364-6.025-7.441-.631-1.075-.066-1.656.475-2.191.488-.482 1.084-1.255 1.625-1.882.543-.628.723-1.075 1.082-1.793.363-.717.182-1.344-.09-1.883-.27-.537-2.438-5.825-3.34-7.977-.902-2.15-1.803-1.792-2.436-1.792-.631 0-1.354-.09-2.076-.09s-1.896.269-2.889 1.344c-.992 1.076-3.789 3.676-3.789 8.963 0 5.288 3.879 10.397 4.422 11.113.541.716 7.49 11.92 18.5 16.223C58.2 65.771 58.2 64.336 60.186 64.156c1.984-.179 6.406-2.599 7.312-5.107.9-2.512.9-4.663.631-5.111z"></path></svg>
            <!--<img src="https://img.icons8.com/ios-filled/50/25D366/whatsapp.png" alt="WhatsApp">-->
            <div class="chat-text">
                <div class="agent-name">Contacto - Novaquim</div>
                <div class="message-preview">¿Necesitas ayuda? ¡Chatea con nosotros!</div>
            </div>
        </div>

        <style>
            .whatsapp-chat {
                position: fixed;
                bottom: 20px;
                right: 20px;
                display: flex;
                align-items: center;
                background-color: white;
                color: #25D366;
                padding: 10px 15px;
                border-radius: 50px;
                box-shadow: 0 4px 12px rgba(0,0,0,0.3);
                cursor: pointer;
                z-index: 1000;
                transition: background 0.3s;
            }

            .whatsapp-chat:hover {
                /*background-color: #1ebf59;*/
            }

            .whatsapp-chat img {
                width: 30px;
                height: 30px;
                margin-right: 10px;
            }

            .chat-text {
                display: flex;
                flex-direction: column;
            }

            .agent-name {
                font-weight: bold;
                font-size: 14px;
                line-height: 1;
                padding-left: 5px;
            }

            .message-preview {
                font-size: 12px;
                opacity: 0.9;
                line-height: 1.2;
                padding-left: 5px;
            }
        </style>

        <script>
            function openWhatsApp() {
                const phoneNumber = "573168731806"; // Tu número con código de país (sin +)
                const message = "Gracias por comunicarte con Industrias Novaquim esta comunicado con el departamento comercial ¿Cómo puedo ayudarte?";
                const url = `https://wa.me/${phoneNumber}?text=${encodeURIComponent(message)}`;
                window.open(url, "_blank");
            }
            const now = new Date();
            const hour = now.getHours();
            console.log(now, hour);

            if (hour >= 8 && hour <= 17) {
                document.querySelector('.whatsapp-chat').style.display = "flex";
            } else {
                document.querySelector('.whatsapp-chat').style.display = "none";
            }
        </script>

</footer>
<!--<script src="https://apps.elfsight.com/p/platform.js" defer></script>
<div class="elfsight-app-5b2e14fd-a845-4f27-9c88-c34d7e2c5ea5"></div>-->