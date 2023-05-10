<div class="container-fluid py-5">
    <div class="container">
      <form action="#" method="POST">
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" placeholder="name@example.com" name="loginEmail">
        </div>
        <div class="mb-3">
          <label for="pwd" class="form-label">Password</label>
          <input type="password" class="form-control" id="pwd" placeholder="****" name="loginPassword">
        </div>

        <?php

        $login = new ControllersUsers();
        $login->crtLoginUsers();
        
        ?>
        <div class="mb-3">
          <button type="submit" class="btn btn-primary mb-3">Ihgresar</button>
        </div>
      </form>
    </div>
</div>