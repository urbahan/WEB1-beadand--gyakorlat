<?php if (isset($error)): ?>
    <p style="color:white; background:#c0392b; padding:10px; border-radius:5px; text-align:center;"><?php echo $error; ?></p>
<?php endif; ?>

<?php if (isset($_GET['success'])): ?>
    <p style="color:white; background:#27ae60; padding:10px; border-radius:5px; text-align:center;">Sikeres regisztráció! Most már beléphetsz.</p>
<?php endif; ?>

<h2>Regisztráció</h2>
<form method="POST">
    <input name="lastname" placeholder="Vezetéknév" required>
    <input name="firstname" placeholder="Keresztnév" required>
    <input name="username" placeholder="Felhasználónév" required>
    <input type="password" name="password" placeholder="Jelszó" required>
    <button type="submit" name="register" class="btn">Regisztráció</button>
</form>

<hr style="margin:30px 0;">

<h2>Belépés</h2>
<form method="POST">
    <input name="username" placeholder="Felhasználónév" required>
    <input type="password" name="password" placeholder="Jelszó" required>
    <button type="submit" name="login" class="btn">Belépés</button>
</form>