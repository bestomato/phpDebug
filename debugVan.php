<?php
/**
 * debugVan file.
 *
 * @author vangogh_bai <bairui2010@gmail.com>
 * @copyright 2014 BaiRui
 * @package vanDebug
 * @since 1.0 on 2014-01-23
 */


/**
 * 各种调试信息方法类
 *
 * @author vangogh_bai
 * @since 1.0 on 2014-01-23
 */
class debugVan
{
	// 打印的json字符串
	public $jsonString;
	// 打印json字符串方式
	public $jsonPrintType;
	
	// 请求的url地址
	public $jsonRequestUrl;
	
	// 错误码
	private $errorCode;
	
	
	/**
	 * 构造函数
	 * @author vangogh_bai
 	 * @since 1.0 on 2014-01-23
	 */
	public function __construct()
	{
		// 初始化参数
		$this->jsonString = '';
		$this->jsonPrintType = 1;
		$this->jsonRequestUrl = '';
		$this->errorCode = '系统繁忙';
		
		define('JSON_DATA_EMPTY', 'json参数字符串为空');
		define('JSON_DATA_FORMAT_ERROR', 'json数据格式错误');
		define('DATA_EMPTY', '数据为空');
	}
	
	/**
	 * 请求url地址获取json格式数据
	 * @author vangogh_bai
	 * @since 1.0 on 2014-01-23
	 */
	public function jsonRequest($url=null, $type=null)
	{
		$url = trim($url);
		
		// 判断用户调用传参方式
		if(empty($url)) {
			$url = $this->jsonRequestUrl;
		}
		
		echo '<hr/>';
		echo $url;
		
		$json = file_get_contents($url);
		
		$this->printJsonData($json, $type);
	}
	
	/**
	 * 解析打印json格式数据
	 * @param string $json json数据字符串
	 * @param int $type 用什么方式打印数据
	 * @author vangogh_bai
	 * @since 1.0 on 2014-01-23
	 */
	public function printJsonData($json=null, $type=null)
	{
		// 判断用户调用传参方式
		if(empty($json)) {
			$json = $this->jsonString;
		}
		if(empty($type)) {
			$type = $this->jsonPrintType;
		}
		
		$json = trim($json);
		$arry = json_decode($json, true); //?$json=null
		
		if(empty($json)) {
			$this->_printInfo(JSON_DATA_EMPTY);
		} else if(empty($arry)) {
			$this->_printInfo(JSON_DATA_FORMAT_ERROR);
		}
		
		// 返回数据
		$this->_printData($arry, $type);
	}
	
	/**
	 * 返回数据
	 * @author vangogh_bai
	 * @since 1.0 on 2014-01-23
	 */
	private function _printInfo($info=null)
	{
		// 统一错误头信息
		echo '<hr/>';
		echo '<pre/>';
		
		if(empty($info)) {
			echo $this->errorCode;
		} else {
			echo $info;
		}
		die;
	}
	
	/**
	 * 返回数据
	 * @author vangogh_bai
	 * @since 1.0 on 2014-01-23
	 */
	private function _printData($data=null, $type=null)
	{
		// 统一错误头信息
		echo '<hr/>';
		echo '<pre/>';
		
		if(1 == $type) {
			print_r($data);
		} else if (2 == $type) {
			var_dump($data);
		}
		
		die;
	}
	
	/**
	 * 打印数据
	 * @param array $data 打印的数据
	 * @param int $type 用什么方式打印数据
	 * @author vangogh_bai
	 * @since 1.0 on 2014-01-23
	 */
	public function printArrData($data=null, $type=null)
	{
		if(empty($data)) {
			$this->_printInfo(DATA_EMPTY);
		}
		
		if(empty($type)) {
			$type = $this->jsonPrintType;
		}
		
		// 返回数据
		$this->_printData($data, $type);
	}
	
	
	
	
}


