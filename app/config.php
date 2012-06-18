<?php
$_CONFIG = array();

//$_BACKUP = array('to'=>'email');

$_SQL = new Model\Database\DBAL\Adapter\Connection('db', 'root', 'passwordmysql', 'radical_blog');

$_PROJECT = 'Blog';