<?php

include("header.php");
include_once('nav.php');
// require('main.php');
// require_once('footer.php');

echo "<h3>Fungsi Validasi</h3>";
echo "<strong>empty()</strong><br/>";

function testEmpty($nilai="")
{
    if(empty($nilai)) {
        echo "Variabel tidak memiliki nilai <br/>";
    } else {
        echo "Nilai pada variabel adalah ".$nilai."<br/>";
    }
}

testEmpty();
testEmpty(10);
testEmpty("");
testEmpty(null);
testEmpty("Helloo....");

echo "<br/>";
echo "<strong>isset()</strong><br/>";

function testIsset($nilai=null) {
    if(isset($nilai)) {
        if (empty($nilai)) {
            echo "Nilai empty <br/>";
        } else {
            echo "nilai adalah ".$nilai."<br/>";
        }
    } else {
        echo "Variable belum terbentuk <br/>";
    }
}

$val = "";
testIsset();
testIsset($val);
testIsset(10);

echo "<br/>";
echo "<strong>unset()</strong><br/>";

function testUnset($nilai=null)
{
    if(isset($nilai)) {
        echo "Variabel masih terbentuk <br/>";
    } else {
        echo "Variabel sudah tidak tersedia <br/>";
    }
}

$valx = '';
$data=100;
testUnset();
testUnset($valx);
testUnset($data);
unset($data);
testUnset(@$data);

echo "<h3>Fungsi String</h3>";
$teks = 'universitas suryakancana';
echo substr($teks, 0);
echo "<br/>";
echo substr($teks, 0, 11);
echo "<br/>";
echo substr($teks, 11);
echo "<br/>";
echo substr($teks, -12);
echo "<br/>";
echo substr($teks, 16, 4); // akan
echo "<br/>";
echo substr($teks, -8, 4); // akan
echo "<br/>";
echo substr($teks, 0, 17); // Universitas Surya
echo "<br/>";
echo substr($teks, 0, -7); // Universitas Surya
echo "<br/>";
echo strstr($teks, 'Surya');
echo "<br/>";
echo str_replace('Suryakancana', 'Padjajaran', $teks);
echo "<br/>";
$cari = array(':tandatanya', ':tandaseru', ':tandapanah');
$ganti = array('(?)', '(!)', '(-->)');
$teks2 = "Ini adalah Tanda Tanya :tandatanya <br/>
Ini adalah Tanda Seru :tandaseru <br/>
Ini adalah Tanda Panah :tandapanah <br/>";
echo $teks2;
echo "<br/>";
echo str_replace($cari, $ganti, $teks2);
echo "<br/>";
echo strtoupper($teks);
echo "<br/>";
echo strtolower($teks);
echo "<br/>";
echo ucfirst($teks);
echo "<br/>";
echo ucwords($teks);

echo "<h3>Fungsi String</h3>";
// explode
$part = explode(" ", $teks2);
var_dump($part);
echo "<br/>";
echo $part[4];
// implode
echo "<br/>";
echo implode("_", $part);
echo "<br/>";
echo strlen($teks2);
echo "<br/>";

function modifikasiString($string){
    $length = strlen($string);
    $newText = '';

    for ($i=0; $i < $length; $i++) { 
        if($i % 2) {
            $newText .= strtoupper(substr($string, $i, 1));
        } else {
            $newText .= strtolower(substr($string, $i, 1));
        }
    }
    
    $vokal = array('a', 'A', 'i', 'I', 'e', 'E', 'o', 'O');
    $angka = array('4', '4', '1', '1', '3', '3', '0', '0');

    echo str_replace($vokal, $angka, $newText);
}

modifikasiString('Lorem ipsum dolor sit amet');
echo "<br/>";
modifikasiString('universitas Suryakancana');