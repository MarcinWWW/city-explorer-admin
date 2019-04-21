<?php 
	if(($_SESSION['username'] == "@nouser@" && $_SESSION['loginsuccess'] == "@no@") || $token == "success" || strlen($_SESSION['register']) > 2 ){ 
		if($_SESSION['username'] == "@nouser@" && $_SESSION['loginsuccess'] == "@no@"){ $tresc = 'Błędne hasło lub login<br>Spróbuj zalogować się ponownie'; }
		if(strpos($token, "success")>-1) { $tresc = 'Twoje konto jest już<br><strong style=\'color:green\'>AKTYWNE</strong><br>Zaloguj się do swojego konta'; }
		if($_SESSION['register'] == '200') { $tresc = 'Rejestracja została przeprowadzona<br><strong style=\'color:green\'>POMYŚLNIE</strong><br>Potwierdź rejestrację poprzez e-mail'; }
		if($_SESSION['register'] == '400') { $tresc = 'Rejestracja<br><strong style=\'color:red\'>NIE POWIODŁA SIĘ</strong>'; }
		if($_SESSION['register'] == 'login') { $tresc = 'Rejestracja nie powiodła się.<br>Podany <strong style=\'color:red\'>LOGIN</strong> już istnieje w systemie'; }
		if($_SESSION['register'] == 'email') { $tresc = 'Rejestracja nie powiodła się.<br>Podany <strong style=\'color:red\'>E-MAIL</strong> już istnieje w systemie'; }
?>
	<div id="center_failed_login">
		<div id="failed_login">
			<div id="komunikat_log" class="center">
			<div class="krzyzyk" onclick="hide_log(200,700,'0.5s')">X</div>
				<p id="komunikat_tresc"><?php echo $tresc; ?></p>
			</div>
		</div>
	</div>
	<script>during_failed_login();</script>
<?php } ?>