<?php
session_start();
if(strpos($_SERVER[REQUEST_URI], "/?register=") > -1){
	$tokenPos = strpos($_SERVER[REQUEST_URI], "/?register=") + 11;
	$uri = $_SERVER[REQUEST_URI];
	$token = substr($_SERVER[REQUEST_URI], $tokenPos, strlen($uri));
}
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
	$beacon_id = $_POST['beacon_id'];
	$beacon_id_minor = $_POST['beacon_id_minor'];
	$beacon_nazwa = $_POST['beacon_nazwa'];
	$beacon_grupa = $groupName;
	$beacon_location = $_POST['beacon_grupa'];
	$beacon_address = $_POST['beacon_address'];
	include('admin.php');
}
include('beacon.php');
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
	<?php include('banner.php'); ?>
	<article id="art">
	<?php 	
		//echo '<br>$_SERVER[REQUEST_URI] = ' . $_SERVER[REQUEST_URI];
		//echo '<br>$tokenPos = ' . $tokenPos;
		//echo '<br>$uri ' . $uri;
		//echo '<br>$token ' . $token;
	?>
		<header>
			<?php if($_SESSION['username'] != null && $_SESSION['username'] != "@nouser@") { ?>
				<form id="logout" action="logout.php" method="post">
					<input id="logout_submit" name="logout_submit" type="submit" class="powitanie2" value="wyloguj">
				</form>
			<?php } ?>
			<img class="logo" src="img/logo.png" alt="logo" width="50" height="50">
			<h2>City Explorer</h2>
				<div class="cssclass">
					<select id="cssselect">
						<option value="styles.css" selected>default</option>
						<option value="light.css">light</option>
						<option value="dark.css">dark</option>
					</select>
				</div>
				<h1>
					<strong class="wstazka"></strong>
					<div id="login" action="logout.php" method="post">
						<?php if($_SESSION['username'] != null && $_SESSION['username'] != "@nouser@" && $_SESSION['admin'] == "@yes@"){ ?>
							<p class="login_tekst3">Witaj <?php echo $login; ?></p>
							<br>
							<p class="login_tekst2">Rejestracja nowego konta</p>
						<?php } elseif($_SESSION['username'] != null && $_SESSION['username'] != "@nouser@" && $_SESSION['admin'] == "@no@"){ ?>
							<p class="login_tekst3">Witaj <?php echo $login; ?></p> 
						<?php } else{ ?>
							<img class="login_circle" src="img/login.png" alt="City Explorer - Logowanie, rejestracja" height="25" width="25">
							<p class="login_tekst">logowanie / rejestracja</p> 
						<?php } ?>
					</div>
					<div id="logowanie_wrap">
						<form id="logowanie" method="post">
							<input id="val_login" name="inp_login" type="text" value="<?php echo htmlspecialchars($login); ?>" placeholder="login">
							<input id="val_pass" name="inp_pass" type="password" value="" placeholder="hasło">
							<div id="submit" name="log_submit">OK</div>
							<p id="rejestracja">zarejestruj się</p>
							<div id="logowanie_wrap_rejestracja">
								<input name="inp_pass2" id="val_pass2" type="password" placeholder="powtórz hasło" value="">
								<input name="inp_email" id="val_email" type="text" placeholder="e-mail" value="<?php echo htmlspecialchars($email); ?>">							
								<p class="reg_tekst">REGULAMIN</p> 
								<div class="regulamin">
									<ol>
										<li>Przystąpienie do portalu City Explorer jest dobrowolne i nieobciążone żadnymi kosztami.</li>
										<li>W celu rejestracji należy podać dane kontaktowe e-mail, podanie danych jest dobrowolne.</li>
										<li>Należy podać login od 1-20 znaków; hasło 8-20 znaków w tym min. 1 duża litera, min. 1 mała litera, min. 1 cyfra; adres e-mail, na który zostanie wysłane potwierdzenie rejestracji.</li>
										<li>Dodawać i usuwać beacony może tylko administrator systemu.</li>
										<li>Konto administratora może założyć tylko istniejący już w systemie administrator.</li>
										<li>Konto użytkownika może założyć każdy zainteresowany.</li>
										<li>Właścicielem danych podanych przez użytkowników na portalu jest portal City Explorer, użytkownicy mają prawo w każdej chwili do poprawienia danych lub usunięcie konta.</li>
										
									</ol>	
								</div>
								<?php if($_SESSION['admin'] == "@yes@") { ?>
								<div class="dologowania">
									<div id="chk_box_otoczka1" class="chk_box_otoczka">
										<input id="adm_checkbox" type="checkbox" name="adm_checkbox" value="">
									</div>
									<p>administrator</p>
								</div>
								<?php } ?>
								<div class="dologowania space">
									<div id="chk_box_otoczka2" class="chk_box_otoczka">
										<input id="chk_reg" type="checkbox" name="reg_checkbox_accept" value="">
									</div>	
									<p>akceptuję regulamin</p>
								</div>
							</div>
						</form>
					</div>	
				</h1>
		</header>
		<nav>
			<div class="innav">
				<ul>
					<li><a id="btnAdd" href="#">dodaj beacon</a></li>
					<li><a id="btnPlaces" href="#">miejsca z beaconami</a></li>
					<li><a id="btnRank" href="#">ranking</a></li>
				</ul>
			</div>
		</nav>
		<section>
			<div id="add">
				<?php
					if(!isset($_SESSION['username']) || $_SESSION['username'] == "@nouser@" || $_SESSION['admin'] == "@no@"){
				?>
				<div class="monit_logowanie">
					<img id="beacon-pic" alt="dodawanie i usuwanie beaconów" src="img/beacon-pic.png" width="100" height="100">
					<p class="info">Należy zalogować się w roli <span>Administratora</span>, żeby móc dodawać lub usuwać beacony <br>City Explorer</p>
					<form id="add_logowanie" action="pre_login_2.php" method="post">
						<input id="inp_log1" name="inp_log1" type="text" placeholder="login">
						<input id="inp_log2" name="inp_log2" type="password" placeholder="password">
						<div id="submit2">OK</div>
					</form>
				</div>
				<?php 
					} else {
				?>
				<div class="monit_logowanie none">
					<img alt="dodawanie i usuwanie beaconów" src="img/beacon-pic.png" width="100" height="100">
					<p class="info">Należy zalogować się w roli <span>Administratora</span>, żeby móc dodawać lub usuwać beacony <br>City Explorer</p>
					<form id="add_logowanie" action="pre_login_2.php" method="post">
						<input id="inp_log1" name="inp_log1" type="text" placeholder="login">
						<input id="inp_log2" name="inp_log2" type="password" placeholder="password">
						<div id="submit2">OK</div>
					</form>
				</div>
				<div class="add_content">
					<div class="add_kategoria">
						<form id="add_materialy_img" enctype="multipart/form-data" action="send_img.php" method="post">
							<input type="hidden" name="MAX_FILE_SIZE" value="2480000">
							<input type="file" name="obrazek" id="obrazek" class="wybierzObrazek">
							<label id="labelObrazek" for="obrazek">
								<?php if($_FILES['obrazek']['name'] != '') 
										echo $_FILES['obrazek']['name'];
									else
										echo "Wybierz obraz";
								?></label>
							<input type="submit" name="obrazekLocalSubmit" class="none" value="submit">
						</form>
						<?php if($_FILES['obrazek']['name'] != ''){ 
								$name = $_FILES['obrazek']['name'];
								echo "<img alt=\"$name\" src=\"img/up/$name\" >";
								/*
								echo "<br>lokalizacja = " . $lok;
								echo "<br>filename = " . $filename;
								echo "<br>filedata = " . $filedata;
								echo "<br>filesize = " . $filesize;
								echo "<br>filetype = " . $filetype;
								*/
							}								
						?>
						<!--
						<form id="add_materialy_akcja" action="" method="post">
							<input id="akcja_name" type="text" name="akcja_name" placeholder="nazwa akcji">
							<select id="akcja_select">
								<option value="akcja 1">akcja 1</option>
								<option value="akcja 2">akcja 2</option>
								<option value="akcja 3">akcja 3</option>
								<option value="akcja 4">akcja 4</option>
							</select>
						</form>
						-->
					</div>
					<div class="add_materialy">
						<form id="add_materialy_dodaj" method="post">
							<input id="beacon_id" type="text" name="beacon_id" placeholder="ID major" value="<?php echo htmlspecialchars($beacon_id);?>">
							<input id="beacon_id_minor" type="text" name="beacon_id_minor" placeholder="ID minor" value="<?php echo htmlspecialchars($beacon_id_minor);?>">
							<input id="beacon_nazwa" type="text" name="beacon_nazwa" placeholder="nazwa" value="<?php echo htmlspecialchars($beacon_nazwa);?>">
							<input id="beacon_grupa" list="grupy" type="text" name="beacon_grupa" placeholder="grupa beaconów" value="<?php echo htmlspecialchars($beacon_grupa);?>">
							<datalist id="grupy">
							<?php
								include("group.php");
							?>
							</datalist>
							<input id="beacon_location" type="text" name="beacon_location" placeholder="lokalizacja" value="<?php echo htmlspecialchars($beacon_location);?>">
							<input id="beacon_address" type="text" name="beacon_address" placeholder="adres" value="<?php echo htmlspecialchars($beacon_address);?>">
							<!--<input id="beacon_coordinates" type="text" name="beacon_coordinates" placeholder="współrzędne">-->
							<div id="submit_dodaj">DODAJ BEACON</div>
						</form>
						<form id="add_materialy_usun" action="delete.php" method="POST">
							<input id="beacon_delete" class="none" type="text" name="beacon_delete" value="">
						</form>
					</div>
				</div>
				<?php
					}
				?>
			</div>
			<div id="places">
				<?php 
					echo "<div class='cont'>";
					echo "<div class='search'>";
					echo "<p>standardowe UUID beaconów w City Explorer = <strong><i>B9407F30-F5F8-466E-AFF9-25556B57FE6D</i></strong></p>"; 
					echo "</div>";
					echo "<div class='wpis'>";
					echo "<div class='thead none'>ID</div>";
					echo "<div class='thead'>ID major</div>";
					echo "<div class='thead'>ID minor</div>";
					echo "<div class='thead'>beacon</div>";
					echo "<div class='thead'>grupa</div>";
					echo "<div class='thead'>lokalizacja</div>";
					echo "<div class='thead'>adres</div>";
					if($_SESSION['admin'] == "@yes@")
						echo "<div class='thead end'></div>";
					echo "</div>";
					$ogl = 0;
					$key = 0;
					foreach($_SESSION['beacon'] as $key => $value)
					{
						$ogl = $key;
						$klasa = "thead".$ogl%2;
						$klasa2 = $klasa . " none";
						$wpis = "wpis".$ogl%2;
						
						echo "<div class='".$wpis."'>";
						echo "<div class='".$klasa2."'>".$_SESSION['beacon'][$key]['id']."</div>";
						echo "<div class='".$klasa."'>".$_SESSION['beacon'][$key]['major']."</div>";
						echo "<div class='".$klasa."'>".$_SESSION['beacon'][$key]['minor']."</div>";
						echo "<div class='".$klasa."'>".$_SESSION['beacon'][$key]['type']['name']."</div>";
						echo "<div class='".$klasa."'>".$_SESSION['beacon'][$key]['groups']['name']."</div>";
						echo "<div class='".$klasa."'>".$_SESSION['beacon'][$key]['location']['name']."</div>";
						echo "<div class='".$klasa."'>".$_SESSION['beacon'][$key]['location']['address']."</div>";
						if($_SESSION['admin'] == "@yes@")
							echo "<div class='".$klasa." end'><img class='iksUsun' alt='usuń beacon' src='img/iks.png' width='25' height='25'></div>";						
						echo "</div>";
					}
					echo "</div>";				
				?>
			</div>
			<div id="ranking">
				<?php 
					echo "<div class='cont'>";
					echo "<div class='wpis'>";
					echo "<div class='thead'>pozycja</div>";
					echo "<div class='thead'>użytkownik</div>";
					echo "<div class='thead'>punktacja</div>";
					echo "</div>";
					$ogl = 1;
					foreach($_SESSION['top20'] as $key => $value)
					{
						$ogl++;
						$klasa = "thead".$ogl%2;
						$klasa2 = $klasa . " none";
						$wpis = "rank".$ogl%2;
						
						echo "<a href='#'><div class='".$wpis."'>";
						echo "<div class='".$klasa."'>".($ogl-1)."</div>";
						echo "<div class='".$klasa."'>".$key."</div>";
						echo "<div class='".$klasa."'>".$value."</div>";					
			
						echo "</div></a>";
					}
					echo "</div>";				
				?>
			</div>
		</section>
		<footer>
			<div class="podzial">
				<p class="footer_opis">Projekt inżynierski 2019</p>			
				<ul>
					<li>&nbsp;</li>
					<li>Ewa Chojnacka</li>
					<li>Daniel Gruchociak</li>
					<li>Marcin Macias</li>
					<li>Marcin Jadwiszczak</li>
				</ul>		
			</div>
			<div class="podzial">
				<p class="footer_opis">5 najlepszych graczy</p>
				<?php
					echo "<ul>";
						foreach($_SESSION['top5'] as $key => $value)
						{
							echo "<li>".$key."<span>".$value."</span></li>";				
						}
					echo "</ul>";
				?>				
			</div>
			<div class="podzial ostatni">
				<ul class="footer_opis_3">
					<li><a href="#">Home</a></li>
					<li id="footer_logowanie"><a href="#">Logowanie</a></li>
					<li id="footer_rejestracja"><a href="#">Rejestracja</a></li>
					<li id="footer_regulamin"><a href="#">Regulamin</a></li>
					<li id="footer_miejsca"><a href="#">Miejsca z beaconami</a></li>
					<li><a href="mailto:helpdesk.cityexplorer@gmail.com">Kontakt</a></li>
				</ul>	
			</div>
		</footer>
	</article>
	<!--<script src="scripts\css.js"></script>-->
	<script src="scripts\header.js"></script>
	<script src="scripts\content.js"></script>
	<script src="scripts\register.js"></script>	
	<?php if(isset($_SESSION['username']) && $_SESSION['username'] != "@nouser@" && $_SESSION['admin'] == "@yes@" ){ ?>
		<script src="scripts\walidacja_content.js"></script>	
	<?php } //else echo "USERNAME = " . $_SESSION['username'];?>
	<?php
		if(($_SESSION['username'] == "@nouser@" && $_SESSION['loginsuccess'] == "@no@") || $token == "success" || strlen($_SESSION['register']) > 2 ){ 
			echo "<script>hide_log(3000,4000,'1s');</script>";
			$_SESSION['loginsuccess'] = "";
			if(isset($_SESSION['register'])){
				unset($_SESSION['register']);
			}
		}
	?>	
</body>
</html>