<?php

$c = array(
    'sitename' => 'Floreça',
    'siteslogan' => '',
    'sitelogo' => '',
    'sitefavicon' => '',
    'titlesep' => '&middot;&middot;&middot;',
    'siteemail' => '',
    'ucookie' => 'mtuserdata',
    'ucookiedays' => 365
);

$s = array(
    array(
        'name' => 'Facebook',
        'link' => 'https://facebook.com/Floreça',
        'icon' => 'fa-square-facebook'
    ),
    array(
        'name' => 'Youtube',
        'link' => 'https://instagram.com/Floreça',
        'icon' => 'fa-square-instagram'
    ),
    array(
        'name' => 'Tiktok',
        'link' => 'https://tiktok.com/Floreça',
        'icon' => 'fa-square-tiktok'
    )
);

$page_title = $page_content = $page_css = $page_js = '';

$user = array();

$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'projetointegrador';


header('Content-Type: text/html; charset=utf-8');

date_default_timezone_set('America/Sao_Paulo');

$conn = new mysqli($hostname, $username, $password, $database);

$conn->query("SET NAMES 'utf8'");
$conn->query('SET character_set_connection=utf8');
$conn->query('SET character_set_client=utf8');
$conn->query('SET character_set_results=utf8');
$conn->query('SET GLOBAL lc_time_names = pt_BR');
$conn->query('SET lc_time_names = pt_BR');

require('functions.php');