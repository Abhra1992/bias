<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of department
 *
 * @author abhra
 */
class Departments extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index($page = 1) {
        $data['departments'] = $this->view_all(30, ($page-1)*30);
        $data['pages'] = count($data['departments'])/30 + 1;
        $this->template->build('departments/default', $data);
    }

    public function details($id = 0) {
        $data['departments'] = $this->view_details($id);
        $this->template->build('departments/details', $data);
    }

    public function add() {
        $data['categories'] = $this->db->select('category_id, category_name')->from('dept_category')->get()->result();
        $data['affiliations'] = $this->db->select('aff_id, aff_board_name')->from('dept_affln_board')->get()->result();
        $this->template->build('departments/add', $data);
    }

    public function edit($id = 0) {
        $data['departments'] = $this->view_details($id);
        $data['categories'] = $this->db->select('category_id, category_name')->from('dept_category')->get()->result();
        $data['affiliations'] = $this->db->select('aff_id, aff_board_name')->from('dept_affln_board')->get()->result();
        $this->template->build('departments/edit', $data);
    }

    public function add_to_db() {
        $result = $this->db->insert('department', $this->input->post());
        if ($result) {
            echo "Entry Successful ! \n" . "Redirecting ... \n";
            header("Location: " . base_url('departments'));
        } else {
            echo "Error in Entry ! \n" . "Try again !! \n";
            header("Location: " . base_url('departments/add'));
        }
    }

    public function edit_db() {
        $result = $this->db->update('department', $this->input->post(), "dept_id = " . $this->input->post('dept_id'));
        if ($result) {
            echo "Entry Successful ! \n" . "Redirecting ... \n";
            header("Location: " . base_url('departments'));
        } else {
            echo "Error in Entry ! \n" . "Try again !! \n";
            header("Location: " . base_url('departments/edit/' . $this->input->post('dept_id')));
        }
    }

    private function view_all($limit = 30, $offset = 0) {
        $this->db->select('dept_id, type, category_name, aff_board_name')
                ->from('department')->join('dept_category', 'department.category = dept_category.category_id')
                ->join('dept_affln_board', 'department.affiliation = dept_affln_board.aff_id')
                ->limit($limit,$offset);
        return $this->db->get()->result();
    }

    private function view_details($id = 0) {
        $this->db->select('dept_id, type, category_name, aff_board_name')
                ->from('department')->join('dept_category', 'department.category = dept_category.category_id')
                ->join('dept_affln_board', 'department.affiliation = dept_affln_board.aff_id')
                ->where('dept_id', $id);
        return $this->db->get()->result();
    }

}

?>
