<?php include 'partials/header.php' ?>

<div class="container home">
    <!-- Example row of columns -->
    <div class="row">

        <div class="col-md-3 sticker sticker-default">
            <p><a class="btn btn-info" href="#stickerModal" data-toggle="modal" role="button">Создать</a></p>
        </div>

        <?php if(count($stickers)): ?>
            <?php foreach($stickers as $sticker): ?>
                <div class="col-md-4 sticker sticker-<?= $sticker['background'] ?>">
                    <article>
                        <h3><?= $sticker['title'] ?></h3>
                        <p><?= $sticker['body'] ?></p>
                    </article>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>


    </div>

    <hr>

    <footer class="well">
        <p>&copy; <a href="https://github.com/MasterRO94"><?= RO ?></a> 2015</p>
    </footer>
</div> <!-- /container -->

<?php include 'partials/createSticker.php'; ?>

<!-- Bootstrap core JavaScript
================================================== -->
<script src="<?= asset('/js/jquery-2.1.3.min.js') ?>"></script>
<script src="<?= asset('/js/bootstrap.min.js') ?>"></script>
<script src="<?= asset('/js/main.js') ?>"></script>

</body>
</html>