<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/12/4
 * Time: 6:17 PM
 */

namespace app\index\controller;

define('UTF32_BIG_ENDIAN_BOM', chr(0x00) . chr(0x00) . chr(0xFE) . chr(0xFF));
define('UTF32_LITTLE_ENDIAN_BOM', chr(0xFF) . chr(0xFE) . chr(0x00) . chr(0x00));
define('UTF16_BIG_ENDIAN_BOM', chr(0xFE) . chr(0xFF));
define('UTF16_LITTLE_ENDIAN_BOM', chr(0xFF) . chr(0xFE));
define('UTF8_BOM', chr(0xEF) . chr(0xBB) . chr(0xBF));

class Word
{

    function start()
    {
        ob_start();
        echo '<html xmlns:o="urn:schemas-microsoft-com:office:office"  xmlns:w="urn:schemas-microsoft-com:office:word"  xmlns="http://www.w3.org/TR/REC-html40">
              <head>
                   <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
                   <xml><w:WordDocument><w:View>Print</w:View></xml>
            </head><body>';
    }

    function save($path)
    {

        echo "</body></html>";
        $data = ob_get_contents();
        ob_end_clean();
        $this->wirtefile($path, $data);
    }

    function wirtefile($fn, $data)
    {
        $fp = fopen($fn, "wb");


        fwrite($fp, $data);
        fclose($fp);

    }

}