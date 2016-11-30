<div class="col-md-9">
    <div class="row mb-1">
        <div class="col-lg-4 offset-lg-8" >
            <a href="<?= site_url('admin/event/add')?>" class="btn btn-block btn-primary"><span><?= Lang('event_add')?></span></a>
        </div>
    </div>

    <?php foreach ($events as $date => $events_date) : ?>

        <h5><?= strftime('%A %d %B', (new DateTime($date))->getTimestamp()) ?></h5>

        <table class="table">

            <?php foreach ($events_date as $event) : ?>
                <tr>
                    <td>
                        <?= $event->name ?>
                    </td>
                    <td width="165px">
                        <div class="text-xs-center">
                            <div class="col-xs-4">
                                <a href="<?= site_url('admin/event/view/' . $event->id) ?>" data-toggle="tooltip" data-placement="top" title="<?= lang('view') ?>">
                                    <span class="fa fa-eye"></span>
                                </a>
                            </div>

                            <div class="col-xs-4">
                                <a href="<?= site_url('admin/event/edit/' . $event->id) ?>" data-toggle="tooltip" data-placement="top" title="<?= lang('edit') ?>">
                                    <span class="fa fa-pencil"></span>
                                </a>
                            </div>

                            <div class="col-xs-4">
                                <a href="<?= site_url('admin/event/delete/' . $event->id) ?>" class="delete_roster_confirm" data-toggle="tooltip" data-placement="top" title="<?= lang('delete') ?>">
                                    <span class="fa fa-times"></span>
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endforeach; ?>
</div>