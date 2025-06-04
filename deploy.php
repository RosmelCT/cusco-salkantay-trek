<?php
// deploy.php - ejecuta git pull al recibir webhook de GitHub
$log = "deploy.log";

// Escribe en el archivo log la hora en que se ejecutó
file_put_contents($log, "Webhook recibido a las " . date('Y-m-d H:i:s') . "\n", FILE_APPEND);

// Ejecuta git pull con la clave SSH explícita
$salida = [];
exec('cd /home/salkantay/cuscosalkantaytrek.com && GIT_SSH_COMMAND="ssh -i ~/.ssh/id_rsa -o StrictHostKeyChecking=no" git pull origin main 2>&1', $salida);

// Guarda la salida del comando en el log
file_put_contents($log, implode("\n", $salida) . "\n", FILE_APPEND);
?>

