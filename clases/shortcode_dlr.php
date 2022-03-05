<?php

    class shortcodedlr
    {
        public function FormularioContacto1(){
            $html = '
            <div class="container py-4">
            <form method="POST">
              <div class="mb-3">
                <label class="form-label" for="name">Nombre</label>
                <input class="form-control" id="name" type="text" placeholder="Nombre..." data-sb-validations="required" name="nombrecontacto" />
              </div>
              <div class="mb-3">
                <label class="form-label" for="emailAddress">Email</label>
                <input class="form-control" id="emailAddress" type="email" placeholder="Email..." data-sb-validations="required, email" name="emailcontacto" />
              </div>
              <div class="mb-3">
                <label class="form-label" for="message">Mensaje</label>
                <textarea class="form-control" id="message" type="text" placeholder="Introduzca el mensaje..." style="height: 10rem;" data-sb-validations="required" name="mensajecontacto"></textarea>
              </div>
              <br>
              <div class="d-grid">
                <button class="btn btn-primary btn-lg" id="submitButton" type="submit" name="enviarContacto">Enviar</button>
              </div>
            </form>
          </div>
            ';
            return $html;
      }

      public function FormularioContacto2(){
        wp_enqueue_style('bootstrapCSS',plugins_url('../admin/bootstrap/css/contactform2.css',__FILE__));
        $html = '
          <div class="bg-contact100">
          <div class="container-contact100">
              <div class="wrap-contact100">
                  <div class="contact100-pic js-tilt" data-tilt>
                      <img src="https://i.imgur.com/VRFiMzM.png" alt="IMG">
                  </div>
                  <form class="contact100-form validate-form" method="POST">
                      <span class="contact100-form-title">
                          Contacta conmigo
                      </span>
                      <div class="wrap-input100 validate-input" data-validate="Name is required">
                          <input class="input100" type="text" name="nombrecontacto" placeholder="Nombre">
                          <span class="focus-input100"></span>
                          <span class="symbol-input100">
                              <i class="fa fa-user" aria-hidden="true"></i>
                          </span>
                      </div>
                      <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                          <input class="input100" type="text" name="emailcontacto" placeholder="Email">
                          <span class="focus-input100"></span>
                          <span class="symbol-input100">
                              <i class="fa fa-envelope" aria-hidden="true"></i>
                          </span>
                      </div>
                      <div class="wrap-input100 validate-input" data-validate="Message is required">
                          <textarea class="input100" name="mensajecontacto" placeholder="Mensaje..."></textarea>
                          <span class="focus-input100"></span>
                      </div>
                      <div class="container-contact100-form-btn">
                          <button class="contact100-form-btn" type="submit" name="enviarContacto">
                              Enviar
                          </button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
        ';
        return $html;
      }

      public function FormularioContacto3(){
        wp_enqueue_style('bootstrapCSS',plugins_url('../admin/bootstrap/css/contactform3.css',__FILE__));
        $html = '
        <div class="contact-clean">
          <form method="POST">
                <h2 class="text-center">Contact us</h2>
                <div class="form-group"><input class="form-control" type="text" name="nombrecontacto" placeholder="Name"></div>
                <div class="form-group"><input class="form-control" type="email" name="emailcontacto" placeholder="Email"></div>
                <div class="form-group"><textarea class="form-control" name="mensajecontacto" placeholder="Message" rows="14"></textarea></div>
                <div class="form-group"><button class="btn btn-primary" type="submit" name="enviarContacto">send </button></div>
            </form>
        </div>
        ';
        return $html;
      }
    }

?>