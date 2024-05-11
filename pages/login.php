<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h1>Bejelentkezés</h1>
            <form action="./logicals/login.php" method="post">
                <div class="form-group">
                    <label for="username">Felhasználónév</label>
                    <input type="text" class="form-control" id="user" name="user">
                </div>
                <div class="form-group">
                    <label for="password">Jelszó</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>

                <button type="submit" class="btn btn-light mt-3">Bejelentkezés</button>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
