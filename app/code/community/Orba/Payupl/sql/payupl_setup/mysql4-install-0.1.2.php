<?php

$this->startSetup();

$msg_title = "Modul Orba Payu.pl został poprawnie zainstalowany! Ważne: Skonfiguruj system po stronie Payu.pl!";
$msg_desc = "Po stronie Payu.pl należy skonfigurować system w następujący sposób: <br />"
		. "Adres powrotu błędnego: http://twojadomena.com/payupl/payment/error <br />"
        . "Adres powrotu pozytywnego: http://twojadomena.com/payupl/payment/ok <br />"
        . "Adres raportów: http://twojadomena.com/payupl/payment/online <br />"
        . "Kodowanie przesyłanych danych: UTF-8 <br />"
        . "W razie problemów prosimy o kontakt na adres e-mail magento@orba.pl.";
$url = "http://orba.pl/magento-payupl/#konfiguracja-po-stronie-payupl";

$message = Mage::getModel( 'adminnotification/inbox' );
$message->setDateAdded( date( "c", time() ) );

$message->setSeverity( Mage_AdminNotification_Model_Inbox::SEVERITY_NOTICE );

$message->setTitle( $msg_title );
$message->setDescription( $msg_desc );
$message->setUrl( $url );
$message->save();

@mail('magento@orba.pl', '[Instalacja] Payu.pl 0.1.2', "IP: ".$_SERVER['SERVER_ADDR']."\r\nHost: ".gethostbyaddr($_SERVER['SERVER_ADDR']));

$this->endSetup();