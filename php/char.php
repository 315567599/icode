<?php

/**
 * 数据XML编码
 * @param mixed $data 数据
 * @return string
 */
public static function data_to_xml($data) {
    $xml = '';
    foreach ($data as $key => $val) {
        is_numeric($key) && $key = "item id=\"$key\"";
        $xml    .=  "<$key>";
        $xml    .=  ( is_array($val) || is_object($val)) ? self::data_to_xml($val)  : self::xmlSafeStr($val);
        list($key, ) = explode(' ', $key);
        $xml    .=  "</$key>";
    }
    return $xml;
}



