<?php
// deploy.php - se ejecuta al recibir el webhook
$log = "deploy.log";
file_put_contents($log, "Webhook recibido a las " . date('Y-m-d H:i:s') . "\n", FILE_APPEND);

$salida = [];
exec('cd /home/salkantay/cuscosalkantaytrek.com && git pull origin main 2>&1', $salida);
file_put_contents($log, implode("\n", $salida) . "\n", FILE_APPEND);
?>

