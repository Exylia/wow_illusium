<div class="col-md-9">
    <h2><?= lang('rubrique_admin_roster') . ' - ' . lang('rubrique_admin_roster_add') ?></h2>

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
        <div class="form-group <?php echo (!empty($error['name']) ? 'has-error' : '') ?>">
            <label for="name" class="col-md-2 control-label"><?= lang('roster_name') ?></label>
            <div class="col-md-10">
                <input
                    name="name"
                    type="text"
                    value="<?= !empty($values['name']) ? $values['name'] : '' ?>"
                    class="form-control"
                >
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-10 col-md-offset-2 text-right">
                <a href="<?= site_url('admin/roster') ?>" class="btn btn-default">
                    <span><?= lang('return') ?></span>
                </a>

                <button type="submit" class="btn btn-primary"><?= lang('create') ?></button>
            </div>
        </div>
    </form>
</div>