<?php

$cat = $_GET['cat'];
$sub = $_GET['sub'];
 
$server = "srv.bbi.net.br";
$user = "midiadados";

function get_trusted_url($user,$server,$view_url) {
	$params = ':embed=yes&:toolbar=yes';
	$ticket = get_trusted_ticket($server, $user, $_SERVER['REMOTE_ADDR']);
	if($ticket > 0) {
		return "https://$server/trusted/$ticket/$view_url?$params";
	}
		else 
	return 0;
}

function get_trusted_ticket($wgserver, $user, $remote_addr) {
  $params = array(
    'username' => $user,
    'client_ip' => $remote_addr
  );
  return http_parse_message(http_post_fields("http://$wgserver/trusted", $params))->body;
}

?>
<style type="text/css">
#legenda {
    background: url("legendas.png");
    background-repeat: no-repeat;
    background-color: #ffffff;
    background-position: center center;
    background-size: contain;
    margin-left: 0px !important;
    margin-right: 0px !important;
    width: 100%;
    height: 20px;
    bottom: 0;
    position: absolute;

}
</style>

<center>
  <div id="conteudo">
   	 <iframe align="middle" src="<?php echo get_trusted_url($user,$server,'views/'.$sub); ?>" width="1024" height="815" frameborder="0"/></iframe>
   	 <div id="#legenda" style="margin-bottom:200px"><img src="legendas.png"></img></div>
   	 </div>
   	 </center>
</iframe>
</div>

<script type="text/javascript">
    console.log("start ga");
   (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-42475130-1', 'mdb2013.bbi.net.br');
    ga('send', 'pageview');
    </script>