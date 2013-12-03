<?
/**
 *  Image CORS Class - deliver Images with CORS-Header
 *	for Server without mod_header.c
 * 	It will allow any GET, POST, or OPTIONS requests from any
 *  origin.
 *
 *  In a production environment, you probably want to be more restrictive, but this gives you
 *  the general idea of what is involved.  For the nitty-gritty low-down, read:
 *
 *  - https://developer.mozilla.org/en/HTTP_access_control
 *  - http://www.w3.org/TR/cors/
 *
 */
class CORSimg {
	var $image;
	var $image_type;
	 
	function __construct($filename = null){
		if(!empty($filename)){
			$this->load($filename);
		}
	}
	
	function load($filename) {
		$file_parts = explode('.',$filename);
		$this->image_type = strtolower($filename[count($filename)-1]);
		switch($this->image_type){
			case 'jpg':
			case 'jpeg':
				$this->headerCORS();
				header("Content-type: image/jpeg");
				$this->image = imagecreatefromjpeg($filename);
				imagejpeg($this->image, null, 80);
			break;
			case 'gif':
				$this->headerCORS();
				header("Content-type: image/gif");
				$this->image = imagecreatefromgif($filename);
				imagegif($this->image);  
			break;
			case 'png':
				$this->headerCORS();
				header("Content-type: image/png");
				$this->image = imagecreatefrompng($filename);
				imagepng($this->image);
			break;
			case 'svg':
				$this->headerCORS();
				header("Content-type: image/svg+xml");
				$this->image = file_get_contents($filename);
				print $this->image;
			break;
			default:
				throw new Exception("The file you're trying to open is not supported");
		}
	}

	function headerCORS()
	{
        header("Access-Control-Allow-Origin: *");
        header('Access-Control-Allow-Credentials: true');
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         
	}
}
?>