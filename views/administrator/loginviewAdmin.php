<form action="index.php?controller=Admin&action=loginAuth" method="POST" class="form">
    <h2 class="formTitle">Iniciar sessión</h2>
    <p class="formParagraph">¿Aún no tienes cuenta? <a href="#" class="formLink">Entra aquí</a></p>

    <div class="formContainer">
        <div class="formGroup">
            <input type="text" name="userName" id="userName" class="formInput" placeholder=" ">
            <label for="userName" class="formLabel">Usuario:</label>
            <span class="formLine"></span>
        </div>
        <div class="formGroup">
            <input type="password" name="userPass" id="userPass" class="formInput" placeholder=" ">
            <label for="userPass" class="formLabel">Contraseña:</label>
            <span class="formLine"></span>
        </div>

        <input type="submit" value="Acceder" class="formSumbit">
    </div>
</form>