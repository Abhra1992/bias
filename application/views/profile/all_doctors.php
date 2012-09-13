<div id="view" class="container-fluid">
    <h3><b> ALL DOCTORS</b></h3>
    <div class="row-fluid">
        <table id="all_doctors" class="table-bordered table-striped">
            <thead>
                <tr>
                    <th class="span5">Registration No.</th>
                    <th class="span5">Name</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($doctors as $d) { ?>
                    <tr>
                        <td class="span5"><?php echo anchor(base_url('profile/doctor/' . $d->doc_regis_no), $d->doc_regis_no); ?></td>
                        <td class="span5"><?php echo $d->fname . " " . $d->mname . " " . $d->lname; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>    
    <?php for ($index = 1; $index <= $pages; $index++) { ?>
        <a class="span1" href="<?php echo base_url('departments/'. $index); ?>"><?php echo $index; ?></a>
    <?php } ?>
    <br/>
    <br>
    <a onclick= window.print()> <b>PRINT </b></a>
</div>