<div id="view" class="container-fluid">
    <form id="add_disease" class="row-fluid" action="<?php echo base_url('diseases/add_to_db'); ?>" method="POST">        
        <label for="icd">ICD</label>
        <input name="icd" id="icd" type="text" />
        <label for="name">Name</label>
        <input name="name" id="name" type="text" />
        <label for="symptoms">Symptoms</label>
        <input name="symptoms" id="symptoms" type="text" />
        <label for="causes">Causes</label>
        <input name="causes" id="causes" type="text" />
        <input type="submit" value="Add"/>
    </form>
</div>