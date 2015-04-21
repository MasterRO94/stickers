<div id="stickerModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" id="stickerForm" action="<?= url('create-sticker') ?>" accept-charset="UTF-8" class="form-horizontal" role="form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Новый стикер</h4>
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
                        <label for="stickerTitle" class="col-md-4 control-label">Заголовок: </label>
                        <div class="col-md-6">
                            <input class="form-control" id="stickerTitle" name="title" type="text" required="required" value="<?= session('stickerFields')['title'] ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="stickerBody" class="col-md-4 control-label">Текст: </label>
                        <div class="col-md-6">
                            <textarea rows="5" class="form-control" id="stickerBody" name="body" required="required"><?= session('stickerFields')['body'] ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="stickerBg" class="col-md-4 control-label">Фон: </label>
                        <div class="col-md-6">
                            <select class="form-control" name="background" id="stickerBg">
                                <option disabled="disabled" >Выберите фон</option>
                                <option value="red" >Красный</option>
                                <option value="blue" >Синий</option>
                                <option value="lightblue" >Голубой</option>
                                <option value="green" >Зеленый</option>
                                <option value="orange" >Оранжевый</option>
                            </select>
                        </div>
                    </div>


                </div>

                <div class="modal-footer">
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <input class="btn btn-primary form-control" id="stickerSubmit" type="submit" value="Создать">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>