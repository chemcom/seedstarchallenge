<?php
/**
 * Class model
 */
class model extends SQLite3 {

    public function __construct()
    {
        $this->open('seedStarsChallenge');
        $this->exec('DROP TABLE IF EXISTS job');
        $this->exec('CREATE TABLE job (job_name varchar, status varchar, check_time varchar)');
    }

    /**
     * Insert job row
     *
     * @param array $dbJobs
     * @param string $time
     */
    public function insertIntoJob(array $dbJobs, $time) {
        foreach($dbJobs as $job) {
            $query = "INSERT INTO job (job_name, status, check_time) VALUES ('" . $job['job_name'] . "', '" . $job['status'] . "', '" . $time . "');";
            $this->exec($query);
        }
    }

}