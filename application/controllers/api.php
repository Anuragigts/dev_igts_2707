<?php
    class Api extends CI_Controller {

            public function listBeers() {
                $this->load->library('xmlrpc');
                    // Array of beers 
                    // This typically would be a call to your Model class to return a collection of objects
               echo  $this->input->get_post('login_id');
                    $beers = array(
                            'New Belgium Ranger IPA',
                            'Odell Brewing St. Lupulin',
                            'Upslope Pale Ale',
                            'Ska Brewing Modus Hoperandi',
                            'Great Divide Titan IPA'
                    );

                    // Build our view's data object
                    $data = array('response' => $beers);

                    // Load the JSON view
                    $this->load->view('json', $data);
            }

    }