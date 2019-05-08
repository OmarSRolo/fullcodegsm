<div class="modal fade" id="login" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">

                <div id="message_login" style="display: none" class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <div id="message_text">
                        <strong>Error!</strong> Todos los campos son requeridos.
                    </div>
                </div>

                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Entrar</h4>
            </div>
            <div class="modal-body">
                <div class="row form-group w-100">
                    <div class="col-sm-6">
                        <label class="control-label col-sm-2" for="user">Usuario:</label>
                        <input type="text" placeholder="Usuario" class="form-control" id="user">
                    </div>
                    <div class="col-sm-6">
                        <label class="control-label col-sm-2" for="password">Password:</label>
                        <input type="password" class="form-control" id="password" placeholder="Password">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" id="actionLogin">Acceder</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!--Modal de Registro del usuario-->
<div class="modal fade" id="register" role="dialog">
    <div class="modal-dialog modal-sm">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">

                <div id="message_reg" style="display: none" class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Error!</strong> Todos los campos son requeridos.
                </div>

                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Registro</h4>
            </div>
            <div class="modal-body">
                <div class="row form-group w-100">
                    <div class="col-sm-12">
                        <label class="control-label col-sm-2" for="register_user">Usuario:</label>
                        <input type="text" placeholder="Usuario" required class="form-control"
                               id="register_user">
                    </div>

                </div>

                <div class="row form-group w-100">
                    <div class="col-sm-12">
                        <label class="control-label col-sm-2" for="register_password">Password:</label>
                        <input type="password" class="form-control" required id="register_password"
                               placeholder="Password">
                    </div>
                </div>

                <div class="row form-group w-100">
                    <div class="col-sm-12">
                        <label class="control-label col-sm-2" for="register_password2">Repetir Password:</label>
                        <input type="password" class="form-control" required id="register_password2"
                               placeholder="Password">
                    </div>
                </div>

                <div class="row form-group w-100">
                    <div class="col-sm-12">
                        <label class="control-label col-sm-2" for="register_email">Email:</label>
                        <input class="form-control" id="register_email" required placeholder="Email">
                    </div>
                </div>

                <div class="row form-group w-100">
                    <div class="col-sm-12">
                        <label class="control-label col-sm-2" for="register_name">Nombre:</label>
                        <input class="form-control" id="register_nombre" required placeholder="Nombre">
                    </div>
                </div>

                <div class="row form-group w-100">
                    <div class="col-sm-12">
                        <label class="control-label col-sm-2" for="register_name">Apellido:</label>
                        <input class="form-control" required id="register_apellido" placeholder="Apellido">
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" id="actionRegister">Registrar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>




<!-- start footer Area -->
<footer class="footer-area section-gap">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>About Us</h6>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                        ut labore dolore magna aliqua.
                    </p>
                    <p class="footer-text">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                        All rights reserved | This template is made with <i class="fa fa-heart-o"
                                                                            aria-hidden="true"></i> by <a
                                href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
            <div class="col-lg-5  col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>Newsletter</h6>
                    <p>Stay update with our latest</p>
                    <div class="" id="mc_embed_signup">
                        <form target="_blank" novalidate="true"
                              action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                              method="get" class="form-inline">
                            <input class="form-control" name="EMAIL" placeholder="Enter Email"
                                   onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '"
                                   required="" type="email">
                            <button class="click-btn btn btn-default"><i class="fa fa-long-arrow-right"
                                                                         aria-hidden="true"></i></button>
                            <div style="position: absolute; left: -5000px;">
                                <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value=""
                                       type="text">
                            </div>

                            <div class="info"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6 social-widget">
                <div class="single-footer-widget">
                    <h6>Follow Us</h6>
                    <p>Let us be social</p>
                    <div class="footer-social d-flex align-items-center">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                        <a href="#"><i class="fa fa-behance"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End footer Area -->
</body>



