<?php
namespace Application\Captcha;

class Captcha
{
    public static function reset()
    {
        $_SESSION[CAPTCHA_SESSION_VAR] = null;
    }

    public static function html($added_attributes = '', $width = 170, $height = 60)
    {
        $dir = __DIR__ . '/fonts/';
        $font_file = 'OpenSans.ttf';

        // генерируем содержимое капчи
        self::reset();

        if ((!isset($_SESSION[CAPTCHA_SESSION_VAR])) || ($_SESSION[CAPTCHA_SESSION_VAR] === null)) {
            $string = '';
            for ($i = 0; $i < 7; $i++) {
                $string .= chr(rand(97, 122));
            }
            $_SESSION[CAPTCHA_SESSION_VAR] = $string;
        }

        $image = imagecreatetruecolor($width, $height);

        $black = imagecolorallocate($image, 0, 0, 0);
        $red = imagecolorallocate($image, 200, 100, 90);
        $white = imagecolorallocate($image, 255, 255, 255);

        imagefilledrectangle($image, 0, 0, $width, $height, $white);
        imagettftext($image, 20, 0, 30, 40, $red, $dir . $font_file, $_SESSION[CAPTCHA_SESSION_VAR]);

        $image = self::imageDeformation($image, $width, $height);

        ob_start();
        imagepng($image);
        $img64 = base64_encode(ob_get_clean());

        return '<img src="data:image/png;base64,' . $img64 . '" ' . $added_attributes . '/>';
    }

    private static function imageDeformation($input_image, $width, $height)
    {
        $output_image = imagecreatetruecolor($width, $height);
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

        for ($x = 0; $x < $width; $x++) {
            for ($y = 0; $y < $height; $y++) {
                // координаты пикселя-первообраза.
                $sx = $x + (sin($x * $rand1 + $rand5) + sin($y * $rand3 + $rand6)) * $rand9;
                $sy = $y + (sin($x * $rand2 + $rand7) + sin($y * $rand4 + $rand8)) * $rand10;

                // первообраз за пределами изображения
                if ($sx < 0 || $sy < 0 || $sx >= $width - 1 || $sy >= $height - 1) {
                    $color = 255;
                    $color_x = 255;
                    $color_y = 255;
                    $color_xy = 255;
                } else { // цвета основного пикселя и его 3-х соседей для лучшего антиалиасинга
                    $color = (imagecolorat($input_image, $sx, $sy) >> 16) & 0xFF;
                    $color_x = (imagecolorat($input_image, $sx + 1, $sy) >> 16) & 0xFF;
                    $color_y = (imagecolorat($input_image, $sx, $sy + 1) >> 16) & 0xFF;
                    $color_xy = (imagecolorat($input_image, $sx + 1, $sy + 1) >> 16) & 0xFF;
                }

                // сглаживаем только точки, цвета соседей которых отличается
                if ($color == $color_x && $color == $color_y && $color == $color_xy) {
                    $newcolor = $color;
                } else {
                    $frsx = $sx - floor($sx); //отклонение координат первообраза от целого
                    $frsy = $sy - floor($sy);
                    $frsx1 = 1 - $frsx;
                    $frsy1 = 1 - $frsy;

                    // вычисление цвета нового пикселя как пропорции от цвета основного пикселя и его соседей
                    $newcolor = floor($color * $frsx1 * $frsy1 +
                                    $color_x * $frsx * $frsy1 +
                                    $color_y * $frsx1 * $frsy +
                                    $color_xy * $frsx * $frsy);
                }
                imagesetpixel($output_image, $x, $y, imagecolorallocate($output_image, $newcolor, $newcolor, $newcolor));
            }
        }

        return $output_image;
    }

    public static function check($str)
    {
        return !empty($_SESSION[CAPTCHA_SESSION_VAR]) && $str == $_SESSION[CAPTCHA_SESSION_VAR];
    }
}
