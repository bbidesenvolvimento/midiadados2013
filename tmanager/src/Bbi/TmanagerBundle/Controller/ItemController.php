<?php

namespace Bbi\TmanagerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Bbi\TmanagerBundle\Entity\Item;
use Bbi\TmanagerBundle\Entity\Categoria;
use Bbi\TmanagerBundle\Form\ItemType;

/**
 * Item controller.
 *
 * @Route("/item")
 */
class ItemController extends Controller
{
    /**
     * Lists all Item entities. @Route("/{id}/show", name="item_show")
     *
     * @Route("/", name="item")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BbiTmanagerBundle:Item')->findByCategoria(1);

        $entitiescat = $em->getRepository('BbiTmanagerBundle:Categoria')->findAll();

        return array(
            'entities' => $entities,
            'entitiescat' => $entitiescat
            );
    }

    /**
     * Lists all Item entities.
     *
     * @Route("/json2", name="json2")
     * @Template()
     */
    public function json2Action()
    {
        header('Content-Type: text/html; charset=utf-8');
        $em = $this->getDoctrine()->getManager();
        
        $categorias = $em->getRepository('BbiTmanagerBundle:Categoria')->findAll();
   
    $arr = array();
    foreach ($categorias as $categoria) {
            $entities = $em->getRepository('BbiTmanagerBundle:Item')->findByCategoria($categoria->getId());
            array_push($arr, $categoria->getNome());
            foreach ($entities as $entitie) {
                array_push($arr, array(
                'titulo' => $entitie->getTitulo(),
                'link' => "http://mdb2013.bbi.net.br/scripts_mdb/proxy.php?cat=" .$categoria->getNome().'&sub='.$entitie->getLink(),
                'segmento' => $categoria->getSegmento(),
                'linkExport' => "http://mdb2013.bbi.net.br/scripts_mdb/export.php?cat=" .$categoria->getNome().'&sub='.$entitie->getLink(),
                ));
            }
    }

    $json = json_encode($arr);

    echo $json;


        return array(
            'entities' => $entities,
            'categorias' => $categorias,
            );
    }

    /**
     * Lists all Item entities.
     *
     * @Route("/json3", name="json3")
     * @Template()
     */
    public function json3Action()
    {
        header('Content-Type: text/html; charset=utf-8');
        $em = $this->getDoctrine()->getManager();
        
        $categorias = $em->getRepository('BbiTmanagerBundle:Categoria')->findAll();
   
    $arr = array();
    foreach ($categorias as $categoria) {
            $entities = $em->getRepository('BbiTmanagerBundle:Item')->findByCategoria($categoria->getId());
            // Versão WEB com exportação
            array_push($arr, $categoria->getNome());
            foreach ($entities as $entitie) {
                array_push($arr, array(
                'titulo' => $entitie->getTitulo(),
                'link' => "http://mdb2013.bbi.net.br/scripts_mdb/proxy2.php?cat=" .$categoria->getNome().'&sub='.$entitie->getLink(),
                'segmento' => $categoria->getSegmento(),
                'linkExport' => "http://mdb2013.bbi.net.br/scripts_mdb/export.php?cat=" .$categoria->getNome().'&sub='.$entitie->getLink(),
                ));
            }
    }
    $json = json_encode($arr);

    echo $json;

        return array(
            'entities' => $entities,
            'categorias' => $categorias,
            );
    }


    /**
     * Lists all Item entities.
     *
     * @Route("/jsonoff", name="jsonoff")
     * @Template()
     */
    public function jsonoffAction()
    {
        header('Content-Type: text/html; charset=utf-8');
        $em = $this->getDoctrine()->getManager();
        
        $categorias = $em->getRepository('BbiTmanagerBundle:Categoria')->findAll();
        //$entities = $em->getRepository('BbiTmanagerBundle:Item')->findAll();
       
        $arr = array();

        foreach ($categorias as $categoria) {
                $entities = $em->getRepository('BbiTmanagerBundle:Item')->findByCategoria($categoria->getId());
                //echo "\"".$categoria->getNome()."\":[{";
                array_push($arr, $categoria->getNome());
                $i=0;        
                foreach ($entities as $entitie) {
                     array_push($arr,self::catjsonoff($entitie->getTitulo(),$categoria->getNome(),$i+1));
                       
                       $i++;
                }
                
                /*echo "<h1>".$categoria->getId()."</h1>";
                echo "<h2>".$categoria->getNome()."</h2>";
                echo "<h3>".$i."</h3>";
                echo "<hr>";*/
            }

   /*echo"<pre>";
    var_dump($arr);
    echo"</pre>";*/
    $json = json_encode($arr);
    echo $json; 

        return array(
            'entities' => $entities,
            'categorias' => $categorias,
        );
    }


    public function catjsonoff($titulo,$nome,$rep){
        //"link": "/images/midiaDados/offline/mercadoDemografia/1.jpg",
        
       /* echo "\"titulo:"."\"".$titulo."\"<br>";
        echo "\"link:"."\"images/midiaDados/offline/" .$nome.'/'.$rep.'.png<br>'."";    
        echo "\"ad:"."\"\"}<br><br>".'';

        return array_push($arr, array('titulo' => $titulo,
            'link' => "images/midiaDados/offline/" .$nome.'/'.$rep.'.png',
            'ad' => ''
        ));*/
        return array('titulo' => $titulo,
            'link' => "/images/midiaDados/offline/" .$nome.'/'.$rep.'.png',
            'ad' => ''
        );
        
    }

    /**
     * Lists all Item entities.
     *
     * @Route("/jsonlista", name="jsonlista")
     * @Template()
     */
    public function jsonlistaAction()
    {
        header('Content-Type: text/html; charset=utf-8');
        $em = $this->getDoctrine()->getManager();
        
        $categorias = $em->getRepository('BbiTmanagerBundle:Categoria')->findAll();
        $entities = $em->getRepository('BbiTmanagerBundle:Item')->findAll();
        
   
    $arr = array();
    foreach ($categorias as $categoria) {
            $entities = $em->getRepository('BbiTmanagerBundle:Item')->findByCategoria($categoria->getId());
            echo "<h1>".$categoria->getId().'-'.$categoria->getNome()."</h1><br>";
            foreach ($entities as $entitie) {
                echo "<b>titulo:</b>".$categoria->getSegmento()."<br>";
                echo "<b>titulo:</b>".$entitie->getTitulo()."<br>";
                echo "<b>link:"."</b>http://www.bbi.net.br/proxy.php?cat=" .$categoria->getNome().'&sub='.$entitie->getLink()."<br>";
                echo "<b>ad:"."</b>".'<br>';
            }
 
        }

        return array(
            'entities' => $entities,
            'categorias' => $categorias,
            );
    }

    /**
     * Finds and displays a Item entity.
     *
     * @Route("/{id}/show", name="item_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BbiTmanagerBundle:Item')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Item entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
            );
    }

    /**
     * Displays a form to create a new Item entity.
     *
     * @Route("/new", name="item_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Item();
        $form   = $this->createForm(new ItemType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
            );
    }

    /**
     * Creates a new Item entity.
     *
     * @Route("/create", name="item_create")
     * @Method("POST")
     * @Template("BbiTmanagerBundle:Item:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Item();
        $form = $this->createForm(new ItemType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('item_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
            );
    }

    /**
     * Displays a form to edit an existing Item entity.
     *
     * @Route("/{id}/edit", name="item_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BbiTmanagerBundle:Item')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Item entity.');
        }

        $editForm = $this->createForm(new ItemType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            );
    }

    /**
     * Edits an existing Item entity.
     *
     * @Route("/{id}/update", name="item_update")
     * @Method("POST")
     * @Template("BbiTmanagerBundle:Item:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BbiTmanagerBundle:Item')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Item entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ItemType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('item_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            );
    }

    /**
     * Deletes a Item entity.
     *
     * @Route("/{id}/delete", name="item_delete")
     * @Method("POST")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BbiTmanagerBundle:Item')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Item entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('item'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
        ->add('id', 'hidden')
        ->getForm()
        ;
    }
}
