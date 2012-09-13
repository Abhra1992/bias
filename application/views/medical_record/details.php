<div id="view" class="container-fluid">
    <h3><b>MEDICAL RECORD DETAILS</h3></b>
    <?php foreach ($medical_record as $d) { ?>
        <table id="medical_record_detail" class="row-fluid table-bordered table-striped">        
            <tbody>
                <tr>
                    <td class="span6">Record Id</td>
                    <td class="span6"><?php echo $d->record_id; ?></td>
                </tr>
                <tr>
                    <td class="span6">Onset Date</td>
                    <td class="span6"><?php echo $d->onset_date; ?></td>
                </tr>
                <tr>
                    <td class="span6">Closure Date</td>
                    <td class="span6"><?php echo $d->closure_date; ?></td>
                </tr>
                <tr>
                    <td class="span6">Patient</td>
                    <td class="span6"><?php echo anchor(base_url('/profile/patient/' . $d->patient_id), $d->pfname . " " . $d->pmname . " " . $d->plname); ?></td>
                </tr>
                <tr>
                    <td class="span6">Doctor</td>
                    <td class="span6"><?php echo anchor(base_url('/profile/doctor/' . $d->doc_regis_no), $d->dfname . " " . $d->dmname . " " . $d->dlname); ?></td>
                </tr>
            </tbody>
        </table>
        <br />  
        VISITS
        <table id="visit_details" class="row-fluid table-bordered table-striped">        
            <thead>
                <tr>
                    <td class="span3">Date</td>
                    <td class="span3">Issues</td>
                    <td class="span3">Prescription</td>
                    <td class="span3">Vitals(Click to View)</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($visits as $v) { ?>
                    <tr>
                        <td class="span3"><?php echo $v->date; ?></td>
                        <td class="span3"><?php echo $v->issues; ?></td>
                        <td class="span3"><?php echo $v->prescription; ?></td>
                        <td class="span3"><?php echo anchor(base_url('/medical_record/vitals/' . $v->vitals_id), 'View'); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } ?>
    <?php echo anchor(base_url('medical_record/add_visit'), "Add Visit") ?>
        <br>
    <a onclick= window.print()> <b>PRINT </b></a>
</div>