<?php
$xmlDoc=new DOMDocument();
$xmlDoc->load("admin/livesearch/output.xml");

$x=$xmlDoc->getElementsByTagName('noutati');

//gse scoate parametrul q din URL
$q=$_GET["q"];

//se cauta toate linkurile din fisier cu lungime q>0
if (strlen($q)>0) {
  $hint="";
  for($i=0; $i<($x->length); $i++) {
    $y=$x->item($i)->getElementsByTagName('titlu');
    $z=$x->item($i)->getElementsByTagName('link');
    if ($y->item(0)->nodeType==1) {
      //se caut[ linkul care corespunde datelor introduse in forma
      if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$q)) {
        if ($hint=="") {
          $hint="<a href='" . 
          $z->item(0)->childNodes->item(0)->nodeValue . 
          "'>" . 
          $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
        } else {
          $hint=$hint . "<br /><a href='" . 
          $z->item(0)->childNodes->item(0)->nodeValue . 
          "'>" . 
          $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
        }
      }
    }
  }
}

// se afiseaza mesajul ca nimic nu a fost gasit daca informatia nu corepunde datelor din XML document
if ($hint=="") {
  $response="nimic nu a fost gasit";
} else {
  $response=$hint;
}

//se afiseaza rezultatul
echo $response;
?>