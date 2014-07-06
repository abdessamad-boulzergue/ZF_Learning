<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
		 $this->_helper->layout->setLayout('index/login');
		
	}    
    public function indexAction()
    {
        // action body
        if(Zend_Auth::getInstance()->hasIdentity()){
        	 $this->_helper->layout->setLayout('layout');
        }
        	
        
    }
 
    public function loginAction()
    {  
	      
		 $request=$this->getRequest();
		 if($request->isPost()){
		 	  
			  $authAdapter=$this->getAuthAdapter();
			
			   $post=$request->getPost();
			 
			   $pseudo=$post['username'];
			   $password=$post['password'];
	   
	           $authAdapter->setIdentity($pseudo)
	                      ->setCredential($password);
				   
	           $auth=Zend_Auth::getInstance();
	  
  	           $result=$auth->authenticate($authAdapter);
	  
	          if($result->isValid()){
		                $identity=$authAdapter->getResultRowObject();
		                $authStorage=$auth->getStorage()->write($identity);
                        $this->_helper->layout->setLayout('layout');
	                 }
		     }
    }
	
	
	private function getAuthAdapter(){
		 
	                 $authAdapter=new Zend_Auth_Adapter_DbTable(Zend_Db_Table::getDefaultAdapter());
	                 $authAdapter->setTableName('users')
	                             ->setIdentityColumn('pseudo')
				                 ->setCredentialColumn('password');
             return  $authAdapter; 
	}

}



