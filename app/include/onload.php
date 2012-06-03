<?php
use Model\Database\Model\TableReference;

new \Web\Session\Authentication\Source\Database(TableReference::getByTableClass('User'));
new \Web\Session\Authentication\Http();