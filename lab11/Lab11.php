<?php
//Fill this place

//****** Hint ******
//connect database and fetch data here
//连接数据库travel
$conn = new mysqli('localhost', 'root', 'Cm1207557518', 'travel');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Lab11</title>

      <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    
    

    <link rel="stylesheet" href="css/captions.css" />
    <link rel="stylesheet" href="css/bootstrap-theme.css" />    

</head>

<body>
    <?php include 'header.inc.php'; ?>
    


    <!-- Page Content -->
    <main class="container">
        <div class="panel panel-default">
          <div class="panel-heading">Filters</div>
          <div class="panel-body">
            <form action="Lab11.php" method="post" class="form-horizontal">
              <div class="form-inline">
              <select name="continent" class="form-control">
                <option value="0">Select Continent</option>
                <?php
                //Fill this place

                //****** Hint ******
                //display the list of continents
                //从continents表单中获取数据
                $sql = "SELECT * from continents ";
                $result = mysqli_query($conn,$sql);
                //复制获取的内容到数组之中 并且当键值相等时赋值到<option>标签中
                while($row = $result->fetch_assoc()) {
                  echo '<option value=' . $row['ContinentCode'] . '>' . $row['ContinentName'] . '</option>';
                }
                ?>
              </select>     
              
              <select name="country" class="form-control">
                <option value="0">Select Country</option>
                <?php 
                //Fill this place

                //****** Hint ******
                /* display list of countries */
                //从countries表单中获取数据
                $sql = "SELECT * from countries ";
                $result = mysqli_query($conn,$sql);
                //复制获取的内容到数组之中 并且当键值相等时赋值到<option>标签中
                while($row = $result->fetch_assoc()) {
                    echo '<option value=' . $row['ISO'] . '>' . $row['CountryName'] . '</option>';
                }
                ?>
              </select>    
              <input type="text"  placeholder="Search title" class="form-control" name=title>
              <input type="submit" class="btn btn-primary" name="submit" value="Filter">
              </div>
            </form>

          </div>
        </div>     
                                    

		<ul class="caption-style-2">
            <?php 
            //Fill this place

            //****** Hint ******
            /* use while loop to display images that meet requirements ... sample below ... replace ???? with field data
            <li>
              <a href="detail.php?id=????" class="img-responsive">
                <img src="images/square-medium/????" alt="????">
                <div class="caption">
                  <div class="blur"></div>
                  <div class="caption-text">
                    <p>????</p>
                  </div>
                </div>
              </a>
            </li>        
            */
            //当得到数据提交之后
            if(isset($_POST["continent"])) {
                //获得提交的数据的值
                    $continentCode = $_POST["continent"];
                    $countryCodeISO = $_POST["country"];
                    //当两个下拉框中都为初值时 仍得到所有艺术品
                   if($continentCode == "0" && $countryCodeISO == "0"){
                        $sql = "SELECT * from ImageDetails";
                        $result = mysqli_query($conn,$sql);
                    }
                   //当洲无下拉框值 国家有值时 以国家为键值进行检索
                    else if ($continentCode == "0" && $countryCodeISO != "0"){
                        $query = "SELECT * from ImageDetails where CountryCodeISO='$countryCodeISO'";
                        $result = mysqli_query($conn,$query);
                    }
                    //当国家无下拉框值 洲有时 以洲为键值进行检索
                    else if($continentCode != "0" && $countryCodeISO == "0"){
                        $query = "SELECT * from ImageDetails where ContinentCode='$continentCode'";
                        $result = mysqli_query($conn,$query);
                    }
                    //当国家与洲同时存在时 同时从数据库中提取
                    else if($continentCode != "0" && $countryCodeISO != "0"){
                        $query = "SELECT * from ImageDetails where ContinentCode='$continentCode' AND CountryCodeISO='$countryCodeISO'";;
                        $result = mysqli_query($conn,$query);
                    }
                    }
            //当无post传值时 得到所有艺术品的界面
           else{
                //从continents表单中获取数据
                $sql = "SELECT * from ImageDetails";
                $result = mysqli_query($conn,$sql);
            }
            //复制获取的内容到数组之中 并且当键值相等时赋值到相应html标签中
            while($row = $result->fetch_assoc()) {
                echo '<li>';
                echo '<a href="detail.php?id='.$row['ImageID'].'" class="img-responsive">';
                echo '<img src="images/square-medium/'.$row['Path'].'" alt="'.$row['Title'].'">';
                echo '<div class="caption">';
                echo '<div class="blur"></div>';
                echo ' <div class="caption-text">';
                echo ' <p>'.$row['Title'].'</p>';
                echo '</div>';
                echo ' </div>';
                echo '</a>';
                echo '</li>';
            }
           //lab注意点：比较用== 与 ！=
            ?>
       </ul>       

      
    </main>
    
    <footer>
        <div class="container-fluid">
                    <div class="row final">
                <p>Copyright &copy; 2017 Creative Commons ShareAlike</p>
                <p><a href="#">Home</a> / <a href="#">About</a> / <a href="#">Contact</a> / <a href="#">Browse</a></p>
            </div>            
        </div>
        

    </footer>


        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>

</html>