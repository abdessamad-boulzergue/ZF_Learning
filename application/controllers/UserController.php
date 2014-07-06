<?php

class userController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        
			
    }

    public function ajouterAction()
    {
        // charger les table
       $registry= new Zend_registry();
		$db=$registry->get('db');
		//$session = $registry->get('session');
        //$user = $session->getUserInfo();

		if ($_POST){
			$nom=$this->_getParam('nom');
			$prenom=$this->_getParam('prenom');
			$adresse=$this->_getParam('adresse');
		
		var_dump($adresse);
			
				$data = array(
            'nom' =>$nom,
            'prenom' =>$prenom,
            'adresse' =>$adresse,
			
 			);
			
			 if($nom && $prenom && $adresse){
			 
				 $db->insert('user',$data);
                 $this->_helper->redirector('afficher');
				 
               $message='ajouter avec succe';
			 }	
		} 

    }

    public function modifierAction()
    {
      
    $code = $this->_getParam('code');

        // action body
         $registry = new Zend_registry();
         $db = $registry->get('db');
        // $session = $registry->get('session');
        //$user = $session->getUserInfo();
         // obtenir le nom de user pour l afficher
    $a = $db->fetchRow('select * from user where code_client ="'.$code.'"');
    
    // charger les champes avec les valeur
    $this->view->nom=$a->nom;
    $this->view->prenom=$a->prenom;
    $this->view->adresse=$a->adresse;
    
    // obtenir les name qui sont modifier
    if($_POST){
                 $nom = $this->_getParam('nom');
                 $prenom = $this->_getParam('prenom');
                 $adresse = $this->_getParam('adresse');

     // metre modification des champe en base de donnee
    $data = array('nom' => $nom,
                  'prenom'=>$prenom,
                  'adresse'=>$adresse,
                   );
    $db->update('user',$data,'code_client = '.(int)$code);
    $this->_helper->redirector('afficher');
    }
    }

    public function supprimerAction()
    {
        /*action body*/
      
       $registry = new Zend_registry();
         $db = $registry->get('db');
        // $session = $registry->get('session');
        //$user = $session->getUserInfo();

         $code = $this->_getParam('code');
        $db->delete('user','code_client ='.(int)$code);
        $this->_helper->redirector('afficher');
  
    }

    public function afficherAction()
    {
         // action body
          /* charger les table  */
		  
		  
		  
       $registry= new Zend_registry();
		$db=$registry->get('db');
       // $session = $registry->get('session');
        //$user = $session->getUserInfo();
        
        
		$resultat=$db->fetchAll('select * from user');
		
		
		//instanciation du paginator
                                      $page=$this->_getParam('page',5);
                                      $paginator = Zend_Paginator::factory($resultat);
                                      $paginator->setItemCountPerPage(2);
                                      $paginator->setCurrentPageNumber($page);
                                      $this->view->paginator=$paginator;
		   
		 
    }
    
    public function logoutAction(){
 	
	     Zend_Auth::getInstance()->clearIdentity();
	     $this->_redirect('index/');
    }
}











