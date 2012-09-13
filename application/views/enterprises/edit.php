<div id="view" class="container-fluid">
    <form id="edit_enterprise" class="row-fluid" action="<?php echo base_url('enterprises/edit_db'); ?>" method="POST">
        <?php foreach ($enterprises as $e) { ?>
            <label for="ent_regis_no">Registration Number</label>
            <input name="ent_regis_no" id="ent_regis_no" type="text" value="<?php echo $e->ent_regis_no; ?>" />
            <label for="name">Name</label>
            <input name="name" id="name" type="text" value="<?php echo $e->name; ?>" />
            <label for="category_name">Category</label>
            <input name="category_name" id="category_name" type="text" value="<?php echo $e->category_name; ?>" />
            <label for="email">Email</label>
            <input name="email" id="email" type="text" value="<?php echo $e->email; ?>" />
            <label for="fax">Fax</label>
            <input name="fax" id="fax" type="text" value="<?php echo $e->fax; ?>" />
            <label for="website">Website</label>
            <input name="website" id="website" type="text" value="<?php echo $e->website; ?>" />
            <input type="submit" value="Update"/>
        <?php } ?>
    </form>
</div>