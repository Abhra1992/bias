<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of equipment
 *
 * @author abhra
 */
class Equipments extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['equipments'] = $this->view_all();
        $this->template->build('equipments/default', $data);
    }

    public function details($id = 0) {
        $data['equipments'] = $this->view_details($id);
        $this->template->build('equipments/details', $data);
    }

    public function add() {
        $data['enterprises'] = $this->db->select('ent_regis_no, name')->from('enterprise')->get()->result();
        $data['procedures'] = $this->db->select('proc_id, name')->from('procedures')->get()->result();
        $this->template->build('equipments/add', $data);
    }

    public function edit($id = 0) {
        $data['equipments'] = $this->view_details($id);
        $data['enterprises'] = $this->db->select('ent_regis_no, name')->from('enterprise')->get()->result();
        $data['procedures'] = $this->db->select('proc_id, name')->from('procedures')->get()->result();
        $this->template->build('equipments/edit', $data);
    }

    public function add_to_db() {
        $insert = array();
        foreach (array('equipment_id', 'name', 'cost', 'ent_regis_no') as $field) {
            $insert[$field] = $this->input->post($field);
        }
        $result = $this->db->insert('equipment', $insert);
        $insert = array();
        foreach (array('equipment_id', 'proc_id') as $field) {
            $insert[$field] = $this->input->post($field);
        }
        $result &= $this->db->insert('equipment_procedure', $insert);
        if ($result) {
            echo "Entry Successful ! \n" . "Redirecting ... \n";
            header("Location: " . base_url('equipments'));
        } else {
            echo "Error in Entry ! \n" . "Try again !! \n";
            header("Location: " . base_url('equipments/add'));
        }
    }

    public function edit_db() {
        $update = array();
        foreach (array('equipment_id', 'name', 'cost', 'ent_regis_no') as $field) {
            $update[$field] = $this->input->post($field);
        }
        $result = $this->db->update('equipment', $update, "equipment_id = " . $this->input->post('equipment_id'));
        $update = array();
        foreach (array('equipment_id', 'proc_id') as $field) {
            $update[$field] = $this->input->post($field);
        }
        $result &= $this->db->update('equipment_procedure', $update, "equipment_id = " . $this->input->post('equipment_id'));
        if ($result) {
            echo "Entry Successful ! \n" . "Redirecting ... \n";
            header("Location: " . base_url('equipments'));
        } else {
            echo "Error in Entry ! \n" . "Try again !! \n";
            header("Location: " . base_url('equipments/edit/' . $this->input->post('dept_id')));
        }
    }

    private function view_all($limit = 30) {
        $this->db->select('equipment_id, equipment.name, cost, equipment.ent_regis_no, enterprise.name as enterprise')
                ->from('equipment')->join('enterprise', 'enterprise.ent_regis_no = equipment.ent_regis_no')
                ->limit($limit);
        return $this->db->get()->result();
    }

    private function view_details($id = 0) {
        $this->db->select('equipment.equipment_id, equipment.name, cost, 
            equipment.ent_regis_no, enterprise.name as enterprise,
            group_concat(distinct procedures.name separator \' / \') as procs,
            group_concat(distinct facility.name separator \' / \') as facilities')
                ->from('equipment')->join('enterprise', 'enterprise.ent_regis_no = equipment.ent_regis_no')
                ->join('equipment_procedure', 'equipment_procedure.equipment_id = equipment.equipment_id')
                ->join('procedures', 'procedures.proc_id = equipment_procedure.proc_id')
                ->join('facility_equipment', 'facility_equipment.equipment_id = equipment.equipment_id')
                ->join('facility', 'facility.f_regis_no = facility_equipment.f_regis_no')
                ->where('equipment.equipment_id', $id);
        return $this->db->get()->result();
    }

}

?>
