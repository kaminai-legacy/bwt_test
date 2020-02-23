<?
session_start();
$string = '';
$width = 170;
$height = 60;
for ($i = 0; $i < 7; $i++) {
    $string .= chr(rand(97, 122));
}
 
$_SESSION['rand_code'] = $string;
 
$dir = $_SERVER["DOCUMENT_ROOT"] . '/captcha/fonts/';
 
$font_file = 'OpenSans.ttf';

$image = imagecreatetruecolor($width, $height);
$image2 = imagecreatetruecolor($width, $height);
$black = imagecolorallocate($image, 0, 0, 0);
$red = imagecolorallocate($image, 200, 100, 90); // red
$white = imagecolorallocate($image, 255, 255, 255);

imagefilledrectangle($image,0,0,399,99,$white);
imagettftext ($image, 20, 0, 30, 40, $red, $dir . $font_file, $string);

// случайные параметры (можно поэкспериментировать с коэффициентами):
// частоты

$rand1 = mt_rand(700000, 1000000) / 15000000;
$rand2 = mt_rand(700000, 1000000) / 15000000;
$rand3 = mt_rand(700000, 1000000) / 15000000;
$rand4 = mt_rand(700000, 1000000) / 15000000;
// фазы
$rand5 = mt_rand(0, 3141592) / 1000000;
$rand6 = mt_rand(0, 3141592) / 1000000;
$rand7 = mt_rand(0, 3141592) / 1000000;
$rand8 = mt_rand(0, 3141592) / 1000000;
// амплитуды
$rand9 = mt_rand(400, 600) / 100;
$rand10 = mt_rand(400, 600) / 100;
 
for($x = 0; $x < $width; $x++){
  for($y = 0; $y < $height; $y++){
    // координаты пикселя-первообраза.
    $sx = $x + ( sin($x * $rand1 + $rand5) + sin($y * $rand3 + $rand6) ) * $rand9;
    $sy = $y + ( sin($x * $rand2 + $rand7) + sin($y * $rand4 + $rand8) ) * $rand10;
 
    // первообраз за пределами изображения
    if($sx < 0 || $sy < 0 || $sx >= $width - 1 || $sy >= $height - 1){ 
      $color = 255;
      $color_x = 255;
      $color_y = 255;
      $color_xy = 255;
    }else{ // цвета основного пикселя и его 3-х соседей для лучшего антиалиасинга
      $color = (imagecolorat($image, $sx, $sy) >> 16) & 0xFF;
      $color_x = (imagecolorat($image, $sx + 1, $sy) >> 16) & 0xFF;
      $color_y = (imagecolorat($image, $sx, $sy + 1) >> 16) & 0xFF;
      $color_xy = (imagecolorat($image, $sx + 1, $sy + 1) >> 16) & 0xFF;
    }



    // сглаживаем только точки, цвета соседей которых отличается
    if($color == $color_x && $color == $color_y && $color == $color_xy){
      $newcolor=$color;
    }else{
      $frsx = $sx - floor($sx); //отклонение координат первообраза от целого
      $frsy = $sy - floor($sy);
      $frsx1 = 1 - $frsx;
      $frsy1 = 1 - $frsy;

      // вычисление цвета нового пикселя как пропорции от цвета основного пикселя и его соседей
      $newcolor = floor( $color    * $frsx1 * $frsy1 +
                         $color_x  * $frsx  * $frsy1 +
                         $color_y  * $frsx1 * $frsy  +
                         $color_xy * $frsx  * $frsy );
    }
    imagesetpixel($image2, $x, $y, imagecolorallocate($image2, $newcolor, $newcolor, $newcolor));
  }
}
 
header("Content-type: image/png");
imagepng($image2);