<?php


/**
 * @date 2020/11/26
 * @time 20:50
 * @param $msg
 * @param string $level
 * @return
 */
function log_write($msg, $level = 'debug')
{
    $msg = "[from laravel package] $msg";
    return \Illuminate\Support\Facades\Log::{$level}($msg);
}

function auth_user()
{

}
