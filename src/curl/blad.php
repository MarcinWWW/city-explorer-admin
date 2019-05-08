<?php
	if($blad){
		echo "<div class=\"blad\">";
		echo "<p class=\"blad_header\">" . $_SESSION['check_server_kod'] . " " . $_SESSION['check_server'] . "</p>";
		echo "<p class\"blad_tresc\">Przepraszamy, ale serwer zdalny  https://edu-cityexplorer.herokuapp.com/ w tej chwili nie odpowiada.<br>Zapraszamy ponownie później.</p>";
		echo "</div>";
	}
?>