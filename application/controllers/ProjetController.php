<?php

class ProjetController extends Zend_Controller_Action
{
    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function ajouterAction()
    {
        /*$registry = new Zend_registry();
        $db = $registry->get('db');
        $session = $registry->get('session');
        $user = $session->getUserInfo();

        $a = $db->fetchAll('select * from client');
        $this->view->allclient=$a;

        if ($_POST) {
            $type=$this->_getparam('type');
            $date1=$this->_getparam('date1');
            $date3 = date('Y-m-d',strtotime($date1));

            $date2=$this->_getparam('date2');
            $date4= date('Y-m-d',strtotime($date2));

            $client=$this->_getparam('client');

            $equipe=$this->_getparam('equipe');
     

        $data = array(
            'type_projet' =>$type,
            'date_debut_projet' =>$date3,
            'date_fin_projet' =>$date4,
            'code_client' =>$client,
            'equipe_projet' =>$equipe,
             );
            if($type && $date3 && $date4 && $client && $equipe){
        $db->insert('projet',$data);
        $this->_helper->redirector('afficher');
            }
            } 
    */
    }

    public function afficherAction()
    {
        // action body
          /* charger les table
       $registry= new Zend_registry();
        $db=$registry->get('db');
        $session = $registry->get('session');
        $user = $session->getUserInfo();

        $resultat=$db->fetchAll('select * from projet,client where projet.code_client = client.code_client');
        
        //instanciation du paginator
                                      $page=$this->_getParam('page',5);
                                      $paginator = Zend_Paginator::factory($resultat);
                                      $paginator->setItemCountPerPage(5);
                                      $paginator->setCurrentPageNumber($page);
                                      $this->view->paginator=$paginator;
		   */
		   
    }
/*
    public function modifierAction()
    {
        /* obtenir le Id de la table projet()
        $a=$this->_getparam('id');

        $registry= new Zend_registry();
        $db=$registry->get('db');
        $session = $registry->get('session');
        $user = $session->getUserInfo();

        $res=$db->fetchRow('select * from projet inner join client on projet.code_client=client.code_client where num_projet ="'.$a.'"');
        $res1=$db->fetchAll('select * from client');
        $this->view->allclient=$res1;
     
        // chaque name de view aport le champe de la table concerne
        $this->view->type=$res->type_projet;
        $this->view->date1=$res->date_debut_projet;
        $this->view->date2=$res->date_fin_projet;  
        $this->view->equipe=$res->equipe_projet;

          if ($_POST) {
            $type=$this->_getparam('type');
            
            $date1=$this->_getparam('date1');
            $date3 = date('Y-m-d',strtotime($date1));

            $date2=$this->_getparam('date2');
            $date4= date('Y-m-d',strtotime($date2));

            $client=$this->_getparam('client');

            $equipe=$this->_getparam('equipe');
     

        $data = array(
            'type_projet' =>$type,
            'date_debut_projet' =>$date3,
            'date_fin_projet' =>$date4,
            'code_client' =>$client,
            'equipe_projet' =>$equipe,
             );
                $db->update('projet',$data,'num_projet ='.(int)$a);
                $this->_helper->redirector('afficher');
        }
        
       
    }
/*
    public function supprimerAction()
    {
    	/*
        // action body
        $registry = new Zend_registry();
         $db = $registry->get('db');
         $session = $registry->get('session');
        $user = $session->getUserInfo();
        
         $code = $this->_getParam('id');
        $db->delete('projet','num_projet ='.(int)$code);
        $this->_helper->redirector('afficher');
		 * 
		 
    }

*/
}









