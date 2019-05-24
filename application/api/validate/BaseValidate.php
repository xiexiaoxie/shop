<?php


namespace app\api\validate;

use think\Request;
use think\Validate;
use think\Exception;

/**
* 
*/
class BaseValidate extends Validate
{
	
	public function gocheck(){
		$request = Request::instance();
		$params = $request->param();

		$result = $this->check($params);
        if ($result) {
        	$e = new ParameterException([
                'msg' => $this->error,
        	]);
        	throw $e;
        }else{
        	return true;
        }
	}
}