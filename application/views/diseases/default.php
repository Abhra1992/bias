<div id="view" class="container-fluid">
    <h3><b>ALL DISEASES</h3></b>
    <div class="row-fluid">
        <table id="all_diseases" class="table-bordered table-striped">
        <thead>
            <tr>
                <th class="span3">Disease Type</th>
                <th class="span3">Symptoms</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($diseases as $d) { ?>
                <tr>
                    <td class="span3"><?php echo anchor(base_url('diseases/details/' . $d->icd), $d->name); ?></td>
                    <td class="span3"><?php echo $d->symptoms; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    </div>    
    <?php echo anchor(base_url('diseases/add'), "Add Disease Type") ?>
     <br>
    <a onclick= window.print()> <b>PRINT </b></a>
</div>