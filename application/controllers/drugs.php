<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of drugs
 *
 * @author abhra
 */
class Drugs extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['drugs'] = $this->view_all();
        $this->template->build('drugs/default', $data);
    }

    public function details($id = 0) {
        $data['drugs'] = $this->view_details($id);
        $this->template->build('drugs/details', $data);
    }

    public function add() {
        $data['categories'] = $this->db->select('category_id, category_name')->from('drug_category')->get()->result();
        $data['enterprises'] = $this->db->select('ent_regis_no, name')->from('enterprise')->get()->result();
        $data['schedules'] = $this->db->select('schedule_id, schedule_name')->from('drug_schedule')->get()->result();
        $data['diseases'] = $this->db->select('icd, name')->from('disease')->get()->result();
        $data['procedures'] = $this->db->select('proc_id, name')->from('procedures')->get()->result();
        $this->template->build('drugs/add', $data);
    }

    public function edit($id = 0) {
        $data['drugs'] = $this->view_details($id);
        $data['categories'] = $this->db->select('category_id, category_name')->from('drug_category')->get()->result();
        $data['enterprises'] = $this->db->select('ent_regis_no, name')->from('enterprise')->get()->result();
        $data['schedules'] = $this->db->select('schedule_id, schedule_name')->from('drug_schedule')->get()->result();
        $data['diseases'] = $this->db->select('icd, name')->from('disease')->get()->result();
        $data['procedures'] = $this->db->select('proc_id, name')->from('procedures')->get()->result();
        $this->template->build('drugs/edit', $data);
    }

    public function add_to_db() {
        $insert = array();
        foreach (array('drug_id', 'name', 'schedule', 'category', 'unit_price', 'ent_regis_no') as $field) {
            $insert[$field] = $this->input->post($field);
        }
        $result = $this->db->insert('drug', $insert);
        $insert = array();
        foreach (array('drug_id', 'icd', 'quantity') as $field) {
            $insert[$field] = $this->input->post($field);
        }
        $result &= $this->db->insert('drug_disease', $insert);
        $insert = array();
        foreach (array('drug_id', 'proc_id') as $field) {
            $insert[$field] = $this->input->post($field);
        }
        $result &= $this->db->insert('drug_procedure', $insert);
        if ($result) {
            echo "Entry Successful ! \n" . "Redirecting ... \n";
            header("Location: " . base_url('drugs'));
        } else {
            echo "Error in Entry ! \n" . "Try again !! \n";
            header("Location: " . base_url('drugs/add'));
        }
    }

    public function edit_db() {
        $update = array();
        foreach (array('drug_id', 'name', 'schedule', 'category', 'unit_price', 'ent_regis_no') as $field) {
            $update[$field] = $this->input->post($field);
        }
        $result = $this->db->update('drug', $update, "drug_id = " . $this->input->post('drug_id'));
        $update = array();
        foreach (array('drug_id', 'icd', 'quantity') as $field) {
            $update[$field] = $this->input->post($field);
        }
        $result &= $this->db->update('drug_disease', $update, "drug_id = " . $this->input->post('drug_id'));
        $update = array();
        foreach (array('drug_id', 'proc_id') as $field) {
            $update[$field] = $this->input->post($field);
        }
        $result &= $this->db->update('drug_procedure', $update, "drug_id = " . $this->input->post('drug_id'));
        if ($result) {
            echo "Entry Successful ! \n" . "Redirecting ... \n";
            header("Location: " . base_url('drugs'));
        } else {
            echo "Error in Entry ! \n" . "Try again !! \n";
            header("Location: " . base_url('drugs/edit/' . $this->input->post('dept_id')));
        }
    }

    private function view_all($limit = 30) {
        $this->db->select('drug_id, drug.name, unit_price, drug.ent_regis_no, enterprise.name as enterprise')
                ->from('drug')->join('enterprise', 'enterprise.ent_regis_no = drug.ent_regis_no')
                ->limit($limit);
        return $this->db->get()->result();
    }

    private function view_details($id = 0) {
        $this->db->select('drug.drug_id, drug.name, unit_price, 
            drug.ent_regis_no, enterprise.name as enterprise, 
            drug.category, category_name, 
            drug.schedule, schedule_name, group_concat(distinct procedures.name separator \' / \') as procs,
            drug_disease.icd, disease.name as disease, drug_disease.quantity')
                ->from('drug')->join('enterprise', 'enterprise.ent_regis_no = drug.ent_regis_no')
                ->join('drug_category', 'drug.category = drug_category.category_id')
                ->join('drug_schedule', 'drug.schedule = drug_schedule.schedule_id')
                ->join('drug_procedure', 'drug.drug_id = drug_procedure.drug_id')
                ->join('procedures', 'procedures.proc_id = drug_procedure.proc_id')
                ->join('drug_disease', 'drug.drug_id = drug_disease.drug_id')
                ->join('disease', 'drug_disease.icd = disease.icd')
                ->where('drug.drug_id', $id);
        return $this->db->get()->result();
    }

}

?>
