<?php if(!\App\Models\User::auth()): ?>

    <div id="registerModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="<?= url('register') ?>" accept-charset="UTF-8" class="form-horizontal" role="form">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Регистрация</h4>
                    </div>

                    <?php if($errors = session('errors') ): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php foreach($errors as $error): ?>
                                    <li><?= $error ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; session_delete('errors'); ?>

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="userName" class="col-md-4 control-label">Ваше имя: </label>
                            <div class="col-md-6">
                                <input class="form-control" id="userName" name="name" type="text" required="required" value="<?= session('userFields')['name'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="userEmail" class="col-md-4 control-label">E-Mail</label>
                            <div class="col-md-6">
                                <input class="form-control" id="userEmail" name="email" type="email" required="required" value="<?= session('userFields')['email'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="userPassword" class="col-md-4 control-label">Пароль</label>
                            <div class="col-md-6">
                                <input class="form-control" id="userPassword" name="password" type="password" required="required">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="userPasswordConfirmation" class="col-md-4 control-label">Подтвердите пароль</label>
                            <div class="col-md-6">
                                <input class="form-control" id="userPasswordConfirmation" name="password_confirmation" type="password" required="required">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <input class="btn btn-primary form-control" id="userSubmit" type="submit" value="Зарегестрироваться">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php endif; session_delete('userFields'); ?>
