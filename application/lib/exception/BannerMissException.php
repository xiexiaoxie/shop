<?php

namespace app\lib\exception;


/**
* 
*/
class BannerMissException extends BaseException
{
	
	public $code = 400;
    public $msg = '请求的banner不存在';
    public $errorCode = 10000;
}