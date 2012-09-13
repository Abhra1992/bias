<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of enterprises
 *
 * @author abhra
 */
class Enterprises extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['enterprises'] = $this->view_all();
        $this->template->build('enterprises/default', $data);
    }

    public function details($id = 0) {
        $data['enterprises'] = $this->view_details($id);
        $this->template->build('enterprises/details', $data);
    }

    public function add() {
        $data['categories'] = $this->db->select('category_id, category_name')->from('enterprise_category')->get()->result();
        $this->template->build('enterprises/add', $data);
    }

    public function edit($id = 0) {
        $data['enterprises'] = $this->view_details($id);
        $data['categories'] = $this->db->select('category_id, category_name')->from('enterprise_category')->get()->result();
        $this->template->build('enterprises/edit', $data);
    }

    public function add_to_db() {
        $result = $this->db->insert('enterprise', $this->input->post());
        if ($result) {
            echo "Entry Successful ! \n" . "Redirecting ... \n";
            header("Location: " . base_url('enterprises'));
        } else {
            echo "Error in Entry ! \n" . "Try again !! \n";
            header("Location: " . base_url('enterprises/add'));
        }
    }

    public function edit_db() {
        $result = $this->db->update('enterprise', $this->input->post(), "dept_id = " . $this->input->post('dept_id'));
        if ($result) {
            echo "Entry Successful ! \n" . "Redirecting ... \n";
            header("Location: " . base_url('enterprises'));
        } else {
            echo "Error in Entry ! \n" . "Try again !! \n";
            header("Location: " . base_url('enterprises/edit/' . $this->input->post('dept_id')));
        }
    }

    private function view_all($limit = 30) {
        $this->db->select('ent_regis_no, name, category_name, email, website')
                ->from('enterprise')->join('enterprise_category', 'enterprise.category = enterprise_category.category_id')
                ->limit($limit);
        return $this->db->get()->result();
    }

    private function view_details($id = 0) {
        $this->db->select('ent_regis_no, name, category_name, email, fax, website')
                ->from('enterprise')->join('enterprise_category', 'enterprise.category = enterprise_category.category_id')
                ->where('ent_regis_no', $id);
        return $this->db->get()->result();
    }

}

?>
