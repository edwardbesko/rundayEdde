<?php

class ImageText {
	
	var $memberName;
	var $fileName;
	
	function ImageText($name, $fn) {
		$this->memberName = $name;
		$this->filename = $fn;		
	} 
	
	function createImageText() {
		
    $font = 40;
    $string = $this->memberName;
    $im = @imagecreatetruecolor(strlen($string) * $font , $font * 1.5);
    imagesavealpha($im, true);
    imagealphablending($im, false);
    $white = imagecolorallocatealpha($im, 255, 255, 255, 127);
    imagefill($im, 0, 0, $white);
    $lime = imagecolorallocate($im, 204, 255, 51);
    imagettftext($im, $font, 0, 0, $font +7, $black, "Nobile-Regular.ttf", $string);
    imagepng($im, $this->filename, 0);
    imagedestroy($im);
	}
}

?>