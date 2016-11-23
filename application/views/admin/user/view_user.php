<div class="col-md-9">
    <form action="" method="POST">
        <div class="card col-md-12">
            <div class="form-group row">
                <label for="username" class="col-md-4 col-form-label"><?= lang('user_username') ?></label>
                <div class="col-md-8">
                    <p class="form-control-static mb-0"><?= !empty($values['username']) ? $values['username'] : ' - ' ?></p>
                </div>
            </div>

            <div class="form-group row">
                <label  for="email" class="col-md-4 col-form-label"><?= lang('user_email') ?></label>
                <div class="col-md-8">
                    <p class="form-control-static mb-0"><?= !empty($values['email']) ? $values['email'] : ' - ' ?></p>
                </div>
            </div>

            <div class="form-group row">
                <label  for="email" class="col-md-4 col-form-label"><?= lang('user_acl') ?></label>
                <div class="col-md-8">
                    <p class="form-control-static mb-0"><?= !empty($values['acl']) ? $values['acl'] : ' - ' ?></p>
                </div>
            </div>

        </div>
        <div class="form-group row">
            <div class="col-lg-3 form-group">
                <a href="<?= site_url('admin/user') ?>" class="btn btn-secondary btn-block">
                    <span><?= lang('return_user') ?></span>
                </a>
            </div>
            <div class="col-lg-3 offset-lg-6 form-group">
                <a href="<?= site_url('admin/user/edit/' . $values['id']) ?>" class="btn btn-primary btn-block">
                    <span><?= lang('edit_user') ?></span>
                </a>
            </div>
        </div>
    </form>
</div>