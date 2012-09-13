<div id="view" class="container-fluid">
    <form id="add_medical_record" class="row-fluid" action="<?php echo base_url('medical_record/add_to_db'); ?>" method="POST">
        <label for="onset_date">Onset Date</label>
        <input name="onset_date" id="onset_date" type="datetime" />
        <label for="closure">Closure Date</label>
        <input name="closure_date" id="closure_date" type="datetime" />
        <label for="comments">Comments</label>
        <input name="comments" id="comments" type="text" />
        <label for="doc_regis_no">Doctor Registration No</label>  
        <input name="doc_regis_no" id="doc_regis_no" type="text" />
        <label for="icd">ICD</label>
        <select name="icd" id="icd">
            <?php foreach ($icd as $c) { ?>
                <option value="<?php echo $c->icd; ?>"><?php echo $c->icd ?></option>
            <?php } ?>
        </select>
        <input type="submit" value="Add"/>
    </form>
</div>