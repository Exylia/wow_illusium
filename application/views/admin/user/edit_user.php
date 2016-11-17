<div class="col-md-10">
    <h2><?= $this->lang->line('page_title_edit') ?></h2>

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

    <form action="" class="form-horizontal" method="POST">
        <div class="form-group <?php echo (!empty($error['username']) ? 'has-error' : '') ?>">
            <label for="username" class="col-md-2 control-label"><?= $this->lang->line('username') ?></label>
            <div class="col-md-10">
                <input
                    name="username"
                    type="text"
                    value="<?= !empty($values['username']) ? $values['username'] : '' ?>"
                    class="form-control"
                    placeholder="Nom d'utilisateur"
                >
            </div>
        </div>

        <div class="form-group <?php echo (!empty($error['email']) ? 'has-error' : '') ?>">
            <label  for="email" class="col-md-2 control-label"><?= $this->lang->line('email') ?></label>
            <div class="col-md-10">
                <input
                    name="email"
                    type="email"
                    value="<?= !empty($values['email']) ? $values['email'] : '' ?>"
                    class="form-control"
                    placeholder="exemple@wxyz.com"
                >
            </div>
        </div>

        <div class="form-group <?php echo (!empty($error['password']) ? 'has-error' : '') ?>">
            <label for="password" class="col-md-2 control-label"><?= $this->lang->line('password') ?></label>
            <div class="col-md-10">
                <input
                    name="password"
                    type="password"
                    value="<?= !empty($values['password']) ? $values['password'] : '' ?>"
                    class="form-control"
                >
            </div>
        </div>

        <div class="form-group <?php echo (!empty($error['password_confirm']) ? 'has-error' : '') ?>">
            <label for="password_confirm" class="col-md-2 control-label"><?= $this->lang->line('password_confirm') ?></label>
            <div class="col-md-10">
                <input
                    name="password_confirm"
                    type="password"
                    value="<?= !empty($values['password_confirm']) ? $values['password_confirm'] : '' ?>"
                    class="form-control"
                >
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-10 col-md-offset-2 text-right">
                <a href="<?= site_url('admin/user/view/' . $values['id']) ?>" class="btn btn-default">
                    <span><?= $this->lang->line('return_user') ?></span>
                </a>

                <button type="submit" class="btn btn-primary"><?= $this->lang->line('update_user') ?></button>
            </div>
        </div>
    </form>
</div>