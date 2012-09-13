<div id="view" class="container-fluid">
    HOSPITAL DETAILS
    <?php foreach ($hospitals as $h) { ?>
        <table id="hospital_details" class="row-fluid table-bordered table-striped">                   
            <tbody>
                <tr>
                    <td class="span4">Registration Number</td>
                    <td class="span4"><?php echo $h->h_regis_no; ?></td>
                </tr>
                <tr>
                    <td class="span4">Name</td>
                    <td class="span4"><?php echo anchor(base_url('hospitals/details/' . $h->h_regis_no), $h->name); ?></td>
                </tr>
                <tr>
                    <td class="span4">Location</td>
                    <td class="span4"><?php echo $h->location; ?></td>
                </tr>
                <tr>
                    <td class="span4">Capacity</td>
                    <td class="span4"><?php echo $h->capacity; ?></td>
                </tr>
                <tr>
                    <td class="span4">Available Capacity</td>
                    <td class="span4"><?php echo $h->available_capacity; ?></td>
                </tr>

            </tbody>
        </table>
        <table id="hospital_doctors" class="row-fluid table-bordered table-striped">
            <caption>HOSPITAL'S DOCTORS</caption>
            <thead>
                <tr>
                    <th class="span4">Name</th>
                    <th class="span4">Start Date</th>
                    <th class="span4">End Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($doctors as $d) { ?>
                    <tr>                        
                        <td class="span4"><?php echo anchor(base_url('profile/doctor') . '/' . $d->doc_regis_no, $d->fname . ' ' . $d->mname . ' ' . $d->lname); ?></td>
                        <td class="span4"><?php echo $d->start_date; ?></td>
                        <td class="span4"><?php if ($h->end_date) echo $h->end_date; ?></td>
                    </tr>
                <?php } ?>    
            </tbody>
        </table>
        <table id="hospital_departments" class="row-fluid table-bordered table-striped"> 
            <caption>HOSPITAL'S DEPARTMENTS</caption>
            <tbody>
                <?php foreach ($departments as $d) { ?>
                    <tr>
                        <td class="span4"><?php echo anchor(base_url('departments/details/' . $d->dept_id), $d->type); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php echo anchor(base_url('hospitals/edit/' . $h->h_regis_no), "Edit Details") ?>
    <?php } ?>
</div>