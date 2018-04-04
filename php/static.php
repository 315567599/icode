<?php

/**
 * {@inheritdoc}
 */
public static function create($url = '', $status = 302, $headers = array())
{
    return new static($url, $status, $headers);
}
