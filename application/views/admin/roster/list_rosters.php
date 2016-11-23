<div class="col-md-9">
    <table class="table table-hover table-characters">
        <thead>
            <tr>
                <th><?= lang('roster_name') ?></th>

                <th>&nbsp;</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($rosters as $index => $roster) : ?>
                <tr>
                    <td><?= $roster->name ?></td>

                    <td width="165px">
                        <div class="text-xs-center">
                            <div class="col-xs-4">
                                <a href="<?= site_url('admin/roster/view/' . $roster->id) ?>" data-toggle="tooltip" data-placement="top" title="<?= lang('view') ?>">
                                    <span class="fa fa-eye"></span>
                                </a>
                            </div>

                            <div class="col-xs-4">
                                <a href="<?= site_url('admin/roster/edit/' . $roster->id) ?>" data-toggle="tooltip" data-placement="top" title="<?= lang('edit') ?>">
                                    <span class="fa fa-pencil"></span>
                                </a>
                            </div>

                            <div class="col-xs-4">
                                <a href="<?= site_url('admin/roster/delete/' . $roster->id) ?>" class="delete_roster_confirm" data-toggle="tooltip" data-placement="top" title="<?= lang('delete') ?>">
                                    <span class="fa fa-times"></span>
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="float-xs-right">
        <a class="btn btn-primary" href="<?= site_url('admin/roster/add') ?>">
            <span><?= lang('add_roster') ?></span>
        </a>
    </div>
</div>

<script>
    $(function (){
        $('.delete_roster_confirm').click(function (){
            return confirm ('<?= addslashes(lang('roster_delete_confirm')) ?>');
        });
    });
</script>