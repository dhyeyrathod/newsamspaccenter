<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @author Jay rathod
 */
class Friend
{
	public function base64url_encode($data) { 
	  	return rtrim(strtr(base64_encode($data), '+/', '-_'), '='); 
	} 
	public function base64url_decode($data) { 
	  	return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT)); 
	} 
	public function get_Location()
	{
		return json_decode(file_get_contents("http://api.ipstack.com/".$this->getRemoteUserIpaddress()->ip."?access_key=fa943f19d6d0b6a949dddd0be9c25951&format=1"));
	}
	public function getRemoteUserIpaddress()
	{
		return json_decode(file_get_contents("http://ipinfo.io/"));	
	}
	public function profile_image_upload()
	{
		$config['upload_path'] = './admin/spa_image/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['encrypt_name'] = TRUE ;
		return $config ;
	}
}