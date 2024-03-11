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
               
                ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>background Shapes</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>

        * {
            padding:0;
            margin:0;
            box-sizing: border-box;

        }

        body {
            background-color: #ccc;
            width:100vw;
            height:100vh;
            
            justify-content: center;
            align-items: center;
        }

        .container  {
            max-width:400px;
            height:100%;
            background:#fff;
            border-radius: 10px;
            overflow: overlay;
            position: relative;;
        }

        .mob   {
            width:100%;
            height: 100%;
            position: relative;
            
        }
        .mob .header {
    
    height: 140px;
    width: 100%;
    padding: 20px;
    background:url('images/wavew.svg');
    background-position: bottom;
    background-repeat: no-repeat;
    background-color: #BEEDF6;
    background-size:contain;
    display: flex;
    flex-direction: column;
    gap: 5px;
    
    }
    .mob .header img {
       
    position: absolute;
    right: 10px;
    top: 5px;
    }  

    .category-task {
        width: 100%;
    
    
    display: flex;
    flex-wrap: wrap;
    justify-content: space-evenly;
    row-gap: 5px;
    }
    .category-task .cat-cards {
        width:45%;
        height:100px;
        background:var(--cbg);
        
        border-radius: 10px;
    }
    .mb-20 {
        margin-bottom:20px;
    }
    .task-heading {
        padding:0px 20px;
    }

    .task-heading span {
        font-size:13px;
        background: rgb(235, 139, 139);
        color:#fff;
        padding:4px;
        border-radius: 10px;
    }

    .task-list {
        width:100%;
        padding:20px;
    }

    .task-list-card {
        background: #E3F7FB;
        margin-bottom:10px;
        padding:10px;
        border-radius: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .bottom-nav {
        width:100%;
        height:100px;
       
        display: flex;
        flex-direction: column;
        justify-content: end;
        position: absolute;
        bottom: 0;
    }
    .bottom-nav-inner {
        width:100%;
        height:60%;
        background: #BEEDF6;
        margin-top: 0px;
        display: flex;
        justify-content: space-between;
        position: relative;
    }
    .nav {
        background: #BEEDF6;
        width:50%;
        height:100%;
        
    }
    

    .add-task {
        width: 50px;
        height: 50px;
        background: #fff;
        display: block;
        position: absolute;
        line-height: 50px;
        font-size: 39px;
        font-weight: bolder;
        text-align: center;
        border-radius: 50%;
        left: calc(50% - 25px);
        top: -25px;
        box-shadow: 0px 0px 6px #6e7475;
      
    }

    .bottom-nav-inner:hover::before ~ .add-task {
       display: block;
    }

    .add-task-form {
        width:100%;
        height:0px;
        background: #00FFFFFF;
        position: absolute;
        top: 50%;
        transform: translate(0%, -50%);
        display: none;
      }

    .add-task-form .close {
        width: 50px;
        height: 50px;
        font-size: 30px;
        position:absolute;
        right:0;

    }
 form{
    display:flex;
    flex-direction: column;
    align-items:center;
    justify-content:center;
 }
    </style>
</head>
<body>


    <div class="container">


        <div class="mob">

            <div class="header">
                <img src="images/clock.webp" style="width:100px;" alt="">
                <?php
          
              $timestamp = time(); 
           
              $currentDate = gmdate('l, j M', $timestamp); 
              echo "<h2>".$currentDate."</h2>"; 
              
               
                ?>
              
                  <p>Hello Rahul!</p>  
            </div>
            <div class="task-heading mb-20">
                <h2>To Do <span id="value"><?php

                $value="SELECT * FROM `demo`";
                $covalue = $conn->query($value);
             $rowount=mysqli_num_rows($covalue);
             echo  $rowount;
                ?></span></h2>
            </div>
 
            <div class="category-task">

                <div class="cat-cards" style="--cbg:#BEEDF6">
<h3>Web design</h3>
<ol>

<?php
                 $sqlwebd= "SELECT * FROM `demo` WHERE `category` = 'Web design'";
                   $rsforweb = $conn->query($sqlwebd);
               
if ($rsforweb->num_rows > 0) {
    // output data of each row
    while($rows = $rsforweb->fetch_assoc()) {

echo "<li>". $rows['task']."</li>";
    }
  } else {
    echo "0 results";
  }
  //$conn->close();
  ?>
</ol>
                </div>
                <div class="cat-cards" style="--cbg:#F6BEBE">
                <h3>Web development</h3>
                <ol>
              
                <?php
                 $sqldevelopment= "  SELECT * FROM `demo` WHERE `category` = 'Web development'";
                   $rsdevelop = $conn->query($sqldevelopment);
               
if ($rsdevelop->num_rows > 0) {
    // output data of each row
    while($rows = $rsdevelop->fetch_assoc()) {

echo "<li>". $rows['task']."</li>";
    }
  } else {
    echo "0 results";
  }
  //$conn->close();
  ?>
</ol>  
                </div>
                <div class="cat-cards" style="--cbg:#B79EFF">
                <h3>SEO</h3> 
                <ol>
               
                <?php
                 $seo= " SELECT * FROM `demo` WHERE `category` = 'SEO'";
                   $rseo = $conn->query($seo);
               
if ($rseo->num_rows > 0) {
    // output data of each row
    while($rows = $rseo->fetch_assoc()) {

echo "<li>".$rows['task']."</li>";
    }
  } else {
    echo "0 results";
  }
  //$conn->close();
  ?>
</ol> 
                </div>
                <div class="cat-cards" style="--cbg:#69EDD5">
                <h3>Video editing</h3> 
                <ol>
                    <?php
                 $sqlvideo= "SELECT * FROM `demo` WHERE `category` = 'video editing'";
                   $rsvideo = $conn->query($sqlvideo);
               
if ($rsvideo->num_rows > 0) {
    // output data of each row
    while($rows = $rsvideo->fetch_assoc()) {

echo "<li>". $rows['task']."</li>";
    }
  } else {
    echo "0 results";
  }
  //$conn->close();
  ?>
   
</ol>
                </div>
            </div> <!-- category card div-->
            <div class="task-list">
                <div class="task-list-heading mb-20">
                <h2>In Progress <span id="valueput">2</span></h2>
                </div>
                <div class="task-list-card">
                    <div class="task-content">
                        <h4>Create Blog Post</h4>
                        <span>2 hrs remains</span>
                    </div>
                    <div class="task-progress">
                        <span>80%</span>
                    </div>
                </div>

                <div class="task-list-card">
                    <div class="task-content">
                        <h4>Redesign Website</h4>
                        <span>2 hrs remains</span>
                    </div>
                    <div class="task-progress">
                        <span>80%</span>
                    </div>
                </div>



            </div> <!-- task list End-->

            

            <div class="bottom-nav">

                <div class="bottom-nav-inner">
                    
                    <div class="nav left"></div>
                    <div style="transition: all 5s ease 0s;" class="add-task"><i class="fa-solid fa-plus"></i></div>
                    <div class="nav right"></div>
                </div>
                
            </div>


            <div class="add-task-form">
                <div class="close">
                    <i class="fa-solid fa-rectangle-xmark"></i>
                </div>
             
             
                 <form action="form.php" method="POST">
                          
                            <div class="from-group mb-3">
                                <label for="">category</label>
                                <select name="category" class="form-control">
                                    <option value="">--Select category--</option>
                                    <option value="Web design">Web design</option>
                                    <option value="Web development">Web development</option>
                                    <option value="SEO">SEO</option>
                                    <option value="Video editing">Video editing</option>
                                </select>
                            </div>
                            <div class="from-group mb-3">
                                <label for="">task</label>
                                <input type="text" name="title" class="form-control" />
                            </div>
                            <div class="from-group mb-3">
                                <button type="submit" name="save_select" class="btn btn-primary">Save</button>
                            </div>
                        </form>

            </div>
        </div>


    </div>
    <script>

        var addtask=document.querySelector('.add-task');
        var taskform=document.querySelector('.add-task-form');
        var popclose=document.querySelector('.add-task-form .close i');
   
        addtask.addEventListener('click',function(e){
           
            taskform.style.display='block';
            taskform.style.height='100%';
           
           
            
        });

        popclose.addEventListener('click',function(e){
            taskform.style.transition="2s ease";
taskform.style.display='none';
taskform.style.height='0px';

});
var val = document.querySelector("#value");
value = val.innerHTML;

document.querySelector("#valueinput").innerHTML= value;



    </script>
</body>
</html>