<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

$active_group	= 'default';
$query_builder	= TRUE;

$db['default']	= array(
	'dsn'		=> '',
	'hostname'	=> 'localhost',
	'username'	=> 'cms',
	'password'	=> '123456',
	'port'		=> '3306',
	'database'	=> 'finecms',
	'dbdriver'	=> 'mysqli',
	'dbprefix'	=> 'fn_',
	'pconnect'	=> FALSE,
	'db_debug'	=> FALSE,
	'cache_on'	=> FALSE,
	'cachedir'	=> 'cache/sql/',
	'char_set'	=> 'utf8',
	'dbcollat'	=> 'utf8_general_ci',
	'swap_pre'	=> '',
	'autoinit'	=> FALSE,
	'encrypt'	=> FALSE,
	'compress'	=> FALSE,
	'stricton'	=> FALSE,
	'failover'	=> array(),
);
