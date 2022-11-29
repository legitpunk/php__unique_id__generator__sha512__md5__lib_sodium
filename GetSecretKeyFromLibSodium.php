<?php


Function GetSecretKeyFromLibSodium(){
	$asd = sodium_crypto_secretbox_keygen();
	echo '<script>$("#Hashes").append("'.$asd.'<br>");</script>';
}

GetSecretKeyFromLibSodium();