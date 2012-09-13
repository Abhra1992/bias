<div id="view" class="container-fluid">
    <form id="edit_disease" class="row-fluid" action="<?php echo base_url('diseases/edit_db'); ?>" method="POST">
        <?php foreach ($diseases as $d) { ?>
            <input name="icd" id="icd" type="text" type="hidden" value="<?php echo $d->icd; ?>" />
            <label for="name">Name</label>
            <input name="name" id="name" type="text" value="<?php echo $d->name; ?>" />
            <label for="symptoms">Symptoms</label>
            <input name="symptoms" id="symptoms" type="text" value="<?php echo $d->symptoms; ?>" />
            <label for="causes">Causes</label>
            <input name="causes" id="causes" type="text" value="<?php echo $d->causes; ?>" />
            <input type="submit" value="Update"/>
        <?php } ?>
    </form>
</div>