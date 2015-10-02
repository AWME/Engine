<?php namespace AWME\Engine;

use System\Classes\PluginBase;

use App;
use Config;

use AWME\Engine\Models\SshSettings;
use Illuminate\Foundation\AliasLoader;

/**
 * Engine Plugin Information File
 */
class Plugin extends PluginBase
{

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Engine',
            'description' => 'Awebsome Engine',
            'author'      => 'AWME',
            'icon'        => 'icon-cogs'
        ];
    }

    /**
    * Boot method, called right before the request route.
    */
    public function boot()
    {   
        /**
         * Register "/config/remote.php" for SSH
         */
        
        Config::set('remote.default', 'production');
        Config::set('remote.connections.production.host',       SshSettings::get('host'));
        Config::set('remote.connections.production.username',   SshSettings::get('username'));
        Config::set('remote.connections.production.password',   SshSettings::get('password'));
        Config::set('remote.connections.production.key',        SshSettings::get('key'));
        Config::set('remote.connections.production.keyphrase',  SshSettings::get('keyphrase'));
        Config::set('remote.connections.production.root',       SshSettings::get('root'));

        // Register ServiceProviders
        //App::register('Collective\Remote\RemoteServiceProvider');

        // Register aliases
        //$alias = AliasLoader::getInstance();
        //$alias->alias('SSH', 'Collective\Remote\RemoteFacade');
    }

    /**
     * Register Permissions
     * 
     */
    public function registerPermissions()
    {
        return [
            'awme.engine.shell_settings'   => ['tab' => 'Engine','label' => 'SSH Settings'],
        ];
    }

    /**
     * Register Backend Plugin Settings
     * 
     */
    public function registerSettings()
    {
        return [

            //SSH Remote Connection Settings
            'engine_settings'  => [
                'label'       => 'Engine Settings',
                'description' => 'Settings of AWME Engine',
                'category'    => 'Engine',
                'icon'        => 'icon-terminal',
                'class'       => 'AWME\Engine\Models\EngineSettings',
                'order'       => 409,
                'permissions' => [ 'awme.engine.settings' ],
                'keywords'    => 'engine'
            ],

            //SSH Remote Connection Settings
            'engine_ssh_settings'  => [
                'label'       => 'SSH Settings',
                'description' => 'SSH Connections',
                'category'    => 'Engine',
                'icon'        => 'icon-terminal',
                'class'       => 'AWME\Engine\Models\SshSettings',
                'order'       => 500,
                'permissions' => [ 'awme.engine.shell_settings' ],
                'keywords'    => 'ssh remote control'
            ]
        ];
    }

}
