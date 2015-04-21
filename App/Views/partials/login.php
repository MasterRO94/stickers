<?php if(!\App\Models\User::auth()): ?>


    <?php if(session('loginError')): ?>
        <div class="alert alert-danger loginError" style="display: inline-block"><?= session('loginError') ?></div>
    <?php endif; session_delete('loginError'); ?>

    <form action="<?= url('login') ?>" method="post" class="navbar-form navbar-right" role="form">
        <div class="form-group">
            <input type="email" name="email" placeholder="Email" class="form-control" required="required" value="<?= session('loginFields') ?>" >
        </div>
        <div class="form-group">
            <input type="password" name="password" placeholder="Пароль" class="form-control" required="required" >
        </div>
        <button type="submit" class="btn btn-success">Войти</button>
    </form>

<?php else:  ?>
    <ul class="nav navbar-nav pull-right">
        <li><a href="<?= url('home') ?>">Приветствуем, <?= session('user')['name']; ?></a></li>
        <li><a href="<?= url('logout') ?>">Выйти</a></li>
    </ul>

<?php endif; session_delete('loginFields'); ?>