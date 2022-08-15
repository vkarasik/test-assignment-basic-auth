<?php

/** 
 * DBHandler Class
 * 
 * @param string $table name of table in JSON DB
 */
class DBHandler
{
    private $db_path;

    function __construct($table)
    {
        $this->db_path = '../db/' . $table . '.json';
    }

    /**
     * @return array $data DB
     */
    protected function db_read()
    {
        $db = file_get_contents($this->db_path);
        $data = json_decode($db, true);
        return $data;
    }

    /**
     * @param array  $value data to add
     */
    protected function db_update($value)
    {
        $data = $this->db_read();
        array_push($data, $value);
        file_put_contents($this->db_path, json_encode($data));
    }

    /**
     * @param string $field field to search over
     * @param mixed  $value value to search
     * 
     * @return int number of items
     */
    protected function db_count($field, $value)
    {
        $data = $this->db_read();
        $count = 0;
        foreach ($data as $item) {
            if ($item[$field] == $value) {
                ++$count;
            }
        }
        return $count;
    }

    /**
     * @param string $field field to search over
     * @param mixed  $value value to search
     * 
     * @return array of items
     */
    protected function db_select($field, $value)
    {
        $data = $this->db_read();
        $result = array();
        foreach ($data as $item) {
            if ($item[$field] == $value) {
                array_push($result, $item);
            }
        }
        return $result;
    }

    /**
     * @param string $field field to search over
     * @param mixed  $value value to search
     */
    public function db_delete($field, $value)
    {
        $data = $this->db_read();
        $result = array_filter($data, function ($item) use ($field, $value) {
            return $item[$field] !== $value;
        });
        file_put_contents($this->db_path, json_encode($result));
    }
}
