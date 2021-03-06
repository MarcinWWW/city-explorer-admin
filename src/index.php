<?php
session_set_cookie_params(300,"/");
session_start();
include('header.php');
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
	<ul id="demo">
		<li>
			<div class="demo_li_1"></div>
			<div class="demo_li_2">demo indywidualne<br>PHP / MySQL</div>
		</li>
		<li>
			<div class="demo_li_1"></div>	
			<div class="demo_li_2">projekt inżynierski<br>PHP / cURL / Json</div>	
		</li>
		<div class="demo_li_vertical"><p>wersja</p></div>
	</ul>
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
							<input id="val_login" name="inp_login" type="text" value="<?php echo htmlspecialchars($login); ?>" placeholder="login (demo: admin)">
							<input id="val_pass" name="inp_pass" type="password" value="" placeholder="hasło (demo: admin)">
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
						<input id="inp_log1" name="inp_log1" type="text" placeholder="login (demo: admin)">
						<input id="inp_log2" name="inp_log2" type="password" placeholder="hasło (demo: admin)">
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
					<form id="add_materialy_img" enctype="multipart/form-data" action="send_img.php" method="post">
						<div class="add_kategoria">
							<input type="hidden" name="MAX_FILE_SIZE" value="2480000">
							<input type="file" name="obrazek" id="obrazek" class="wybierzObrazek">
							<label id="labelObrazek" for="obrazek">
								<?php if($_FILES['obrazek']['name'] != '') 
										echo $_FILES['obrazek']['name'];
									else
										echo "Wybierz obraz";
								?></label>
							<input type="submit" name="obrazekLocalSubmit" class="none" value="submit">
						<!--</form>-->
						<?php if($_FILES['obrazek']['name'] != ''){ 
								$name = $_SESSION['wybierz_obraz'];
								echo "<img alt=\"$name\" src=\"img/up/$name\" >";
								/*
								//echo "<br>lokalizacja = " . $lok;
								//echo "<br>filename = " . $filename;
								//echo "<br>filedata = " . $filedata;
								//echo "<br>filesize = " . $filesize;
								//echo "<br>filetype = " . $filetype;
								echo "<br>post = " . $post;
								*/
								//echo "<br>session send_img = " . $_SESSION['send_img'];
								//echo "<br>session send_img_log = " . $_SESSION['send_img_log'];
								//echo "<br>session wybierz_obraz = " . $_SESSION['wybierz_obraz'];			
							}								
						?>
						</div>
						<div class="add_materialy">
						<!--<form id="add_materialy_dodaj" action="" method="post">-->
							<input id="beacon_id" type="text" name="beacon_id" placeholder="ID major" value="<?php echo htmlspecialchars($_SESSION['beacon_id']);?>">
							<input id="beacon_id_minor" type="text" name="beacon_id_minor" placeholder="ID minor" value="<?php echo htmlspecialchars($_SESSION['beacon_id_minor']);?>">
							<input id="beacon_nazwa" type="text" name="beacon_nazwa" placeholder="nazwa" value="<?php echo htmlspecialchars($_SESSION['beacon_nazwa']);?>">
							<input id="beacon_grupa" list="grupy" type="text" name="beacon_grupa" placeholder="grupa beaconów" value="<?php echo htmlspecialchars($_SESSION['beacon_grupa']);?>">
							<datalist id="grupy">
							<?php
								include("group.php");
							?>
							</datalist>
							<input id="beacon_location" type="text" name="beacon_location" placeholder="lokalizacja" value="<?php echo htmlspecialchars($_SESSION['beacon_location']);?>">
							<input id="beacon_address" type="text" name="beacon_address" placeholder="adres" value="<?php echo htmlspecialchars($_SESSION['beacon_address']);?>">
							<input id="beacon_file" class="none" type="text" name="beacon_file" value="<?php echo htmlspecialchars($_SESSION['wybierz_obraz']);?>">
							<!--<input id="beacon_coordinates" type="text" name="beacon_coordinates" placeholder="współrzędne">-->
							<div id="submit_dodaj">DODAJ BEACON</div>				
						</div>
					</form>
					<form id="add_materialy_usun" action="delete.php" method="POST">
						<input id="beacon_delete" class="none" type="text" name="beacon_delete" value="">
					</form>
				</div>
				<?php
					}
				?>
			</div>
			<div id="places">
				<?php 
					include('conn.php');
					//$sql = "SELECT b.ID, bl.Name, bl.Address, c.Latitude, c.Longitude FROM beacon b LEFT JOIN beaconlocation bl ON b.LocationID = bl.ID LEFT JOIN coordinate c ON bl.CoordinateID = c.ID";
					$sql2 = "SELECT b.id, n.major, n.minor, b.name AS 'beaconname', g.name AS 'groupname', l.name AS 'locname', a.name AS 'adrname'
							FROM beacon b LEFT JOIN `group` g ON b.id_group = g.id 
							LEFT JOIN `numbers` n ON b.id = n.id_beacon 
							LEFT JOIN `loc` l ON b.id = l.id_beacon 
							LEFT JOIN `adr` a ON b.id = a.id_beacon";
					$records = mysql_query($sql2);
					
					echo "<div class='cont'>";
					#echo "kodowanie ".mb_detect_encoding("poznań");
					echo "<div class='search'>";
					echo "<p>standardowe UUID beaconów w City Explorer = <strong><i>B9407F30-F5F8-466E-AFF9-25556B57FE6D</i></strong></p>"; 
					#echo "<input type='text' placeholder='szukaj miejsca z beaconami..'>" ;
					#echo "<input class='sub' type='submit' value='szukaj'>";
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
					/*
					echo "<div class='wpis'>";
					echo "<div class='thead'>beacon</div>";
					echo "<div class='thead'>miasto</div>";
					echo "<div class='thead'>miejsce</div>";
					echo "<div class='thead'>szerokość GPS</div>";
					echo "<div class='thead'>długość GPS</div>";
					echo "</div>";
					*/
					while($item=mysql_fetch_assoc($records))
					{
						$klasa = "thead".$ogl%2;
						$klasa2 = $klasa . " none";
						$wpis = "wpis".$ogl%2;
						
						echo "<a href='#'><div class='".$wpis."'>";
						echo "<div class='".$klasa2. "'>".$item['id']."</div>";
						echo "<div class='".$klasa."'>".$item['major']."</div>";
						echo "<div class='".$klasa."'>".$item['minor']."</div>";
						echo "<div class='".$klasa."'>".$item['beaconname']."</div>";
						echo "<div class='".$klasa."'>".$item['groupname']."</div>";	
						echo "<div class='".$klasa."'>".$item['locname']."</div>";
						echo "<div class='".$klasa."'>".$item['adrname']."</div>";								
						#echo "<div class='".$klasa."'>kodowanie ".mb_detect_encoding($item['miasto'])."</div>"; 
						echo "</div></a>";
						
						$ogl++;
					}
					echo "</div>";
				?>
			</div>
			<div id="ranking">
				<?php 
					$sql_rank20 = "SELECT username, pkt FROM user WHERE auth = 'u' ORDER BY pkt DESC LIMIT 0, 20";
					$rec_rank20 = mysql_query($sql_rank20);
					echo "<div class='cont'>";
					echo "<div class='wpis'>";
					echo "<div class='thead'>pozycja</div>";
					echo "<div class='thead'>użytkownik</div>";
					echo "<div class='thead'>punktacja</div>";
					echo "</div>";
					$ogl = 1;
					while($item2 = mysql_fetch_assoc($rec_rank20))
					{
						$ogl++;
						$klasa = "thead".$ogl%2;
						$klasa2 = $klasa . " none";
						$wpis = "rank".$ogl%2;
						
						echo "<a href='#'><div class='".$wpis."'>";
						echo "<div class='".$klasa."'>".($ogl-1)."</div>";
						echo "<div class='".$klasa."'>".$item2['username']."</div>";
						echo "<div class='".$klasa."'>".$item2['pkt']."</div>";					
			
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
					<li>Panel administratora gry miejskiej z urządzeniami iBeacon służący do dodawania oraz usuwania iBeaconów w grze.</li>
					<li>Wersja indywidualna (demo) PHP + MySQL</li>
					<li>Marcin Jadwiszczak</li>
				</ul>		
			</div>
			<div class="podzial">
				<p class="footer_opis">5 najlepszych graczy</p>
				<?php
					$sql_rank5 = "SELECT username, pkt FROM user WHERE auth = 'u' ORDER BY pkt DESC LIMIT 0, 5";
					$rec_rank5 = mysql_query($sql_rank5);
					echo "<ul>";
					while($item3 = mysql_fetch_assoc($rec_rank5)){
						echo "<li>".$item3['username']."<span>".$item3['pkt']."</span></li>";
					}
					echo "</ul>";
					mysql_close($conn);	
				?>				
			</div>
			<div class="podzial ostatni">
				<ul class="footer_opis_3">
					<li><a href="#">Home</a></li>
					<li id="footer_logowanie"><a href="#">Logowanie</a></li>
					<li id="footer_rejestracja"><a href="#">Rejestracja</a></li>
					<li id="footer_regulamin"><a href="#">Regulamin</a></li>
					<li id="footer_miejsca"><a href="#">Miejsca z beaconami</a></li>
					<li><a href="mailto:helpdesk.cityexplorer@gmail.com">Kontakt</a></li> <!-- ToDo: podstawić formularz -->
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
		if($_SESSION['wersja']==null){
			echo "<script>showdemo(-180, 10, 12); setTimeout(function(){hidedemo(0,10,12);}, 10000);</script>";
			$_SESSION['wersja'] = 1;
		}
	?>
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