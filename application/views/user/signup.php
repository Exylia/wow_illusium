<div class="col-md-8 offset-md-2">
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

    <form action="" method="POST">
        <div class="form-group row <?php echo (!empty($error['username']) ? 'has-error' : '') ?>">
            <label for="username" class="col-md-4 col-form-label"><?= lang('user_username') ?></label>
            <div class="col-md-8">
                <input
                    name="username"
                    type="text"
                    value="<?= !empty($values['username']) ? $values['username'] : '' ?>"
                    class="form-control"
                >
            </div>
        </div>

        <div class="form-group row <?php echo (!empty($error['email']) ? 'has-error' : '') ?>">
            <label  for="email" class="col-md-4 col-form-label"><?= lang('user_email') ?></label>
            <div class="col-md-8">
                <input
                    name="email"
                    type="email"
                    value="<?= !empty($values['email']) ? $values['email'] : '' ?>"
                    class="form-control"
                >
            </div>
        </div>

        <div class="form-group row <?php echo (!empty($error['password']) ? 'has-error' : '') ?>">
            <label for="password" class="col-md-4 col-form-label"><?= lang('user_password') ?></label>
            <div class="col-md-8">
                <input
                    name="password"
                    type="password"
                    value="<?= !empty($values['password']) ? $values['password'] : '' ?>"
                    class="form-control"
                >
            </div>
        </div>

        <div class="form-group row <?php echo (!empty($error['password_confirm']) ? 'has-error' : '') ?>">
            <label for="password_confirm" class="col-md-4 col-form-label"><?= lang('user_password_confirm') ?></label>
            <div class="col-md-8">
                <input
                    name="password_confirm"
                    type="password"
                    value="<?= !empty($values['password_confirm']) ? $values['password_confirm'] : '' ?>"
                    class="form-control"
                >
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary btn-block"><?= lang('user_signup') ?></button>
            </div>
        </div>
    </form>
</div>