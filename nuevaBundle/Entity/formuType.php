<?php
namespace nueva\Bundle\nuevaBundle\Entity;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class formuType extends AbstractType{

	public function buildForm(FormBuilderInterface $builder,array $options){

		$builder
		->add('nombre',TextType::class, array(
            'label' => 'Nombre: ',
            
        ))
		->add('pass',PasswordType::class,array(
            'label' => 'Contraseña: ',
          
        ))
		->add('mail',EmailType::class,array(
            'label' => 'Email: ',
            
        ))
		->add('edad',IntegerType::class,array(
            'label' => 'Edad: ',
        ))
		;


	}

    public function getName(){

    	return 'usuarios';

    }


}

  ?>