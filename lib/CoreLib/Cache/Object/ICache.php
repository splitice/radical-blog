<?php
namespace Cache\Object;

interface ICache {
	function Get($key);
	function Set($key,$value,$ttl);
	function CachedValue($key_sem, $function, $ttl);
}