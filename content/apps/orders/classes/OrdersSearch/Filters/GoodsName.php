<?php
/**
 * Created by PhpStorm.
 * User: royalwang
 * Date: 2019-04-01
 * Time: 18:24
 */

namespace Ecjia\App\Orders\OrdersSearch\Filters;

use Ecjia\System\Frameworks\SuperSearch\FilterInterface;
use Royalcms\Component\Database\Eloquent\Builder;

/**
 * 商品名称关键字条件
 * @author royalwang
 *
 */
class GoodsName implements FilterInterface
{

    /**
     * 把过滤条件附加到 builder 的实例上
     *
     * @param Builder $builder
     * @param mixed $value
     * @return Builder $builder
     */
    public static function apply(Builder $builder, $value)
    {
    	if (!empty($value)) {
    		return $builder
    		->whereHas('order_goods_collection', function($query) use ($value) {
                    /**
                     * @var \Royalcms\Component\Database\Query\Builder $query
                     */
                    $query->where('goods_name', 'like', '%' . ecjia_mysql_like_quote($value) . '%');
                });
    	}
    	return $builder;
    }
}