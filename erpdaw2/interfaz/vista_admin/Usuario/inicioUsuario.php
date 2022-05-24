<form action="login_page.php" method="post">
  <div class="imgcontainer">
    
  </div>

  <div class="container">
    <label for="uname"><b>Usuario</b></label>
    <input type="text" placeholder="Introduzca usuario" name="uname" required>
    <br>
    <label for="psw"><b>Contraseña</b></label>
    <input type="password" placeholder="Introduzca contraseña" name="psw" required>
    <br>
    <button type="submit">Iniciar Sesion</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Recuerdame
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <span class="psw">Recupera tu contraseña <a href="#">aquí</a></span>
  </div>
</form>