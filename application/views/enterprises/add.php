<div id="view" class="container-fluid">
    <form id="add_enterprise" class="row-fluid" action="<?php echo base_url('enterprises/add_to_db'); ?>" method="POST">        
        <label for="ent_regis_no">Registration Number</label>
        <input name="ent_regis_no" id="ent_regis_no" type="text" />
        <label for="name">Name</label>
        <input name="name" id="name" type="text" />
        <label for="category_name">Category</label>
        <input name="category_name" id="category_name" type="text" />
        <label for="email">Email</label>
        <input name="email" id="email" type="text" />
        <label for="fax">Fax</label>
        <input name="fax" id="fax" type="text" />
        <label for="website">Website</label>
        <input name="website" id="website" type="text" />
        <input type="submit" value="Add"/>
    </form>
</div>