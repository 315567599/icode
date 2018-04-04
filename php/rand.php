<?php

public function filter(array $event)
{
    return (mt_rand() / mt_getrandmax()) <= $this->sampleRate;
}


