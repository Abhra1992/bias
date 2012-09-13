<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of profile
 *
 * @author apoorv
 */
class Profile extends MY_Controller {

    //put your code here

    public function doctor($id = 0,$page = 1) {
        if ($id == 0) {
            $data['doctors'] = $this->db->select('doc_regis_no, fname, mname, lname')
                            ->from('doctor')->join('person', 'person.ssn=doctor.ssn')->get()->result();
            $data['pages']  = count($data['doctors'])/30 +1;
            $this->template->build('profile/all_doctors', $data);
        } else {
            $data['doctor'] = $this->view_details_doctor($id,30,($page-1)*30);
            $data['pages'] = count($data['doctor'])/30 + 1;
            $data['doc_procedure'] = $this->doctor_procedure($id);

            $this->template->build('profile/doctor', $data);
        }
    }

    public function person($id = 0) {

        $data['person'] = $this->view_details_person($id);
        $this->template->build('profile/person', $data);
    }

    public function patient($id = 0) {
        if ($id == 0) {
           $data['patients'] = $this->db->select('patient.ssn, patient_id,fname,mname,lname')->from('patient')->join('person','person.ssn=patient.ssn')->limit(60)->get()->result();
            $this->template->build('profile/all_patients', $data);
        } else {
            $data['patient'] = $this->view_details_patient($id);
            $data['medical_record_patient'] = $this->patient_medical_record($id);
            $this->template->build('profile/patient', $data);
        }
    }

    private function view_details_person($id = 0) {
        $this->db->select('ssn,fname,mname,lname,dob,sex,phone,email,address,nationality,ethinicity,language,')
                ->from('person')
                ->where('ssn', $id);
        return $this->db->get()->result();
    }

    private function patient_medical_record($id = 0) {
        $this->db->select('onset_date,closure_date,record_id,person.fname,person.mname,person.lname,doctor.doc_regis_no')
                ->from('medical_record')->join('doctor', 'medical_record.doc_regis_no=doctor.doc_regis_no')
                ->join('patient', 'patient.patient_id=medical_record.patient_id')
                ->join('person', 'doctor.ssn=person.ssn')
                ->where('patient.patient_id', $id);
        return$this->db->get()->result();
    }

    private function doctor_procedure($id = 0) {
        $this->db->select('name,experience,procedures.proc_id')
                ->from('procedures')->join('doctor_procedure', 'doctor_procedure.proc_id=procedures.proc_id')
                ->where('doctor_procedure.doc_regis_no', $id);
        return $this->db->get()->result();
    }

    private function view_details_doctor($id = 0,$limit = 30, $offset = 0) {
        $this->db->select('person.ssn,fname,mname,lname,dob,sex,phone,email,address,nationality,ethinicity,language,doctor.doc_regis_no,doctor.dept_id,desig_name,department.type, doctor_hospital.h_regis_no,hospital.name')
                ->from('person')->join('doctor', 'doctor.ssn = person.ssn')
                ->join('doctor_designation', 'doctor_designation.desig_id = doctor.designation')
                ->join('department', 'doctor.dept_id=department.dept_id')
                ->join('doctor_hospital', 'doctor_hospital.doc_regis_no=doctor.doc_regis_no')
                ->join('hospital', 'hospital.h_regis_no=doctor_hospital.h_regis_no')
                ->where('doctor.doc_regis_no', $id)
                ->limit($limit,$offset);
        return $this->db->get()->result();
    }

    private function view_details_patient($id = 0) {
        $this->db->select('person.ssn,fname,mname,lname,dob,sex,phone,email,address,nationality,ethinicity,language,patient.patient_id,blood_group,date_deceased,reason_deceased,next_of_kin_ssn,income')
                ->from('patient')->join('person', 'patient.ssn = person.ssn')
                ->where('patient.patient_id', $id);
        return $this->db->get()->result();
    }

}

?>
