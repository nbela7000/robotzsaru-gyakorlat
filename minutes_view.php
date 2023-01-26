<?php
if($result = mysqli_query($mysql_id, "SELECT minutes.*, users.playername FROM minutes INNER JOIN users ON users.badge_number=minutes.author WHERE dbid='$id'")) {
    $row = mysqli_fetch_assoc($result);
    echo "<div id='fileview_content'>";
    echo "<h1>Jegyzőkönyvek » " . $row['dbid'] . "</h1>";
    if(getUserRankPerm($_SESSION['badge_number']) >= 4 || $row['author'] == $_SESSION['badge_number']) {
        echo "<div style='display: inline;'>";
        echo "<a class='button-danger rem-minute' style='float:right;' id='" . $row['dbid'] . "'>Törlés</a>";
        echo "<a href='index.php?p=minutes&t=edit&id=" . $id . "' class='button-norm' style='float:right;'>Módosítás</a>";
        echo "</div>";
    }
    echo "<br /><br />";
    echo "<table id='fileview_table'>";
        echo "<tr>";
            echo "<td><b>Megnevezés</b></td>";
            echo "<td>" . $row['title'] . "</td>";
        echo "</tr>";

        echo "<tr>";
            echo "<td><b>Szerző</b></td>";
            echo "<td><a href='index.php?p=users&t=view&id=" . $row['author'] . "'>" . RPName($row['playername']) . "</a></td>";
        echo "</tr>";

        echo "<tr>";
            echo "<td><b>Kelt</b></td>";
            echo "<td>" . $row['created'] . "</td>";
        echo "</tr>";

        echo "<tr>";
            echo "<td><b>Utoljára szerkesztve</b></td>";
            echo "<td>" . $row['edited'] . "</td>";
        echo "</tr>";

        echo "<tr>";
            echo "<td colspan='2' style='text-align:center;'><b>Jegyzőkönyv tartalma</b></td>";
        echo "</tr>";

        echo "<tr>";
            echo "<td colspan='2'>" . $row['text'] . "</td>";
        echo "</tr>";
    echo "</table>";
    echo "</div>";
} else echo "<h1>Hiba történt!</h1>";
?>
<script src='js/minute_view.js'></script>
