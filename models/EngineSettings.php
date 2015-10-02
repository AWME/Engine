<?php namespace AWME\Engine\Models;

use Model;

/**
 * EngineSettings Model
 */
class EngineSettings extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];

    public $settingsCode = 'engine_settings';
    public $settingsFields = 'fields.yaml';
    
    /**
     * @var string The database table used by the model.
     */
    public $table = 'awme_engine_settings';

}