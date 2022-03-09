<?php
/**
 * Created by PhpStorm.
 * User: Reza
 * Date: 10/9/2021
 * Time: 1:00 PM
 */
function is_selected($bool)
{
    if ($bool)
        return 'selected';
    return null;
}
function is_checked($bool)
{
    if ($bool)
        return 'checked';
    return null;
}
function is_disabled($bool)
{
    if ($bool)
        return 'disabled';
    return null;
}