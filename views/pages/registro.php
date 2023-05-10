<div class="container-fluid py-5">
    <div class="container">
      <form action="#" method="POST">
        <div class="mb-3">
          <label for="nombre" class="form-label">Nombre</label>
          <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="name">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email">
        </div>
        <div class="mb-3">
          <label for="pwd" class="form-label">Password</label>
          <input type="password" class="form-control" id="pwd" placeholder="****" name="password">
        </div>

        <?php

          $registro = ControllersUsers::ctrForm();
            if($registro == "ok"){

              /**
               * Este script lo que hace en vaciar el registro del navegador donde se guardan la svariables post
               * que se estan pasando en el formulario.
               * Esto evita que se enviien varias veces los datos en case de que se recargue la pagina.
               */
              echo '<script>

                if(window.history.replaceState){

                  window.history.replaceState(null, null, window.location.href);

                }
              
              </script>';


              echo '<div class="alert alert-success">El usuario a sido registrado</div>';
            }
        
        ?>
        <div class="mb-3">
          <button type="submit" class="btn btn-primary mb-3">Regisrar</button>
        </div>
      </form>
    </div>
</div>

