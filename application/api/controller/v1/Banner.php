<?php
/**
 * Created by 小谢
 * User: 小谢
 * Date: 2019/5/22
 * Time: 13:40
 */

namespace app\api\controller\v1;


use app\api\controller\BaseController;
use app\api\validate\IDMustBePostiveInt;
use app\api\model\Banner as BannerModel;
use app\lib\exception\BannerMissException;

/**
 * Banner资源
 */ 
class Banner
{

    public function getBanner($id)
    {
 
        (new IDMustBePostiveInt())->goCheck();
        $banner = BannerModel::getBannerById($id);
        if (!$banner) {
            throw new BannerMissException();
        }
        return json($banner);
    }
}