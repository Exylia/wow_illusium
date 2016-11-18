<div class="col-md-9">
    <h2><?= lang('rubrique_admin_roster') ?></h2>

    <div class="pull-right">
        <a class="btn btn-default" href="<?= site_url('admin/roster/add') ?>">
            <span><?= lang('add_roster') ?></span>
        </a>
    </div>

    <table class="table table-hover table-characters">
        <thead>
            <tr>
                <th class="col-md-10"><?= lang('roster_name') ?></th>

                <th class="col-md-2">&nbsp;</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($rosters as $index => $roster) : ?>
                <tr>
                    <td><?= $roster->name ?></td>

                    <td class="list-action">
                        <table>
                            <tr>
                                <td width="33%">
                                    <a href="<?= site_url('admin/roster/view/' . $roster->id) ?>" data-toggle="tooltip" data-placement="top" title="<?= lang('view') ?>">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </a>
                                </td>

                                <td width="33%">
                                    <a href="<?= site_url('admin/roster/edit/' . $roster->id) ?>" data-toggle="tooltip" data-placement="top" title="<?= lang('edit') ?>">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a>
                                </td>

                                <td width="33%">
                                    <a href="<?= site_url('admin/roster/delete/' . $roster->id) ?>" class="delete_roster_confirm" data-toggle="tooltip" data-placement="top" title="<?= lang('delete') ?>">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
    $(function (){
        $('.delete_roster_confirm').click(function (){
            return confirm ('<?= addslashes(lang('roster_delete_confirm')) ?>');
        });
    });
</script>