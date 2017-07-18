<?php

/**
 * @param $path
 * @param string $class
 * @return string
 */
function setActive($path, $class = 'active')
{
    return Request::is($path) ? $class : '';
}