<?php namespace AWME\Engine\Models;

use Model;

/**
 * SshSettings Model
 */
class SshSettings extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];

    public $settingsCode = 'engine_ssh_settings';
    public $settingsFields = 'fields.yaml';
    
    /**
     * @var string The database table used by the model.
     */
    public $table = 'awme_engine_ssh_settings';

}