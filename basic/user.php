<?php

class User {
      private $db;
      function __construct ($DB_conn)
      {
		    $this->db = $DB_conn;
		  }
        
    public function leaders()
    {
      try {
        $stmt = $this->db->prepare("SELECT user_roll_no,`user_name`,score FROM score ORDER BY score DESC LIMIT 12");
            $stmt->execute();
            $result = $stmt->fetchAll();
            $rowCount = $stmt->rowCount();
            $arrayTemp = array(array(),array(),array());
            $i = 0;
              foreach($result as $val)
              {
                
              $arrayTemp[$i][0] = $val['user_roll_no'];
              $arrayTemp[$i][1] = $val['user_name'];
              $arrayTemp[$i][2] = $val['score'];
              $i++;
              }
              $x=$arrayTemp;
              //$x = array_reverse($arrayTemp);
              return $x;
      } catch (PDOException $e) {
        return $e->getMessage();
      }
    

}};
?>



