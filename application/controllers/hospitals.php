<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of hospital
 *
 * @author abhra
 */
class Hospitals extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['hospitals'] = $this->view_all();
        $this->template->build('hospitals/default', $data);
    }

    public function details($id = 0) {
        $data['doctors'] = $this->db->select('doctor.doc_regis_no,start_date,end_date,fname,mname,lname') ->from('doctor_hospital')->join('doctor', 'doctor_hospital.doc_regis_no=doctor.doc_regis_no')
                ->join('person', 'doctor.ssn=person.ssn') ->where('doctor_hospital.h_regis_no', $id)->get()->result();
        $data['departments'] = $this->db->select('type, department.dept_id') ->from('doctor_hospital')->join('doctor', 'doctor_hospital.doc_regis_no=doctor.doc_regis_no')
                ->join('department', 'doctor.dept_id=department.dept_id')->where('doctor_hospital.h_regis_no', $id)->get()->result();
        $data['hospitals'] = $this->view_details($id);
        $this->template->build('hospitals/details', $data);
    }

    public function add() {
        $this->template->build('hospitals/add');
    }

    public function edit($id = 0) {
        $data['hospitals'] = $this->view_details($id);
        $this->template->build('hospitals/edit', $data);
    }

    public function add_to_db() {
        $result = $this->db->insert('hospital', $this->input->post());
        if ($result) {
            echo "Entry Successful ! \n" . "Redirecting ... \n";
            header("Location: " . base_url('hospitals'));
        } else {
            echo "Error in Entry ! \n" . "Try again !! \n";
            header("Location: " . base_url('hospitals/add'));
        }
    }

    public function edit_db() {
        $result = $this->db->update('hospital', $this->input->post(), "h_regis_no = " . $this->input->post('h_regis_no'));
        if ($result) {
            echo "Entry Successful ! \n" . "Redirecting ... \n";
            header("Location: " . base_url('hospitals'));
        } else {
            echo "Error in Entry ! \n" . "Try again !! \n";
            header("Location: " . base_url('hospitals/edit/' . $this->input->post('h_regis_no')));
        }
    }

    private function view_all($limit = 30) {
        $this->db->select('h_regis_no, name, location, capacity, available_capacity')
                ->from('hospital')->limit($limit);
        return $this->db->get()->result();
    }

    private function view_details($id = 0) {
        $this->db->select('h_regis_no, name, location, capacity, available_capacity')
                ->from('hospital')->where('h_regis_no', $id);
        return $this->db->get()->result();
    }

    private function view_departments($id = 0) {
        $this->db->select('hospital.h_regis_no,type, doc_regis_no,emergency_contact,h_regis_no')
                ->from('department')->join('doctor', 'department.dept_id=doctor.dept_id')
                ->join('doctor_hospital', 'doctor_hospital.doc_regis_no=doctor.doc.regis.no')
                ->where('hospital.h_regis_no', $id);
        return $this->db->get()->result();
    }

}

?>
