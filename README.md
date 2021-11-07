# Dcat Admin Sortable

## 截图
![](http://xcyceshi.oss-cn-qingdao.aliyuncs.com/xiaoliuImages/75d27e01ddfbb01acb52fdc5232bbab1.png)

## 使用
### 引入 composer 包
```shell
composer require xingchuangyang/dcat-admin-sortable
```

### 修改 Model
引入 `SortableTrait`，并实现 `Sortable` 接口
```php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Product extends Model implements Sortable
{
    use SortableTrait;

    public $sortable = [
        'order_column_name' => 'sort',  // 排序字段
        'sort_when_creating' => true,   // 新增是否自增，默认自增
    ];
}
```

### 在 Controller 中使用
```php
$grid->column('sort', '排序')->action(\Xcy\DcatAdminSortable\Actions\SortableColumnRow::gen(\App\Models\Product::class));
```
