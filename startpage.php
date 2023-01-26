<div id="startpage-widgets">
    <?php

    if(getUserRankPerm($_SESSION['badge_number']) >= 1) {
        echo "
            <div onclick='window.location.href = `index.php?p=minutes`;' class='startpage-widget'>
                Jegyzőkönyvek
                <i class='fas fa-pen icon'></i>
                <div class='description'>
                    Kihallgatási, helyszínelési jegyzőkönyvek
                </div>
            </div>
        ";
    }

    if(getUserRankPerm($_SESSION['badge_number']) >= 2) {
        echo "
            <div onclick='window.location.href = `index.php?p=files`;' class='startpage-widget'>
                Akták
                <i class='far fa-clipboard icon'></i>
                <div class='description'>
                    Nyomozati akták
                </div>
            </div>
        ";
    }

    if(getUserRankPerm($_SESSION['badge_number']) >= 0) {
        echo "
            <div onclick='window.location.href = `index.php?p=files&t=archived`;' class='startpage-widget'>
                Archivált akták
                <i class='fas fa-archive icon'></i>
                <div class='description'>
                    Archivált akták gyűjteménye
                </div>
            </div>
        ";
    }

    if(getUserRankPerm($_SESSION['badge_number']) >= 3) {
        echo "
            <div onclick='window.location.href = `index.php?p=stats`;' class='startpage-widget'>
                Statisztika
                <i class='fas fa-info-circle icon'></i>
                <div class='description'>
                    Robotzsaru statisztika
                </div>
            </div>
        ";
    }

    if(getUserRankPerm($_SESSION['badge_number']) >= 4) {
        echo "
            <div onclick='window.location.href = `index.php?p=admin`;' class='startpage-widget'>
                Adminisztráció
                <i class='fas fa-user-shield icon'></i>
                <div class='description'>
                    Robotzsaru adminisztráció<br />";

        $result = mysqli_query($mysql_id, "SELECT COUNT(badge_number) as pcs FROM users WHERE active=0");
        $row = mysqli_fetch_assoc($result);
        echo $row['pcs'] . " db felhasználó vár elbírálásra";
        echo "
                </div>
            </div>
        ";
    }
    ?>
</div>
