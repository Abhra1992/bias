<div id="view" class="container-fluid">
    <form id="add_equipment" class="row-fluid" action="<?php echo base_url('equipments/add_to_db'); ?>" method="POST"> 
        <label for="equipment_id">Equipment ID</label>
        <input name="equipment_id" id="equipment_id" type="text" />
        <label for="name">Name</label>
        <input name="name" id="name" type="text" />
        <label for="cost">Cost</label>
        <input name="cost" id="cost" type="text" />
        <label for="ent_regis_no">Manufactured by</label>
        <select name="ent_regis_no" id="ent_regis_no">
            <?php foreach ($enterprises as $e) { ?>
                <option value="<?php echo $e->ent_regis_no; ?>"><?php echo $e->name; ?></option>
            <?php } ?>
        </select>
        <label for="proc_id">For Procedure</label>
        <select name="proc_id" id="proc_id">
            <?php foreach ($procedures as $p) { ?>
                <option value="<?php echo $p->proc_id; ?>"><?php echo $p->name; ?></option>
            <?php } ?>
        </select>
        <input type="submit" value="Add"/>
    </form>
</div>