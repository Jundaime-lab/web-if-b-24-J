<?php

require_once('Connection.php');

class Database
{
    public $query; // menyimpan query
    public $conn; // mengakses koneksi
    public $mysqli; // mengakses package mysqli

    public function __construct()
    {
        $this->conn = new Connection();
        $this->mysqli = $this->conn->mysqli;
    }

    public function table(string $table): self
    {
        $this->query = "SELECT * FROM $table";
        
        return $this;
    }

    public function select(string ...$str): self
    {
        // SELECT * => SELECT nama, npm, prodi FROM mahasiswa
        $sql = '';

        foreach($str as $value) {
            $sql .= $value.", ";
        }

        $sql = substr($sql, 0, -2);
        $this->query = str_replace('*', $sql, $this->query);
        
        return $this;
    }

    public function join(): self
    {

    }

    public function leftJoin(): self
    {
        
    }

    public function rightJoin(): self
    {
        
    }

    public function where(array $array): self
    {
        // column1 = 'value1' AND column2 = 'value2' AND columnN = 'valueN'
        $sql = ' WHERE ';
        foreach($array as $key => $value)
        {
            $sql .= $key ." = '".$value."' AND ";
        }

        $sql = substr($sql, 0, -5);
        $this->query .= $sql;
        
        return $this;
    }

    public function orderBy(array $array): self
    {
        // ORDER BY nama ASC, prodi DESC
        $sql = ' ORDER BY ';

        foreach ($array as $key => $value) {
            $sql .= $key ." ".$value.", ";
        }

        $sql = substr($sql, 0, -2);
        $this->query .= $sql;

        return $this;
    }

    public function get()
    {
        $result = $this->mysqli->query($this->query) or trigger_error('Query invalid: '.$this->mysqli->error);

        return $result->fetch_all(MYSQLI_ASSOC);
        // echo $this->query;
    }

    public function first()
    {
        $this->query .= ' LIMIT 1';
        $result = $this->mysqli->query($this->query) or trigger_error('Query invalid: '.$this->mysqli->error);

        return $result->fetch_assoc();
    }
}

$db = new Database();
$mhs = $db->table('mahasiswa')
    ->select('nama', 'npm', 'prodi')
    // ->where([
    //     'npm' => '111',
    //     'nama' => 'AAA'
    // ])
    ->orderBy([
        'nama' => 'ASC',
    ])
    ->get();

echo "<pre>";
print_r($mhs);
echo "</pre>";
// echo $mhs[0]['nama'];