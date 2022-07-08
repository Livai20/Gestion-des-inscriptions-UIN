 <?php
require_once('cn.php');
if(isset($_GET['mat'])){
	$mat=$_GET['mat']; echo $mat;
$aa=$cn->query("SELECT * from versement where idins= $mat");
$bb=$aa->fetch();
}
if (isset($_GET['ide'])) {
	$id=$_GET['ide'];
	$cr=$cn->query("SELECT * from etudiant where ide= $id");
}
extract($_POST);
if (!empty($_POST['enregistrer']))
{
	if ($_POST['enregistrer']=='enregistre')
	{
		/*$d=$cn->query("SELECT * from etudiant where nom=$nom and prenom=$prenom and datenaiss=$datenaiss");
		if ($d->rowCount() > 0) {
			header('location:inscrireetud.php?exist=doublon');
		}else{*/
		if ($photo=="") {
		$cr=$cn->prepare("INSERT INTO etudiant(nom,prenom,datenaiss,lieunaiss,nationalite,genre,photo) VALUES(?,?,?,?,?,?,'user.jpg')");
		$cr->execute([$nom,$prenom,$datenaiss,$lieunaiss,$nationalite,$genre]);
		}
		else{
			$cr=$cn->prepare("INSERT INTO etudiant(nom,prenom,datenaiss,lieunaiss,nationalite,genre,photo) VALUES(?,?,?,?,?,?,?)");
			$cr->execute([$nom,$prenom,$datenaiss,$lieunaiss,$nationalite,$genre,$photo]);
		}
		echo $nom;
		header("location:succesinsc.php?n=$nom");
	}
	elseif ($_POST['enregistrer']=='inscrire')
	{
		if ($filiere=='2' or $filiere=='3' or $filiere=='5' or $filiere=='7' or $filiere=='13' or $filiere=='14'){
			if ($niveau != 5) {
				header("location:confirmer.php?idee=$ide&error=niveau5");
			}else{
				$cr=$cn->prepare("UPDATE etudiant set matricule=? WHERE ide=?");
				$cr->execute([$matricule,$ide]);
				$cr=$cn->prepare("INSERT INTO versement(montant,niveau,matricule,ide,idfil,idins) VALUES(?,?,?,?,?,?)");
				$cr->execute([$montant,$niveau,$matricule,$ide,$filiere,$idins]); 
				if (date(m)>01){
				    $a=date('Y');
				    $b=$a+1;
				    $c=$a.'-'.$b;
				    echo $c;
				}
				else{
				    $a=date('Y');
				    $b=$a-1;
				    $c=$b.'-'.$a;
				    echo $c;
				}
				$cr=$cn->prepare("INSERT INTO inscrire(idniv,anneacad,valider,matricule,idfil,ide) VALUES(?,?,'Oui',?,?,?)");
				$cr->execute([$niveau,$c,$matricule,$filiere,$ide]);
				header('location:success.php');
			}
		}
		elseif ($filiere=='4' ){
			if ($niveau != 6) {
				header("location:confirmer.php?idee=$ide&error=niveau6");
			}else{
				$cr=$cn->prepare("UPDATE etudiant set matricule=? WHERE ide=?");
				$cr->execute([$matricule,$ide]);
				$cr=$cn->prepare("INSERT INTO versement(matricule,ide,niveau,montant,idins,idfil) VALUES(?,?,?,?,?,?)");
				$cr->execute([$matricule,$ide,$niveau,$montant,$idins,$filiere]);
				if (date(m)>01){
				    $a=date('Y');
				    $b=$a+1;
				    $c=$a.'-'.$b;
				    echo $c;
				}
				else{
				    $a=date('Y');
				    $b=$a-1;
				    $c=$b.'-'.$a;
				    echo $c;
				}
				$cr=$cn->prepare("INSERT INTO inscrire(idniv,anneacad,valider,matricule,idfil,ide) VALUES(?,?,'Oui',?,?,?)");
				$cr->execute([$niveau,$c,$matricule,$filiere,$ide]);
				header('location:success.php');
			}
		}
		elseif ($filiere=='1' or $filiere=='6' or $filiere=='8' or $filiere=='9' or $filiere=='10' or $filiere=='11' or $filiere=='12' or $filiere=='15' or $filiere=='16' or $filiere=='17' ){
			if ($niveau >4) {
				header("location:confirmer.php?idee=$ide&error=niveau4");
			}else{
				$cr=$cn->prepare("UPDATE etudiant set matricule=? WHERE ide=?");
				$cr->execute([$matricule,$ide]);
				$cr=$cn->prepare("INSERT INTO versement(matricule,ide,niveau,montant,idins,idfil) VALUES(?,?,?,?,?,?)");
				$cr->execute([$matricule,$ide,$niveau,$montant,$idins,$filiere]);
				if (date(m)>01){
				    $a=date('Y');
				    $b=$a+1;
				    $c=$a.'-'.$b;
				    echo $c;
				}
				else{
				    $a=date('Y');
				    $b=$a-1;
				    $c=$b.'-'.$a;
				    echo $c;
				}
				$cr=$cn->prepare("INSERT INTO inscrire(idniv,anneacad,valider,matricule,idfil,ide) VALUES(?,?,'Oui',?,?,?)");
				$cr->execute([$niveau,$c,$matricule,$filiere,$ide]);
				header('location:success.php');
			}
		}
	}
	elseif ($_POST['enregistrer']=='modifier')
	{	
		if ($filiere=='2' or $filiere=='3' or $filiere=='5' or $filiere=='7' or $filiere=='13' or $filiere=='14'){
			if ($niveau != 5) {
				header("location:edit.php?idee=$ide&error=niveau5");
			}else{
				if ($photo=="") {		
					$cr=$cn->prepare("UPDATE etudiant SET matricule=?,nom=?,prenom=?,datenaiss=?,lieunaiss=?,nationalite=?,genre=?, photo='user.jpg' WHERE ide=?");
					$cr->execute([$matricule,$nom,$prenom,$datenaiss,$lieunaiss,$nationalite,$genre,$ide]);
				}
				else{
					$cr=$cn->prepare("UPDATE etudiant SET matricule=?,nom=?,prenom=?,datenaiss=?,lieunaiss=?,nationalite=?,genre=?, photo=? WHERE ide=?");
					$cr->execute([$matricule,$nom,$prenom,$datenaiss,$lieunaiss,$nationalite,$genre,$photo,$ide]);
				}
				$cr=$cn->prepare("UPDATE inscrire SET idniv=?, idfil=?, matricule=? where ide=? and idins=?");
				$cr->execute([$niveau,$filiere,$matricule,$ide,$idins]);
				$cr=$cn->prepare("UPDATE versement SET matricule=?,niveau=?,idfil=? where ide=? and idins=?");
				$cr->execute([$matricule,$niveau,$filiere,$ide,$idins]);
				header('location:success.php');
			}
		}elseif ($filiere=='4' ) {
			if ($niveau != 6) {
				header("location:edit.php?idee=$ide&error=niveau6");
			}else{
				if ($photo=="") {		
					$cr=$cn->prepare("UPDATE etudiant SET matricule=?,nom=?,prenom=?,datenaiss=?,lieunaiss=?,nationalite=?,genre=?, photo='user.jpg' WHERE ide=?");
					$cr->execute([$matricule,$nom,$prenom,$datenaiss,$lieunaiss,$nationalite,$genre,$ide]);}
				else{
					$cr=$cn->prepare("UPDATE etudiant SET matricule=?,nom=?,prenom=?,datenaiss=?,lieunaiss=?,nationalite=?,genre=?, photo=? WHERE ide=?");
					$cr->execute([$matricule,$nom,$prenom,$datenaiss,$lieunaiss,$nationalite,$genre,$photo,$ide]);
				}
				$cr=$cn->prepare("UPDATE inscrire SET idniv=?, idfil=?, matricule=? where ide=? and idins=?");
				$cr->execute([$niveau,$filiere,$matricule,$ide,$idins]);
				$cr=$cn->prepare("UPDATE versement SET matricule=?,niveau=?,idfil=? where ide=? and idins=?");
				$cr->execute([$matricule,$niveau,$filiere,$ide,$idins]);
				header('location:success.php');
			}
		}
		elseif ($filiere=='1' or $filiere=='6' or $filiere=='8' or $filiere=='9' or $filiere=='10' or $filiere=='11' or $filiere=='12' or $filiere=='15' or $filiere=='16' or $filiere=='17' ){
			if ($niveau >4) {
				header("location:edit.php?idee=$ide&error=niveau4");
			}
			else{
				if ($photo=="") {		
					$cr=$cn->prepare("UPDATE etudiant SET matricule=?,nom=?,prenom=?,datenaiss=?,lieunaiss=?,nationalite=?,genre=?, photo='user.jpg' WHERE ide=?");
					$cr->execute([$matricule,$nom,$prenom,$datenaiss,$lieunaiss,$nationalite,$genre,$ide]);
				}
				else{
					$cr=$cn->prepare("UPDATE etudiant SET matricule=?,nom=?,prenom=?,datenaiss=?,lieunaiss=?,nationalite=?,genre=?, photo=? WHERE ide=?");
					$cr->execute([$matricule,$nom,$prenom,$datenaiss,$lieunaiss,$nationalite,$genre,$photo,$ide]);
				}
				$cr=$cn->prepare("UPDATE inscrire SET idniv=?, idfil=?, matricule=? where ide=? and idins=?");
				$cr->execute([$niveau,$filiere,$matricule,$ide,$idins]);
				$cr=$cn->prepare("UPDATE versement SET matricule=?,niveau=?,idfil=? where ide=? and idins=?");
				$cr->execute([$matricule,$niveau,$filiere,$ide,$idins]);
				header('location:success.php');
			}
		}
	}
	elseif ($_POST['enregistrer']=='edit')
	{
		$cr=$cn->prepare("UPDATE versement SET montant=?,montant2=?,montant3=?,montant4=?,montant5=?,montant6=? WHERE idins=?");
		$cr->execute([$montant,$montant2,$montant3,$montant4,$montant5,$montant6,$mat]);
		header('location:success.php');
	}
}
elseif (isset($_POST['vers']) and !empty($_POST['vers'])){
	if ($_POST['vers']=='vers')
		{	
		if($bb['idins']==$mat){
			if ($bb['montant']==0) {
				$cr=$cn->prepare("UPDATE versement set montant=? WHERE idins=? and niveau=?");
				$cr->execute([$verser,$mat,$niveau]);
				header('location:success.php');
			}
			elseif ($bb['montant2']==0) {
				$cr=$cn->prepare("UPDATE versement set montant2=? WHERE idins=? and niveau=?");
				$cr->execute([$verser,$mat,$niveau]);
				header('location:success.php');
			}
			elseif ($bb['montant3']==0) {
				$cr=$cn->prepare("UPDATE versement set montant3=? WHERE idins=?");
				$cr->execute([$verser,$mat]);
				header('location:success.php');
			}
			elseif ($bb['montant4']==0) {
				$cr=$cn->prepare("UPDATE versement set montant4=? WHERE idins=?");
				$cr->execute([$verser,$mat]);
				header('location:success.php');
			}
			elseif ($bb['montant5']==0) {
				$cr=$cn->prepare("UPDATE versement set montant5=? WHERE idins=?");
				$cr->execute([$verser,$mat]);
				header('location:success.php');
			}
			elseif ($bb['montant6']==0) {
				$cr=$cn->prepare("UPDATE versement set montant6=? WHERE idins=?");
				$cr->execute([$verser,$mat]);
				header('location:success.php');
			}
			else{
				header('location:inscrireetud.php?msg=10');
			}
		}
	}	
}
elseif (isset($_POST['connecter'])){
	extract($_POST);
	$cr=$cn->prepare("SELECT compte,motpasse from administrateur where compte=? and motpasse=?");
	$cr->execute([$compte, $motpasse]);
	$tab=$cr->fetch();
	if ($tab['compte']==$compte && $tab['motpasse']==$motpasse){
		session_start();
		$_SESSION['compte']=$tab['compte'];
		header('location:success1.php');
	}
	else header('location:index.php?error=1');
}
?>