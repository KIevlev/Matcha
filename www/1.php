<?php
$dn = array(
    "countryName" => "RU",
    "stateOrProvinceName" => "Moscow",
    "localityName" => "Moscow",
    "organizationName" => "Matcha Project Limited",
    "organizationalUnitName" => "PHP Documentation Team",
    "commonName" => "matcha.club",
    "emailAddress" => "kika.ievlev@yandex.ru"
);

// Generate certificate
$privkey = openssl_pkey_new();
$cert    = openssl_csr_new($dn, $privkey);
$cert    = openssl_csr_sign($cert, null, $privkey, 365);

// Generate PEM file
# Optionally change the passphrase from 'comet' to whatever you want, or leave it empty for no passphrase
$pem_passphrase = 'comet';
$pem = array();
openssl_x509_export($cert, $pem[0]);
openssl_pkey_export($privkey, $pem[1], $pem_passphrase);
$pem = implode($pem);

// Save PEM file
$pemfile = '~/server.pem';
file_put_contents($pemfile, $pem);
?>
