<?php
/**
 * PHP 8 compatibility layer for the legacy 17camera PHP site.
 * Loaded through auto_prepend_file for every request.
 */

error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING & ~E_DEPRECATED & ~E_STRICT);
ini_set('display_errors', '1');
ini_set('default_charset', 'UTF-8');

/* ---------- PHP 5 style superglobals ---------- */
$GLOBALS['HTTP_GET_VARS']    = $_GET;
$GLOBALS['HTTP_POST_VARS']   = $_POST;
$GLOBALS['HTTP_COOKIE_VARS'] = $_COOKIE;
$GLOBALS['HTTP_SERVER_VARS'] = $_SERVER;
$GLOBALS['HTTP_ENV_VARS']    = $_ENV;
$GLOBALS['HTTP_POST_FILES']  = $_FILES;
if (!isset($_SESSION)) {
    $_SESSION = array();
}
$GLOBALS['HTTP_SESSION_VARS'] = &$_SESSION;

/* ---------- register_globals emulation (skip existing globals) ---------- */
foreach (array($_GET, $_POST, $_COOKIE) as $__arr) {
    if (!is_array($__arr)) {
        continue;
    }
    foreach ($__arr as $__k => $__v) {
        if (is_string($__k) && $__k !== '' && !array_key_exists($__k, $GLOBALS)) {
            $GLOBALS[$__k] = $__v;
        }
    }
}
unset($__arr, $__k, $__v);

/* ---------- mysql_* API implemented with mysqli ---------- */
if (!defined('MYSQL_ASSOC')) define('MYSQL_ASSOC', 1);
if (!defined('MYSQL_NUM'))   define('MYSQL_NUM', 2);
if (!defined('MYSQL_BOTH'))  define('MYSQL_BOTH', 3);
if (!defined('BORDERCOLOR')) define('BORDERCOLOR', '#CCCCCC');
if (!defined('ALTBG2'))      define('ALTBG2', '#F5F5F5');
if (!defined('MYSQL_CLIENT_COMPRESS')) define('MYSQL_CLIENT_COMPRESS', 32);
if (!defined('MYSQL_CLIENT_SSL')) define('MYSQL_CLIENT_SSL', 2048);

if (function_exists('mysqli_report')) {
    mysqli_report(MYSQLI_REPORT_OFF);
}

$GLOBALS['__mysql_link']     = null;
$GLOBALS['__mysql_error']    = '';
$GLOBALS['__mysql_errno']    = 0;

function __mysql_default_link()
{
    if (isset($GLOBALS['__mysql_link']) && $GLOBALS['__mysql_link'] instanceof mysqli) {
        return $GLOBALS['__mysql_link'];
    }
    $link = @mysql_connect('127.0.0.1:3307', '17pub', '17171717');
    return $link;
}

function __mysql_set_error($link = null)
{
    if ($link instanceof mysqli) {
        $GLOBALS['__mysql_error'] = mysqli_error($link);
        $GLOBALS['__mysql_errno'] = mysqli_errno($link);
    } else {
        $GLOBALS['__mysql_error'] = mysqli_connect_error();
        $GLOBALS['__mysql_errno'] = mysqli_connect_errno();
    }
}

function mysql_connect($server = null, $username = null, $password = null, $new_link = false, $client_flags = 0)
{
    $server   = ($server === null || $server === '') ? '127.0.0.1' : $server;
    $username = ($username === null) ? 'root' : $username;
    $password = ($password === null) ? '' : $password;

    $port = null;
    if (strpos($server, ':') !== false) {
        list($server, $port) = explode(':', $server, 2);
        $port = (int) $port;
    }
    if ($server === 'localhost') {
        $server = '127.0.0.1';
    }

    $link = @mysqli_connect($server, $username, $password, '', $port ?: null);
    if ($link) {
        $GLOBALS['__mysql_link'] = $link;
        @mysqli_set_charset($link, 'utf8mb4');
        @mysqli_query($link, "SET SESSION sql_mode=''");
    } else {
        __mysql_set_error();
    }
    return $link;
}

function mysql_pconnect($server = null, $username = null, $password = null)
{
    return mysql_connect($server, $username, $password);
}

function mysql_select_db($db, $link = null)
{
    $link = $link instanceof mysqli ? $link : __mysql_default_link();
    if (!$link) {
        return false;
    }
    $ok = @mysqli_select_db($link, $db);
    if (!$ok) {
        __mysql_set_error($link);
    }
    return $ok;
}

function mysql_query($query, $link = null)
{
    $link = $link instanceof mysqli ? $link : __mysql_default_link();
    if (!$link) {
        return false;
    }
    $result = @mysqli_query($link, $query);
    if ($result === false) {
        __mysql_set_error($link);
    }
    return $result;
}

function mysql_db_query($db, $query, $link = null)
{
    if (!mysql_select_db($db, $link)) {
        return false;
    }
    return mysql_query($query, $link);
}

function mysql_fetch_array($result, $type = MYSQL_BOTH)
{
    if (!($result instanceof mysqli_result)) {
        return false;
    }
    return mysqli_fetch_array($result, $type);
}

function mysql_fetch_assoc($result)
{
    return ($result instanceof mysqli_result) ? mysqli_fetch_assoc($result) : false;
}

function mysql_fetch_row($result)
{
    return ($result instanceof mysqli_result) ? mysqli_fetch_row($result) : false;
}

function mysql_fetch_object($result, $class = 'stdClass', $params = array())
{
    if (!($result instanceof mysqli_result)) {
        return false;
    }
    return mysqli_fetch_object($result, $class, $params);
}

function mysql_num_rows($result)
{
    return ($result instanceof mysqli_result) ? mysqli_num_rows($result) : 0;
}

function mysql_num_fields($result)
{
    return ($result instanceof mysqli_result) ? mysqli_num_fields($result) : 0;
}

function mysql_free_result($result)
{
    return ($result instanceof mysqli_result) ? mysqli_free_result($result) : true;
}

function mysql_data_seek($result, $offset)
{
    return ($result instanceof mysqli_result) ? mysqli_data_seek($result, $offset) : false;
}

function mysql_result($result, $row, $field = 0)
{
    if (!($result instanceof mysqli_result)) {
        return false;
    }
    if (!mysqli_data_seek($result, $row)) {
        return false;
    }
    $rec = mysqli_fetch_array($result, MYSQL_BOTH);
    if ($rec === null) {
        return false;
    }
    if (is_int($field)) {
        return isset($rec[$field]) ? $rec[$field] : false;
    }
    return isset($rec[$field]) ? $rec[$field] : false;
}

function mysql_field_name($result, $index)
{
    if (!($result instanceof mysqli_result)) {
        return false;
    }
    $f = mysqli_fetch_field_direct($result, $index);
    return $f ? $f->name : false;
}

function mysql_field_type($result, $index)
{
    if (!($result instanceof mysqli_result)) {
        return false;
    }
    $f = mysqli_fetch_field_direct($result, $index);
    return $f ? $f->type : false;
}

function mysql_field_len($result, $index)
{
    if (!($result instanceof mysqli_result)) {
        return false;
    }
    $f = mysqli_fetch_field_direct($result, $index);
    return $f ? $f->length : false;
}

function mysql_field_table($result, $index)
{
    if (!($result instanceof mysqli_result)) {
        return false;
    }
    $f = mysqli_fetch_field_direct($result, $index);
    return $f ? $f->table : false;
}

function mysql_insert_id($link = null)
{
    $link = $link instanceof mysqli ? $link : __mysql_default_link();
    return $link ? mysqli_insert_id($link) : 0;
}

function mysql_affected_rows($link = null)
{
    $link = $link instanceof mysqli ? $link : __mysql_default_link();
    return $link ? mysqli_affected_rows($link) : -1;
}

function mysql_error($link = null)
{
    if ($link instanceof mysqli) {
        return mysqli_error($link);
    }
    return $GLOBALS['__mysql_error'];
}

function mysql_errno($link = null)
{
    if ($link instanceof mysqli) {
        return mysqli_errno($link);
    }
    return $GLOBALS['__mysql_errno'];
}

function mysql_close($link = null)
{
    $link = $link instanceof mysqli ? $link : $GLOBALS['__mysql_link'];
    if ($link instanceof mysqli) {
        mysqli_close($link);
        if ($GLOBALS['__mysql_link'] === $link) {
            $GLOBALS['__mysql_link'] = null;
        }
    }
    return true;
}

function mysql_set_charset($charset, $link = null)
{
    $link = $link instanceof mysqli ? $link : __mysql_default_link();
    return $link ? mysqli_set_charset($link, $charset) : false;
}

function mysql_client_encoding($link = null)
{
    $link = $link instanceof mysqli ? $link : __mysql_default_link();
    return $link ? mysqli_character_set_name($link) : false;
}

function mysql_real_escape_string($string, $link = null)
{
    $link = $link instanceof mysqli ? $link : __mysql_default_link();
    return $link ? mysqli_real_escape_string($link, $string) : addslashes($string);
}

function mysql_escape_string($string)
{
    return addslashes($string);
}

function mysql_get_server_info($link = null)
{
    $link = $link instanceof mysqli ? $link : __mysql_default_link();
    return $link ? mysqli_get_server_info($link) : false;
}

/* ---------- other removed PHP functions ---------- */
function get_magic_quotes_gpc() { return 0; }
function get_magic_quotes_runtime() { return 0; }
function set_magic_quotes_runtime($value = false) { return true; }
function set_magic_quotes_gpc($value = false) { return true; }

function each(&$array)
{
    if (!is_array($array)) {
        return false;
    }
    $key = key($array);
    if ($key === null) {
        return false;
    }
    $value = current($array);
    next($array);
    return array(1 => $value, 'value' => $value, 0 => $key, 'key' => $key);
}

function ereg($pattern, $string, &$regs = null)
{
    $regex = '/' . str_replace('/', '\\/', $pattern) . '/';
    $ok = @preg_match($regex, $string, $m);
    $regs = $m;
    return $ok > 0;
}

function eregi($pattern, $string, &$regs = null)
{
    $regex = '/' . str_replace('/', '\\/', $pattern) . '/i';
    $ok = @preg_match($regex, $string, $m);
    $regs = $m;
    return $ok > 0;
}

function ereg_replace($pattern, $replacement, $string)
{
    return preg_replace('/' . str_replace('/', '\\/', $pattern) . '/', $replacement, $string);
}

function eregi_replace($pattern, $replacement, $string)
{
    return preg_replace('/' . str_replace('/', '\\/', $pattern) . '/i', $replacement, $string);
}

function split($pattern, $string, $limit = -1)
{
    return preg_split('/' . str_replace('/', '\\/', $pattern) . '/', $string, $limit);
}

function spliti($pattern, $string, $limit = -1)
{
    return preg_split('/' . str_replace('/', '\\/', $pattern) . '/i', $string, $limit);
}

function session_register(...$names)
{
    foreach ($names as $name) {
        if (!isset($_SESSION[$name]) && isset($GLOBALS[$name])) {
            $_SESSION[$name] = $GLOBALS[$name];
        }
    }
    return true;
}

function session_unregister($name)
{
    unset($_SESSION[$name]);
    return true;
}

function session_is_registered($name)
{
    return isset($_SESSION[$name]);
}

/* Legacy Discuz template constants used by news/ubb.php */
if (!defined('ALTBG2')) define('ALTBG2', '#F7F7F7');
if (!defined('BORDERCOLOR')) define('BORDERCOLOR', '#CCCCCC');
if (!defined('SMDIR')) define('SMDIR', '/images/smilies');

/* ---------- UTF-8 safe title truncation (legacy pages) ---------- */
if (!function_exists('yiqi_cut')) {
    function yiqi_cut($str, $width = 30, $marker = '……')
    {
        $str = (string)$str;
        if ($str === '') {
            return '';
        }
        if (!preg_match_all('/./us', $str, $m)) {
            $str = @iconv('UTF-8', 'UTF-8//IGNORE', $str);
            if (!preg_match_all('/./us', $str, $m)) {
                return '';
            }
        }
        $out = '';
        $used = 0;
        foreach ($m[0] as $ch) {
            $w = (strlen($ch) > 1) ? 2 : 1;
            if ($used + $w > $width) {
                $trimmed = preg_replace('/[\s&＆,，、;；:：\-—–_+|\/]+$/u', '', $out);
                if ($trimmed !== null) {
                    $out = $trimmed;
                }
                return $out . $marker;
            }
            $out .= $ch;
            $used += $w;
        }
        return $str;
    }
}

function mb_eregi($pattern, $string, &$regs = null)
{
    return eregi($pattern, $string, $regs);
}

function mb_convert_encoding($string, $to, $from = null)
{
    if ($from === null || $from === '') {
        return $string;
    }
    $result = @iconv($from, 'UTF-8//IGNORE', $string);
    return $result === false ? $string : $result;
}
