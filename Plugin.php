<?php namespace AWME\Engine;

use System\Classes\PluginBase;

use App;
use Config;

use AWME\Engine\Classes\Configurator;

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
            'name'        => 'OctoEngine',
            'description' => 'Engine for AWME Plugins',
            'author'      => 'AWME, LucasZdv',
            'homepage'    => 'http://awebsome.me',
            'icon'        => 'icon-cogs'
        ];
    }

    /**
    * Boot method, called right before the request route.
    */
    public function boot()
    {   
        $Configurator = new Configurator;
        $Configurator->setRemote();
        $Configurator->setDatabase();

        // Register ServiceProviders
        App::register('Collective\Remote\RemoteServiceProvider');

        // Register aliases
        $alias = AliasLoader::getInstance();
        $alias->alias('SSH', 'Collective\Remote\RemoteFacade');
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

            //Connection Settings
            'connection_settings'  => [
                'label'       => 'Connection Settings',
                'description' => 'Settings of AWME Engine',
                'category'    => 'OctoMain',
                'icon'        => 'icon-terminal',
                'class'       => 'AWME\Engine\Models\Settings',
                'order'       => 409,
                //'permissions' => [ 'awme.engine.settings' ],
                'keywords'    => 'engine'
            ],
        ];
    }

}
