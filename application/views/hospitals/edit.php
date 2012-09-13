<div id="view" class="container-fluid">
    <form id="edit_hospital" class="row-fluid" action="<?php echo base_url('hospitals/edit_db'); ?>" method="POST">
        <?php foreach ($hospitals as $h) { ?>
            <label for="h_regis_no">Registration Number</label>
            <input name="h_regis_no" id="h_regis_no" type="text" value="<?php echo $h->h_regis_no; ?>"/>
            <label for="name">Name</label>
            <input name="name" id="name" type="text" value="<?php echo $h->name; ?>"/>
            <label for="location">Location</label>
            <input name="location" id="location" type="text" value="<?php echo $h->location; ?>" />
            <label for="capacity">Capacity</label>
            <input name="capacity" id="capacity" type="text" value="<?php echo $h->capacity; ?>" />
            <input type="submit" value="Update"/>
        <?php } ?>
    </form>
</div>