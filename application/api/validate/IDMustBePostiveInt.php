<?php
/**
 * Created by 小谢
 * User: 小谢
 * Date: 2019/5/22
 * Time: 14:40
 */

namespace app\api\validate;


use think\Validate;


/**
* 
*/
class IDMustBePostiveInt extends BaseValidate
{
	protected $rule = [
       'id' => 'requst|isPostiveInteger'
	];
    
    protected function isPostiveInteger($value){
    	if (is_numeric($value) && is_int($value + 0) && ($value + 0) > 0) {
    		return true;
    	}
    	else{
    		return $field.'必须是正整数';
    	}
    }

}