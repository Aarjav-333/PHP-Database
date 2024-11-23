<?php 

try {

    $conn = mysqli_connect("localhost", "root", "", "studentdb");


    if ($conn) {

        echo 'Connected<br>';

    } else {

        throw new Exception('Connection failed: ' . mysqli_connect_error());

    }


    function createTable($conn) {

        $create_query = "CREATE TABLE Student (

                            Roll_No INTEGER PRIMARY KEY AUTO_INCREMENT,

                            Name VARCHAR(50) UNIQUE,

                            Address VARCHAR(100),

                            Mark1 INTEGER,

                            Mark2 INTEGER

                          )";

        $sql = mysqli_query($conn, $create_query);

        if ($sql) {

            echo "CREATED TABLE SUCCESSFULLY!!!!!<br>";

        } else {

            echo "Error creating table: " . mysqli_error($conn) . "<br>";

        }

    }


    function insertValues($conn) {

        $insert_query = "INSERT INTO Student (Name, Address, Mark1, Mark2) VALUES ('Sudhi', 'Edavachal', 156, 111)";

        $sql = mysqli_query($conn, $insert_query);

        if ($sql) {

            echo "Inserted Successfully<br>";

        } else {

            echo "Error inserting data: " . mysqli_error($conn) . "<br>";

        }

    }


  // createTable($conn);


//    insertValues($conn);

    function displayData($conn) {

        $select_query = "SELECT * FROM Student";

        $result = mysqli_query($conn, $select_query);


        if (mysqli_num_rows($result) > 0) {

            echo "<table border='1' style = 'border-collapse : collapse';>

                    <tr>

                        <th>Roll No</th>

                        <th>Name</th>

                        <th>Address</th>

                        <th>Mark1</th>

                        <th>Mark2</th>

                    </tr>";

            while ($row = mysqli_fetch_assoc($result)) {

                echo "<tr>

                        <td>" . $row['Roll_No'] . "</td>

                        <td>" . $row['Name'] . "</td>

                        <td>" . $row['Address'] . "</td>

                        <td>" . $row['Mark1'] . "</td>

                        <td>" . $row['Mark2'] . "</td>

                    </tr>";

            }

            echo "</table>";

        }

    }

    displayData($conn);

    function deleteRow($conn, $roll_no) {

        $delete_query = "DELETE FROM Student WHERE Roll_No = $roll_no";

        $sql = mysqli_query($conn, $delete_query);

        if ($sql) {

            echo "Record with Roll_No $roll_no deleted successfully.<br>";

        } else {

            echo "Error deleting record: " . mysqli_error($conn) . "<br>";

        }

    }

    // deleteRow($conn, 12);

    function updateData($conn) {

        $update_query = "UPDATE Student SET ADDRESS = 'Pottakkuzhi' WHERE ROLL_No = 1 ";

        $sql = mysqli_query($conn, $update_query);

        if($sql) {

            echo "UPDATED";

        } else {

            echo "Error!";

        }

    }

    // updateData($conn);



} catch (Exception $e) {

    echo 'Error: ' . $e->getMessage();

}
