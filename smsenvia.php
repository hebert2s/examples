<html>
<body>
<?php
include_once ("smscomtele.php");
date_default_timezone_set('America/Sao_Paulo');
$hora1 = date("H:i:s");
$hoje= date("Ymd"); 
$ano= date("Y"); 

$agora= date("d/m/Y H:i "); 
$date_hoje_mysql = date("Y-m-d H:i:s"); 

$enviados=0;
$erros=0;
$lidos=0;
$saldo=0;

/* 
while ($l = mssql_fetch_row($result)) {
  $ddd=$l[0];
  $fone=$l[1];
  if (strlen($fone) == 8 and is_numeric($fone) and $ddd == "31") {
  	$lidos++;
  	$dddfone="$ddd$fone";

	$data = array( 'content' => $msg, 'sender' => 'TERRANOVA', 'receivers' => $dddfone );
      
	$retorno = comteleenvia($chave_bhfor, $data);
	if ($retorno[status])   // sucesso
        {
         	$enviados++;	
        }
	else
        {
                echo "<BR>Erro: verifique se telefone esta correto: Fone=$dddfone";
                $erros++;
        }
  }
}
*/

$ddd=31;
$fone=982951049;
$msg = "hora=$date_hoje_mysql  mensagem: $agora TESTE envio da mensagem para celular $fone  - valor  300 ";
if (strlen($fone) == 9 and is_numeric($fone) and $ddd == "31") {
  $lidos++;
  $dddfone="$ddd$fone";
  $data = array( 'content' => $msg, 'sender' => 'TERRANOVA', 'receivers' => $dddfone );
  $retorno = comteleenvia($chave_terranova, $data);
  echo "<BR>retorno=<BR>"; print_r($retorno); echo "<BR>";
  if ($retorno['status'])   // sucesso
    {
      $enviados++;  
  } else {
      echo "<BR>Erro: verifique se telefone esta correto: Fone=$dddfone";
      $erros++;
    }
}


echo "<BR>OK.  SMS Enviados  Lidos=$lidos   Enviados=$enviados    Erros=$erros ";




### envio SMS para hebert com Saldo
if ($saldo==900) {
 $data = array( 'content' => $msgsaldo, 'sender' => 'TERRANOVA', 'receivers' => '31982951049' );
 $retorno = comteleenvia($chave_terranova, $data);
}




?>
</body>
</html>
