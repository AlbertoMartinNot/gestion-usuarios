<?php

namespace nueva\Bundle\nuevaBundle;
use Symfony\Component\HttpFoundation\Response;





class Formater{




public function Format($num,$num2){

	return new Response(round($num,$num2));


}

}




  ?>