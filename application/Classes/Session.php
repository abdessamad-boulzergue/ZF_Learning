<?php

class Session {
	

	public function loginCheck($login,$pwd){
		
		         $registry = new Zend_registry();
                 $db = $registry->get('db');
		         $pwd = md5(utf8_encode($pwd));
		
		         $row = $this->$db->fetchAll("SELECT id_user FROM users WHERE pseudo='".$login."' AND password='".$pwd."'");
		         
				 if(!empty($row)){
			                     
								 $idUser = $row[0]->id_user;
			                      //$idUser = $this->_table;
		         }else{
			           
					   $idUser = FALSE;
		            } 

		   return $idUser;
		}

/* 
	public function openSession($id){
		$registry = new Zend_registry();
         $db = $registry->get('db');
		try {
			$this->$db->delete('session',id_user.'='.$id.' AND browser="'.$_SERVER['HTTP_USER_AGENT'].'"');
		} catch (Exception $e) {
			throw new Exception("Problem while deleting a session");
		}
	
		session_start();
		session_regenerate_id();
		session_set_cookie_params(3600);
		
		$data = array(
			'id_session'=>session_id(),
			'is_user'=>$id,
			'ipadress'=>$_SERVER["REMOTE_ADDR"],
			'browser'=>$_SERVER['HTTP_USER_AGENT']
		
		);
		try {
			$this->$db->insert('session', $data);
			
		} catch (Exception $e) {
			
			throw new Exception("Problem while inserting a session");
		}
		
		return TRUE;
	}

	public function getUserInfo(){
		$registry = new Zend_registry();
         $db = $registry->get('db');
		session_start();
		$sid = session_id();
	
		$row = $this->$db->fetchAll('SELECT * FROM '.user.' as t,session as s WHERE 
				s.id_user = t.'.id_user.' AND s.id_session="'.$sid.'"');
		
		if(empty($row)){
			return false;
		}
		
		return $row[0];
	}
	


	public function closeSession(){
		$registry = new Zend_registry();
         $db = $registry->get('db');
		session_start();
		try {
			$this->$db->delete('session','id_session = "'.session_id().'"');
		
			session_destroy();
		}catch (Exception $e){
			throw new Exception("Problem while deleting a session");
		}
		
	} */
}
?>