<div id="view" class="container-fluid">
    EQUIPMENT DETAILS
    <?php foreach ($equipments as $e) { ?>
        <table id="equipment_details" class="row-fluid table-bordered table-striped">        
            <tbody>
                <tr>
                    <td class="span4">Name</td>
                    <td class="span4"><?php echo anchor(base_url('equipments/details/' . $e->equipment_id), $e->name); ?></td>
                </tr>
                <tr>
                    <td class="span4">Cost</td>
                    <td class="span4"><?php echo $e->cost; ?></td>
                </tr>
                <tr>
                    <td class="span4">Manufactured by</td>
                    <td class="span4"><?php echo anchor(base_url('equipments/details/' . $e->ent_regis_no), $e->enterprise); ?></td>
                </tr>
                <tr>
                    <td class="span4">For Procedure</td>
                    <td class="span4"><?php echo $e->procs; ?></td>
                </tr>
                <tr>
                    <td class="span4">In Facilities</td>
                    <td class="span4"><?php echo $e->facilities; ?></td>
                </tr>
            </tbody>
        </table>
        <?php echo anchor(base_url('equipments/edit/' . $e->equipment_id), "Edit Details"); ?>
    <?php } ?>
</div>