<?php

if(isset($_COOKIE["MonCookie"]))
	{
		$cook = $_COOKIE["MonCookie"];
		$requete = "SELECT Sid,expiration,email from utilisateurs Where Sid='$cook'";
		$rs = mysql_query($requete) or die (mysql_error());
		$result = mysql_num_rows($rs);
		if($result>0)
		{
			while($data = mysql_fetch_array($rs))
			{
				$Sid = $data['Sid'];
				$mail = $data['email'];
				$expiration = $data['expiration'];
				$Somme =  $expiration -time();
				if($Somme<0)
				{
					$connect = false;
				}
				else
				{
					$titre = "Vous êtes connecté";
					$connect = true;
				}
			}
		}
		else
		{
			$connect = false;
		}
		
		
	}
	else
	{
		$connect = false;
	}


	?>