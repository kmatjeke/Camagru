<?php

class Pictures {
    private $db;
    private $id_pic;
    private $pic;
    private $login;

    public function __construct($id_pic, $pic, $login) {
        try {
            require '../config/database.php';
            $this->db = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->id_pic = $id_pic;
            $this->pic = $pic;
            $this->login = $login;
        }
        catch (Exception $e) {
            die('Error : ' . $e->getMessage());
        }
    }

    public function getPicture() {
        try {
          $req = $this->db->prepare("SELECT * FROM `pictures` WHERE `login` = ? ORDER BY `date_creation` DESC LIMIT 20");
          $res = $req->execute(array($this->login));
          $picture = $req->fetchAll(PDO::FETCH_ASSOC);
          return $picture;
        }
        catch (Exception $e) {
          die('Erreur : ' . $e->getMessage());
        }
      }
      public function addPicture() {
        try {
          date_default_timezone_set('Europe/Paris');
            $date_creation = date("Y-m-d H:i:s");
          $req = $this->db->prepare("INSERT INTO `pictures` (`login`, `pic`, `date_creation`) VALUES (?, ?, ?)");
          $req->execute(array($this->login, $this->pic, $date_creation));
          $req = $this->db->query("SELECT `id_pic` FROM `pictures` WHERE `login` = '" . $this->login . "' AND `date_creation` = '" . $date_creation . "'");
          $id_pic = $req->fetch(PDO::FETCH_ASSOC);
          return $id_pic;
        }
        catch (Exception $e) {
          die('Erreur : ' . $e->getMessage());
        }
      }
}