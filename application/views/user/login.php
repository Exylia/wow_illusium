<div class="col-md-6 col-md-offset-3">
    <?php if (!empty($error)) : ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <ul>
                <?php foreach ($error as $key => $value) : ?>
                    <li> <?php echo $value ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif;?>

     <form class="form-horizontal clearfix" action="" method="POST">
        <div class="form-group">
            <label for="username" class="col-md-4 control-label"><?= lang('user_username') ?></label>
            <div class="col-md-8">
                <input
                    name="username"
                    type="text"
                    value="<?php echo (!empty($values['username']) ? $values['username'] : '') ?>"
                    class="form-control"
                    placeholder="<?= lang('user_username') ?>"
                >
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-md-4 control-label"><?= lang('user_password') ?></label>
            <div class="col-md-8">
                <input
                    name="password"
                    type="password"
                    value="<?php echo (!empty($values['password']) ? $values['password'] : '') ?>"
                    class="form-control"
                    placeholder="<?= lang('user_password') ?>"
                >
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-8 col-md-offset-4">
                <button type="submit" class="btn btn-primary btn-block"><?= lang('user_login') ?></button>
            </div>
        </div>
    </form>
</div>