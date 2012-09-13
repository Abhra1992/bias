<div id="view" class="container-fluid">
    <form id="edit_drug" class="row-fluid" action="<?php echo base_url('drugs/edit_db'); ?>" method="POST">
        <?php foreach ($drugs as $d) { ?>
            <input name="drug_id" id="drug_id" type="hidden" value="<?php echo $d->drug_id; ?>"/>
            <label for="name">Name</label>
            <input name="name" id="name" type="text" value="<?php echo $d->name; ?>" />
            <label for="unit_price">Unit Price</label>
            <input name="unit_price" id="unit_price" type="text" value="<?php echo $d->unit_price; ?>" />
            <label for="ent_regis_no">Manufactured by</label>
            <select name="ent_regis_no" id="ent_regis_no">
                <?php foreach ($enterprises as $e) { ?>
                    <option value="<?php echo $e->ent_regis_no; ?>"><?php echo $e->name; ?></option>
                <?php } ?>
            </select>
            <label for="category">Category</label>
            <select name="category" id="category">
                <?php foreach ($categories as $c) { ?>
                    <option value="<?php echo $c->category_id; ?>"><?php echo $c->category_name; ?></option>
                <?php } ?>
            </select>
            <label for="schedule">Schedule</label>
            <select name="schedule" id="schedule">
                <?php foreach ($schedules as $s) { ?>
                    <option value="<?php echo $s->schedule_id; ?>"><?php echo $s->schedule_name; ?></option>
                <?php } ?>
            </select>
            <label for="icd">For Disease</label>
            <select name="icd" id="icd">
                <?php foreach ($diseases as $s) { ?>
                    <option value="<?php echo $s->icd; ?>"><?php echo $s->name; ?></option>
                <?php } ?>
            </select>
            <label for="quantity">Quantity</label>
            <input name="quantity" id="quantity" type="text" value="<?php echo $d->quantity; ?>" />
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