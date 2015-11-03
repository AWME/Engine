<?php namespace AWME\Engine\Classes;

use Config;

use AWME\Engine\Models\Settings;

class Configurator{

	public function setRemote(){
		
		/**
         * Register "/config/remote.php" for SSH
         */
        Config::set('remote.default', 'production');
        Config::set('remote.connections.production.host',       Settings::get('host'));
        Config::set('remote.connections.production.username',   Settings::get('username'));
        Config::set('remote.connections.production.password',   Settings::get('password'));
        Config::set('remote.connections.production.key',        Settings::get('key'));
        Config::set('remote.connections.production.keyphrase',  Settings::get('keyphrase'));
        Config::set('remote.connections.production.root',       Settings::get('root'));
	}
}