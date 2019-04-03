<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
	// form validation
	$login = $pass = $pass2 = $email = "";
	if(!empty($_POST["inp_login"])){
		$login = $_POST["inp_login"];
	}
	if(!empty($_POST["inp_email"])){
		$pass = $_POST["inp_email"];
	}
}
if($_SESSION['username'] != null && $_SESSION['username'] != "@nouser@"){
	$login = $_SESSION['username'];
}
?>
<html>
<head>
	<title>City Explorer - miejska gra z beaconami</title>
	<meta charset="utf-8">
	<link id="pagestyle" rel="stylesheet" type="text/css" href="styles.css">
	<script src="scripts\getGradientColor.js"></script>
	<script src="scripts\hide_failed_login.js"></script>
	<script src="scripts\during_failed_login.js"></script>
</head>
<body>
	<?php if($_SESSION['username'] == "@nouser@" && $_SESSION['loginsuccess'] == "@no@"){ ?>
		<div id="center_failed_login">
			<div id="failed_login">
				<div id="komunikat_log" class="center">
				<div class="krzyzyk" onclick="hide_log(200,700,'0.5s')">X</div>
					<p>Błędne hasło lub login<br>Spróbuj zalogować się ponownie</p>
				</div>
			</div>
		</div>
		<script>during_failed_login();</script>
	<?php } ?>
	<article id="art">
		<header>
			<img class="logo" src="img/logo.png" alt="logo" width="50" height="50">
			<h2>City Explorer</h2>
				<div class="cssclass">
					<select id="cssselect">
						<option value="styles.css" selected>default</option>
						<option value="light.css">light</option>
						<option value="dark.css">dark</option>
					</select>
				</div>
				<?php if($_SESSION['username'] != null && $_SESSION['username'] != "@nouser@"){ ?>
					<form id="powitanie" action="logout.php" method="post">
						<p class="powitanie1">Witaj <?php echo $login; ?>, </p>
						<input type="submit" name="logout_submit" class="powitanie2" value="wyloguj">
					</form>
				<?php } ?>
				<h1>
					<strong class="wstazka"></strong>
					<div id="login">
						<img class="login_circle" src="img/login.png" alt="City Explorer - Logowanie, rejestracja" height="25" width="25">
						<p class="login_tekst">logowanie / rejestracja</p> 
					</div>
					<div id="logowanie_wrap">
						<form id="logowanie" method="post">
							<input id="val_login" name="inp_login" type="text" value="<?php echo htmlspecialchars($login); ?>" placeholder="login">
							<input id="val_pass" name="inp_pass" type="password" value="" placeholder="hasło">
							<div id="submit" name="log_submit">OK</div>
							<p id="rejestracja">zarejestruj się</p>
							<input name="inp_pass2" name="val_pass2" type="password" placeholder="powtórz hasło" value="">
							<input name="inp_email" name="val_email" type="text" placeholder="e-mail" value="<?php echo htmlspecialchars($email); ?>">							
							<p class="reg_tekst">REGULAMIN</p> 
							<div class="regulamin">
								<ol>
									<li>Przystąpienie do portalu City Explorer jest dobrowolne i nieobciążone żadnymi kosztami.</li>
									<li>W celu rejestracji należy podać dane kontaktowe e-mail, podanie danych jest dobrowolne.</li>
									<li>Właścicielem danych podanych przez użytkowników na portalu jest portal City Explorer, użytkownicy mają prawo w każdej chwili do poprawienia danych lub usunięcie konta.</li>
								</ol>	
							</div>
							<div class="dologowania">
								<div class="chk_box_otoczka">
									<input type="checkbox" name="mod_checkbox" value="" checked disabled>
								</div>							
								<p>moderator</p>
							</div>
							<div class="dologowania">
								<div class="chk_box_otoczka">
									<input type="checkbox" name="adm_checkbox" value="" disabled>
								</div>
								<p>administrator</p>
							</div>
							<div class="dologowania space">
								<div class="chk_box_otoczka">
									<input id="chk_reg" type="checkbox" name="reg_checkbox_accept" value="">
								</div>	
								<p>akceptuję regulamin</p>
							</div>
						</form>
					</div>	
				</h1>
		</header>
		<nav>
			<div class="innav">
				<ul>
					<li><a id="btnAdd" href="#">dodaj</a></li>
					<li><a id="btnPlaces" href="#">miejsca z beaconami</a></li>
					<li><a id="btnRank" href="#">ranking</a></li>
				</ul>
			</div>
		</nav>
		<section>
			<div id="add">
				<?php
					if(!isset($_SESSION['username']) || $_SESSION['username'] == "@nouser@"){
				?>
				<div class="monit_logowanie">
					<p class="info">Należy zalogować się, żeby móc dodawać scenariusze City Explorer</p>
					<form id="add_logowanie" action="pre_login_2.php" method="post">
						<input id="inp_log1" name="inp_log1" type="text" placeholder="login">
						<input id="inp_log2" name="inp_log2" type="password" placeholder="password">
						<div id="submit2">OK</div>
					</form>
				</div>
				<?php 
					}
					else{
				?>
				<div class="monit_logowanie none"><p class="info">Należy zalogować się, żeby móc dodawać scenariusze City Explorer</p>
					<form id="add_logowanie" action="pre_login_2.php" method="post">
						<input id="inp_log1" name="inp_log1" type="text" placeholder="login">
						<input id="inp_log2" name="inp_log2" type="password" placeholder="password">
						<div id="submit2">OK</div>
					</form>
				</div>
				<div class="add_content">
					<div class="add_kategoria">
						<h3>kategoria</h3>
						<ul>
							<li>dodaj</li>
							<li>edytuj</li>
							<li>usuń</li>
						</ul>
					</div>
					<div class="add_materialy">
						<h3>materiały</h3>
					</div>
				</div>
				<?php
					}
				?>
			</div>
			<div id="places">
				<?php 
					#if(isset($_SESSION['username'])&& $_SESSION['username'] != "@nouser@"){
						$user = "id7644712_mar";
						$pass = "city1";
						$db = "id7644712_city";
						$server = "localhost";
						$ogl = 0;
						
						$conn = mysql_connect($server, $user, $pass);
						mysql_set_charset("utf8", $conn);
						//mysql_query('SET NAMES utf8');
						mysql_select_db("id7644712_city");
						
						$sql = "SELECT b.ID, bl.Name, bl.Address, c.Latitude, c.Longitude FROM beacon b LEFT JOIN beaconlocation bl ON b.LocationID = bl.ID LEFT JOIN coordinate c ON bl.CoordinateID = c.ID";
						$records = mysql_query($sql);
						
						echo "<div class='cont'>";
						#echo "kodowanie ".mb_detect_encoding("poznań");
						#echo "<div class='search'>";
						#echo "<input type='text' placeholder='szukaj miejsca z beaconami..'>" ;
						#echo "<input class='sub' type='submit' value='szukaj'>";
						#echo "</div>";
						echo "<div class='wpis'>";
						echo "<div class='thead'>beacon</div>";
						echo "<div class='thead'>miasto</div>";
						echo "<div class='thead'>miejsce</div>";
						echo "<div class='thead'>szerokość GPS</div>";
						echo "<div class='thead'>długość GPS</div>";
						echo "</div>";
						
						while($item=mysql_fetch_assoc($records))
						{
							$klasa = "thead".$ogl%2;
							$wpis = "wpis".$ogl%2;
							#$id = $item['id'];
							
							echo "<a href='#'><div class='".$wpis."'>";
							echo "<div class='".$klasa."'>".$item['ID']."</div>";
							echo "<div class='".$klasa."'>".$item['Name']."</div>";
							echo "<div class='".$klasa."'>".$item['Address']."</div>";
							echo "<div class='".$klasa."'>".$item['Latitude']."</div>";
							echo "<div class='".$klasa."'>".$item['Longitude']."</div>";						
							#echo "<div class='".$klasa."'>kodowanie ".mb_detect_encoding($item['miasto'])."</div>"; 
							echo "</div></a>";
							
							$ogl++;
						}

						echo "</div>";
						mysql_close($conn);					
					#}
				?>
			</div>
			<div id="ranking">
			</div>
		</section>
		<footer>
			<div class="podzial">
				<p class="footer_opis">Projekt inżynierski 2019</p>			
				<ul>
					<li>Ewa Chojnacka</li>
					<li>Daniel Gruchociak</li>
					<li>Jakub Hope</li>
					<li>Marcin Macias</li>
					<li>Marcin Jadwiszczak</li>
				</ul>		
			</div>
			<div class="podzial">
				<p class="footer_opis">5 najlepszych graczy</p>
				<ul>
					<li>gracz #1</li>
					<li>gracz #2</li>
					<li>gracz #3</li>
					<li>gracz #4</li>
					<li>gracz #5</li>
				</ul>	
			</div>
			<div class="podzial ostatni">
				<ul class="footer_opis_3">
					<li><a href="#">Home</a></li>
					<li><a href="#">Logowanie</a></li>
					<li><a href="#">Rejestracja</a></li>
					<li><a href="#">Regulamin</a></li>
					<li><a href="#">Miejsca z beaconami</a></li>
					<li><a href="#">Kontakt</a></li>
				</ul>	
			</div>
		</footer>
	</article>
	<!--<script src="scripts\css.js"></script>-->
	<script src="scripts\header.js"></script>
	<script src="scripts\content.js"></script>
	<script src="scripts\register.js"></script>	
	<?php
		if($_SESSION['username'] == "@nouser@" && $_SESSION['loginsuccess'] == "@no@"){
			echo "<script>hide_log(3000,4000,'1s');</script>";
			$_SESSION['loginsuccess'] = "";
		}
	?>	
</body>
</html>