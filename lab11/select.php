<?php
$conn = new mysqli('localhost', 'root', 'Cm1207557518', 'travel');
if(isset($_POST['submit'])){

    $continent = $_POST["continent"];
    $country = $_POST["country"];
    $query = "select * from ImageDetails where continent='$continent' country='$country'";
    $result = mysqli_query($conn,$query);
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
}
else{
    //从continents表单中获取数据
    $sql = "SELECT * from ImageDetails ";
    $result = mysqli_query($conn,$sql);
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
}