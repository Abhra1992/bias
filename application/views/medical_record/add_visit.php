<div id="view" class="container-fluid">
    <form id="add_visit" class="row-fluid" action="<?php echo base_url('medical_record/add_visit_to_db'); ?>" method="POST">
        <label for="date">Date</label>
        <input name="date" id="date" type="datetime" />
        <label for="issues">Issues</label>
        <input name="issues" id="issues" type="text" />
        <label for="prescription">Prescriptions</label>
        <input name="prescription" id="prescription" type="text" />
        <input type="submit" value="Add"/>
    </form>
</div>