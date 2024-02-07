<?php

class Contact
{
    public $db = null;
    public $table = "contact";

    public function __construct(Database $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    public function getData($data){
        $dataArray = [];

        while ($item = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
            $dataArray[] = $item;
        }

        return $dataArray;
    }

    public function getContacts()
    {
        $query = $this->db->con->query("SELECT * FROM {$this->table}");

        return $this->getData($query);
    }

    public function getContact($id = null)
    {
        if (isset($id)) {
            $query = $this->db->con->query("SELECT * FROM {$this->table} WHERE id = {$id}");

            return $this->getData($query);
        }
    }

    public function setContact($data)
    {
        if (isset($data)) {
            $name = htmlspecialchars($data["name"]);
            $email = htmlspecialchars($data["email"]);
            $phone = htmlspecialchars($data["phone"]);
            $birthday = htmlspecialchars($data["birthday"]);

            $this->db->con->query("INSERT INTO {$this->table} VALUES (NULL, '$name', '$email', '$phone', '$birthday')");
            return mysqli_affected_rows($this->db->con);
        }
    }

    public function updateContact($data)
    {
        if (isset($data)) {
            $id = $data["id"];
            $name = htmlspecialchars($data["name"]);
            $email = htmlspecialchars($data["email"]);
            $phone = htmlspecialchars($data["phone"]);

            $this->db->con->query("UPDATE {$this->table} SET name = '$name', email = '$email', phone = '$phone' WHERE id = $id");
            return mysqli_affected_rows($this->db->con);
        }
    }

    public function deleteContact($data)
    {
        if (isset($data)) {
            $id = $data["id"];

            $this->db->con->query("DELETE FROM {$this->table} WHERE id = $id");
            return mysqli_affected_rows($this->db->con);
        }
    }

    public function isBirthday($data) {
        $date = new DateTime();
        return $data == $date->format('Y-m-d');
    }

    public function searchContact($data) {
        $query = $this->db->con->query("SELECT * FROM {$this->table} WHERE name LIKE '%$data%' OR email LIKE '%$data%'");

        return $this->getData($query);
    }
    
    public function orderByContact($data) {
        $sort = explode("-", $data);
        $sql_query = "SELECT * FROM {$this->table} ORDER BY {$sort[0]}" . " {$sort[1]}";
        $query = $this->db->con->query($sql_query);

        return $this->getData($query);
    }
}
