<html>
    <head>

        <link rel="stylesheet" href="http://localhost/basicMvc/public/css/default.css" />
    </head>
    <body>
        <div id="header">
            <?php Session::init(); ?>
            <?php if ((Session::get('LogIn') == false)): ?>
                <a href="http://localhost/basicMvc/index">Index</a>
                <a href="http://localhost/basicMvc/help">Help</a>
            <?php endif; ?>
            <?php if ((Session::get('LogIn') == true)): ?>
                <a href="http://localhost/basicMvc/dashboard">Dashboard</a>
                <?php if ((Session::get('role') == 'owner')): ?>
                    <a href="http://localhost/basicMvc/user">Users</a>
                <?php endif; ?>

                <a href="http://localhost/basicMvc/dashboard/logout">LogOut</a>

            <?php else: ?>
                <a href="http://localhost/basicMvc/login">Login</a>
            <?php endif; ?>

        </div>
        <div id="content">


