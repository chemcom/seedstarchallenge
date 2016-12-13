<link rel='stylesheet' type='text/css' href='includes/w3.css'>
<?php
class appView {

    private $db;
    private $token;

    public function __construct(appModel $model, $token = '') {
        $this->db = $model;
        $this->token = $token;
    }

    /**
     * Display logic
     *
     * @param string $page
     * @return string
     */
    public function output($page = '') {
        if ('listContacts' === $page) {
            $output = '<div class="w3-center w3-panel">';
            $output .= '<h1 class="w3-teal">List of contacts</h1>';
            $output .= '<br/>';

            foreach ($this->db->listContacts() as $contact) {
                $output .= '<div class="w3-table-all w3-grey w3-large">' . ' Name: ' . $contact['contact_name'] . '</div>';
                $output .= '<div class="w3-table-all w3-black w3-large">' . ' Email: ' . $contact['contact_email'] . '</div>';
                $output .= '<br/>';
            }

            $output .= '<br/><br/>';
            $output .= '<a href="index.php">back</a>';
            $output .= '</div>';

            return $output;
        } else if ('addContact' === $page) {
            $output = '<div class="w3-container w3-center">';
            $output .= '<h1 class=" w3-teal">Add New Record</h1>';
            $output .= '<form id="addContactForm" action="index.php" method="post">';
            $output .= '<label for="nameField" class="w3-label">Name: </label><input type="text" class="w3-input" name="nameField" id="nameField" value="" required /><br/>';
            $output .= '<label for="emailField" class="w3-label">Email: </label><input type="email" name="emailField" class="w3-input" id="emailField" value="" required /><br/><br/>';
            $output .= '<input type="hidden" name="token" value="' . $this->token . '" />';
            $output .= '<input type="submit" value="submit" class="w3-btn" />';
            $output .= '</form>';
            $output .= '<br/><br/>';
            $output .= '<a href="index.php">back</a>';
            $output .= '</div>';

            return $output;
        }

        $output = '<div style="width:100%;text-align:center;">';
        $output .= '<h1>SEEDSTARS CODE CHALLENGE</h1><br/><br/>';
        $output .= '<h3>By: <a href="http://meetdevesin.tk" target="_blank"> Esinniobiwa Quareeb</a></h3><br/><br/>';
        
        $output .= '<a href="index.php?action=listContacts"><button class="w3-btn w3-round">List All Contacts</button></a>';
        $output .= '&nbsp;&nbsp;&nbsp;';
        $output .= '<a href="index.php?action=addContact"><button class="w3-btn w3-round">Add New Contact</button></a>';
        $output .= '</div>';

        return $output;
    }
}