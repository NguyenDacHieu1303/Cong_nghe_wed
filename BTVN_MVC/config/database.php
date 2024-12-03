<?php
class Database {
    private $host = "localhost";
    private $db_name = "product_db";  // Tên CSDL của bạn
    private $username = "root";        // Tên đăng nhập
    private $password = "";            // Mật khẩu (trong trường hợp này là rỗng nếu bạn chưa thiết lập mật khẩu cho MySQL)
    private $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>
