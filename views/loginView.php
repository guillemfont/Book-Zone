<?php require "layourt/header.php"; ?>
<div class="center-contenedor-login">
        <<div class="center-contenedor-login">
        <div class="contenedor-login">
            <img class="login_logo" src="img_iconos/usuario_logo.svg" />
            <form action="<?php echo urlsite ?> ?page=loginauth" method="POST">
                <input type="text" title="text" required="required" name="usuario" placeholder="usuario" />
                <input type="password" title="password" required="required" name="password" placeholder="password" />
                <button type="submit" class="btn">Login</button>

                </a>
            </form>
        </div>
    </div>
    </div>

<?php require "layourt/footer.php"; ?>