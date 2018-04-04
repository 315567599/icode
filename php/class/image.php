<?php

 protected function gd_imageflip($image, $mode) {
	 if (function_exists('imageflip')) {
		 return imageflip($image, $mode);
	 }
	 $new_width = $src_width = imagesx($image);
	 $new_height = $src_height = imagesy($image);
	 $new_img = imagecreatetruecolor($new_width, $new_height);
	 $src_x = 0;
	 $src_y = 0;
	 switch ($mode) {
	 case '1': // flip on the horizontal axis
		 $src_y = $new_height - 1;
		 $src_height = -$new_height;
		 break;
	 case '2': // flip on the vertical axis
		 $src_x = $new_width - 1;
		 $src_width = -$new_width;
		 break;
	 case '3': // flip on both axes
		 $src_y = $new_height - 1;
		 $src_height = -$new_height;
		 $src_x = $new_width - 1;
		 $src_width = -$new_width;
		 break;
	 default:
		 return $image;
	 }
	 imagecopyresampled(
		 $new_img,
		 $image,
		 0,
		 0,
		 $src_x,
		 $src_y,
		 $new_width,
		 $new_height,
		 $src_width,
		 $src_height
	 );
	 return $new_img;
 }

 protected function gd_orient_image($file_path, $src_img) {
	 if (!function_exists('exif_read_data')) {
		 return false;
	 }
	 $exif = @exif_read_data($file_path);
	 if ($exif === false) {
		 return false;
	 }
	 $orientation = (int)@$exif['Orientation'];
	 if ($orientation < 2 || $orientation > 8) {
		 return false;
	 }
	 switch ($orientation) {
	 case 2:
		 $new_img = $this->gd_imageflip(
			 $src_img,
			 defined('IMG_FLIP_VERTICAL') ? IMG_FLIP_VERTICAL : 2
		 );
		 break;
	 case 3:
		 $new_img = imagerotate($src_img, 180, 0);
		 break;
	 case 4:
		 $new_img = $this->gd_imageflip(
			 $src_img,
			 defined('IMG_FLIP_HORIZONTAL') ? IMG_FLIP_HORIZONTAL : 1
		 );
		 break;
	 case 5:
		 $tmp_img = $this->gd_imageflip(
			 $src_img,
			 defined('IMG_FLIP_HORIZONTAL') ? IMG_FLIP_HORIZONTAL : 1
		 );
		 $new_img = imagerotate($tmp_img, 270, 0);
		 imagedestroy($tmp_img);
		 break;
	 case 6:
		 $new_img = imagerotate($src_img, 270, 0);
		 break;
	 case 7:
		 $tmp_img = $this->gd_imageflip(
			 $src_img,
			 defined('IMG_FLIP_VERTICAL') ? IMG_FLIP_VERTICAL : 2
		 );
		 $new_img = imagerotate($tmp_img, 270, 0);
		 imagedestroy($tmp_img);
		 break;
	 case 8:
		 $new_img = imagerotate($src_img, 90, 0);
		 break;
	 default:
		 return false;
	 }
	 $this->gd_set_image_object($file_path, $new_img);
	 return true;
 }

 protected function imagick_orient_image($image) {
	 $orientation = $image->getImageOrientation();
	 $background = new \ImagickPixel('none');
	 switch ($orientation) {
	 case \imagick::ORIENTATION_TOPRIGHT: // 2
		 $image->flopImage(); // horizontal flop around y-axis
		 break;
	 case \imagick::ORIENTATION_BOTTOMRIGHT: // 3
		 $image->rotateImage($background, 180);
		 break;
	 case \imagick::ORIENTATION_BOTTOMLEFT: // 4
		 $image->flipImage(); // vertical flip around x-axis
		 break;
	 case \imagick::ORIENTATION_LEFTTOP: // 5
		 $image->flopImage(); // horizontal flop around y-axis
		 $image->rotateImage($background, 270);
		 break;
	 case \imagick::ORIENTATION_RIGHTTOP: // 6
		 $image->rotateImage($background, 90);
		 break;
	 case \imagick::ORIENTATION_RIGHTBOTTOM: // 7
		 $image->flipImage(); // vertical flip around x-axis
		 $image->rotateImage($background, 270);
		 break;
	 case \imagick::ORIENTATION_LEFTBOTTOM: // 8
		 $image->rotateImage($background, 270);
		 break;
	 default:
		 return false;
	 }
	 $image->setImageOrientation(\imagick::ORIENTATION_TOPLEFT); // 1
	 return true;
 }

 protected function get_file_type($file_path) {
	 switch (strtolower(pathinfo($file_path, PATHINFO_EXTENSION))) {
	 case 'jpeg':
	 case 'jpg':
		 return 'image/jpeg';
	 case 'png':
		 return 'image/png';
	 case 'gif':
		 return 'image/gif';
	 default:
		 return '';
	 }
 }

?>
