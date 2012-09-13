<div id="view" class="container-fluid">
   <h3><b> PATIENT PROFILE</h3></b>
    <?php foreach ($patient as $d) { ?>
        <table id="patient_profile" class="row-fluid table-bordered table-striped">        
            <tbody>
                <tr>
                    <td class="span6">SSN</td>
                    <td class="span6"><?php echo $d->ssn; ?></td>
                </tr>
                <tr>
                    <td class="span6">Name</td>
                    <td class="span6"><?php echo $d->fname . " " . $d->mname . " " . $d->lname; ?></td>
                </tr>
                <tr>
                    <td class="span6">Sex</td>
                    <td class="span6"><?php echo $d->sex; ?></td>
                </tr>
                <tr>
                    <td class="span6">Date Of Birth</td>
                    <td class="span6"><?php echo $d->dob; ?></td>
                </tr>
                <tr>
                    <td class="span6">Address</td>
                    <td class="span6"><?php echo $d->address; ?></td>
                </tr>
                <tr>
                    <td class="span6">Nationality</td>
                    <td class="span6"><?php echo $d->nationality; ?></td>
                </tr>
                <tr>
                    <td class="span6">Ethinicity</td>
                    <td class="span6"><?php echo $d->ethinicity; ?></td>
                </tr>
                <tr>
                    <td class="span6">Language</td>
                    <td class="span6"><?php echo $d->language; ?></td>
                </tr>
                <tr>
                    <td class="span6">Patient Id</td>
                    <td class="span6"><?php echo $d->patient_id; ?></td>
                </tr>
                <tr>
                    <td class="span6">Next of Kin</td>
                    <td class="span6"><?php echo anchor(base_url('profile/person/' . $d->next_of_kin_ssn), $d->next_of_kin_ssn); ?></td>
                </tr>
                <tr>
                    <td class="span6">Date Deceased</td>
                    <td class="span6"><?php echo $d->date_deceased; ?></td>
                </tr>
                <tr>
                    <td class="span6">Reason Deceased</td>
                    <td class="span6"><?php echo $d->reason_deceased; ?></td>
                </tr>
                <tr>
                    <td class="span6">Blood Group</td>
                    <td class="span6"><?php echo $d->blood_group; ?></td>
                </tr>
                <tr>
                    <td class="span6">Income</td>
                    <td class="span6"><?php echo $d->income; ?></td>
                </tr>
            </tbody>
        </table>
        <br />  
        MEDICAL RECORDS
        <table id="patient_profile_medical_records" class="row-fluid table-bordered table-striped">        
            <thead>
            <th class="span3">Record Id</th>
            <th class="span3">Onset Date</th>
            <th class="span3">Closure Date</th>
            <th class="span3">Doctor</th>
            </thead>
            <tbody>
                <?php foreach ($medical_record_patient as $p) { ?>
                    <tr>
                        <td class="span3"><?php echo anchor(base_url('medical_record/details/' . $p->record_id), $p->record_id); ?></td>
                        <td class="span3"><?php echo $p->onset_date; ?></td>
                        <td class="span3"><?php echo $p->closure_date; ?></td>
                        <td class="span3"><?php echo anchor(base_url('profile/doctor/' . $p->doc_regis_no), $p->fname." ".$p->mname." ".$p->lname); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } ?>
           <?php echo anchor(base_url('medical_record/add'), "Add Medical Record") ?>
        <br>
          <a onclick= window.print()> <b>PRINT </b></a>
</div>