<?php
defined('BASEPATH') OR exit('No direct script access allowed');

namespace Restserver\Libraries;

require APPPATH . 'libraries/REST_Controller.php';

class Record extends REST_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
    }

    private function get_name() {
        return date("d-M-Y-H:i:s").".wav";
    }

    public function index_get() {
        $old_path = getcwd();
        chdir('/var/www/');
        $value = exec("./status_record.sh 2>&1");
        chdir($old_path);
        $message = $value;

        $this->set_response($message, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
    }

    public function index_post() {
        $old_path = getcwd();
        chdir('/var/www/');
        echo shell_exec("./start_record.sh ".$this->get_name()."|at now");
        chdir($old_path);

        $this->set_response('Started recording', REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
    }

    public function index_delete() {
        $old_path = getcwd();
        chdir('/var/www/');
        echo shell_exec("./stop_record.sh ".$this->get_name()."|at now");
        chdir($old_path);

        $this->set_response('Stopped recording', REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
    }

    /*public function lock_delete() {
        $old_path = getcwd();
        chdir('/var/www/');
        echo shell_exec("./destroy_lock.sh |at now");
        chdir($old_path);

        $this->set_response('Destroyed lock!', REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
    }*/
}
