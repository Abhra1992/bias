<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of doctors
 *
 * @author apoorv
 */
class Medical_record extends MY_Controller {

    public function details($id = '0') {
        $data['medical_record'] = $this->view_details($id);
        $data['visits'] = $this->get_visits($id);
        $this->template->build('medical_record/details', $data);
    }

    public function vitals($id = 0) {
        $data['vitals'] = $this->view_vitals($id);
        $this->template->build('medical_record/vitals', $data);
    }

    public function add() {
        $data['icd'] = $this->db->select('icd, name')->from('disease')->get()->result();
        $this->template->build('medical_record/add', $data);
    }

    public function add_to_db() {
        $result = $this->db->insert('medical_record', $this->input->post());
        if ($result) {
            echo "Entry Successful ! \n" . "Redirecting ... \n";
            header("Location: " . base_url('medical_record'));
        } else {
            echo "Error in Entry ! \n" . "Try again !! \n";
            header("Location: " . base_url('medical_record/add'));
        }
    }

    public function add_visit() {
        $this->template->build('medical_record/add_visit');
    }

    public function add_visit_to_db() {
        $result = $this->db->insert('visit', $this->input->post());
        if ($result) {
            echo "Entry Successful ! \n" . "Redirecting ... \n";
            header("Location: " . base_url('medical_record'));
        } else {
            echo "Error in Entry ! \n" . "Try again !! \n";
            header("Location: " . base_url('medical_record/add_visit'));
        }
    }

    private function view_details($id = 0) {
        $this->db->select('record_id, onset_date, closure_date, comments, doc.fname as dfname, doc.mname as dmname, doc.lname as dlname, doctor.doc_regis_no,pat.fname as pfname, pat.mname as pmname, pat.lname as plname, patient.patient_id,name, disease.icd')
                ->from('medical_record')->join('doctor', 'doctor.doc_regis_no=medical_record.doc_regis_no')
                ->join('person as doc', 'doc.ssn = doctor.ssn')
                ->join('patient', 'patient.patient_id=medical_record.patient_id')
                ->join('person as pat', 'pat.ssn=patient.ssn')
                ->join('disease', 'medical_record.icd=disease.icd')
                ->where('medical_record.record_id', $id);
        return $this->db->get()->result();
    }

    private function get_visits($id = 0) {
        $this->db->select('visit_id,date,issues,prescription,visit.vitals_id')
                ->from('visit')
                ->where('visit.record_id', $id);
        return $this->db->get()->result();
    }

    private function view_vitals($id = 0) {
        $this->db->from('vitals')->where('vitals.vitals_id', $id);
        return $this->db->get()->result();
    }

}

?>
