<h3 class="mb-3">Contáctenos</h3>
<form class="row g-3 needs-validation" id="contact_form" novalidate>
    <div class="col-md-6">
        <label for="nombre_contacto" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre_contacto" name="nombre_contacto" value="" required>
        <div class="valid-feedback">
        </div>
        <div class="invalid-feedback" id="contactoMessage">
            Este valor es requerido.
        </div>
    </div>
    <div class="col-md-6">
        <label for="organizacion" class="form-label">Organización</label>
        <input type="text" class="form-control" id="organizacion" name="organizacion" value="" required>
        <div class="valid-feedback">
        </div>
        <div class="invalid-feedback" id="organizacionMessage">
            Este valor es requerido.
        </div>
    </div>
    <div class="col-md-6">
        <label for="email_contacto" class="form-label">Correo electrónico</label>
        <input type="email" class="form-control" id="email_contacto" name="email_contacto" value="" required>
        <div class="invalid-feedback">
            Por favor escriba un correo electrónico válido.
        </div>
    </div>
    <div class="col-md-6">
        <label for="telefono" class="form-label">Teléfono</label>
        <input type="text" class="form-control" id="telefono" name="telefono" value="" required>
        <div class="invalid-feedback">
            Este valor es requerido.
        </div>
    </div>

    <div class="col-md-6">
        <label for="celular" class="form-label">Celular</label>
        <input type="text" class="form-control" name="celular" id="celular" required>
        <div class="invalid-feedback">
            Este valor es requerido.
        </div>
    </div>
    <div class="col-md-6">
        <label for="tipo_consulta" class="form-label">Tipo de consulta</label>
        <select class="form-select" id="tipo_consulta" name="tipo_consulta" required>
            <option value="" selected disabled>Seleccione el tipo de consulta</option>
            <option value="Solicitud de cotización">Solicitud de cotización</option>
            <option value="Soporte técnico">Soporte técnico</option>
            <option value="Consulta general">Consulta general</option>
            <option value="Solicitar Visita Técnica">Solicitar Visita Técnica</option>
        </select>
        <div class="invalid-feedback">
            Este valor es requerido.
        </div>
    </div>
    <div class="col-md-12">
        <label for="mensaje" class="form-label">Mensaje</label>
        <textarea class="form-control" id="mensaje" name="mensaje" rows="5" required></textarea>
        <div class="invalid-feedback">
            Este valor es requerido.
        </div>
    </div>

    <div class="col-12">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" id="acepta_politica" name="acepta_politica"
                   required>
            <label class="form-check-label" for="acepta_politica">
                Acepto la política de privacidad (Ver <a href="javascript:void(0)" data-bs-toggle="modal"
                                                         data-bs-target="#politicaModal">Política de privacidad</a>)
            </label>
            <div class="invalid-feedback">
                Debe aceptar la política de privacidad antes de enviar el formulario.
            </div>
        </div>
    </div>
    <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
    <div class="col-12">
        <button class="btn btn-primary" type="submit">Enviar</button>
    </div>
</form>
<button class="btn btn-primary" type="button" disabled id="processing" style="display: none">
    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
    Enviando el correo
</button>
<div id="respuesta-email" style="display: none" >
    <p>Su mensaje a ha sido enviado con éxito, uno de nuestros agentes se contactará con usted en los próximos días</p>

</div>

<!-- Modal -->
<div class="modal fade" id="politicaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header ps-5">
                <h4 class="modal-title" id="exampleModalLabel">POLÍTICA DE TRATAMIENTO PROTECCIÓN DE DATOS
                    PERSONALES<br> INDUSTRIAS NOVAQUIM S.A.S.</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-5">
                <?php include '../inc/politica.php' ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<script>
    var form = document.getElementById('contact_form');
    form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
        }else{
            event.preventDefault();
            form.classList.add('was-validated');
            document.getElementById('contact_form').style.display= 'none';
            document.getElementById('processing').style.display= 'block';
            grecaptcha.ready(function () {
                grecaptcha.execute('<?=$configuration['google_recaptcha_site_key']?>', {action: 'submit'}).then(function (token) {
                    // Add your logic to submit to your backend server here.
                    document.getElementById("g-recaptcha-response").value = token;
                    const XHR = new XMLHttpRequest();

                    // Bind the FormData object and the form element
                    const FD = new FormData( form );

                    // Defining event listener for readystatechange event
                    XHR.onreadystatechange = function(aEvt) {
                        // Check if the request is compete and was successful
                        if(XHR.readyState === 4 && XHR.status === 200) {
                            // Inserting the response from server into an HTML element
                            document.getElementById('processing').style.display= 'none';
                            document.getElementById('respuesta-email').style.display= 'block';
                        }
                    };

                    // Define what happens in case of error
                    XHR.addEventListener( "error", function( event ) {
                        alert( 'Oops! Something went wrong.' );
                    } );

                    // Set up our request
                    XHR.open( "POST", "/inc/sendForm.php", true );

                    // The data sent is what the user provided in the form
                    XHR.send( FD );
                });
            });
        }
    }, false);

</script>
