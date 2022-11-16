<? 
/////////////////////////////////////////
//				NO TOCAR				//
//_____________________________________//
/////////////////////////////////////////

include "secure/functions.php";
include "secure/config.php";
include "secure/anti_inject.php";
include "secure/sql_check.php";
include "configsing.php";


    $cid = clean($_GET['cid']);
    $res = mssql_query_logged("SELECT * FROM Character WHERE CID = $cid");
    $char = mssql_fetch_assoc($res);
    $res2 = mssql_query_logged("SELECT * FROM ClanMember WHERE CID = '".$char['CID']."'");
    $clan = mssql_fetch_assoc($res2);
    $res3 = mssql_query_logged("SELECT * FROM Clan WHERE CLID = '".$clan['CLID']."'");
    $claninfo = mssql_fetch_assoc($res3);
	$res4 = mssql_query_logged("SELECT * FROM Account WHERE AID = '{$_SESSION['AID']}'");
    $ugid = mssql_fetch_assoc($res4);
    


    if($cid == "")
       $cid = 1;

    if($claninfo == "")
       $claninfo = "-";


header("Content-type: image/png");


$i = imagecreatefrompng($img);


$name = $char['Name'];
$level = $char['Level'];
$clan = $claninfo['Name'];
$exp = $char['XP'];
$sex = $char['Sex'];
$bounty = $char['BP'];
switch($sex)
{
    case 1:
        $sex = "Mujer";
    break;
    case 0:
        $sex = "Hombre";
    break;
   
}
$ugradeid = $ugid['UGradeID'];
switch($ugradeid)
{
    case 255:
        $ugradeid = "Administrador";
    break;
    case 254:
        $ugradeid = "Moderador";
    break;
	case 253:
        $ugradeid = "Banned";
    break;
	case 0:
        $ugradeid = "Usuario";
    break;
	case 2:
        $ugradeid = "Donador";
    break;
	case 3:
        $ugradeid = "Donador";
    break;
}

$preto = imagecolorallocate($i, 0,0,0);
$azul = imagecolorallocate($i, 255,255,255);
$azul2 = imagecolorallocate($i,30,200,250);
$red = imagecolorallocate($i,30,200,250);
// Fuente
$fonte = "sacker.ttf";


imagettftext($i, 8, 0, 70, 18,$red,$fonte,$name);
imagettftext($i, 8, 0, 46, 42,$azul,$fonte,$clan);
imagettftext($i, 8, 0, 46, 66,$azul,$fonte,$level);
imagettftext($i, 8, 0, 54, 90,$azul,$fonte,$ugradeid);
imagettftext($i, 8, 0, 227, 18,$azul2,$fonte,$exp);
imagettftext($i, 8, 0, 195, 66,$azul,$fonte,$sex);
imagettftext($i, 8, 0, 205, 42,$azul,$fonte,$bounty);

imagepng($i);
imagedestroy($i);

//Fix by FireWork™
?>