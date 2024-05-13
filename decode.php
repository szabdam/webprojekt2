<?php
$jelszavak = fopen("password.txt","r") or die("NEM MEGY B+");
$keszvan = "";
while(!feof($jelszavak))
{
	$sor = fgets($jelszavak);
	$i = 0;
	while($i<strlen($sor)-1)
	{
	for($j = 0; $j < 5; $j++)
	{
			if($i>=strlen($sor)-1)
			{
				break;
			}
			else
			{
				if($j==0)
				{
					$keszvan.=  chr(ord($sor[$i])-5);
				}
				else if($j==1)
				{
					$keszvan .= chr(ord($sor[$i])+14);
				}
				else if($j==2)
				{
					$keszvan .= chr(ord($sor[$i])-31);
				}
				else if($j==3)
				{
					$keszvan .= chr(ord($sor[$i])+9);
				}
				else if($j==4)
				{
					$keszvan .= chr(ord($sor[$i])-3);
				}
			$i++;
			}
	}

	}
	$keszvan .= "\n";
		
}
file_put_contents('kesz.txt', $keszvan);

fclose($jelszavak);











?>