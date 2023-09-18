
<body class="hold-transition login-page">
        <div class="login-box">
          <div class="login-logo">
            <a href="inicio">FAENCASA | FALTANTES</a>
          </div>
          <!-- /.login-logo -->
          <div class="card">
            <div class="card-body login-card-body">
              <p class="login-box-msg">Ingresa tus credenciales para continuar</p>
        
              <form method="post">
                <div class="input-group mb-3">
                  <input type="email" class="form-control" placeholder="Usuario" name="txtUsuarioLogin">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-envelope"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="password" class="form-control" placeholder="Contraseña" name="txtPasswordLogin">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <!-- /.col -->
                  <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
                  </div>
                  <!-- /.col -->
                </div>
                <?php
                
                    $ingresar = new UsersControllers();
                    $ingresar -> ctrSigInUser();

                ?>
              </form>
              <!-- /.social-auth-links -->
            </div>
            <!-- /.login-card-body -->
          </div>
        </div>
        <!-- /.login-box -->