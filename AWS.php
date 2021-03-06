<?php
# @Author: Andrea F. Daniele <afdaniele>
# @Email:  afdaniele@ttic.edu
# @Last modified by:   afdaniele


namespace system\packages\aws;

use \system\classes\Core;


/**
 *   Module for managing AWS SDK Loading
 */
class AWS {
    
    private static $initialized = false;
    
    // disable the constructor
    private function __construct() {
    }
    
    /** Initializes the module.
     *
     * @retval array
     *        a status array of the form
     *    <pre><code class="php">[
     *        "success" => boolean,    // whether the function succeded
     *        "data" => mixed        // error message or NULL
     *    ]</code></pre>
     *        where, the `success` field indicates whether the function succeded.
     *        The `data` field contains errors when `success` is `FALSE`.
     */
    public static function init(): array {
        if (!self::$initialized) {
            $pkg_dir = Core::getPackageRootDir("aws");
            $private_data_dir = join_path($pkg_dir, "data", "private");
            $autoload = join_path($private_data_dir, "composer", "vendor", "autoload.php");
            require_once $autoload;
            //
            self::$initialized = true;
            return ['success' => true, 'data' => null];
        } else {
            return ['success' => true, 'data' => "Module already initialized!"];
        }
    }//init
    
    /** Returns whether the module is initialized.
     *
     * @retval boolean
     *        whether the module is initialized.
     */
    public static function isInitialized(): bool {
        return self::$initialized;
    }//isInitialized
    
    /** Safely terminates the module.
     *
     * @retval array
     *        a status array of the form
     *    <pre><code class="php">[
     *        "success" => boolean,    // whether the function succeded
     *        "data" => mixed        // error message or NULL
     *    ]</code></pre>
     *        where, the `success` field indicates whether the function succeded.
     *        The `data` field contains errors when `success` is `FALSE`.
     */
    public static function close(): array {
        // do stuff
        return ['success' => true, 'data' => null];
    }//close
    
    
    // =======================================================================================================
    // Public functions
    
    
    
    // =======================================================================================================
    // Private functions
    
    
}//AWS


