<?php
echo "<h1><a href='/LAB/index.php'><</a>&nbspTEST-01</h1>";
echo 'PHP Version: ' . PHP_VERSION . PHP_EOL;
echo "<br>";
$var = [];
var_dump($var);

$test = "";
if (is_null($var)) {$test .= "null, ";}
if (isset($var)) {$test .= "settata, ";}
if (!$var) {$test .= "false, ";}
if (empty($var)) {$test .= "empty, ";}
echo $test;

echo "<br>---------------------------------------------<br>";
function fn()
{
    return __FUNCTION__;
}

echo fn();
echo "<br>";
echo basename(__FILE__);
echo "<br>";
// require(dirname(__FILE__).'/'.'myParent.php');

// include_once(dirname(__FILE__) . '/database.class.php');

$containing_dir = basename(dirname(__FILE__));
echo $containing_dir;

echo "<br>---------------------------------------------<br>";

$site = (isset($_SERVER['HTTPS']) ? "https" : "http"); // http
echo $site;
echo "<br>";
$site = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . $_SERVER['HTTP_HOST']; // http://localhost
echo $site;
echo "<br>";
$site = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; // http://localhost/job-01/
echo $site;

echo "<br>---------------------------------------------<br>";

$url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']; // http://localhost/job-01/
//$url = 'http://username:password@hostname:9090/path?arg=value#anchor';
$url = $url . "/?arg=value#anchor";
echo $url;
echo "<pre>";
print_r(parse_url($url));
echo "<br>";
echo parse_url($url, PHP_URL_SCHEME);
echo "<br>";
echo parse_url($url, PHP_URL_USER);
echo "<br>";
echo parse_url($url, PHP_URL_PASS);
echo "<br>";
echo parse_url($url, PHP_URL_HOST);
echo "<br>";
echo parse_url($url, PHP_URL_PORT);
echo "<br>";
echo parse_url($url, PHP_URL_PATH);
echo "<br>";
echo parse_url($url, PHP_URL_QUERY);
echo "<br>";
echo parse_url($url, PHP_URL_FRAGMENT);
echo "<br>";

echo "<br>---------------------------------------------<br>";
echo "<br><br><br>";
$indicesServer = array('PHP_SELF',
    'argv',
    'argc',
    'GATEWAY_INTERFACE',
    'SERVER_ADDR',
    'SERVER_NAME',
    'SERVER_SOFTWARE',
    'SERVER_PROTOCOL',
    'REQUEST_METHOD',
    'REQUEST_TIME',
    'REQUEST_TIME_FLOAT',
    'QUERY_STRING',
    'DOCUMENT_ROOT',
    'HTTP_ACCEPT',
    'HTTP_ACCEPT_CHARSET',
    'HTTP_ACCEPT_ENCODING',
    'HTTP_ACCEPT_LANGUAGE',
    'HTTP_CONNECTION',
    'HTTP_HOST',
    'HTTP_REFERER',
    'HTTP_USER_AGENT',
    'HTTPS',
    'REMOTE_ADDR',
    'REMOTE_HOST',
    'REMOTE_PORT',
    'REMOTE_USER',
    'REDIRECT_REMOTE_USER',
    'SCRIPT_FILENAME',
    'SERVER_ADMIN',
    'SERVER_PORT',
    'SERVER_SIGNATURE',
    'PATH_TRANSLATED',
    'SCRIPT_NAME',
    'REQUEST_URI',
    'PHP_AUTH_DIGEST',
    'PHP_AUTH_USER',
    'PHP_AUTH_PW',
    'AUTH_TYPE',
    'PATH_INFO',
    'ORIG_PATH_INFO');

echo '<table cellpadding="10">';
foreach ($indicesServer as $arg) {
    if (isset($_SERVER[$arg])) {
        echo '<tr><td>' . $arg . '</td><td>' . $_SERVER[$arg] . '</td></tr>';
    } else {
        echo '<tr><td>' . $arg . '</td><td>-</td></tr>';
    }
}
echo '</table>';
