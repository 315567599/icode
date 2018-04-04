<?php 
/**
 * Decode Unicode Characters from \u0000 ASCII syntax.
 *
 * This algorithm was originally developed for the
 * Solar Framework by Paul M. Jones
 *
 * @link   http://solarphp.com/
 * @link   https://github.com/solarphp/core/blob/master/Solar/Json.php
 * @param  string $chrs
 * @return string
 */
function decodeUnicodeString($chrs)
{
    $chrs       = (string) $chrs;
    $utf8       = '';
    $strlenChrs = strlen($chrs);
    for ($i = 0; $i < $strlenChrs; $i++) {
        $ordChrsC = ord($chrs[$i]);
        echo $ordChrsC . PHP_EOL;  
        switch (true) {
        case ($ordChrsC >= 0x20) && ($ordChrsC <= 0x7F):
            $utf8 .= $chrs{$i};
            break;
        case ($ordChrsC & 0xE0) == 0xC0:
            // characters U-00000080 - U-000007FF, mask 110XXXXX
            //see http://www.cl.cam.ac.uk/~mgk25/unicode.html#utf-8
            $utf8 .= substr($chrs, $i, 2);
            ++$i;
            break;
        case ($ordChrsC & 0xF0) == 0xE0:
            // characters U-00000800 - U-0000FFFF, mask 1110XXXX
            // see http://www.cl.cam.ac.uk/~mgk25/unicode.html#utf-8
            $utf8 .= substr($chrs, $i, 3);
            $i += 2;
            break;
        case ($ordChrsC & 0xF8) == 0xF0:
            // characters U-00010000 - U-001FFFFF, mask 11110XXX
            // see http://www.cl.cam.ac.uk/~mgk25/unicode.html#utf-8
            $utf8 .= substr($chrs, $i, 4);
            $i += 3;
            break;
        case ($ordChrsC & 0xFC) == 0xF8:
            // characters U-00200000 - U-03FFFFFF, mask 111110XX
            // see http://www.cl.cam.ac.uk/~mgk25/unicode.html#utf-8
            $utf8 .= substr($chrs, $i, 5);
            $i += 4;
            break;
        case ($ordChrsC & 0xFE) == 0xFC:
            // characters U-04000000 - U-7FFFFFFF, mask 1111110X
            // see http://www.cl.cam.ac.uk/~mgk25/unicode.html#utf-8
            $utf8 .= substr($chrs, $i, 6);
            $i += 5;
            break;
        }
        echo $utf8 . PHP_EOL; 
    }
    return $utf8;
}

decodeUnicodeString("123456abcdef 这是中文utf8！");

?>
