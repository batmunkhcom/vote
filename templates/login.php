<h2>Members area</h2>
<form action="index.php?action=login_check" method="post">
    <?php if (strlen($_SESSION['info_txt']) > 1): ?>
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-3">
                <div class="alert alert-danger"><?php echo $_SESSION['info_txt']; ?></div>
            </div>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-3">
            <input type="text" name="username" value="" class="input-lg" /> username
        </div>
    </div>
    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-3">
            <input type="password" name="pass" value="" class="input-lg" /> password
        </div>
    </div>
    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-3">
            <input type="submit" name="logMe" value="Login" class="btn btn-primary" />
        </div>
    </div>
</form>