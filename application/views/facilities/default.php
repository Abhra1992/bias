<div id="view" class="container-fluid">
    <h3><b>ALL FACILITIES</b></h3>
    <div class="row-fluid">
        <table id="all_facilities" class="span6 table-bordered table-striped">
            <thead>
                <tr>
                    <th class="span2">Name</th>
                    <th class="span2">Location</th>
                    <th class="span2">Hospital</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($facilities as $f) { ?>
                    <tr>
                        <td class="span2"><?php echo anchor(base_url('facilities/details/' . $f->f_regis_no), $f->name); ?></td>
                        <td class="span2"><?php echo $f->location; ?></td>
                        <td class="span2"><?php echo $f->hospital; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php echo anchor(base_url('facilities/add'), "Add Facility") ?>
    <br>
    <a onclick= window.print()> <b>PRINT </b></a>
</div>