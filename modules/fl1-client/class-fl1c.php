<?php
/**
 * FL1 Client
 *
 * Class in charge of initialising everything FL1_Client
 */

 // Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class FL1_Client {

	private $code;
	private $name;
	private $folder;
	private $version;

    public function __construct($code, $name, $folder, $version = '1.0') {

		$this->code = $code;
		$this->name = $name;
		$this->folder = $folder;
		$this->version = $version;

        $this->define_constants();

        add_filter(FL1_SLUG.'_load_dependencies', array($this, 'load_dependencies'));
        add_action(FL1_SLUG.'_setup_theme',	array($this, 'setup_theme'));
        add_action(FL1_SLUG.'_init', array($this, 'init'));
        
        add_action('fl1_enqueue_scripts_styles', array($this, 'enqueue_scripts_styles'));

    }

    /**
     * Setup constants.
     *
     * @access private
     * @since 1.0
     * @return void
     */
    private function define_constants() {

        define('FL1C_VERSION', $this->version);
        define('FL1C_SLUG', $this->code);
        define('FL1C_NAME', $this->name);
        define('FL1C_PLUGIN_FOLDER', $this->folder);
        define('FL1C_PATH', FL1_PATH.'/modules/'.FL1C_PLUGIN_FOLDER.'/');
        define('FL1C_URL', FL1_URL.'/modules/'.FL1C_PLUGIN_FOLDER.'/');

    }
    
    /**
     * Loads all dependencies.
     *
     * @access public
     * @since 1.0
     * @return void
     */
    public function load_dependencies($deps) {

        $deps[] = FL1C_PATH. 'class-fl1c-cpt.php';
        $deps[] = FL1C_PATH. 'class-fl1c-public.php';
        $deps[] = FL1C_PATH. 'class-fl1c-team.php';
        $deps[] = FL1C_PATH. 'class-fl1c-testimonial.php';
		$deps[] = FL1C_PATH. 'class-fl1c-faq.php';
        $deps[] = FL1C_PATH. 'class-fl1c-user.php';
        $deps[] = FL1C_PATH. 'class-ins-bank.php';
        $deps[] = FL1C_PATH. 'class-ins-banks.php';
        $deps[] = FL1C_PATH. 'class-ins-rate.php';

        return $deps;

    }

    public function setup_theme() {

        new FL1C_CPT();

    }

    public function init() {

        new FL1C_Public();

		$banks = new Ins_Banks();
        $banks->init();
        
    }

    public function enqueue_scripts_styles() {

        wp_localize_script('custom-js', 'fl1c_ajax_object', array(
            'ajaxUrl' => admin_url( 'admin-ajax.php' ),
            'ajaxNonce' => wp_create_nonce('$C.cGLu/1zxq%.KH}PjIKK|2_7WDN`x[vdhtF5GS4|+6%$wvG)2xZgJcWv3H2K_M'),
            'jsPath' => FL1C_URL.'/assets/js/',
        ));

    }

}

// Release the Kraken!
new FL1_Client('ins', 'Brownbills', 'fl1-client');