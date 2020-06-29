<?php

include 'Classes.php';

class DBUtil {

    public static function insert(Subject $object) {
        if ($object instanceof Subject) {
            $conn = new mysqli("localhost", "root", "", "collegedb");

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "insert into subjects values ('" . $object->getCode() . "', '" . $object->getTitle() . "', '" . $object->getCredit() . "' , '" . $object->getYear() . "')";

            if ($conn->query($sql) === TRUE) {
                //Successful
                return true;
            } else {
                echo $conn->error;
                return false;
            }

            $conn->close();
        }
    }

    public static function getAllInTable(String $tableName) {
        
        
        $conn = new mysqli("localhost", "root", "", "collegedb");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        //Get table columns
        $sql = "describe $tableName";
        $result = $conn->query($sql);
        $tableHeaders = "<tr>";
        
        if ($result->num_rows > 0) {
            
            //Generate the headers
            while ($row = $result->fetch_assoc()) {
                $tableHeaders .= "<th>" . $row["Field"] . "</th>";
            }
        }
        
        $tableHeaders .= "</tr>";

        // Get the actual data
        $sql = "SELECT * from $tableName";
        $result = $conn->query($sql);
        $tableStr = "";
        if ($result->num_rows > 0) {
            
            //Generate HTML table
            while ($row = $result->fetch_assoc()) {
                $tableStr .= "<tr><td>" . $row["code"] . "</td><td>" . $row["title"] . "</td><td>" . $row["credit"] . "</td><td>" . $row["yearOfStudy"] . "</td></tr>";
            }
        } else {
            $tableStr .=  "No data found.";
        }
        
        
        $conn->close();
        
        //combine to create table
        return "<table>$tableHeaders $tableStr </table";
    }

}
