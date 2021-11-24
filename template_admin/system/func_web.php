<?php

include_once 'conn.php';

class fitur extends database {

    public function __construct()
	{
		parent::__construct();
	}

    public function getData($table,$rows="*",$where = null) {

        if ($where != null) {
            $sql="SELECT $rows FROM $table WHERE $where";
        }else{
            $sql="SELECT $rows FROM $table";
        }

        $result = $this->connection->query($sql);
        if($result == false){
            return false;
        }

        $wadah = array();
        while($isi = $result->fetch_assoc()) {
            $wadah[] = $isi;
        }

        return $wadah;
    }

    public function delete($table,$id) {
        $sql="DELETE FROM $table";
        $sql .=" WHERE $id";
        $sql;
        $result = $this->connection->query($sql);

        if ($result == false) {
			echo 'Error: cannot delete id ' . $id . ' from table ' . $table;
			return false;
		} else {
			return true;
		}
    }

    public function insert($table,$data=array()) {
        $kolom_tabel = implode(',',array_keys($data)); 
        $nilai_tabel = implode("','",$data);
        $sql = "INSERT INTO $table($kolom_tabel) VALUES('$nilai_tabel')";
        $result = $this->connection->query($sql);

        if($result){
            return true;
        }
        
    }

    public function update($table,$para=array(),$id){
        // BLOM BENER
        $args = array();
        foreach ($para as $key => $value) {
            $args[] = "$key = '$value'"; 
        }
        $sql="UPDATE  $table SET " . implode(',', $args);
        $sql .=" WHERE $id";
        $result = $this->connection->query($sql);
        
        if($result){
            return true;
        }
    }

    public function penjernih($value) {
		return $this->connection->real_escape_string($value);
	}

    public function execute($query) {
		$result = $this->connection->query($query);
		
		if ($result == false) {
			echo 'Error: cannot execute the command';
			return false;
		} else {
			return $result;
		}		
	}

    public function hitungRow($sql) {
        $result = $this->connection->query($sql);
        $num = mysqli_num_rows($result);

        if($result) {
            return $num;
        } else {
            return false;
        }
    }

    public function buatID($typeId) {
        switch ($typeId) {
            case 'id_produk':
                $unik = "P0";
                break;

            case 'id_produk':
                $unik = "P0";
                break;
            
            case 'id_user':
                $unik = "U0";
                break;
                
            case 'id_trans':
                $unik = "T0";
                break;
            case 'id_cart':
                $unik = "C0";
                break;    
            default:
                $aman = false;
                break;
            }

        
            $length = 6;
            $acakHuruf = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890"), 0, $length);
            $hasil = $unik.$acakHuruf;
        
        

        return $hasil;
        
        
    }


}
?>