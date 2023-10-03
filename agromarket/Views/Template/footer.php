      <!-- ======= Footer ======= -->
      <footer id="footer" class="footer">

          <div class="container">
              <div class="row gy-4">
                  <div class="col-lg-5 col-md-12 footer-info">
                      <a href="index.html" class="logo d-flex align-items-center">
                          <span>Paraíso Azul</span>
                      </a>
                      <p>El Centro Mesoamericano de Desarrollo Sostenible del Trópico Seco (CEMEDE). Es un programa de
                          investigación y extensión de la Universidad Nacional (UNA)</p>
                      <div class="social-links d-flex mt-4">
                          <a href="<?php echo TWITTER ?>" target="on_blank" class="twitter"><i
                                  class="bi bi-twitter"></i></a>
                          <a href="<?php echo FACEBOOK ?>" target="on_blank" class="facebook"><i
                                  class="bi bi-facebook"></i></a>
                          <a href="<?php echo INSTAGRAM ?>" target="on_blank" class="instagram"><i
                                  class="bi bi-instagram"></i></a>
                      </div>
                  </div>

                  <div class="col-lg-2 col-6 footer-links">
                      <h4>Enlaces útiles</h4>
                      <ul>
                          <li><a href="<?= base_url(); ?>">Inicio</a></li>
                          <li><a href="<?= base_url(); ?>/SobreNosotros/proyecto">Sobre el proyecto</a></li>
                          <li><a href="<?= base_url(); ?>/voluntariado">Voluntariado</a></li>
                          <li><a href="<?= base_url(); ?>/login">Iniciar sesión</a></li>
                          <li><a href="<?= base_url(); ?>/donacion">Donaciones</a></li>

                      </ul>
                  </div>

                  <div class="col-lg-2 col-6 footer-links">
                      <h4>Nuestros Servicios</h4>
                      <ul>
                          <li><a href="<?= base_url(); ?>/Servicios/alimentacion">Alimentación</a></li>
                          <li><a href="<?= base_url(); ?>/Servicios/hospedaje">Hospedaje</a></li>
                          <li><a href="<?= base_url(); ?>/Servicios/transporte">Transporte</a></li>
                          <li><a href="<?= base_url(); ?>/Servicios/tours">Tours</a></li>
                      </ul>
                  </div>

                  <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                      <h4>Contáctenos</h4>
                      <p>
                          CEMEDE <br>
                          50201, Nicoya, Costa Rica<br>
                          Costa Rica <br><br>
                          <strong>Teléfono:</strong> 2562 6212<br>
                          <strong>Correo:</strong> cemede@una.cr<br>
                      </p>

                  </div>

              </div>
          </div>

          <div class="container mt-4">
              <div class="copyright">
                  &copy; Copyright <strong><span>Paraíso Azul</span></strong>. All Rights Reserved
              </div>
              <div class="credits">

                  Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
              </div>
          </div>

      </footer><!-- End Footer -->
      <!-- End Footer -->

      <!-- boton para hacer scroll -->
      <a href="#" class="scroll-top d-flex align-items-center justify-content-center active"><i
              class="bi bi-arrow-up-short"></i></a>



      <script src="<?= media(); ?>/js/funtions_voluntariado.js"></script>
      <script>
const base_url = "<?= base_url(); ?>";
      </script>
      <!-- js de grupos -->
      <script src="<?= media(); ?>/js/views/functions_view_grupos.js"></script>

      <!-- Template Main JS File -->
      <script src="<?= media(); ?>/js/navbar/main.js"></script>
      <!-- Page specific javascripts-->
      <script type="text/javascript" src="<?= media(); ?>/js/plugins/sweetalert.min.js"></script>
      <script src="<?= media(); ?>/js/bootstrap.min.js"></script>
      </body>

      </html>