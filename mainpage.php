<html>
    <head>
        <title><?php echo $WEBPAGE_NAME; ?></title>
    </head>
    <body>
        <div id="mainpage-navbar">
            <div id="page-info" style="cursor: pointer;" onclick="window.location.href = 'index.php';">
                <?php echo $WEBPAGE_NAME; ?>
            </div>
            <div id="user-info">
                <?php echo $_SESSION['badge_number'] . " - " . RPName(getUserName($_SESSION['badge_number'])); ?>
            </div>
        </div>
        <div id="mainpage-main-content">
            <?php
            $page = isset($_GET['p']) ? $_GET['p'] : '';
            $type = isset($_GET['t']) ? $_GET['t'] : '';
            $id = isset($_GET['id']) ? $_GET['id'] : '';
            switch($page) {
                case 'mainpage': {
                    include("pages/startpage.php");
                    break;
                } case 'stats': {
                    include("pages/stats/statistics.php");
                    break;
                } case 'users': {
                    switch($type) {
                        case 'list': {
                            include("pages/users/list.php");
                            break;
                        } case 'view': {
                            include("pages/users/view.php");
                            break;
                        } case 'new': {
                            include("pages/users/new.php");
                            break;
                        } case 'edit': {
                            include("pages/users/edit.php");
                            break;
                        } default: include("pages/users/startpage.php");
                    }
                    break;
                } case 'files': {
                    switch($type) {
                        case 'view': {
                            include("pages/files/file_view.php");
                            break;
                        } case 'new': {
                            include("pages/files/file_new.php");
                            break;
                        } case 'edit': {
                            include("pages/files/file_edit.php");
                            break;
                        } case 'archived': {
                            include("pages/files/files_archived.php");
                            break;
                        } default: include("pages/files/files.php");
                    }
                    break;
                } case 'admin': {
                    switch($type) {
                        case 'users': {
                            include("pages/admin/users.php");
                            break;
                        } case 'newusers': {
                            include("pages/admin/newusers.php");
                            break;
                        } default: include("pages/admin/adminstartpage.php");
                    }
                    break;
                } case 'minutes': {
                    switch($type) {
                        case 'view': {
                            include("pages/minutes/minutes_view.php");
                            break;
                        } case 'new': {
                            include("pages/minutes/minutes_new.php");
                            break;
                        } case 'edit': {
                            include("pages/minutes/minute_edit.php");
                            break;
                        } default: include("pages/minutes/minutes.php");
                    }
                    break;
                } default: include("pages/startpage.php");
            }
            ?>
        </div>
    </body>
</html>
