<div id="view" class="container-fluid">
    <h3><b>ALL PATIENTS</b></h3>
<div class="row-fluid">
    <table id="all_patients" class="table-bordered table-striped">
        <thead>
            <tr>
                <th class="span5">SSN</th>
                <th class="span5">Name</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($patients as $d) { ?>
                <tr>
                    <td class="span5"><?php echo anchor(base_url('profile/patient/' . $d->patient_id), $d->ssn); ?></td>
                    <td class="span5"><?php echo $d->fname . " " . $d->mname . " " . $d->lname; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>  
<br>
<a onclick= window.print()> <b>PRINT </b></a>
</div>