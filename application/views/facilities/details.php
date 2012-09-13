<div id="view" class="container-fluid">
    FACILITIES DETAILS
    <?php foreach ($facilities as $f) { ?>
        <table id="facility_details" class="row-fluid table-bordered table-striped">        
            <tbody>

                <tr>
                    <td class="span4">Registration Number</td>
                    <td class="span4"><?php echo $f->f_regis_no; ?></td>
                </tr>
                <tr>
                    <td class="span4">Name</td>
                    <td class="span4"><?php echo anchor(base_url('facilities/details/' . $f->f_regis_no), $f->name); ?></td>
                </tr>
                <tr>
                    <td class="span4">Type</td>
                    <td class="span4"><?php echo $f->type; ?></td>
                </tr>
                <tr>
                    <td class="span4">Location</td>
                    <td class="span4"><?php echo $f->location; ?></td>
                </tr>
                <tr>
                    <td class="span4">Hospital</td>
                    <td class="span4"><?php echo $f->hospital; ?></td>
                </tr>
                <tr>
                    <td class="span4">Open Timing</td>
                    <td class="span4"><?php echo $f->open_timing; ?></td>
                </tr>
                <tr>
                    <td class="span4">Close Timing</td>
                    <td class="span4"><?php echo $f->close_timing; ?></td>
                </tr>
            </tbody>
        </table>
        <?php echo anchor(base_url('facilities/edit/' . $f->f_regis_no), "Edit Details") ?>
    <?php } ?>
</div>