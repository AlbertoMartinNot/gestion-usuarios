<?php

namespace nueva\Bundle\nuevaBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use AppBundle\Entity\Usuario;
use nueva\Bundle\nuevaBundle\Entity\formuType;



class nuevaController extends Controller
{

	public function homeAction(){

		//return $this->render('/home/tse6/Escritorio/symfony/nuevo2/src/nueva/Bundle/nuevaBundle/Resources/views/Default/home.html.twig');

		$msg=$this->get('serv.calculadora');
		return  $msg->suma(3.453,5.987);



	}
    

   public function showAction($id){
   	

  	$em=$this-> getDoctrine()->getManager();
    $resul=$em->getRepository('AppBundle:Usuario')->findBy(array('id'=>$id));
    if(!$resul){
	$this->addFlash('error','Usuario Inexistente');
    return $this->redirectToRoute('nueva_list');


    }
    return $this->render('/home/tse6/Escritorio/symfony/nuevo2/src/nueva/Bundle/nuevaBundle/Resources/views/Default/show.html.twig',array('user'=>$resul,));
    
   }

   public function createAction(Request $request){
    $user= new Usuario();   	
   	$form= $this->createForm(formuType::class,$user);
   	$form->add('crear usuario',SubmitType::class, array(
            'label' => 'Crear Usuario',
            'attr'  => array('class' => 'btn btn-default pull-
            	left')
        ));
   		

   	$form->handleRequest($request);

   	if($form->isValid()){
      $em= $this->getDoctrine()->getManager();
      $em->persist($user);
      $em->flush();

      $this->addFlash('exito','Usuario creado con exito');
    return $this->redirectToRoute('nueva_list');
   	}
   
   	return $this->render('/home/tse6/Escritorio/symfony/nuevo2/src/nueva/Bundle/nuevaBundle/Resources/views/Default/create.html.twig',array('formulario'=>$form->createView(),));

   }	

   public function listAction(){

    $em=$this-> getDoctrine()->getManager();
    $resul=$em->getRepository('AppBundle:Usuario')->findAll();
   	
    return $this->render('/home/tse6/Escritorio/symfony/nuevo2/src/nueva/Bundle/nuevaBundle/Resources/views/Default/lista2.html.twig',array('user'=>$resul,));
 	


   }

   
   public function editAction(Request $request,$id){
      
      $em = $this->getDoctrine()->getManager();
    $usuario= $em->getRepository('AppBundle:Usuario')->find($id);
    $form= $this->createForm(formuType::class,$usuario);
   	$form->add('actualizar usuario', SubmitType::class, array(
            'label' => 'Actualizar Usuario',
            'attr'  => array('class' => 'btn btn-default pull-left')
        ));
   		
    $form->handleRequest($request);

    if($form->isValid()){
    	$usuario->setNombre($usuario->getNombre());
    	$usuario->setPass($usuario->getPass());
    	$usuario->setMail($usuario->getMail());
    	$usuario->setEdad($usuario->getEdad());
    	$em->flush();
    	$this->addFlash('exito','Usuario actualizado con exito');
    return $this->redirectToRoute('nueva_list');

    }
    
   

    return $this->render('/home/tse6/Escritorio/symfony/nuevo2/src/nueva/Bundle/nuevaBundle/Resources/views/Default/update.html.twig',array('formu'=>$form->createView()));


   }
   public function deleteAction($id){

   	$em = $this->getDoctrine()->getManager();
    $usuario= $em->getRepository('AppBundle:Usuario')->find($id);
    $em->remove($usuario);
    $em->flush();

    $this->addFlash('exito','Usuario borrado correctamente');
    return $this->redirectToRoute('nueva_list');



   }
}    


?>