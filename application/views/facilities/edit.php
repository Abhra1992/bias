<div id="view" class="container-fluid">
    <form id="edit_facility" class="row-fluid" action="<?php echo base_url('facilities/edit_db'); ?>" method="POST">
        <?php foreach ($facilities as $f) { ?>
            <input name="f_regis_no" id="f_regis_no" type="hidden" value="<?php echo $f->f_regis_no; ?>"/>
            <label for="type">Facility Type</label>
            <input name="type" id="type" type="text" value="<?php echo $f->type; ?>"/>
            <label for="name">Name</label>
            <input name="name" id="name" type="text" value="<?php echo $f->name; ?>" />
            <label for="location">Location</label>
            <input name="location" id="location" type="text" value="<?php echo $f->location; ?>" />
            <label for="open_timing">Open Timing</label>
            <input name="open_timing" id="open_timing" type="text" value="<?php echo $f->open_timing; ?>" />
            <label for="close_timing">Close Timing</label>
            <input name="close_timing" id="close_timing" type="text" value="<?php echo $f->close_timing; ?>" />
            <label for="h_regis_no">Hospital</label>
            <select name="h_regis_no" id="h_regis_no">
                <?php foreach ($hospitals as $h) { ?>
                    <option value="<?php echo $h->h_regis_no; ?>"><?php echo $h->name ?></option>
                <?php } ?>
            </select>
            <input type="submit" value="Update"/>
        <?php } ?>
    </form>
</div>