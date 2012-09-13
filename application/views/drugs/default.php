<div id="view" class="container-fluid">
    ALL DRUGS
    <div class="row-fluid">
        <table id="all_drugs" class="table-bordered table-striped">
            <thead>
                <tr>
                    <th class="span3">Name</th>
                    <th class="span3">Unit Price</th>
                    <th class="span3">Enterprise</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($drugs as $d) { ?>
                    <tr>
                        <td class="span3"><?php echo anchor(base_url('drugs/details/' . $d->drug_id), $d->name); ?></td>
                        <td class="span3"><?php echo 'Rs ' . $d->unit_price; ?></td>
                        <td class="span3"><?php echo anchor(base_url('enterprises/details/' . $d->ent_regis_no), $d->enterprise); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>    
    <?php echo anchor(base_url('drugs/add'), "Add Drug") ?>
     <br>
    <a onclick= window.print()> <b>PRINT </b></a>
</div>