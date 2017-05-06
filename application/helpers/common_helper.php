<?php
function public_url($url = '')
{
	return base_url('public1/'.$url);
}

function pre($list, $exit = true)
{
    echo "<pre>";
    print_r($list);
    if($exit)
    {
        die();
    }
}