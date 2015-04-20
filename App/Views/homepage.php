<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap core CSS -->
    <link href="<?= asset('css/bootstrap.min.css') ?>" rel="stylesheet">
    <title>Stickers - Стикеры!</title>
</head>
<body>

<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Стикеры! Напоминания на каждый день!</a>
        </div>
        <div class="navbar-collapse collapse">
            <form action="<?= url('register') ?>" method="post" class="navbar-form navbar-right" role="form">
                <div class="form-group">
                    <input type="email" placeholder="Email" class="form-control">
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Пароль" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Войти</button>
            </form>
        </div><!--/.navbar-collapse -->
    </div>
</div>



<div class="jumbotron">
    <div class="container">
        <h1>Добро пожаловать!</h1>
        <p>На нашем сайте вы можете размещать стикеры, как будто клеите их на стену, при этом стена никогда не закончится, а стикеры не отваляться! Абсолютно бесплатно! Просто зарегестирируйтесь и добавьте свой первый стикер прямо сейчас!</p>
        <p><a class="btn btn-primary btn-lg" data-toggle="modal" role="button" href="#registerModal">Зарегестироваться &raquo;</a></p>
    </div>
</div>

<div class="container">
    <!-- Example row of columns -->
    <div class="row">
        <div class="col-md-4">
            <h2>Нет ограничений!</h2>
            <p>Вы можете создавать столько стикеров, сколько Вам захочется. Никаких ограничений по количеству.</p>
            <p><a class="btn btn-info" href="#" role="button">Создать &raquo;</a></p>
        </div>
        <div class="col-md-4">
            <h2>Кастомизация!</h2>
            <p>Вы можете выбрать цвет обложки и шрифта для Вашего стикера на свой вкус. Пусть ваша стена будет разнообразной.</p>
            <p><a class="btn btn-info" href="#" role="button">Создать &raquo;</a></p>
        </div>
        <div class="col-md-4">
            <h2>Вы не за что не платите!</h2>
            <p>Все возможности предоставляются Вам абсолютно бесплатно. И у нас нет платного контента. Вы можете использовать все без ограничений не потратив ни копейки!</p>
            <p><a class="btn btn-info" href="#" role="button">Создать &raquo;</a></p>
        </div>
    </div>

    <hr>

    <footer class="well">
        <p>&copy; <a href="https://github.com/MasterRO94"><?= RO ?></a> 2015</p>
    </footer>
</div> <!-- /container -->


<?php if(!\App\Models\User::auth()): ?>

    <div id="registerModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="<?= url('/register') ?>" accept-charset="UTF-8" class="form-horizontal" role="form">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Регистрация</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="userName" class="col-md-4 control-label">Ваше имя: </label>
                            <div class="col-md-6">
                                <input class="form-control" id="userName" name="name" type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="userEmail" class="col-md-4 control-label">E-Mail</label>
                            <div class="col-md-6">
                                <input class="form-control" id="userEmail" autocomplete="off" name="email" type="email">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="userPassword" class="col-md-4 control-label">Пароль</label>
                            <div class="col-md-6">
                                <input class="form-control" id="userPassword" autocomplete="off" name="password" type="password">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="userPasswordConfirmation" class="col-md-4 control-label">Подтвердите пароль</label>
                            <div class="col-md-6">
                                <input class="form-control" id="userPasswordConfirmation" autocomplete="off" name="password_confirmation" type="password">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <input class="btn btn-primary form-control disabled" id="userSubmit" type="submit" value="Зарегестрироваться">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php endif; ?>


<!-- Bootstrap core JavaScript
================================================== -->
<script src="<?= asset('/js/jquery-2.1.3.min.js') ?>"></script>
<script src="<?= asset('/js/bootstrap.min.js') ?>"></script>
<script src="<?= asset('/js/main.js') ?>"></script>
<script src="<?= asset('/js/userValidation.js') ?>"></script>

</body>
</html>