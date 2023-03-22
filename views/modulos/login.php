<div class="login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="../../index2.html"><b>Clima</b>COOL</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Inicie sesión</p>

        <form method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="user" placeholder="Usuario" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="social-auth-links text-center mb-3">
            <a href="#" class="btn btn-block btn-primary">
              <button type="submit" class="btn btn-block btn-primary">Iniciar Sesión</button>
            </a>
          </div>

          <?php
          $login = new ControladorUsuarios();
          $login->ctrIngresoUsuario();

          ?>



        </form>

      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
</div>
<!-- /.login-box -->