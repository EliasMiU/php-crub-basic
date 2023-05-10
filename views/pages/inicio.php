<?php

    if(!isset($_SESSION["userLogin"])) {
        echo '<script>window.location = "index.php?action=ingreso"</script>';
    } else {
        if($_SESSION["userLogin"] != "ok"){

            echo '<script>window.location = "index.php?action=ingreso"</script>';
            return;

        }
    }

    $users = ControllersUsers::ctrGetUsers(null, null);

?>

<div class="container-fluid py-5">
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>N</td>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Fecha registro</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>

            <?php foreach ($users as $key => $user): ?>
                <tr>
                    <td><?php echo ($key+1) ;?></td>
                    <td><?php echo $user["nombre"] ; ?></th>
                    <td><?php echo $user["email"] ; ?></td>
                    <td><?php echo $user["fecha"] ; ?></td>
                    <td>
                        <div class="btn-group">

                            <div class="px-1">
                                <a href="index.php?action=editar&idUser=<?php echo $user["id"];?>" class="btn btn-warning">Editar</a>
                            </div>                            

                            <form method="post">

                                <input type="hidden" value="<?php echo $user["id"]?>" name="deleteUser">
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                
                                <?php
                                    
                                    $delete = new ControllersUsers();
                                    $delete -> ctrDeleteUser();
                                
                                ?>
                            </form>
                        </div>

                    </td>
                </tr>

                <?php endforeach ;  ?>
            </tbody>
        </table>

    </div>

</div>
