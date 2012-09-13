<div id="view" class="container-fluid">
    <form class="row-fluid" action="<?php echo base_url('facilities/add_to_db'); ?>" method="POST">
        <label for="f_regis_no">Registration Number</label>
        <input name="f_regis_no" id="f_regis_no" type="text" />
        <label for="name">Name</label>
        <input name="name" id="name" type="text" />
        <label for="type">Type</label>
        <input name="type" id="type" type="text" />
        <label for="location">Location</label>
        <input name="location" id="location" type="text" />
        <label for="open_timing">Open Timing</label>
        <input name="open_timing" id="open_timing" type="text" />
        <label for="close_timing">Close Timing</label>
        <input name="close_timing" id="close_timing" type="text" />
        <label for="h_regis_no">Hospital</label>
        <select name="h_regis_no" id="h_regis_no">
            <?php foreach ($hospitals as $h) { ?>
                <option value="<?php echo $h->h_regis_no; ?>"><?php echo $h->name ?></option>
            <?php } ?>
        </select>
        <input type="submit" value="Add"/>
    </form>
</div>