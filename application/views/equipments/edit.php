<div id="view" class="container-fluid">
    <form id="edit_equipment" class="row-fluid" action="<?php echo base_url('equipments/edit_db'); ?>" method="POST">
        <?php foreach ($equipments as $e) { ?>
            <input name="equipment_id" id="equipment_id" type="hidden" value="<?php echo $e->equipment_id; ?>"/>
            <label for="name">Name</label>
            <input name="name" id="name" type="text" value="<?php echo $e->name; ?>" />
            <label for="cost">Cost</label>
            <input name="cost" id="cost" type="text" value="<?php echo $e->cost; ?>" />
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
            <input type="submit" value="Update"/>
        <?php } ?>
    </form>
</div>