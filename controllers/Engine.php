<?php namespace AWME\Engine\Controllers;

use App;
use Config;
use BackendMenu;
use Backend\Classes\Controller;
use SSH;
use Flash;
use DB;

use Storage;
use League\Flysystem\Filesystem;
use Illuminate\Support\ServiceProvider;

/**
 * Engine Back-end Controller
 */
class Engine extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('AWME.Engine', 'engine', 'engine');
    }

    public function index()
    {

     
    }
}