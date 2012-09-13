<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of facility
 *
 * @author abhra
 */
class Facilities extends MY_Controller {

    public function index() {
        $data['facilities'] = $this->view_all();
        $this->template->build('facilities/default', $data);
    }

    public function details($id = 0) {
        $data['facilities'] = $this->view_details($id);
        $this->template->build('facilities/details', $data);
    }

    public function add() {
        $data['hospitals'] = $this->db->select('h_regis_no, name')->from('hospital')->get()->result();
        $this->template->build('facilities/add', $data);
    }

    public function edit($id = 0) {
        $data['facilities'] = $this->view_details($id);
        $data['hospitals'] = $this->db->select('h_regis_no, name')->from('hospital')->get()->result();
        $this->template->build('facilities/edit', $data);
    }

    public function add_to_db() {
        $result = $this->db->insert('facility', $this->input->post());
        if ($result) {
            echo "Entry Successful ! \n" . "Redirecting ... \n";
            header("Location: " . base_url('facilities'));
        } else {
            echo "Error in Entry ! \n" . "Try again !! \n";
            header("Location: " . base_url('facilities/add'));
        }
    }

    public function edit_db() {
        $result = $this->db->update('facility', $this->input->post(), "f_regis_no = " . $this->input->post('f_regis_no'));
        if ($result) {
            echo "Entry Successful ! \n" . "Redirecting ... \n";
            header("Location: " . base_url('departments'));
        } else {
            echo "Error in Entry ! \n" . "Try again !! \n";
            header("Location: " . base_url('facilities/edit/' . $this->input->post('f_regis_no')));
        }
    }

    private function view_all($limit = 30) {
        $this->db->select('f_regis_no, facility.name, type, facility.location, hospital.name as hospital')->from('facility')
                ->join('hospital', 'facility.h_regis_no = hospital.h_regis_no')->limit($limit);
        return $this->db->get()->result();
    }

    private function view_details($id = 0) {
        $this->db->select('f_regis_no, facility.name, type, facility.location, open_timing, close_timing, hospital.name as hospital')->from('facility')
                ->join('hospital', 'facility.h_regis_no = hospital.h_regis_no')
                ->where('facility.f_regis_no', $id);
        return $this->db->get()->result();
    }

}

?>
