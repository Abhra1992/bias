<div id="view" class="container-fluid">
    <h3><b> PROFILE</b></h3>
    <?php foreach ($person as $d) { ?>
        <table id="person_profile" class="row-fluid table-bordered table-striped">        
            <tbody>
                <tr>
                    <td class="span6">SSN</td>
                    <td class="span6"><?php echo $d->ssn; ?></td>
                </tr>
                <tr>
                    <td class="span6">Name</td>
                    <td class="span6"><?php echo $d->fname . " " . $d->mname . " " . $d->lname; ?></td>
                </tr>
                <tr>
                    <td class="span6">Sex</td>
                    <td class="span6"><?php echo $d->sex; ?></td>
                </tr>
                <tr>
                    <td class="span6">Date Of Birth</td>
                    <td class="span6"><?php echo $d->dob; ?></td>
                </tr>
                <tr>
                    <td class="span6">Address</td>
                    <td class="span6"><?php echo $d->address; ?></td>
                </tr>
                <tr>
                    <td class="span6">Nationality</td>
                    <td class="span6"><?php echo $d->nationality; ?></td>
                </tr>
                <tr>
                    <td class="span6">Ethinicity</td>
                    <td class="span6"><?php echo $d->ethinicity; ?></td>
                </tr>
                <tr>
                    <td class="span6">Language</td>
                    <td class="span6"><?php echo $d->language; ?></td>
                </tr>
            </tbody>
        </table>
        <?php echo anchor(base_url('profile/edit_person/' . $d->ssn), "Edit Details") ?>
    <?php } ?>
</div>