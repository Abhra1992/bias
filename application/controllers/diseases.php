<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of disease
 *
 * @author abhra
 */
class Diseases extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['diseases'] = $this->view_all();
        $this->template->build('diseases/default', $data);
    }

    public function details($id = 0) {
        $data['diseases'] = $this->view_details($id);
        $data['patients'] = $this->view_patients($id);
        $this->template->build('diseases/details', $data);
    }

    public function add() {
        $this->template->build('diseases/add');
    }

    public function edit($id = 0) {
        $data['diseases'] = $this->view_details($id);
        $data['symptoms'] = $this->db->select('category_id, category_name')->from('dept_category')->get()->result();
        $data['cause'] = $this->db->select('aff_id, aff_board_name')->from('dept_affln_board')->get()->result();
        $this->template->build('diseases/edit', $data);
    }

    public function add_to_db() {
        $icd = $this->input->post('icd');
        $result = $this->db->insert('disease', array('icd' => $icd, 'name' => $this->input->post('name')));
        $symptoms = explode('/', $this->input->post('symptoms'));
        foreach ($symptoms as $s) {
            $result &= $this->db->insert('disease_symptoms', array('disease_icd' => $icd, 'symptoms' => trim($s)));
        }
        $causes = explode('/', $this->input->post('causes'));
        foreach ($causes as $c) {
            $result &= $this->db->insert('disease_causes', array('disease_icd' => $icd, 'cause' => trim($c)));
        }
        if ($result) {
            echo "Entry Successful ! \n" . "Redirecting ... \n";
            header("Location: " . base_url('diseases'));
        } else {
            echo "Error in Entry ! \n" . "Try again !! \n";
            header("Location: " . base_url('diseases/add'));
        }
    }

    public function edit_db() {
        $result = $this->db->update('department', $this->input->post(), "dept_id = " . $this->input->post('dept_id'));
        if ($result) {
            echo "Entry Successful ! \n" . "Redirecting ... \n";
            header("Location: " . base_url('diseases'));
        } else {
            echo "Error in Entry ! \n" . "Try again !! \n";
            header("Location: " . base_url('diseases/edit/' . $this->input->post('dept_id')));
        }
    }

    private function view_all($limit = 30) {
        $this->db->select('icd, name, ')->from('disease')
                ->group_by('icd')
                ->limit($limit);
        return $this->db->get()->result();
    }

    private function view_details($id = 0) {
        $this->db->select('icd, name, cause, group_concat(distinct symptoms separator \' / \') as symptoms, 
            group_concat(distinct cause separator \' / \') as causes')->from('disease')
                ->join('disease_causes', 'disease.icd = disease_causes.disease_icd')
                ->join('disease_symptoms', 'disease.icd = disease_symptoms.disease_icd')
                ->where('disease.icd', $id);
        return $this->db->get()->result();
    }
    private function view_patients($id = 0) {
        $this->db->select('icd, name, cause, group_concat(distinct symptoms separator \' / \') as symptoms, 
            group_concat(distinct cause separator \' / \') as causes')->from('disease')
                ->join('disease_causes', 'disease.icd = disease_causes.disease_icd')
                ->join('disease_symptoms', 'disease.icd = disease_symptoms.disease_icd')
                ->where('disease.icd', $id);
        return $this->db->get()->result();
    }

}
?>
