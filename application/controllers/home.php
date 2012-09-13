<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Home
 *
 * @author abhra
 */
class Home extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->template->append_metadata('<link href="' . CSS . 'home.css" rel="stylesheet" type="text/css" />');
        $this->template->append_metadata('<script src="' . JS . 'home.js" type="text/javascript"></script>');
    }

    public function index() {
        $this->template->title('Landing - BIAS')->build('home/default');
    }

    public function welcome() {
        $this->template->title('Home - BIAS')->build('home/home');
    }

}

?>
