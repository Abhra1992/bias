<div id="view" class="container-fluid">
    <h3><b>DOCTOR PROFILE</b></h3>
    <?php foreach ($doctor as $d) { ?>
        <table id="doctor_profile" class="row-fluid table-bordered table-striped">        
            <tbody>
                <tr>
                    <td class="span6"><b>Registration No.</b></td>
                    <td class="span6"><?php echo $d->doc_regis_no; ?></td>
                </tr>
                <tr>
                    <td class="span6"><b>SSN</b></td>
                    <td class="span6"><?php echo $d->ssn; ?></td>
                </tr>
                <tr>
                    <td class="span6"><b>Name</b></td>
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
                    <td class="span6">Designation</td>
                    <td class="span6"><?php echo $d->desig_name; ?></td>
                </tr>
                <tr>
                    <td class="span6">Department Type</td>
                    <td class="span6"><?php echo anchor(base_url('departments/details/' . $d->dept_id), $d->type); ?></td>
                </tr>
                <tr>
                    <td class="span6">Hospital</td>
                    <td class="span6"><?php echo anchor(base_url('hospitals/details/' . $d->h_regis_no), $d->name); ?></td>
                </tr>
                <tr>
                    <td class="span6">Phone No.</td>
                    <td class="span6"><?php echo $d->phone; ?></td>
                </tr>
                <tr>
                    <td class="span6">Email</td>
                    <td class="span6"><?php echo $d->email; ?></td>
                </tr>
            </tbody>
        </table>
        <br />  
        PROCEDURE EXPERTISE DETAILS
        <table id="doctor_profile_procedures" class="row-fluid table-bordered table-striped">        
            <thead>
            <th class="span6">Procedure</th>
            <th class="span6">Experience(in years)</th>
            </thead>
            <tbody>
                <?php foreach ($doc_procedure as $p) { ?>
                    <tr>
                        <td class="span6"><?php echo anchor(base_url('procedures/details/' . $p->proc_id), $p->name); ?></td>
                        <td class="span6"><?php echo $p->experience; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } ?>
    <br>
    <a onclick= window.print()> <b>PRINT </b></a>
</div>