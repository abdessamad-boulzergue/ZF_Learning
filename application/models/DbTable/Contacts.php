<?php
class Application_Model_DbTable_Contacts extends Zend_Db_Table_Abstract
{
      protected $_name = 'users';
	  
 //fonction get contact--------------------------------------------------
     
      public function getContact($pseudo,$password)
                {
				    $table=new Application_Model_DbTable_Contacts();

		            //$row=$table->fetchAll($table->select()->where('pseudo="'.$pseudo.'" AND password="'.$password.'"'));
					 //$row = $table->fetchRow('pseudo = "'. $pseudo.'" AND password="'.$password.'"');
		            
					$row = $table->fetchRow('pseudo = "'. $pseudo.'" AND password="'.$password.'"'); 
                    if(!empty($row))					
		                       $row=$row->toArray();
                    else $row=false;
		
		         if(!$row)
				          return false;
			     else 
				          return $row['id_user'];
                }
				
  /* //fonction ajout de contact -------------------------------------------
	 public function addContact($nom, $prenom,$email,$tel)
                {
				   
				
                  $data = array(
                                'nom' => $nom,
                                'prenom' => $prenom,
                                'email' => $email,
                                'tel' => $tel
                               );
                 $this->insert($data);
                }

 //fonction edition de contact -----------------------------------------------
      public function updateContact($id, $nom, $prenom,$email,$tel)
                    {
					echo'  updateContact  ';
                     $data = array(
                                  'nom' => $nom,
                                  'prenom' => $prenom,
                                  'email' => $email,
                                  'tel' => $tel
                                  );
                     $this->update($data, 'id = '. (int)$id);
                    }


// la fonction suppression de contact --------------------------------------------------
     public function deleteContact($id)
                {
				  echo'  deteletContact  ';
                 $this->delete('id =' . (int)$id);
                }*/
}