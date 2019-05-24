<?php


namespace app\lib\exception;

use think\exception\Handle;
use think\Exception;
use think\Request;
use think\Log;

/**
* 
*/
class ExceptionhAandler extends Handle
{
	private $code;
	private $msg;
	private $errorCode;

	public function render(\Exception $e)
	{
        if ($e instanceof BaseException) 
        {
        	$this->code = $e->code;
        	$this->msg = $e->msg;
        	$this->errorCode = $e->errorCode;
        }
        else{
        	if (config('app_debug')) 
        	{
        		return parent::render($e);
        	}
        	else
        	{
	            $this->code = 400;
	            $this->msg = '服务器内部错误';
	            $this->errorCode = 999;
	            $this->recodErrorLog($e);
        	}
        }
        $request = Request::instance();
        $result = [
            'msg' => $this->code;
            'error_code' => $this->errorCode;
            'request_url' => $request->url();
        ];
        return json($result, $this->code);
	}

	private function recodErrorLog(\Exception $e){
		log::init([
            'type' => 'file',
            'path'  => LOG_PATH,
            'level' => ['error'],
		]);
		log::record($e->getMessage(), 'error');
	}
}