<?php
define('DEFAULT_TITLE', 'FESDIS - Solicitud de créditos');// titulo general para toda la pagina

$config = array(); //

$config ['production']= array();
$config ['production']['db'] = array();
$config ['production']['db']['host'] ='localhost';
$config ['production']['db']['name'] ='alquiler_creditos';
$config ['production']['db']['user'] ='alquiler_omega';
$config ['production']['db']['password'] ='admin.2008';
$config ['production']['db']['port'] ='3306';
$config ['production']['db']['engine'] ='mysql';

$config ['staging']= array();
$config ['staging']['db'] = array();
$config ['staging']['db']['host'] ='localhost';
$config ['staging']['db']['name'] ='omegasol_fendesa_creditos';
$config ['staging']['db']['user'] ='omegasol_admin';
$config ['staging']['db']['password'] ='admin.2008';
$config ['staging']['db']['port'] ='3306';
$config ['staging']['db']['engine'] ='mysql';

$config ['development']= array();
$config ['development']['db'] = array();
$config ['development']['db']['host'] ='localhost';
$config ['development']['db']['name'] ='fonkoba_creditos';
$config ['development']['db']['user'] ='root';
$config ['development']['db']['password'] = 'root';
$config ['development']['db']['port'] ='3306';
$config ['development']['db']['engine'] ='mysql';

