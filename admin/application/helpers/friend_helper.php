<?php 
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
	public function profileImageUploadConfig()
	{
		$config['upload_path'] = './spa_image/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['encrypt_name'] = TRUE ;
		return $config ;
	}
	public function blogImageUploadConfig()
	{
		$config['upload_path'] = './blog_image/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['encrypt_name'] = TRUE ;
		return $config ;
	}
}