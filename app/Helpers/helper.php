<?php
/**
 * Created by PhpStorm.
 * User: Reza
 * Date: 10/9/2021
 * Time: 1:00 PM
 */
function make_slug($string , $separator = '_'){
    return preg_replace('/\s+/u',$separator,trim($string));
}