<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function slg($ten){
$ten = str_replace(" ", "-", str_replace(".","-",$ten));
$ten = str_replace("@", "a", str_replace("!","i",$ten));
$ten = str_replace(" ", "cong", str_replace("&","va",$ten));
$ten = str_replace("(", "", str_replace(")","",$ten));
$ten = str_replace("^", "", str_replace("#","",$ten));
$ten = str_replace("*", "", str_replace("|","",$ten));
$ten = str_replace("=", "", str_replace("~","",$ten));
$ten = str_replace("/", "-", str_replace("\\","-",$ten));
$ten = str_replace("--", "-",$ten);
$ten = str_replace("--", "-",$ten);
$ten = str_replace("%", "",$ten);
$ten = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $ten);
$ten = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $ten);
$ten = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $ten);
$ten = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $ten);
$ten = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $ten);
$ten = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $ten);
$ten = preg_replace("/(đ)/", 'd', $ten);
$ten = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $ten);
$ten = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $ten);
$ten = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $ten);
$ten = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $ten);
$ten = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $ten);
$ten = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $ten);
$ten = preg_replace("/(Đ)/", 'D', $ten);

$ten = mb_strtolower($ten,'utf8');
return $ten;
}