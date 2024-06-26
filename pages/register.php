<?php if ($login_failed) { ?>
    <div class="alert alert-success mt-3" role="alert">
        Sikeres regisztráció!
    </div>
<?php } ?>

<h1>Regisztráció</h1>
<form id="registrationform" action="./logicals/register.php" method="post">
    <div class="form-group">
        <label for="lastname">Vezetéknév</label>
        <input type="text" class="form-control" id="lastname" name="lname">
    </div>
    <div class="form-group">
        <label for="firstname">Keresztnév</label>
        <input type="text" class="form-control" id="firstname" name="fname">
    </div>
    <div class="form-group">
        <label for="user">Felhasználónév</label>
        <input type="text" class="form-control" id="user" name="user">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="form-group">
        <label for="password">Jelszó</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <button type="submit" class="btn btn-light mt-3">Regisztráció</button>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
