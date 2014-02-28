<?php
	echo '<form name="forgot_form" action="resetPass.php" method="post" accept-charset="UTF-8">';
	echo 'Ingresa tu nombre de usuario:<input type="text" name="user" required/>';
	echo 'Ingresa tu nombre de CURP:<input type="text" name="curp" required/>';
	echo '<input type="submit" value="Aceptar"/>';
	echo '</form>';
?>