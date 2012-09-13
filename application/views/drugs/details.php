<div id="view" class="container-fluid">
    DRUG DETAILS
    <?php foreach ($drugs as $d) { ?>
        <table id="drug_details" class="row-fluid table-bordered table-striped">        
            <tbody>
                <tr>
                    <td class="span4">Registration Number</td>
                    <td class="span4"><?php echo $d->ent_regis_no; ?></td>
                </tr>
                <tr>
                    <td class="span4">Name</td>
                    <td class="span4"><?php echo anchor(base_url('drugs/details/' . $d->drug_id), $d->name); ?></td>
                </tr>
                <tr>
                    <td class="span4">Category</td>
                    <td class="span4"><?php echo $d->category_name; ?></td>
                </tr>
                <tr>
                    <td class="span4">Unit Price</td>
                    <td class="span4"><?php echo $d->unit_price; ?></td>
                </tr>
                <tr>
                    <td class="span4">Manufactured by</td>
                    <td class="span4"><?php echo anchor(base_url('enterprises/details/' . $d->ent_regis_no), $d->enterprise); ?></td>
                </tr>
                <tr>
                    <td class="span4">Schedule</td>
                    <td class="span4"><?php echo $d->schedule_name; ?></td>
                </tr>
                <tr>
                    <td class="span4">For Procedure</td>
                    <td class="span4"><?php echo $d->procs; ?></td>
                </tr>
                <tr>
                    <td class="span4">For Disease</td>
                    <td class="span4"><?php echo $d->disease; ?></td>
                </tr>
                <tr>
                    <td class="span4">Quantity</td>
                    <td class="span4"><?php echo $d->quantity; ?></td>
                </tr>
            </tbody>
        </table>
        <?php echo anchor(base_url('drugs/edit/' . $d->drug_id), "Edit Details"); ?>
    <?php } ?>
</div>