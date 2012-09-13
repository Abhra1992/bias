    <div id="view" class="container-fluid">
        <h3><b>ALL  HOSPITALS</b></h3>
    <div class="row-fluid">
        <table id="all_hospitals" class="table-bordered table-striped">
            <thead>
                <tr>
                    <th class="span2">Name</th>
                    <th class="span2">Location</th>
                    <th class="span2">Capacity</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($hospitals as $h) { ?>
                    <tr>
                        <td class="span2"><?php echo anchor(base_url('hospitals/details/' . $h->h_regis_no), $h->name); ?></td>
                        <td class="span2"><?php echo $h->location; ?></td>
                        <td class="span2"><?php echo $h->capacity; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>    
    <?php echo anchor(base_url('hospitals/add'), "Add Hospital") ?>
</div>