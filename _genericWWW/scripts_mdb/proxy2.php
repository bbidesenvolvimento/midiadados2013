<?php
// Com exportação

$cat = $_GET['cat'];
$sub = $_GET['sub'];

$server = "srv.bbi.net.br";
$user = "midiadados";


function get_trusted_url($user,$server,$view_url) {
	$params = ':embed=yes&:toolbar=yes';
	$ticket = get_trusted_ticket($server, $user, $_SERVER['REMOTE_ADDR']);

	if($ticket > 0) {
		return "https://$server/trusted/$ticket/$view_url?$params";
	}else{ 
		return "Erro :".$_SERVER['REMOTE_ADDR'];
	}
}

function get_trusted_ticket($wgserver, $user, $remote_addr) {
  $params = array(
    'username' => $user,
    'client_ip' => $remote_addr
  );
  return http_parse_message(http_post_fields("http://$wgserver/trusted", $params))->body;
}
 
switch ($cat) {
	case 'mercadoDemografia':
		header("Location:". get_trusted_url($user,$server,'views/'.$sub));
		break;
	case 'adHoc':
		header("Location:".get_trusted_url($user,$server,'views/'.$sub));
		break;
	case 'televisao':
		header("Location:".get_trusted_url($user,$server,'views/'.$sub));
		break;
	case 'tvAssinatura':
		header("Location:". get_trusted_url($user,$server,'views/'.$sub));
		break;
	case 'radio':
		header("Location:". get_trusted_url($user,$server,'views/'.$sub));
		break;
	case 'revista':
		header("Location:". get_trusted_url($user,$server,'views/'.$sub));
		break;
	case 'jornal':
		header("Location:". get_trusted_url($user,$server,'views/'.$sub));
		break;
	case 'entretenimento':
		header("Location:". get_trusted_url($user,$server,'views/'.$sub));
		break;
	case 'midiaOutHome':
		header("Location:". get_trusted_url($user,$server,'views/'.$sub));
		break;
	case 'midiaDigital':
		header("Location:". get_trusted_url($user,$server,'views/'.$sub));
		break;
	case 'custoMidia':
		header("Location:". get_trusted_url($user,$server,'views/'.$sub));
		break;
	case 'americaLatina':
		header("Location:". get_trusted_url($user,$server,'views/'.$sub));
		break;
	case 'midiaInternacional':
		header("Location:". get_trusted_url($user,$server,'views/'.$sub));
		break;
 	default:
		break;
} 