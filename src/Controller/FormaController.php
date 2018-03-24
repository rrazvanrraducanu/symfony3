<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class FormaController extends Controller
{
    /**
     * @Route("/forma", name="forma")
     */
    public function index(Request $request)
    {
        $form=$this->createFormBuilder()
            ->setAction($this->generateUrl('hello'))//se utilizeaza numele controlului adnotat!!!
            ->setMethod('POST')
            ->add('nume', TextType::class, array('attr'=>array('size'=>'30')))
            ->add('submit', SubmitType::class)
            ->getForm();
        $form->handleRequest($request);


        return $this->render('forma/index.html.twig',array('form'=>$form->createView()));
    }
    /**
     * @Route("/hello", name="hello")
     */
    public function hello(Request $request)
    {

        $var = $request->request->all();
        $data['msg']="Hello <b>".$var['form']['nume']."</b>!";
        return $this->render('forma/result.html.twig', $data);
    }

}
