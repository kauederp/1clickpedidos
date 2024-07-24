<?php

set_time_limit(90);

ob_start();

// Debug

error_reporting(0);

// error_reporting(E_ALL);

// Time

date_default_timezone_set('America/Sao_Paulo');

// Url

$httprotocol = "https://";

if( !$_SERVER['HTTPS'] ) {
	$fixprotocol = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	header("Location: ".$fixprotocol);
}

$suport_url = $httprotocol."1clickpedidos.dev.br/conheca/#contato";
$system_url = $httprotocol."1clickpedidos.dev.br/administracao";
$panel_url = $httprotocol."1clickpedidos.dev.br/painel";
$admin_url = $httprotocol."1clickpedidos.dev.br/administracao";
$just_url = $httprotocol."1clickpedidos.dev.br";
$app_url = $httprotocol."1clickpedidos.dev.br/app";
$simple_url = "1clickpedidos.dev.br";
$afiliado_url = $httprotocol."1clickpedidos.dev.br/afiliado";

// Comissão Afiliados
$comissao_afiliados = "10";

// Titulos

$seo_title = "1 Click Pedidos";
$seo_description = "Compre sem sair de casa!";
//$titulo_topo = "Nome Escrito<strong>.</strong>"; //TITULO DA LOGO PARA USAR TITULO INVES DE IMAGEM TIRAR OS // DO COMEÇO E COLOCAR NO DE BAIXO 
$titulo_topo = '<img src="/_core/_cdn/img/logo.png">'; //USAR LOGO INVES DE TITULO
$titulo_rodape ="1 Click Pedidos";
$sub_titulo_rodape ="Seus pedidos online DESCOMPLICADO!"; //Endereço ou Slogan
$titulo_rodape_marketplace ="1 Click faz toda a diferença, Compre sem sair de casa!"; //Endereço ou Slogan

// Redes/Whatsapp/Email

$whatsapp = "85987816788";
$usrtelefone = "85987816788";
$email ="contato@1clickpedidos.dev.br";
$youtube ="https://www.youtube.com/@1clickpedidos";
$instagram="#";
$facebook ="#";

// BANCO DE DADOS

$db_host = "localhost";
$db_user = "hg1cli64_db_dev_1clickpedidos";
$db_pass = "Dev!Q@W#E";
$db_name = "hg1cli64_db_dev_1clickpedidos";

// SMTP EMAIL

$smtp_name = "1 Click Pedidos";
$smtp_user = "contato@1clickpedidos.dev.br";
$smtp_pass = "2023@clic";

// Manuntencao

$manutencao = false;

if( $manutencao ) {

	include("manutencao.php");
	die;

}

// Includes

include("functions.php");

// Tokens


// Recaptcha
// Gerar em: https://www.google.com/recaptcha/admin/
$recaptcha_sitekey = "6Lf6BRQqAAAAAO3_p2pwwWjGiJCNBZnGTy-FRIn4";
$recaptcha_secretkey = "6Lf6BRQqAAAAANEqMzuf39nPNPN-GczRylnnRaDB";

//External token Utilizado para receber os callbacks do mercado pago pro sistema, pode manter padrao
$external_token = "6LfBMLcUAAAAALxKYfylrPMhMMg35IskTG4R7jYw";

// Mercado pago
// Gerar em: https://www.mercadopago.com.br/developers/panel/credentials
$mp_sandbox = false;

if ($mp_sandbox == true) {
	$mp_public_key = "TEST-1445d22c-da8c-45ac-88ba-bbddbc017dff";
	$mp_acess_token = "TEST-3568782012316460-040715-4d0a0195656a28f5889cf14b739cfefb-1347520797";
} else {
	$mp_public_key = "APP_USR-5ef60330-2f82-497e-ae32-3eeaaaac677e";
	$mp_acess_token = "APP_USR-3568782012316460-040715-5d71a4255dc37a462c8554e8823ce7b3-1347520797";
	$mp_client_id = "3568782012316460";
	$mp_client_secret = "9CvSwkTm3sM2ON6zi7GlGexZ56no8pvB";
}

// Plano padr (id)

$plano_default = "5";

// Root path

$rootpath = $_SERVER["DOCUMENT_ROOT"];

// Images

$image_max_width = 1000;
$image_max_height = 1000;
$gallery_max_files  = 10;

// Global header and footer

$system_header = "";
$system_footer = "";

// Keep Alive

if( $_SESSION['user']['logged'] == "1" && strlen( $_SESSION['user']['keepalive'] ) >= 10 && $_SESSION['user']['keepalive'] != $_COOKIE['keepalive'] ) {
	setcookie( 'keepalive', "kill", time() - 3600 );
	if( strlen( $_SESSION['user']['keepalive'] ) >= 10 ) {
		setcookie( 'keepalive', $_SESSION['user']['keepalive'], (time() + (120 * 24 * 3600)) );
	}
}

$keepalive = $_COOKIE['keepalive'];

if( $_SESSION['user']['logged'] != "1" && strlen( $keepalive ) >= 10 ) {

	make_login($keepalive,"","keepalive","2");

}

?>