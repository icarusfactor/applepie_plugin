<?php
/**
 * @package  AppLePiePlugin
 */

class AppLePiePluginActivate
{
	public static function activate() {
		flush_rewrite_rules();
	}
}
