<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['smtp_host'] = 'ssl://smtp.googlemail.com';
$config['smtp_user'] = 'smtp@banyaninfotech.com';
$config['smtp_pass'] = 'Banyan@2k17@#';
$config['smtp_port'] = 465;
$config['smtp_timeout'] = 5;
$config['wordwrap'] = TRUE;
$config['wrapchars'] = 76;
$config['mailtype'] = 'html';
$config['charset'] = 'iso-8859-1';
$config['validate'] = FALSE;
$config['priority'] = 3;
$config['crlf'] = "\r\n";
$config['newline'] = "\r\n";
$config['bcc_batch_mode'] = FALSE;
$config['bcc_batch_size'] = 200;

?>