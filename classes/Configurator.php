<?php namespace AWME\Engine\Classes;

use Config;

use AWME\Engine\Models\Settings;

class Configurator{

        /**
        * Register "/config/remote.php" for SSH
        */
        public function setRemote(){    
            Config::set('remote.default', 'production');
            Config::set('remote.connections.production.host',       Settings::get('ssh')['host']);
            Config::set('remote.connections.production.username',   Settings::get('ssh')['username']);
            Config::set('remote.connections.production.password',   Settings::get('ssh')['password']);
            Config::set('remote.connections.production.key',        Settings::get('ssh')['key']);
            Config::set('remote.connections.production.keyphrase',  Settings::get('ssh')['keyphrase']);
            Config::set('remote.connections.production.root',       base_path());
        }

        /**
         * Database Connection
         */
        public function setDatabase()
        {
            Config::set('database.connections.engine.host',         Settings::get('db')['host']);
            Config::set('database.connections.engine.port',         Settings::get('db')['port']);
            Config::set('database.connections.engine.driver',       Settings::get('db')['driver']);
            Config::set('database.connections.engine.database',     Settings::get('db')['name']);
            Config::set('database.connections.engine.username',     Settings::get('db')['user']);
            Config::set('database.connections.engine.password',     Settings::get('db')['password']);
            Config::set('database.connections.engine.charset',      Settings::get('db')['charset']);
            Config::set('database.connections.engine.collation',    Settings::get('db')['collation']);
            Config::set('database.connections.engine.prefix',       Settings::get('db')['prefix']);
        }
}