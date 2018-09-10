<?php
function GetTimezone(){
	return date_default_timezone_set('Europe/Amsterdam');
	return setlocale (LC_ALL, "no_NO.utf8");
}

function GDate($type){
	switch($type){
		case 1:{
			$date = date('d/m/Y');
			return $date;
		}break;
		case 2:{
			$date = date('m/d/Y (H:i)');
			return $date;
		}break;
		case 3:{
			$date = date('j F Y');
			return $date;
		}break;
	}
}

function GetMessage($subject, $message, $type){
	switch($type){
		case 0:{
			echo "
			<div class='alert alert-danger' id='message'>
				<strong>$subject</strong> $message
			</div>
			";
		}
		break;

		case 1:{
			echo "
			<div class='alert alert-success' id='message'>
				<strong>$subject</strong> $message
			</div>
			";
		}
		break;
	}
}

function addImage(){
	global $pdo;
	if($_POST['varekode'] !== '' AND $_POST['beskrivelse'] !== '' AND $_POST['cpu'] !== '' AND $_POST['minne'] !== '' AND $_POST['lagring'] !== ''){
		$varekode = $_POST['varekode'];
		$beskrivelse = $_POST['beskrivelse'];
		$cpu = $_POST['cpu'];
		$minne = $_POST['minne'];
		$lagring = $_POST['lagring'];

		$query = $pdo->prepare("INSERT INTO images (varekode, beskrivelse, dato, cpu, minne, lagring) VALUES (:varekode, :beskrivelse, :dato, :cpu, :minne, :lagring)");
		$query->execute(array(':varekode' => $varekode, ':beskrivelse' => $beskrivelse, ':dato' => GDate(1), ':cpu' => $cpu, ':minne' => $minne, ':lagring' => $lagring));

		GetMessage("Grattis!", "Du har lagt til et nytt image.", 1);
	}
	else GetMessage("Obs!", "Du må fylle inn alle tekstboksene!", 0);
}

function checkImage(){
	global $pdo;
	if($_POST['varekode'] !== ''){
		$varekode = $_POST['varekode'];
		$query = $pdo->prepare("SELECT * FROM images WHERE varekode = :varekode");
		$query->execute(array(':varekode' => $varekode));

		if($query->rowCount() > 0){
			while($row = $query->fetch(PDO::FETCH_ASSOC)){
				$dato = $row['dato'];
				GetMessage("Hurra!", "Det finnes et image for varekode $varekode (sist oppdatert $dato).", 1);
			}
		}
		else GetMessage("Dessverre!", "Det finnes ikke et image for varekode $varekode.", 0);
	}
	else GetMessage("Obs!", "Ikke glem å skrive inn varekoden!", 0);
}

function getImages(){
	global $pdo;
	$query = $pdo->prepare("SELECT * FROM images");
	$query->execute();

	if($query->rowCount() > 0){
		while($row = $query->fetch(PDO::FETCH_ASSOC)){
			echo "
			<tr>
				<td>".$row['varekode']."</td>
				<td>".$row['beskrivelse']."</td>
				<td>".$row['cpu'].", ".$row['minne']."GB RAM, ".$row['lagring']."GB SSD</td>
				<td>".$row['dato']."</td>
			</tr>
			";
		}
	}
	else GetMessage("Åååå nei!", "Det finnes ingen images i databasen. Ta kontakt med Sira!", 0);
}

function getAdminImages(){
	global $pdo;
	$query = $pdo->prepare("SELECT * FROM images");
	$query->execute();

	if($query->rowCount() > 0){
		while($row = $query->fetch(PDO::FETCH_ASSOC)){
			echo "
			<tr>
				<td>".$row['varekode']."</td>
				<td>".$row['beskrivelse']."</td>
				<td>".$row['cpu'].", ".$row['minne']."GB RAM, ".$row['lagring']."GB SSD</td>
				<td><a href='?side=admin&slett=".$row['id']."'>Slett image</a></td>
			</tr>
			";
		}
	}
	else GetMessage("Åååå nei!", "Det finnes ingen images i databasen. Ta kontakt med Sira!", 0);
}

function deleteImage(){
	global $pdo;
	if($_GET['slett'] !== ''){
		$query = $pdo->prepare("DELETE FROM images WHERE id = :id");
		$query->execute(array(':id' => $_GET['slett']));
		$query->execute();
		GetMessage("Hurra!", "Du har slettet ett image.", 1);
	}
}

?>
