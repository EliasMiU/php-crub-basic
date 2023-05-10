<?php
  if(isset($_GET["idUser"])){

    $column = "id";
    $value = $_GET["idUser"];

    $user = ControllersUsers::ctrGetUsers($column, $value);

  }


?>

<div class="container-fluid py-5">

    <div class="container">
      <form action="#" method="POST">
        <div class="mb-3">
          <input type="text" class="form-control" id="nombre" placeholder="<?php echo $user["nombre"] ; ?>" name="updateName">
        </div>
        <div class="mb-3">
          <input type="email" class="form-control" id="email" placeholder="<?php echo $user["email"]; ?>" name="updateEmail">
        </div>
        <div class="mb-3">
          <input type="password" class="form-control" id="pwd" placeholder="****" name="updatePassword">
          <input type="hidden" value="<?php echo $user["password"] ; ?>" name="passwordHidden">
          <input type="hidden" value="<?php echo $user["id"] ; ?>" name="idHidden">

        </div>

        <?php
           $actualizar = new ControllersUsers();
           $actualizar-> ctrUpdateUser();
        ?>
        <div class="mb-3">
          <button type="submit" class="btn btn-primary mb-3">Regisrar</button>
        </div>
      </form>
    </div>
</div>