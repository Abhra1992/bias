<div id="view" class="container-fluid">
    ALL DEPARTMENTS
    <div class="row-fluid">
        <table id="all_departments" class="table-bordered table-striped">
            <thead>
                <tr>
                    <th class="span3">Department Type</th>
                    <th class="span3">Category</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($departments as $d) { ?>
                    <tr>
                        <td class="span3"><?php echo anchor(base_url('departments/details/' . $d->dept_id), $d->type); ?></td>
                        <td class="span3"><?php echo $d->category_name; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>    
    <?php for ($index = 1; $index <= $pages; $index++) { ?>
    <a class="span1" href="<?php echo base_url('departments/index'.$index);?>"><?php echo $index; ?></a>
    <?php } ?>
    <br/>
    <?php echo anchor(base_url('departments/add'), "Add Department Type") ?>

</div>
