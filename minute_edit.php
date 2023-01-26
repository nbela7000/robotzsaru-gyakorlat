<?php
if(getUserRankPerm($_SESSION['badge_number']) >= 4 || $row['author'] == $_SESSION['badge_number']) {
    if($result = mysqli_query($mysql_id, "SELECT minutes.*, users.playername FROM minutes INNER JOIN users ON users.badge_number=minutes.author WHERE dbid='$id'")) {
        $row = mysqli_fetch_assoc($result);
        echo "<div id='fileview_content'>";
        echo "<h1>Akták » " . $row['title'] . " » Szerkesztés</h1>";
        echo "<br /><br />";
        echo "<table id='fileview_table'>";
            echo "<tr>";
                echo "<td><b>Megnevezés</b></td>";
                echo "<td><input type='text' id='inputTitle' class='input-primary' value='" . $row['title'] . "'></td>";
            echo "</tr>";

            echo "<tr>";
                echo "<td colspan='2' style='text-align:center;'><b>Jegyzőkönyv tartalma</b></td>";
            echo "</tr>";

            echo "<tr>";
                echo "<td colspan='2'>";
                    echo "<textarea name='editor1' id='editor1' rows='10' cols='80'></textarea><br />
                    <script>
                    CKEDITOR.replace('editor1');
                    CKEDITOR.config.width = '100%';
                    var editor1 = CKEDITOR.instances['editor1'];
                    editor1.setData(`" . $row['text'] . "`);
                    </script>";
                echo "</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td colspan='2'>";
                    echo "<a class='button-primary submit-edit-minute' id='$id'>Módosítás</a>";
                    echo "<a class='button-danger' href='index.php?p=minutes&t=view&id=$id'>Vissza</a>";
                    echo "<span id='editminuteInfo' style='margin-left: 10px;'>&nbsp</span>";
                echo "</td>";
            echo "</tr>";
        echo "</table>";
        echo "</div>";
    } else echo "<h1>Hiba történt!</h1>";
} else echo "<h1>Nem szerkeszthetsz jegyzőkönyvet amit nem te hoztál létre!</h1>";
?>
<script src='js/edit_minute.js'></script>
