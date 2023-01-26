<html>
    <head>
        <title><?php echo $WEBPAGE_NAME; ?> - Akták</title>

        <script>
		function search_fileName() {
		  // Declare variables
		  var input, filter, table, tr, td, i;
		  input = document.getElementById("f_search");
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
        if(getUserRankPerm($_SESSION['badge_number']) >= 2) {
            echo "
            <div id='files-content'>
                <h1>Akták</h1><br />
                <input class='search input-primary' type='text' id='f_search' onkeyup='search_fileName()' placeholder='Keresés sorszám alapján' style='width: 20%'>
                <a class='button-primary' href='index.php?p=files&t=new' style='float:right;'>Új akta</a><br /><br />
                <table id='files'>
                    <tr>
                        <th class='files-header'>Sorszám</th>
                        <th class='files-header'>Kelt</th>
                        <th class='files-header'>Szerző</th>
                        <th class='files-header'>Megnevezés</th>
                        <th class='files-header'>Művelet</th>
                    </tr>";
                    $result = mysqli_query($mysql_id, "SELECT files.*, users.playername FROM files INNER JOIN users ON users.badge_number=files.author WHERE files.archive='0' ORDER BY created DESC");
                    if(mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr class='files-row' id='fv-tr" . $row['dbid'] . "'>";
                                echo "<td class='files-column'>" . $row['file_name'] . "</td>";
                                echo "<td class='files-column'>" . $row['created'] . "</td>";
                                echo "<td class='files-column'>" . $row['playername'] . "</td>";
                                echo "<td class='files-column'>" . $row['title'] . "</td>";
                                echo "<td class='files-column'>";
                                echo "<a href='index.php?p=files&t=view&id=" . $row['dbid'] . "'><i class='far fa-eye icon'></i></a>";
                                if(getUserRankPerm($_SESSION['badge_number']) >= 4 || $row['author'] == $_SESSION['badge_number']) {
                                    echo "<a href='index.php?p=files&t=edit&id=" . $row['dbid'] . "'><i class='fas fa-edit icon'></i></a><a class='rem-file' id='" . $row['dbid'] . "' name='" . $row['file_name'] . "'><i class='fas fa-trash-alt icon'></i></a>";
                                }
                                echo "</td>";
                            echo "</tr>";
                        }
                    } else echo "<tr><td colspan='5' style='text-align:center;' class='files-column'>Nincsenek akták!</td></tr>";
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
        <script src='js/file_view.js'></script>
    </body>
</html>
