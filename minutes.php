<html>
    <head>
        <title><?php echo $WEBPAGE_NAME; ?> - Akták</title>

        <script>
		function search_minuteId() {
		  // Declare variables
		  var input, filter, table, tr, td, i;
		  input = document.getElementById("m_search");
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
        if(getUserRankPerm($_SESSION['badge_number']) >= 1) {
            echo "
            <div id='files-content'>
                <h1>Jegyzőkönyvek</h1><br />
                <input class='search input-primary' type='text' id='m_search' onkeyup='search_minuteId()' placeholder='Keresés sorszám alapján' style='width: 20%'>
                <a class='button-primary' href='index.php?p=minutes&t=new' style='float:right;'>Új jegyzőkönyv</a><br /><br />
                <table id='files'>
                    <tr>
                        <th class='files-header'>Sorszám</th>
                        <th class='files-header'>Kelt</th>
                        <th class='files-header'>Szerző</th>
                        <th class='files-header'>Megnevezés</th>
                        <th class='files-header'>Művelet</th>
                    </tr>";
                    $result = mysqli_query($mysql_id, "SELECT minutes.*, users.playername FROM minutes 
                    INNER JOIN users ON users.badge_number=minutes.author ORDER BY created DESC");
                    if(mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr class='files-row' id='min-tr" . $row['dbid'] . "'>";
                                echo "<td class='files-column'>" . $row['dbid'] . "</td>";
                                echo "<td class='files-column'>" . $row['created'] . "</td>";
                                echo "<td class='files-column'>" . $row['playername'] . "</td>";
                                echo "<td class='files-column'>" . $row['title'] . "</td>";
                                echo "<td class='files-column'>";
                                echo "<a href='index.php?p=minutes&t=view&id=" . $row['dbid'] . "'><i class='far fa-eye icon'></i></a>";
                                if(getUserRankPerm($_SESSION['badge_number']) >= 4 || $row['author'] == $_SESSION['badge_number']) {
                                    echo "<a href='index.php?p=minutes&t=edit&id=" . $row['dbid'] . "'><i class='fas fa-edit icon'></i></a>
                                    <a class='rem-minute' id='" . $row['dbid'] . "'><i class='fas fa-trash-alt icon'></i></a>";
                                }
                                echo "</td>";
                            echo "</tr>";
                        }
                    } else echo "<tr><td colspan='4' style='text-align:center;' class='files-column'>Nincsenek jegyzőkönyvek!</td></tr>";
                    echo "
                    <tr>
                        <th class='files-header'>Sorszám</th>
                        <th class='files-header'>Kelt</th>
                        <th class='files-header'>Szerző</th>
                        <th class='files-header'>Megnevezés</th>
                        <th class='files-header'>Művelet</th>
                    </tr>
                </table>
            </div>";
        } else echo "<h1>Nincs jogosultságod az oldal megtekintéséhez!</h1>";
        ?>
        <script src='js/minute_view.js'></script>
    </body>
</html>
