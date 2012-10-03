<?php
$_CONFIG = array();

//$_BACKUP = array('to'=>'email');

$_SQL = new Model\Database\DBAL\Adapter\MySQLConnection('db', 'root', 'passwordmysql', 'radical_blog');

$_PROJECT = 'Blog';