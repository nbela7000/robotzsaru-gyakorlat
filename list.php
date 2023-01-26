<html>
    <head>
        <title><?php echo $WEBPAGE_NAME; ?> - Felhasználók</title>

        <script>
		function search_badgeNum() {
		  // Declare variables
		  var input, filter, table, tr, td, i;
		  input = document.getElementById("badgeNum_search");
		  filter = input.value.toUpperCase();
		  table = document.getElementById("files");
		  tr = table.getElementsByTagName("tr");

		  // Loop through all table rows, and hide those who don't match the search query
		  for (i = 0; i < tr.length; i++) {
		    td = tr[i].getElementsByTagName("td")[0];
		    if (td) {
		      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
		        tr[i].style.display = "";
		      } else {
		        tr[i].style.display = "none";
		      }
            }
		  }
		}
        </script>
    </head>
    <body>
        <?php
        if(getUserRankPerm($_SESSION['badge_number']) >= 4) {
            $result = mysqli_query($mysql_id, "SELECT u.badge_number, u.playername, r.name FROM users AS u INNER JOIN ranks AS r ON r.dbid=u.rank WHERE active='1' ORDER BY playername ASC");
            echo "<div id='files-content'>
                <h1>Felhasználók</h1>
                <div class='text'>Összesen " . mysqli_num_rows($result) . " találat</div><br />
                <input class='search input-primary' type='text' id='badgeNum_search' onkeyup='search_badgeNum()' placeholder='Keresés jelvényszám alapján' style='width: 20%'>
                <a class='button-primary' href='index.php?p=users&t=new' style='float:right;'>Új felhasználó</a><br /><br />
                <table id='files'>
                    <tr>
                        <th class='files-header'>Jelvényszám</th>
                        <th class='files-header'>Név</th>
                        <th class='files-header'>Rang</th>
                        <th class='files-header'>Művelet</th>
                    </tr>";
                    if(mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr class='files-row' id='u-tr" . $row['badge_number'] . "'>";
                                echo "<td class='files-column'>" . $row['badge_number'] . "</td>";
                                echo "<td class='files-column'>" . RPName($row['playername']) . "</td>";
                                echo "<td class='files-column'>" . $row['name'] . "</td>";
                                echo "<td class='files-column'>";
                                    echo "<a href='index.php?p=users&t=view&id=" . $row['badge_number'] . "'><i class='far fa-eye icon'></i></a>";
                                    echo "<a href='index.php?p=users&t=edit&id=" . $row['badge_number'] . "'><i class='fas fa-edit icon'></i></a>";
                                echo "</td>";
                            echo "</tr>";
                        }
                    } else echo "<tr><td colspan='4'  class='files-column' style='text-align:center;'>Nincsenek felhasználók!</td></tr>";
                    echo "
                    <tr>
                        <th class='files-header'>Jelvényszám</th>
                        <th class='files-header'>Név</th>
                        <th class='files-header'>Rang</th>
                        <th class='files-header'>Művelet</th>
                    </tr>
                </table>
            </div>";
        } else echo "<h1>Nincs jogosultságod az oldal megtekintéséhez!</h1>";
        ?>
        <script src='js/pendinguser.js'></script>
    </body>
</html>
