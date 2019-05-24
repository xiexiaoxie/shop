<?php

namespace app\api\model;

use think\Exception;
use think\Db;
/**
* 
*/
class Banner
{
	
	public static function getBannerByID($id)
	{
        // $result = Db::query('select * from banner_item where banner_id=?',[$id]);
        // return $result;
        $result = Db::table('banner_item')
	        ->where('banner_id', '=', $id)
	        ->select();
        return $result;
	}
}