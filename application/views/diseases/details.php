<div id="view" class="container-fluid">
    <h3><b>DISEASE DETAILS</h3></b>
<?php foreach ($diseases as $d) { ?>
    <table id="disease_details" class="row-fluid table-bordered table-striped">        
        <tbody>
            <tr>
                <td class="span4">Disease ICD</td>
                <td class="span4"><?php echo $d->icd; ?></td>
            </tr>
            <tr>
                <td class="span4">Disease Name</td>
                <td class="span4"><?php echo anchor(base_url('diseases/details/' . $d->icd), $d->name); ?></td>
            </tr>
            <tr>
                <td class="span4">Causes</td>
                <td class="span4"><?php echo $d->cause; ?></td>
            </tr>
            <tr>
                <td class="span4">Symptoms</td>
                <td class="span4"><?php echo $d->symptoms; ?></td>
            </tr>
        </tbody>
    </table>
    <?php echo anchor(base_url('diseases/edit/' . $d->icd), "Edit Details") ?>
<?php } ?>
<br>
<a onclick= window.print()> <b>PRINT </b></a>
</div>