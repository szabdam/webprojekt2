<?php
	$jelszavak = fopen("kesz.txt","r") or die("NEM MEGY B+");
	
	
	$i = 0;
	$sorok = array();
	while(!feof($jelszavak))
	{
		$sorok[$i] = trim(explode("*",fgets($jelszavak))['1']);
		//echo $sorok[$i];
		$i++;
	}
	

	$emailek = array();
	$titkos = array();
	

	$data = fopen("database.txt","r") or die("NEM MEGY B+");
	
	$k = 0;
	while(!feof($data))
	{
		$emailek[$k] = trim(explode(" ",fgets($data))['0']);
		//echo $emailek[$k];
		$k++;
	}
	
	$data2 = fopen("database.txt","r") or die("NEM MEGY B+");
	$k = 0;
	while(!feof($data2))
	{
		$titkos[$k] = trim(explode(" ",fgets($data2))['1']);
		//echo $titkos[$k];
		$k++;
	}

	$szin = "#EFBDD4";
	$betuszin = "#612940";
	$van_email ="";
	$bejel = "";
	
	
	if(isset($_POST['password']))
	{
		if(!in_array($_POST['password'],$sorok))
		{
			$van_email = "Hibás jelszó!";
		}
	}
	if(isset($_POST['email']))
	{
		if(!in_array($_POST['email'],$emailek))
			{
				$van_email =  "Nincs ilyen felhasználó!";
			}
	}
	
	if(isset($_POST['email']) && isset($_POST['password']))
	{
		$em = $_POST['email'];
		$pw = $_POST['password'];
		if(!in_array($_POST['email'],$emailek))
			{
				$van_email =  "Nincs ilyen felhasználó!";
			}
		else if(!in_array($_POST['password'],$sorok))
		{
			$van_email = "Hibás jelszó!";
		}
		
			for($i = 0; $i<count($sorok);$i++)
			{
				if($sorok[$i] == $pw && $emailek[$i] == $em)
				{
					$bejel = "Sikeres bejelentkezés!";
					switch($titkos[$i])
					{
						case "piros":
							$szin = "red";
							$betuszin = "white";
							break;
							
						case "zold":
							$szin = "lightgreen";
							break;
							
						case "fekete":
							$szin = "black";
							$betuszin = "#F5D3C8";
							break;
							
							
						case "feher":
							$szin = "white";
							break;
							
						case "sarga":
							$szin = "amber";
							break;
							
						case "kek":
							$szin = "cyan";
							break;
					}
				}
				else if($emailek[$i] == $em && $sorok[$i] != $pw)
				{
					$van_email = "Hibás jelszó!";
					
					
					
				}
			}
			
	}
	
?>

<html>
<head>
<style>
    @font-face { font-family: Mystery Quest; src: url('MysteryQuest-Regular.ttf'); } 
    .Mystery Quest { font-family: Mystery Quest; font-size: 4.2em; }
</style>
<body style ="background:
radial-gradient(circle closest-side at 60% 43%, <?php echo $szin;?> 26%, rgba(187,0,51,0) 27%),
radial-gradient(circle closest-side at 40% 43%, <?php echo $szin;?> 26%, rgba(187,0,51,0) 27%),
radial-gradient(circle closest-side at 42% 22%, #d35 43%, rgba(221,51,85,0) 45%),
radial-gradient(circle closest-side at 58% 22%, #d35 43%, rgba(221,51,85,0) 45%),
radial-gradient(circle closest-side at 50% 35%, #d35 32%, rgba(221,51,85,0) 27%),

radial-gradient(circle closest-side at 60% 43%, <?php echo $szin;?> 26%, rgba(187,0,51,0) 27%) 50px 50px,
radial-gradient(circle closest-side at 40% 43%, <?php echo $szin;?> 26%, rgba(187,0,51,0) 27%) 50px 50px,
radial-gradient(circle closest-side at 40% 22%, #d35 40%, rgba(221,51,85,0) 45%) 52px 50px,
radial-gradient(circle closest-side at 60% 22%, #d35 40%, rgba(221,51,85,0) 45%) 48px 50px,
radial-gradient(circle closest-side at 50% 35%, #d35 30%, rgba(221,51,85,0) 37%) 50px 50px;

background-color:<?php echo $szin;?>;
background-size:100px 100px;
color:<?php echo $betuszin;?>">
<div style ="font-family: Mystery Quest; text-align: center; font-size:56px">THE TOY STO-RE</div>
<p style = "font-size:10;margin: 0;
position: absolute;
top: 0%;
left: 0%;">Készítette:<br>Szabó Ádám<br>GQVCHV</p>
<form style= "text-align:center; 
margin: 0;
position: absolute;
top: 50%;
left: 50%;
transform: translate(-50%, -50%);" method="POST">
E-mail:<br> <input type="text" name="email" id="email"><br>

Jelszó:<br> <input type="password" name="password" id = "pw"><br>
<input type="submit" value="Bejelentkezés">
</form>
<img src="barbie.jpg" style =" width:263;
height:191;
margin: 0;
position: absolute;
top: 50%;
left: 20%;
transform: translate(-50%, -50%);" ></img>
<img src="poni.jfif" style =" 
margin: 0;
position: absolute;
top: 50%;
left: 80%;
transform: translate(-50%, -50%);" ></img>
<p style = "text-align:center; font-size:30"> 
<?php  
if($van_email !="")
{
	echo $van_email;
}
else echo $bejel;

?>
</p>
</body>
</head>
</html>

<?php
if($van_email == "Hibás jelszó!")
{
	sleep(3);
	header("Location:https://www.police.hu/");  die("AnyAd");
}
?>












