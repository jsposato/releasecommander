<?php
App::uses('AppController', 'Controller');
/**
 * Releases Controller
 *
 * @property Release $Release
 */
class ReleasesController extends AppController {
	var $name = 'Releases';
	
	//by default name field will be selected but if this is not the case please change the order by field
	var $paginate = array(
		'limit' => RESULTS_PER_PAGE,
		'paramType' => 'querystring',
		'order' => 'Release.scheduled_date ASC'
	);

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this->Release->recursive = -1;
		
		// set the fields we want to display and the condtions for the query
		$fields = array('Release.id', 'Release.name', 'Release.scheduled_date','LuEnvironment.name','LuStatus.name','User.username');
		//$conditions = array('Release.lu_status_id' => '<> 3');
		$conditions = array('NOT' => array('Release.lu_status_id' => array(COMPLETED)));

		$this->paginate = array(
			'limit' => RESULTS_PER_PAGE,
			'paramType' => 'querystring',
			'order' => 'Release.scheduled_date ASC',
			'fields' => $fields,
			'conditions' => $conditions,
			'contain' => array('LuEnvironment.name','LuStatus.name','User.username')
			);
		$this->set('releases', $this->paginate());
		
		$this->rowSortingHighLight('Release.id', 'Release');
	}

	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this->Release->id = $id;
		if (!$this->Release->exists()) {
			throw new NotFoundException(__('Invalid %s', __('release')));
		}
		$release = $this->Release->read(null, $id);
		//debug($release);
		$this->set('release', $this->Release->read(null, $id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		$this->Release->recursive = -1;
		
		if ($this->request->is('post')) {
			$this->Release->create();
			if ($this->Release->save($this->request->data)) {
				$this->messagePassed('The release has been saved.');
			
				$this->redirect(array('action' => 'index'));
				return;
			} else {
				$this->messageFailed('The release could not be saved. Please, try again.');
			}
		}
		$luStatuses     = $this->Release->LuStatus->find('list');
		$luEnvironments = $this->Release->LuEnvironment->find('list');
		$luDbServers    = $this->Release->LuDbServer->find('list');
		$createdBies    = $this->Release->CreatedBy->find('list');
		$users          = $this->Release->User->find('list');
		$modifiedBies   = $this->Release->ModifiedBy->find('list');
		$this->set(compact('luStatuses', 'luEnvironments', 'luDbServers', 'createdBies', 'modifiedBies','users'));
	}

	/**
	 * edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		
		// if there's no id throw an exception
		if (!$id) {
			//throw new NotFoundException(__('Invalid Release ID'));
			$this->Session->setFlash(__('Invalid Release ID'));
			$this->redirect(array('action' => 'index'));
		}
		
		// Finds should only get this model by default
		$this->Release->recursive = -1;
		
		// find the release information
		$release = $this->Release->find('first', array(
			'conditions' => 'Release.id = '. $id,
			'contain' => array('LuEnvironment','LuStatus','User'),
		));

		// if there's no release for this id, throw an exception
		if (!$release) {
			//throw new NotFoundException(__("Release with ID $id not found"));
			$this->Session->setFlash(__("Release with ID $id not found"));
			$this->redirect(array('action' => 'index'));
		}
		
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->Release->id = $id;
			if ($this->Release->save($this->request->data)) {
				$this->Session->setFlash('Your releasee has been saved.');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Unalbe to update your release');
			}
		}
		
		if (!$this->request->data) {
			$this->request->data = $release;
		}

		$luStatuses = $this->Release->LuStatus->find('list');
		$luEnvironments = $this->Release->LuEnvironment->find('list');
		$luDbServers = $this->Release->LuDbServer->find('list');
		$createdBies = $this->Release->CreatedBy->find('list');
		$modifiedBies = $this->Release->ModifiedBy->find('list');
		$users = $this->Release->User->find('list', array(
			'conditions' => array('User.active =' => '1'),
			'fields' => array('User.id', 'User.username')
		));

		$this->set(compact('luStatuses', 'luEnvironments', 'luDbServers', 'createdBies', 'modifiedBies','users'));

	}

	/**
	 * markDelete method - Mark a release as complete
	 *
	 * @param string $id
	 * @return void
	 */
	public function markDone($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Release->id = $id;
		if (!$this->Release->exists()) {
			throw new NotFoundException(__('Invalid %s', __('release')));
		}
		
		if ($this->Release->markComplete($id)) {
			$this->messagePassed('The release has been marked complete');
		}
		$this->messageFailed('Unable to mark release completed');
		$this->redirect(array('action' => 'index'));
	}
	
	/**
	 * delete method
	 *
	 * @param string $id
	 * @return void
	 */
/*	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Release->id = $id;
		if (!$this->Release->exists()) {
			throw new NotFoundException(__('Invalid %s', __('release')));
		}
		if ($this->Release->delete()) {
			$this->messagePassed('The release has been deleted.');
		}
		$this->messageFailed('Delete of release failed.');
		$this->redirect(array('action' => 'index'));
	}
*/
}
