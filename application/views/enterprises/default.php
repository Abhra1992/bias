<div id="view" class="container-fluid">
    <h3><b>ALL ENTERPRISES</h3></b>
    <div class="row-fluid">
        <table id="all_enterprises" class="table-bordered table-striped">
            <thead>
                <tr>
                    <th class="span3">Name</th>
                    <th class="span3">Email</th>
                    <th class="span3">Website</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($enterprises as $e) { ?>
                    <tr>
                        <td class="span3"><?php echo anchor(base_url('enterprises/details/' . $e->ent_regis_no), $e->name); ?></td>
                        <td class="span3"><?php echo $e->email; ?></td>
                        <td class="span3"><?php echo $e->website; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>    
    <?php echo anchor(base_url('enterprises/add'), "Add Enterprise") ?>
     <br>
    <a onclick= window.print()> <b>PRINT </b></a>
</div>