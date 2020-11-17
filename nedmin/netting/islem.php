<?php 


ob_start();
session_start();

include 'baglan.php';

if (isset($_POST['ayarkaydet'])) {
	
	$id=0;

	$ayarkaydet=mysqli_query($baglan,"UPDATE ayarlar SET ayar_title='".$_POST['ayar_title']."',ayar_description='".$_POST['ayar_description']."',ayar_keywords='".$_POST['ayar_keywords']."',ayar_telefon='".$_POST['ayar_telefon']."',ayar_facebook='".$_POST['ayar_facebook']."',ayar_twitter='".$_POST['ayar_twitter']."',ayar_footer='".$_POST['ayar_footer']."',ayar_adres='".$_POST['ayar_adres']."',ayar_mail='".$_POST['ayar_mail']."',ayar_fax='".$_POST['ayar_fax']."' WHERE ayar_id='$id'");

	
	if(mysqli_affected_rows($baglan)){
		header("Location:../ayarlar.php?durum=ok");
	}else {
		header("Location:../ayarlar.php?durum=no");
	}

}


if (isset($_POST['loggin'])) {
	
	$admin_kadi=$_POST['admin_kadi'];
	$admin_sifre=$_POST['admin_sifre'];

	if ($admin_kadi && $admin_sifre) {
		
		$sorgula=mysqli_query($baglan, "SELECT * from admin WHERE admin_kadi='$admin_kadi' and admin_sifre='$admin_sifre' ");
		$verisay=mysqli_num_rows($sorgula);

		if ($verisay>0) {
			$_SESSION['admin_kadi']=$admin_kadi;

			header('Location:../index.php');
		} else {
			header('Location:../login.php?login=no');
		}
	}
}

if (isset($_POST['menukaydet'])) {
	$menuekle=mysqli_query($baglan, "INSERT INTO menuler (menu_ad,menu_link) VALUES ('".$_POST['menu_ad']."','".$_POST['menu_link']."')");

	if (mysqli_affected_rows($baglan)) {

		header("Location:../menu-ekle.php?durum=ok");
	}
	else
	{
		header("Location:../menu-ekle.php?durum=no");
	}
}



if (isset($_POST['menuduzenle'])) {
	
	
	$menu_id=$_POST['menu_id'];

	$menuduzenle=mysqli_query($baglan,"UPDATE menuler SET menu_ad='".$_POST['menu_ad']."',menu_link='".$_POST['menu_link']."' WHERE menu_id='$menu_id'");

	
	if(mysqli_affected_rows($baglan))
	{
		header("Location:../menu-duzenle.php?durum=ok&menu_id=$menu_id");
	}
	else {
		header("Location:../menu-duzenle.php?durum=no&menu_id=$menu_id");
	}

}


if (isset($_GET['menusil']) && $_GET['menusil'] == "ok") {
	$menusil=mysqli_query($baglan,"DELETE FROM menuler where menu_id='".$_GET['menu_id']."'");

	if (mysqli_affected_rows($baglan)) {
		header('Location:../menuler.php?durum=ok');
	}
	else
	{
		header('Location:../menuler.php?durum=no');
	}
}


if (isset($_POST['slider_ekle']) && !empty($_FILES['slider_gorsel']['size'])) {
	$sliderImage = $_FILES['slider_gorsel'];
	$pathInfo = pathinfo($sliderImage['name']);
	
	if (!in_array($pathInfo['extension'], ["png","jpg","jpeg"])) {
    	redirectUrl('slider-ekle.php', ['durum' => 'invalid_extension']);
	}


    $uploads_dir = '../../uploads';

    if (!is_dir($uploads_dir)) {
    	mkdir($uploads_dir, '0777', true);
    }

	$tmp_name = $sliderImage['tmp_name'];
	$name = $sliderImage['name'];
	$insertQuery = "INSERT INTO slider (slider_resimyol,slider_url,slider_sira,slider_ad) values ('%s', '%s', '%s', '%s')";


	$benzersizad=rand(20000, 32000).rand(20000, 32000);
	$insertQuery = sprintf(
		$insertQuery, 
		"uploads".$benzersizad.$name, 
		$_POST['slider_url'], 
		$_POST['slider_sira'],
		$_POST['slider_ad']
	);
   
    if (queryExecute($insertQuery)) {
    	@move_uploaded_file($tmp_name, $uploads_dir.'/'.$benzersizad.$name);
    	redirectUrl('slider-ekle.php', ['durum' => 'ok']);
    } else {
    	redirectUrl('slider-ekle.php', ['durum' => 'no']);
    }
}

?>