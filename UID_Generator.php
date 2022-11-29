<?php

include("GetSecretKeyFromLibSodium.php");
//include("GetLibSodiumEncryption.php");
?>
<head>
	<link rel="stylesheet" href="http://localhost/platform/css/elements.css">
	<link rel="stylesheet" href="http://localhost/platform/css/classess.css">
</head>
<body>
<?php
echo "<p>Hash sha512 uniqueid = </p>";
echo '<p class="console_function">'.hash('sha512', uniqid()).'</p><br>';
$asdft = md5(uniqid());
echo "<p>Hash md5 uniqueid = </p>";
echo '<p id="Hashmd5" class="console_function">'.$asdft.'</p><button onclick="PutInInputBox($(&quot;#Hashmd5&quot;).html())">Put in input box</button>';
echo "<p>A LibSodium Encryption Key:</p>";
echo "<p id='LibSodiumEncryptionKey'>".sodium_crypto_secretbox_keygen().'</p><br>';
?>
<script type="text/javascript" src="js/jquery-3.3.1.js"></script>

<input id="GetHashInput" style="width:320px"></input><button onclick="GetHash2($('#GetHashInput').val())">Get md5 Hash</button><button onclick="GetLibSodiumEncryption($('#GetHashInput').val(), $('#LibSodiumEncryptionKey').html())">Get LibSodium Encryption</button><button onclick="GetSecretKeyFromLibSodium($('#GetHashInput').val())">Get LibSodium Encryption</button>
<div id="Hashes"></div>

<script>
function PutInInputBox(value){
	$("#GetHashInput").val(value);
}
function GetHash(value)
{
	let request = new XMLHttpRequest();
	
	request.open('POST', 'GetHash.php', true);
	
	var asdfheader = 'Content-Type';
	var asdfheader2 = 'application/x-www-form-urlencoded';
	request.setRequestHeader(asdfheader, asdfheader2);
	var asdfasdf = "Value=" + value;
	
	request.onreadystatechange = function()
	{
		if(request.readyState == 4) 
		{
			if(request.status == 500)
			{
				var newElement = document.getElementsByClassName('Run');
				newElement.innerHTML += request.responseText;
			}
			if(request.status == 200)
			{
				let response = request.responseText;
				eval(response);
				var newElement = document.getElementsByClassName('Run');
				newElement.innerHTML += response;
			}
		}
	}
	try
	{
		request.send(asdfasdf);
	}
	catch(e)
	{
		WeatherConsoleMessage.innerHTML += "Page not found guys" + e;
	}
}
function GetHash2(value)
{
	$.ajax
	(
		{	
			data:{Value : value},
			type: 'POST',
			url: 'GetHash.php',
			success: function(data)
			{
				script = $(data).text();
				$.globalEval(script);
				//alert(data);
			}
		}
	);
	
}
function GetLibSodiumEncryption(value, key)
{
	$.ajax
	(
		{	
			data:{Value : value, Key : key},
			type: 'POST',
			url: 'GetLibSodiumEncryption.php',
			success: function(data)
			{
				script = $(data).text();
				$.globalEval(script);
				//alert(data);
			}
		}
	);
}
function GetSecretKeyFromLibSodium(value)
{
	$.ajax
	(
		{	
			data:{Value : value},
			type: 'POST',
			url: 'GetSecretKeyFromLibSodium.php',
			success: function(data)
			{
				script = $(data).text();
				$.globalEval(script);
				alert(data);
			}
		}
	);
}
function aslowasdaw(value)
{
	alert(value);
}
</script>

<!-- );GetHash($('#GetHashInput').value(););GetHash2($('#GetHashInput').value();); -->