<?php
$myfile = fopen("./ProgramLoad.txt", "r") or die("Unable to open file!");
           $arrLine = array_filter( explode(':', trim( fread($myfile,filesize("./ProgramLoad.txt"))) ) );
           fclose($myfile);
           $totalLine = count($arrLine);
 $txtLine = '';

           $from = (isset($_GET['from']) && (int)$_GET['from'] > 0) ? (int)$_GET['from'] : 1;
           $to = (isset($_GET['to']) && (int)$_GET['to'] > 0) ? (int)$_GET['to'] : 1;
           $total = (isset($_GET['total'])) ? true : false;
if(!$total) {
		   $i = $from;
           do {
               if(isset($arrLine[$i])) {
                $line = trim($arrLine[$i]);
                if($line != '' && $line != null) {
                 $txtLine .= ":".$line . "\n";
                }
               }
			   $i=$i+1;
           }while($i < ($to));
           
           if($to >= $totalLine) {
            $txtLine .= "END";
           }
}else {
$txtLine .=  $totalLine;
}
           header('Content-Type: text/plain');
           echo $txtLine;
?>