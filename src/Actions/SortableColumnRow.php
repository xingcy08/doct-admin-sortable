<?php


namespace Xcy\DcatAdminSortable\Actions;

use Dcat\Admin\Grid\RowAction;

class SortableColumnRow extends RowAction
{
    protected $title = "排序";

    protected static $modelName;

    public static function gen($model = '')
    {
        self::$modelName = $model;
        return parent::make();
    }

    protected function script(): string
    {
        return <<<JS
$('.{$this->getKey()}-orderable').on('click', function () {

    var key = $(this).data('id');
    var direction = $(this).data('direction');
    var table = $(this).data('table');
    $.post({
            url: 'xcyDcatAdmin/sortable/' + key,
            data: {
                sortable:direction,
                table:table
            },
            success: function (data) {
                $.pjax.reload('#pjax-container');
                toastr.success(data.message)
            }
        })
});
JS;
    }

    public function html(): string
    {
        $modelName = self::$modelName;
        return <<<HTML
<div class="btn-group">
    <button type="button" class="btn btn-xs btn-default {$this->getKey()}-orderable" data-id="{$this->getKey()}" data-table="{$modelName}" data-direction="up">
        <i class="fa fa-caret-up fa-fw"></i>上移
    </button>
    <button type="button" class="btn btn-xs btn-default {$this->getKey()}-orderable" data-id="{$this->getKey()}" data-table="{$modelName}" data-direction="down">
        <i class="fa fa-caret-down fa-fw"></i>下移
    </button>
</div>
HTML;
    }
}
