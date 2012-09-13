<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of landing
 *
 * @author abhra
 */
class Landing extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->template->set_layout('alternative')->set_partial('header', 'layouts/header')->set_partial('footer', 'layouts/footer');
        $this->set_metadata();
        $this->template->append_metadata('<link href="' . CSS . 'landing.css" rel="stylesheet" type="text/css" />');
        $this->template->append_metadata('<script src="' . JS . 'landing.js" type="text/javascript"></script>');
    }

    public function index() {
        $this->template->title('Landing - BIAS')->build('landing');
    }

}

?>
