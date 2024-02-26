<?php
require "config.php";
class DB
{

    public $conn;

    function __construct()
    {
        $this->connection();
    }



    function connection()
    {

        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


        if ($this->conn->connect_error) {
            die("ket noi du lieu ko thanh cong" . $this->conn->connect_error);
        } else {
            // echo " ket noi thanh cong";
        }
    }

    // insert
    function insert($table, $data)
    {
        foreach ($data as $k => $v) {
            $list_filed[] = "`{$k}`";
            //  lam nhu vay tranh ma doc
            $list_value[] = "'" . $this->conn->real_escape_string($v) . "'";
        }
        //  truong thuoc tinh ngan cach nhau boi dau phay
        $list_filed = implode(',', $list_filed);
        $list_value = implode(',', $list_value);

        $sql = "INSERT INTO {$table}({$list_filed}) VALUES ({$list_value})";

        if ($this->conn->query($sql) == TRUE) {
            return $this->conn->insert_id;
        } else {
            echo "loi" . $this->conn->error;
        }
    }

    //  select

    function get($table, $field = array(), $where = "")
    {
        // Nếu trường $ không trống, hãy mã hóa nó để tạo danh sách các cột được phân tách bằng dấu phẩy, nếu không, hãy chọn tất cả các cột (*)
        $field = !empty($field) ? implode(',', $field) : "*";

        // Nếu $where không trống thì thêm mệnh đề WHERE, nếu không thì để trống
        $where = !empty($where) ? "WHERE {$where}" : "";

        // Create the SQL query
        $sql = "SELECT {$field} FROM {$table} {$where}";

        // Execute the query
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $data = array();

            // Tìm nạp từng hàng dưới dạng một mảng kết hợp và lưu trữ nó trong mảng dữ liệu 
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            if (count($data) > 1)
                return $data;
            return $data[0];

            // Return the fetched data as an array of associative arrays

        } else {
            echo "Không tìm thấy bản ghi nào";
        }
    }

    //  update
    function update($table, $data = array(), $where = "")
    {
        $data_insert = array();
        foreach ($data as $k => $v) {
            // Đối với mỗi cặp khóa-giá trị trong $data, hãy tạo một chuỗi có dạng `column_name='value'`
            $data_insert[] = "`{$k}`='{$v}'";
        }
        // Biến mảng $data_insert thành một chuỗi được phân tách bằng dấu phẩy
        $data_insert = implode(',', $data_insert);

        // Nếu $where không trống thì thêm mệnh đề WHERE, nếu không thì để trống
        $where = !empty($where) ? "WHERE {$where}" : "";

        // Create the SQL query for the UPDATE operation
        $sql = "UPDATE `{$table}` SET {$data_insert} {$where}";

        if ($this->conn->query($sql) === true) {
            echo "Cập nhật thành công";
        } else {
            echo "Lỗi: " . $this->conn->error;
        }
    }



    // delete

    function delete($table, $where = "")
    {
        $where = !empty($where) ? "WHERE {$where}" : "";
        $sql = "DELETE FROM {$table} {$where}";

        if ($this->conn->query($sql) === true) {
            return 1;
        } else {
            echo "Lỗi: " . $this->conn->error;
        }
    }
}
$db = new DB;

$data = array(

    'username' => 'vanthang',
    'password' => md5('ngocdai123')

);
// $db->insert('user',$data);
// $db->update('user',$data,"id=1");

//delete
$db->delete("user", "id=1");


// update
// $user=$db->get('user',array("username","password"),"id=1");
// echo "<pre>";
// print_r($user);
// echo "</pre>";

// echo $user['username'];
