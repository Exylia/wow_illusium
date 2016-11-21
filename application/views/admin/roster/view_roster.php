<div class="col-md-9">
    <h2><?= lang('rubrique_admin_roster') . ' - ' . lang('rubrique_admin_roster_view') ?></h2>

    <form action="" class="form-horizontal" method="POST">
        <div class="form-group">
            <label for="name" class="col-md-2 control-label"><?= lang('roster_name') ?></label>
            <div class="col-md-10">
                <p class="form-control-static"><?= !empty($values['name']) ? $values['name'] : ' - ' ?></p>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-10 col-md-offset-2 text-right">
                <a href="<?= site_url('admin/roster') ?>" class="btn btn-default">
                    <span><?= lang('return') ?></span>
                </a>
                <a href="<?= site_url('admin/roster/edit/' . $values['id']) ?>" class="btn btn-primary">
                    <span><?= lang('edit') ?></span>
                </a>
            </div>
        </div>
    </form>
</div>