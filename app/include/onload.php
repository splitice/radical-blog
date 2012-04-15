<?php
use Database\Model\TableReference;

new \Web\Session\Handler\UserSession(TableReference::getByTableClass('User'));