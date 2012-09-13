<div id="view" class="container-fluid">
    <form id="add_hospital" class="row-fluid" action="<?php echo base_url('hospitals/add_to_db'); ?>" method="POST">
        <label for="h_regis_no">Registration Number</label>
        <input name="h_regis_no" id="h_regis_no" type="text" />
        <label for="name">Name</label>
        <input name="name" id="name" type="text" />
        <label for="location">Location</label>
        <input name="location" id="location" type="text" />
        <label for="capacity">Capacity</label>
        <input name="capacity" id="capacity" type="text" />
        <input type="submit" value="Add"/>
    </form>
</div>