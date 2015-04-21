<?php include 'partials/header.php' ?>

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
            <p><a class="btn btn-info" href="<?= url('home') ?>" role="button">Создать &raquo;</a></p>
        </div>
        <div class="col-md-4">
            <h2>Кастомизация!</h2>
            <p>Вы можете выбрать цвет обложки и шрифта для Вашего стикера на свой вкус. Пусть ваша стена будет разнообразной.</p>
            <p><a class="btn btn-info" href="<?= url('home') ?>" role="button">Создать &raquo;</a></p>
        </div>
        <div class="col-md-4">
            <h2>Вы не за что не платите!</h2>
            <p>Все возможности предоставляются Вам абсолютно бесплатно. И у нас нет платного контента. Вы можете использовать все без ограничений не потратив ни копейки!</p>
            <p><a class="btn btn-info" href="<?= url('home') ?>" role="button">Создать &raquo;</a></p>
        </div>
    </div>

    <hr>

    <footer class="well">
        <p>&copy; <a href="https://github.com/MasterRO94"><?= RO ?></a> 2015</p>
    </footer>
</div> <!-- /container -->

<?php include 'partials/registration.php' ?>

<!-- Bootstrap core JavaScript
================================================== -->
<script src="<?= asset('/js/jquery-2.1.3.min.js') ?>"></script>
<script src="<?= asset('/js/bootstrap.min.js') ?>"></script>
<script src="<?= asset('/js/main.js') ?>"></script>
<script src="<?= asset('/js/userValidation.js') ?>"></script>

</body>
</html>