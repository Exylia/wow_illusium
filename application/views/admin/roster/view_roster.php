<div class="col-md-9">
    <h2><?= lang('rubrique_admin_roster') . ' - ' . lang('rubrique_admin_roster_view') ?></h2>

    <form action="" method="POST">
        <div class="col-md-12 card">
            <div class="form-group">
                <label for="name" class="col-md-4 col-form-label"><?= lang('roster_name') ?></label>
                <div class="col-md-8">
                    <p class="form-control-static mb-0"><?= !empty($values['name']) ? $values['name'] : ' - ' ?></p>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-lg-3 form-group">
                <a href="<?= site_url('admin/roster') ?>" class="btn btn-secondary btn-block">
                    <span><?= lang('return') ?></span>
                </a>
            </div>
            <div class="col-lg-3 offset-lg-6 form-group">
                <a href="<?= site_url('admin/roster/edit/' . $values['id']) ?>" class="btn btn-primary btn-block">
                    <span><?= lang('edit') ?></span>
                </a>
            </div>
        </div>
    </form>
</div>