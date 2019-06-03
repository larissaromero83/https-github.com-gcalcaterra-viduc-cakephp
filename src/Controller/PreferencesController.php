<?php
namespace App\Controller;

use App\Controller\AppController;
use \Google_Client;
use \Google_Service_YouTube;

/**
 * Preferences Controller
 *
 * @property \App\Model\Table\PreferencesTable $Preferences
 *
 * @method \App\Model\Entity\Preference[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PreferencesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $preferences = $this->paginate($this->Preferences);

        $this->set(compact('preferences'));
    }

    /**
     * View method
     *
     * @param string|null $id Preference id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $preference = $this->Preferences->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('preference', $preference);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $preference = $this->Preferences->newEntity();
        if ($this->request->is('post')) {
            $preference = $this->Preferences->patchEntity($preference, $this->request->getData());
            if ($this->Preferences->save($preference)) {
                $this->Flash->success(__('The preference has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The preference could not be saved. Please, try again.'));
        }
        $users = $this->Preferences->Users->find('list', ['limit' => 200]);
        $this->set(compact('preference', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Preference id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $preference = $this->Preferences->get($id, [
            'contain' => ['Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $preference = $this->Preferences->patchEntity($preference, $this->request->getData());
            if ($this->Preferences->save($preference)) {
                $this->Flash->success(__('The preference has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The preference could not be saved. Please, try again.'));
        }
        $users = $this->Preferences->Users->find('list', ['limit' => 200]);
        $this->set(compact('preference', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Preference id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $preference = $this->Preferences->get($id);
        if ($this->Preferences->delete($preference)) {
            $this->Flash->success(__('The preference has been deleted.'));
        } else {
            $this->Flash->error(__('The preference could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function searchYoutubeVideos()
    {
        /**
         * Library Requirements
         *
         * 1. Install composer (https://getcomposer.org)
         * 2. On the command line, change to this directory (api-samples/php)
         * 3. Require the google/apiclient library
         *    $ composer require google/apiclient:~2.0
         */
        /* if ( !file_exists( __DIR__ . '../../vendor/autoload.php' ) ) {
            throw new \Exception( 'please run "composer require google/apiclient:~2.0" in "' . __DIR__ . '"' );
        }
        require_once __DIR__ . '../../vendor/autoload.php'; */
        // This code will execute if the user entered a search query in the form
        // and submitted the form. Otherwise, the page displays the form above.
        if ( isset( $_GET[ 'q' ] ) && isset( $_GET[ 'maxResults' ] ) ) {
            /*
            * Set $DEVELOPER_KEY to the "API key" value from the "Access" tab of the
            * {{ Google Cloud Console }} <{{ https://cloud.google.com/console }}>
            * Please ensure that you have enabled the YouTube Data API for your project.
            */
            $DEVELOPER_KEY = 'AIzaSyAcegEcjGVRThQ816PniqyLRsFD6WH4PHg';
            $client        = new Google_Client();
            $client->setDeveloperKey( $DEVELOPER_KEY );
            // Define an object that will be used to make all API requests.
            $youtube  = new Google_Service_YouTube( $client );
            $htmlBody = '';
            try
            {
                // Call the search.list method to retrieve results matching the specified
                // query term.
                $searchResponse = $youtube->search->listSearch( 'id,snippet', array(
                    'q' => $_GET[ 'q' ],
                    'maxResults' => $_GET[ 'maxResults' ]
                ) );
                $videos         = '';
                $direccion      = '<iframe class="zoom" ; width="450" height="300" src="https://www.youtube.com/embed/%s" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe><feff>';
                // Add each result to the appropriate list, and then display the lists of
                // matching videos, channels, and playlists.
                foreach ( $searchResponse[ 'items' ] as $searchResult ) {
                    switch ( $searchResult[ 'id' ][ 'kind' ] ) {
                        case 'youtube#video':
                            $videos .= sprintf( $direccion, $searchResult[ 'id' ][ 'videoId' ] );
                            break;
                    }
                }
                $htmlBody .= "<ul>$videos</ul>";
            }
            catch ( Google_Service_Exception $e ) {
                $htmlBody .= sprintf( '<p>A service error occurred: <code>%s</code></p>', htmlspecialchars( $e->getMessage() ) );
            }
            catch ( Google_Exception $e ) {
                $htmlBody .= sprintf( '<p>An client error occurred: <code>%s</code></p>', htmlspecialchars( $e->getMessage() ) );
            }
            $this->set('htmlBody', $htmlBody);
        }
    }
}