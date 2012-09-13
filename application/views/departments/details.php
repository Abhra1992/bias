<div id="view" class="container-fluid">
    DEPARTMENT DETAILS
    <?php foreach ($departments as $d) { ?>
        <table id="department_details" class="row-fluid table-bordered table-striped">        
            <tbody>

                <tr>
                    <td class="span4">Department ID</td>
                    <td class="span4"><?php echo $d->dept_id; ?></td>
                </tr>
                <tr>
                    <td class="span4">Department Type</td>
                    <td class="span4"><?php echo anchor(base_url('departments/details/' . $d->dept_id), $d->type); ?></td>
                </tr>
                <tr>
                    <td class="span4">Category</td>
                    <td class="span4"><?php echo $d->category_name; ?></td>
                </tr>
                <tr>
                    <td class="span4">Affiliation</td>
                    <td class="span4"><?php echo $d->aff_board_name; ?></td>
                </tr>
            </tbody>
        </table>
        <?php echo anchor(base_url('departments/edit/' . $d->dept_id), "Edit Details") ?>
    <?php } ?>
</div>