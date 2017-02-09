<?php
namespace Docker;

use Illuminate\Database\Capsule\Manager as Capsule;
/**
 * Singleton class
 *
 */
final class Core
{
    protected $config = array();
    /**
     * Call this method to get singleton
     *
     * @return Core
     */
    public static function getInstance()
    {
        static $inst = null;
        if ($inst === null) {
            $inst = new Core();
        }
        return $inst;
    }

    public function run($config) {

        if (is_file($config)) {
            $this->config = include $config;
        } else {
            // load default config   
        }
        $this->bootstrap();

        Importer::Show();
    }
    /**
     * Private ctor so nobody else can instance it
     *
     */
    private function __construct()
    {

    }
    private function __clone() {
        
    }
    /**
     * Load app components
     */
    protected function bootstrap() {
        
        $this->capsule = new Capsule;

        $this->capsule->addConnection($this->config["db"]);

        $this->capsule->bootEloquent();

    }

}