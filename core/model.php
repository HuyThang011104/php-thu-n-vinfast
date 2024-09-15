<?php
class model
{
    function query($sql, $data) // đây là phương thức
    {
        global $conn;
        // echo $sql;
        $result = false;
        try {
            $statement = $conn->prepare($sql); // chuẩn bị một câu lệnh SQL được thực hiện(ví dụ: SELECT FROM user WHERE id = 1 );
            if (!empty($data)) {
                $result =  $statement->execute($data); // hàm execute là để thực hiện lệnh SQL được chuẩn bị trước đó
                // $statement truy cập vào phương thức để thực hiện 
            } else {
                $result = $statement->execute();
            }
            // $result =  $statement->execute($data);
        } catch (Exception $exception) {
            echo $exception->getMessage() . '<br>';
            echo $exception->getFile() . '<br>';
            echo $exception->getLine();
            die();
        }
        return $result;
    }

    //Hàm insert;
    function insert($table, $data)
    {
        $key = array_keys($data); // biến mảng $key sẽ lưu tất cả các keys trỏ đến dữ liệu của mảng trong biến $data;
        $cot = implode(',', $key); // nối mảng thành chuỗi ngăn cách bởi dấu ',' ;
        $value = ':' . implode(',:', $key);
        $sql = "INSERT INTO $table ($cot) VALUES ($value)";
        return $this->query($sql, $data);
    }

    // Hàm delete;
    function delete($table, $condition = '')
    {
        $sql = 'DELETE FROM ' . $table . ' WHERE ' . $condition;
        global $conn;
        try {
            $statement = $conn->prepare($sql);
            $statement->execute();
            $data = $statement->fetch(PDO::FETCH_ASSOC);
            return true;
        } catch (Exception $exception) {
            echo $exception->getMessage() . '<br>';
            echo $exception->getFile() . '<br>';
            echo $exception->getLine();
            die();
        }
        return false;
    }
    function deleteAll($table)
    {
        $sql = 'DELETE FROM ' . $table;
        return $this->query($sql, []);
    }
    // var_dump(deleteAll('user'));

    // Hàm update;
    function update($table, $data, $condition = '')
    {
        $update = '';
        foreach ($data as $keys => $value) {
            $update .= $keys . ' = :' . $keys . ',';
        }
        $update2 = trim($update, ','); // hàm trim dùng để loại bỏ kí tự đầu hoặc cuối của một chuỗi;
        $sql = 'UPDATE ' . $table . ' SET ' . $update2 . ' WHERE ' . $condition;

        return ($this->query($sql, $data));
    }

    function getRaw($sql)
    {
        global $conn;
        try {
            $statement = $conn->prepare($sql);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            if (is_object($result)) {
                return $result;
            }
            return $result;
        } catch (Exception $exception) {
            echo $exception->getMessage() . '<br>';
            echo $exception->getFile() . '<br>';
            echo $exception->getLine();
            die();
        }
    }
    function getAllraw($sql)
    {
        global $conn;
        try {
            $statement = $conn->prepare($sql);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            if (is_object($result)) {
                return $result;
            }
            return $result;
        } catch (Exception $exception) {
            echo $exception->getMessage() . '<br>';
            echo $exception->getFile() . '<br>';
            echo $exception->getLine();
            die();
        }
    }
    function selectAll($table)
    {
        global $conn;
        $sql = 'SELECT * FROM ' . $table;
        try {
            $statement = $conn->prepare($sql);
            $statement->execute();
            $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $exception) {
            echo $exception->getMessage() . '<br>';
            echo $exception->getFile() . '<br>';
            echo $exception->getLine();
            die();
        }
        return $data;
    }
    function checkEmail($email)
    {
        global $conn;
        try {
            $sql = 'SELECT email FROM user WHERE email = :email';
            $statement = $conn->prepare($sql); // chuẩn bị
            $statement->bindParam(':email', $email);
            $statement->execute(); // thực hiện;
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                return $result['email'];
            } else {
                return $result = false;
            }
        } catch (Exception $exception) {
            echo $exception->getMessage() . '<br>';
            echo $exception->getFile() . '<br>';
            echo $exception->getLine();
            die();
        }
    }
    function checkLogin($email, $password)
    {
        global $conn;

        try {
            $sql = 'SELECT password FROM user WHERE email = :email';
            $statement = $conn->prepare($sql);
            $statement->bindParam(':email', $email);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                return password_verify($password, $result['password']);
            } else {
                return false;
            }
        } catch (Exception $exception) {
            echo $exception->getMessage() . '<br>';
            echo $exception->getFile() . '<br>';
            echo $exception->getLine();
            die();
        }
    }
}
