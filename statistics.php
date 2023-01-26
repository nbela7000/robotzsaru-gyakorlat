<html>
    <head>
        <title><?php echo $WEBPAGE_NAME; ?> - Statisztikák</title>
    </head>
    <body>
        <?php
        if(getUserRankPerm($_SESSION['badge_number']) >= 3) {
            echo "
            <div id='files-content' style='width: 30% !important;'>
            <h1>Akta statisztika</h1><br />
            <h3>Akta heti toplista</h3>
            <table id='files'>
            <tr>
                <th class='files-header'>Felhasználó</th>
                <th class='files-header'>Darab</th>
            </tr>";
            $query = "
            SELECT f.author as author, u.playername as pn, COUNT(dbid) as pcs
            FROM files AS f
            INNER JOIN users AS u ON u.badge_number=f.author
            WHERE f.created >= CURRENT_TIMESTAMP() - INTERVAL 7 DAY
            GROUP BY f.author
            ORDER BY pcs DESC
            ";
            $result = mysqli_query($mysql_id, $query);
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr class='files-row'>";
                        echo "<td class='files-column'>" . $row['pn'] . "</td>";
                        echo "<td class='files-column'>" . $row['pcs'] . "</td>";
                    echo "</tr>";
                }
            } else echo "<tr><td colspan='4'>Nem készült a héten akta!</td></tr>";

            echo "
            </table>
            <h3>Akta havi toplista</h3>
            <table id='files'>
            <tr>
                <th class='files-header'>Felhasználó</th>
                <th class='files-header'>Darab</th>
            </tr>";
            $query = "
            SELECT f.author as author, u.playername as pn, COUNT(dbid) as pcs
            FROM files AS f
            INNER JOIN users AS u ON u.badge_number=f.author
            WHERE f.created >= CURRENT_TIMESTAMP() - INTERVAL 1 MONTH
            GROUP BY f.author
            ORDER BY pcs DESC
            ";
            $result = mysqli_query($mysql_id, $query);
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr class='files-row'>";
                        echo "<td class='files-column'>" . $row['pn'] . "</td>";
                        echo "<td class='files-column'>" . $row['pcs'] . "</td>";
                    echo "</tr>";
                }
            } else echo "<tr><td colspan='4'>Nem készült a héten akta!</td></tr>";
            echo "
            </table>
            <h3>Akta mindenkori toplista</h3>
            <table id='files'>
            <tr>
                <th class='files-header'>Felhasználó</th>
                <th class='files-header'>Darab</th>
            </tr>";
            $query = "
            SELECT f.author as author, u.playername as pn, COUNT(dbid) as pcs
            FROM files AS f
            INNER JOIN users AS u ON u.badge_number=f.author
            GROUP BY f.author
            ORDER BY pcs DESC
            ";
            $result = mysqli_query($mysql_id, $query);
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr class='files-row'>";
                        echo "<td class='files-column'>" . $row['pn'] . "</td>";
                        echo "<td class='files-column'>" . $row['pcs'] . "</td>";
                    echo "</tr>";
                }
            } else echo "<tr><td colspan='4'>Nincsenek akták!</td></tr>";
            echo "
            </table>
            <br />
            <h1>Jegyzőkönyv statisztika</h1><br />
            <h3>Jegyzőkönyv heti toplista</h3>
            <table id='files'>
            <tr>
                <th class='files-header'>Felhasználó</th>
                <th class='files-header'>Darab</th>
            </tr>";
            $query = "
            SELECT m.author as author, u.playername as pn, COUNT(dbid) as pcs
            FROM minutes AS m
            INNER JOIN users AS u ON u.badge_number=m.author
            WHERE m.created >= CURRENT_TIMESTAMP() - INTERVAL 7 DAY
            GROUP BY m.author
            ORDER BY pcs DESC
            ";
            $result = mysqli_query($mysql_id, $query);
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr class='files-row'>";
                        echo "<td class='files-column'>" . $row['pn'] . "</td>";
                        echo "<td class='files-column'>" . $row['pcs'] . "</td>";
                    echo "</tr>";
                }
            } else echo "<tr><td colspan='4'>Nem készült a héten jegyzet!</td></tr>";
            echo "
            </table>
            <h3>Jegyzőkönyv havi toplista</h3>
            <table id='files'>
            <tr>
                <th class='files-header'>Felhasználó</th>
                <th class='files-header'>Darab</th>
            </tr>";
            $query = "
            SELECT m.author as author, u.playername as pn, COUNT(dbid) as pcs
            FROM minutes AS m
            INNER JOIN users AS u ON u.badge_number=m.author
            WHERE m.created >= CURRENT_TIMESTAMP() - INTERVAL 1 MONTH
            GROUP BY m.author
            ORDER BY pcs DESC
            ";
            $result = mysqli_query($mysql_id, $query);
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr class='files-row'>";
                        echo "<td class='files-column'>" . $row['pn'] . "</td>";
                        echo "<td class='files-column'>" . $row['pcs'] . "</td>";
                    echo "</tr>";
                }
            } else echo "<tr><td colspan='4'>Nem készült a hónapban jegyzet!</td></tr>";
            echo "
            </table>
            <h3>Jegyzőkönyv mindenkori toplista</h3>
            <table id='files'>
            <tr>
                <th class='files-header'>Felhasználó</th>
                <th class='files-header'>Darab</th>
            </tr>";
            $query = "
            SELECT m.author as author, u.playername as pn, COUNT(dbid) as pcs
            FROM minutes AS m
            INNER JOIN users AS u ON u.badge_number=m.author
            GROUP BY m.author
            ORDER BY pcs DESC
            ";
            $result = mysqli_query($mysql_id, $query);
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr class='files-row'>";
                        echo "<td class='files-column'>" . $row['pn'] . "</td>";
                        echo "<td class='files-column'>" . $row['pcs'] . "</td>";
                    echo "</tr>";
                }
            } else echo "<tr><td colspan='4'>Nincsenek jegyzetek!</td></tr>";
            echo "
            </table>
            </div>";
        } else {
            echo "<h1>Nincs jogosultságod az oldal megtekintéséhez!</h1>";
        }
        ?>
    </body>
</html>
