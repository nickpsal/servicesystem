<?php   
    class _404{
        use Controller;
        public function index($data = []){
            $data['title'] = '404 Η Σελίδα που ζητήσατε δεν βρέθηκε';
            //δείχνουμε την view μαζι με τα δεδομένα
            $this->view('404', $data); 
        }
    }