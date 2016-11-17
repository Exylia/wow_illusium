<div class="col-md-10 col-md-offset-1">
    <form action="" class="form-horizontal" method="POST">
        <div class="form-group">
            <label for="username" class="col-md-2 control-label"><?= $this->lang->line('username') ?></label>
            <div class="col-md-10">
                <p class="form-control-static"><?= !empty($values['username']) ? $values['username'] : ' - ' ?></p>
            </div>
        </div>

        <div class="form-group">
            <label  for="email" class="col-md-2 control-label"><?= $this->lang->line('email') ?></label>
            <div class="col-md-10">
                <p class="form-control-static"><?= !empty($values['email']) ? $values['email'] : ' - ' ?></p>
            </div>
        </div>

        <div class="form-group">
            <label  for="email" class="col-md-2 control-label"><?= $this->lang->line('acl') ?></label>
            <div class="col-md-10">
                <p class="form-control-static"><?= !empty($values['acl']) ? $values['acl'] : ' - ' ?></p>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-10 col-md-offset-2 text-right">
                <a href="<?= site_url('admin/user') ?>" class="btn btn-default">
                    <span><?= $this->lang->line('return_user') ?></span>
                </a>
            </div>
        </div>
    </form>
</div>