<div id="view" class="container-fluid">
    <form id="add_department" class="row-fluid" action="<?php echo base_url('departments/add_to_db'); ?>" method="POST">        
        <label for="type">Department Type</label>
        <input name="type" id="type" type="text" />
        <label for="category">Category</label>
        <select name="category" id="category">
            <?php foreach ($categories as $c) { ?>
                <option value="<?php echo $c->category_id; ?>"><?php echo $c->category_name ?></option>
            <?php } ?>
        </select>
        <label for="affiliation">Affiliation</label>
        <select name="affiliation" id="affiliation">
            <?php foreach ($affiliations as $a) { ?>
                <option value="<?php echo $a->aff_id; ?>"><?php echo $a->aff_board_name ?></option>
            <?php } ?>
        </select>
        <input type="submit" value="Add"/>
    </form>
</div>