<?php
class appModel extends SQLite3 {

    public function __construct()
    {
        $this->open('seedstars-php.db');
        $this->exec('CREATE TABLE IF NOT EXISTS contact (contact_name varchar, contact_email varchar)');
    }

    /**
     * Insert row
     *
     * @param array $contact
     */
    public function insertIntoContact(array $contact) {
        $query = "INSERT INTO contact (contact_name, contact_email) VALUES ('" . $contact['name'] . "', '" . $contact['email'] . "');";
        $this->prepare($query)->execute();
    }

    /**
     * List all contacts
     *
     * @return array
     */
    public function listContacts() {
        $rows = array();
        $query = 'SELECT * FROM contact';
        $results = $this->query($query);
        while ($row = $results->fetchArray()) {
            $rows[] = $row;
        }

        return $rows;
    }

}