<?php

                $servername = "localhost";
                $username = "root";
                $password = "";
                $database ="todo";
                
                // Create connection
                $conn = new mysqli($servername, $username, $password, $database);
                
                // Check connection
                if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
                }
               
               
                if(isset($_POST['save_select'])){
                $category=trim($_POST['category']);
                $task=trim($_POST['title']);
                //$submit=['save_select'];
             
           
                $sql=" INSERT INTO `demo` (`id`, `category`, `task`) VALUES (NULL, '$category', '$task')";
                //echo $sql;
                if ($conn->query($sql) === true) {
           
                    header("Location: todo.php");

                   
                } else {
                    echo "error: $sql <br>" . $conn->error;
                }
                $conn->close();
                 
            }
          
        
                
                
                ?>