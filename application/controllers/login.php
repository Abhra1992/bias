<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login
 *
 * @author abhra
 */
class Login extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->template->set_layout('alternative')->set_partial('header', 'layouts/header')->set_partial('footer', 'layouts/footer');
        $this->set_metadata();
    }

    public function index() {
        $this->template->build('login/default');
    }

    public function verify() {
        $data['verify'] = $this->db->select('username')->from('users')
                        ->where('username', $this->input->post('username'))
                        ->where('password', md5($this->input->post('password')))
                        ->get()->result();
        $_SESSION['logged-in'] = (count($data['verify']) == 1) ? true : false;
        if ($_SESSION['logged-in'] == true) {
            header("Location: " . base_url('home'));
        } else {
            $this->index();
        }
    }

    public function logout() {
        session_destroy();
        redirect(base_url('landing'));
    }

}

?>
