<?php

// Generated e107 Plugin Admin Area 

require_once('../../class2.php');
if (!getperms('P')) 
{
	e107::redirect('admin');
	exit;
}

// e107::lan('guestbook',true);


class guestbook_adminArea extends e_admin_dispatcher
{

	protected $modes = array(	
	
		'main'	=> array(
			'controller' 	=> 'guestbook_ui',
			'path' 			=> null,
			'ui' 			=> 'guestbook_form_ui',
			'uipath' 		=> null
		),
		

	);	
	
	
	protected $adminMenu = array(

		'main/list'			=> array('caption'=> LAN_MANAGE, 'perm' => 'P'),
	//	'main/create'		=> array('caption'=> LAN_CREATE, 'perm' => 'P'),
			
		'main/prefs' 		=> array('caption'=> LAN_PREFS, 'perm' => 'P'),	

		// 'main/custom'		=> array('caption'=> 'Custom Page', 'perm' => 'P')
	);

	protected $adminMenuAliases = array(
		'main/edit'	=> 'main/list'				
	);	
	
	protected $menuTitle = 'Guestbook';
}




				
class guestbook_ui extends e_admin_ui
{
			
		protected $pluginTitle		= 'Guestbook';
		protected $pluginName		= 'guestbook';
	//	protected $eventName		= 'guestbook-guestbook'; // remove comment to enable event triggers in admin. 		
		protected $table			= 'guestbook';
		protected $pid				= 'id';
		protected $perPage			= 10; 
		protected $batchDelete		= true;
	//	protected $batchCopy		= true;		
	//	protected $sortField		= 'somefield_order';
	//	protected $orderStep		= 10;
	//	protected $tabs				= array('Tabl 1','Tab 2'); // Use 'tab'=>0  OR 'tab'=>1 in the $fields below to enable. 
		
	//	protected $listQry      	= "SELECT * FROM `#tableName` WHERE field != '' "; // Example Custom Query. LEFT JOINS allowed. Should be without any Order or Limit.
	
		protected $listOrder		= 'id DESC';
	
		protected $fields 		= array (  'checkboxes' =>   array ( 'title' => '', 'type' => null, 'data' => null, 'width' => '5%', 'thclass' => 'center', 'forced' => '1', 'class' => 'center', 'toggle' => 'e-multiselect',  ),
		  'id' =>   array ( 'title' => LAN_ID, 'data' => 'int', 'width' => '5%', 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
	  'block' =>   array ( 'title' => LAN_STATUS, 'type' => 'dropdown', 'inline'=>true, 'data' => 'int', 'width' => 'auto', 'help' => '', 'readParms' => '', 'writeParms' => array(0=>LAN_INACTIVE, 1=>LAN_ACTIVE), 'class' => 'left', 'thclass' => 'left',  ),

		  	  'name' =>   array ( 'title' => LAN_NAME, 'type' => 'text', 'data' => 'str', 'width' => 'auto', 'inline' => true, 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'email' =>   array ( 'title' => LAN_EMAIL, 'type' => 'email', 'data' => 'str', 'width' => 'auto', 'inline' => true, 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'url' =>   array ( 'title' => LAN_URL, 'type' => 'url', 'data' => 'str', 'width' => 'auto', 'inline' => true, 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'date' =>   array ( 'title' => LAN_DATESTAMP, 'type' => 'datestamp', 'data' => 'int', 'width' => 'auto', 'filter' => true, 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'comment' =>   array ( 'title' => LAN_COMMENTMAN, 'type' => 'textarea', 'data' => 'str', 'width' => '40%', 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
	
		  	  'ip' =>   array ( 'title' => LAN_IP, 'type' => 'ip', 'data' => 'str', 'width' => 'auto', 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'host' =>   array ( 'title' => 'Host', 'type' => 'ip', 'data' => 'str', 'width' => 'auto', 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'user' =>   array ( 'title' => LAN_AUTHOR, 'type' => 'user', 'data' => 'int', 'width' => 'auto', 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
			  'options' =>   array ( 'title' => LAN_OPTIONS, 'type' => null, 'data' => null, 'width' => '10%', 'thclass' => 'center last', 'class' => 'center last', 'forced' => '1',  ),
		);		
		
		protected $fieldpref = array('name', 'block', 'date', 'user', 'comment', 'ip');
		

	//	protected $preftabs        = array('General', 'Other' );
		protected $prefs = array(

			'title'		=> array('title'=> 'Title', 'tab'=>0, 'type'=>'text', 'data' => 'str', 'help'=>''),
			'moderator_class'		=> array('title'=> 'Moderator_class', 'tab'=>0, 'type'=>'userclass', 'data' => 'str', 'help'=>''),
			'posts'		=> array('title'=> 'Posts', 'tab'=>0, 'type'=>'number', 'data' => 'str', 'help'=>''),
			'enclose'		=> array('title'=> 'Enclose', 'tab'=>0, 'type'=>'boolean', 'data' => 'str', 'help'=>''),

			'bbcode'		=> array('title'=> 'Bbcode', 'tab'=>0, 'type'=>'boolean', 'data' => 'str', 'help'=>''),
			'repeat'		=> array('title'=> 'Repeat', 'tab'=>0, 'type'=>'boolean', 'data' => 'str', 'help'=>''),
			'nolinks'		=> array('title'=> 'Nolinks', 'tab'=>0, 'type'=>'boolean', 'data' => 'str', 'help'=>''),
			'hideurl'		=> array('title'=> 'Hideurl', 'tab'=>0, 'type'=>'boolean', 'data' => 'str', 'help'=>''),
			'securecode'		=> array('title'=> 'Securecode', 'tab'=>0, 'type'=>'boolean', 'data' => 'str', 'help'=>''),
			'edittime'		=> array('title'=> 'Edittime', 'tab'=>0, 'type'=>'text', 'data' => 'str', 'help'=>''),
		);

	
		public function init()
		{
			// Set drop-down values (if any). 
	
		}

		
		// ------- Customize Create --------
		
		public function beforeCreate($new_data,$old_data)
		{
			return $new_data;
		}
	
		public function afterCreate($new_data, $old_data, $id)
		{
			// do something
		}

		public function onCreateError($new_data, $old_data)
		{
			// do something		
		}		
		
		
		// ------- Customize Update --------
		
		public function beforeUpdate($new_data, $old_data, $id)
		{
			return $new_data;
		}

		public function afterUpdate($new_data, $old_data, $id)
		{
			// do something	
		}
		
		public function onUpdateError($new_data, $old_data, $id)
		{
			// do something		
		}		
		
			
	/*	
		// optional - a custom page.  
		public function customPage()
		{
			$text = 'Hello World!';
			$otherField  = $this->getController()->getFieldVar('other_field_name');
			return $text;
			
		}
	*/
			
}
				


class guestbook_form_ui extends e_admin_form_ui
{

}		
		
		
new guestbook_adminArea();

require_once(e_ADMIN."auth.php");
e107::getAdminUI()->runPage();

require_once(e_ADMIN."footer.php");
exit;

?>