<div id="view" class="container-fluid">
    <h3><b>ALL EQUIPMENTS</h3></b>
    <div class="row-fluid">
        <table id="all_equipments" class="table-bordered table-striped">
            <thead>
                <tr>
                    <th class="span3">Name</th>
                    <th class="span3">Cost</th>
                    <th class="span3">Enterprise</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($equipments as $e) { ?>
                    <tr>
                        <td class="span3"><?php echo anchor(base_url('equipments/details/' . $e->equipment_id), $e->name); ?></td>
                        <td class="span3"><?php echo 'Rs ' . $e->cost; ?></td>
                        <td class="span3"><?php echo anchor(base_url('enterprises/details/' . $e->ent_regis_no), $e->enterprise); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>    
    <?php echo anchor(base_url('equipments/add'), "Add Equipment") ?>
     <br>
    <a onclick= window.print()> <b>PRINT </b></a>
</div>