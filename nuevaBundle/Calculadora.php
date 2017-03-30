<?php

namespace nueva\Bundle\nuevaBundle;

use Symfony\Component\HttpFoundation\Response;




class Calculadora{

private $formater;

public function __construct(Formater $formater){

$this->formater=$formater;



}
public function Suma($num,$num2){

$sum=$num+$num2;
return $this->formater->Format($sum,2);


}


}

  ?>