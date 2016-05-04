<?php
$loc= $_POST['csv'];
$row = 1;
if (($handle = fopen("$loc", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        $row++;
       
        $lat=$data[0];
	$dd=$data[1];
	$mm=$data[2];
	$hour=$data[3];
        if($mm==1)
$n=$dd;
elseif($mm==2) 
$n=31+$dd;
elseif($mm==3)
$n=59+$dd;
elseif($mm==4)
$n=90+$dd;
elseif($mm==5)
$n=120+$dd;
elseif($mm==6)
$n=151+$dd;
elseif($mm==7)
$n=181+$dd;
elseif($mm==8)
$n=212+$dd;
elseif($mm==9)
$n=243+$dd;
elseif($mm==10)
$n=283+$dd;
elseif($mm==11)
$n=314+$dd;
else
$n=334+$dd;
$hh=15*($hour-12);
$d=asin(sin(deg2rad(23.5))*sin(deg2rad(0.9863*($n-81))));
$sd1=12-180*acos(-tan(deg2rad($lat))*tan($d))/47;
$sd2=12+180*acos(-tan(deg2rad($lat))*tan($d))/47;

if ($hour>$sd1 && $hour<$sd2)
{
$z=sin(deg2rad($lat))*sin($d)+cos(deg2rad($lat))*cos($d)*cos(deg2rad($hh));
$i=1000*$z;
if($i<=0)
echo ("0");
else 
echo ("$i");
}
else
echo ("Time enter is not in solar day");

    }
    fclose($handle);
	$fname = 'myCSV.csv';
$fp = fopen($fname,'w');
fwrite($fp,$i);
fclose($fp);
header('Content-type: application/csv');
header("Content-Disposition: inline; filename=".$fname);
readfile($fname);

}





?> 