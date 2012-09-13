<div id="view" class="container-fluid">
   <h3><b> VITALS</h3></b>
    <table id="vitals" class="row-fluid table-bordered table-striped">        
        <thead>
            <tr>
                <td class="span3">Height</td>
                <td class="span3">Weight</td>
                <td class="span3">Blood Pressure</td>
                <td class="span3">Blood Sugar</td>
                <td class="span3">Temperature</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vitals as $v) { ?>
                <tr>
                    <td class="span3"><?php echo $v->height; ?></td>
                    <td class="span3"><?php echo $v->weight; ?></td>
                    <td class="span3"><?php echo $v->blood_pressure; ?></td>
                    <td class="span3"><?php echo $v->blood_sugar; ?></td>
                    <td class="span3"><?php echo $v->temperature; ?></td>
                </tr>
            </tbody>
        </table>
    <?php } ?>
    <br>
    <a onclick= window.print()> <b>PRINT </b></a>
</div>