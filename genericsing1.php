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

    $nt = str_replace("™","&#8482;",$name);
    $nt = str_replace("ƒ","&#402;",$nt);


$level = $char['Level'];
$clan = $claninfo['Name'];


$ct = str_replace("™","&#8482;",$clan);
$ct = str_replace("ƒ","&#402;",$ct);
$ct = str_replace("!","&#33;",$ct);
$ct = str_replace('"','&#34;',$ct);
$ct = str_replace("#","&#35;",$ct);
$ct = str_replace("$","&#36;",$ct);
$ct = str_replace("%","&#37;",$ct);
$ct = str_replace("&","&#38;",$ct);
$ct = str_replace("'","&#39;",$ct);
$ct = str_replace("(","&#40;",$ct);
$ct = str_replace(")","&#41;",$ct);
$ct = str_replace("*","&#42;",$ct);
$ct = str_replace("+","&#43;",$ct);
$ct = str_replace(",","&#44;",$ct);
$ct = str_replace("^","&#94;",$ct);
$ct = str_replace("_","&#95;",$ct);
$ct = str_replace("`","&#96;",$ct);
$ct = str_replace("~","&#126;",$ct);
$ct = str_replace("¡","&#161;",$ct);
$ct = str_replace("¢","&#162;",$ct);
$ct = str_replace("£","&#163;",$ct);
$ct = str_replace("¤","&#164;",$ct);
$ct = str_replace("¥","&#165;",$ct);
$ct = str_replace("¦","&#166;",$ct);
$ct = str_replace("§","&#167;",$ct);
$ct = str_replace("¨","&#168;",$ct);
$ct = str_replace("©","&#169;",$ct);
$ct = str_replace("ª","&#170;",$ct);
$ct = str_replace("«","&#171;",$ct);
$ct = str_replace("¬","&#172;",$ct);
$ct = str_replace("®","&#174;",$ct);
$ct = str_replace("¯","&#175;",$ct);
$ct = str_replace("°","&#176;",$ct);
$ct = str_replace("±","&#177;",$ct);
$ct = str_replace("²","&#178;",$ct);
$ct = str_replace("³","&#179;",$ct);
$ct = str_replace("´","&#180;",$ct);
$ct = str_replace("µ","&#181;",$ct);
$ct = str_replace("¶","&#182;",$ct);
$ct = str_replace("·","&#183;",$ct);
$ct = str_replace("¸","&#184;",$ct);
$ct = str_replace("¹","&#185;",$ct);
$ct = str_replace("º","&#186;",$ct);
$ct = str_replace("»","&#187;",$ct);
$ct = str_replace("¼","&#188;",$ct);
$ct = str_replace("½","&#189;",$ct);
$ct = str_replace("¾","&#190;",$ct);
$ct = str_replace("¿","&#191;",$ct);


$exp = $char['XP'];
$sex = $char['Sex'];
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
case 252:
        $ugradeid = "Developer";
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
	case 4:
        $ugradeid = "Donador";
    break;
	case 5:
        $ugradeid = "Donador";
    break;
	case 6:
        $ugradeid = "Donador";
    break;
	case 7:
        $ugradeid = "Donador";
    break;
	case 8:
        $ugradeid = "Donador";
    break;
   case 9:
        $ugradeid = "Donador";
    break;
	case 10:
        $ugradeid = "Donador";
    break;
	case 11:
        $ugradeid = "Donador";
    break;
	case 12:
        $ugradeid = "Donador";
    break;
	case 13:
        $ugradeid = "Donador";
    break;
	case 14:
        $ugradeid = "Donador";
    break;
	case 15:
        $ugradeid = "Donador";
    break;
	case 16:
        $ugradeid = "Donador";
    break;
	case 17:
        $ugradeid = "Donador";
    break;
	case 18:
        $ugradeid = "Donador";
    break;
	case 19:
        $ugradeid = "Donador";
    break;
}

$preto = imagecolorallocate($i, 0,0,0);
$azul = imagecolorallocate($i, 255,255,255);
$azul2 = imagecolorallocate($i,30,200,250);
// Fuente
$fonte = "sacker.ttf";


imagettftext($i, 10, 0, 70, 19,$azul,$fonte,$nt);
imagettftext($i, 10, 0, 44, 43,$azul,$fonte,$ct);
imagettftext($i, 10, 0, 48, 67,$azul,$fonte,$level);
imagettftext($i, 10, 0, 81, 91,$azul2,$fonte,$exp);
imagettftext($i, 10, 0, 45, 115,$azul,$fonte,$sex);

imagettftext($i, 10, 0, 53, 139,$azul,$fonte,$ugradeid);
imagepng($i);
imagedestroy($i);

//Fix by FireWork™
?>