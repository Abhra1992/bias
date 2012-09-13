<div id="view" class="container-fluid">
    <div id="login" class="row-fluid">
        <h3>Login to the site</h3>
        <form action="<?php echo base_url('login/verify'); ?>" method="POST">
            <label for="username">Username</label>
            <input type="text" name="username" id="username"/>
            <label for="password">Password</label>
            <input type="password" name="password" id="password"/>
            <input type="submit" value="Submit"/>
        </form>
    </div>
</div>