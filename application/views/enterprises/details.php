<div id="view" class="container-fluid">
    ENTERPRISE DETAILS
    <?php foreach ($enterprises as $e) { ?>
        <table id="enterprise_details" class="row-fluid table-bordered table-striped">        
            <tbody>
                <tr>
                    <td class="span4">Registration Number</td>
                    <td class="span4"><?php echo $e->ent_regis_no; ?></td>
                </tr>
                <tr>
                    <td class="span4">Name</td>
                    <td class="span4"><?php echo anchor(base_url('enterprises/details/' . $e->ent_regis_no), $e->name); ?></td>
                </tr>
                <tr>
                    <td class="span4">Category</td>
                    <td class="span4"><?php echo $e->category_name; ?></td>
                </tr>
                <tr>
                    <td class="span4">Email</td>
                    <td class="span4"><?php echo $e->email; ?></td>
                </tr>
                <tr>
                    <td class="span4">Fax</td>
                    <td class="span4"><?php echo $e->fax; ?></td>
                </tr>
                <tr>
                    <td class="span4">Website</td>
                    <td class="span4"><?php echo $e->website; ?></td>
                </tr>
            </tbody>
        </table>
        <?php echo anchor(base_url('enterprises/edit/' . $e->ent_regis_no), "Edit Details") ?>
    <?php } ?>
</div>