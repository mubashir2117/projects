
<?php
include "header.php";
?>
<?php
    include("config.php");
    $id = $_GET['editvideoid'];

   if(isset($_POST['submit'])){
    // $id = $_POST["id"];
    $video_name = $_POST["video_name"];
    $video_file = $_FILES["video_file"];
    $genre_id = $_POST["genre_id"];
    $Artist_id = $_POST["Artists_id"];
    
    $query1 = "UPDATE `video` SET `video_name`='$video_name',`video_file`='$video_file',
    `genre_id`='$genre_id',`Artists_id`='$Artist_id' WHERE `video_id` = '$id'";

    $result1 = mysqli_query($conn, $query1);

    if($result1){
       echo"update";
    }
    else{
        echo "Error";
    }
}
?>

<div class="content-body">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <form action="" method="Post">
                    <h1>Edit Video</h1>
                    <?php
                    $query = "SELECT * FROM `video` WHERE video_id = $id";
                    $result = mysqli_query($conn, $query);
                    $rows = mysqli_fetch_assoc($result);
                    ?>
        <input value="<?php echo $rows["video_id"]?>" type="hidden" name="id">

                    <input value="<?php echo $rows['video_name']?>" type="text" name="video_name"><br><br>
                    <input value="<?php echo $rows['video_file']?>" type="file" name="video_file"><br><br>

                    <select name="genre_id" id="" class="form-control mt-2">
            <?php
              $qry= "select * from genre";
              $res= mysqli_query($conn, $qry);
              
              while($data = mysqli_fetch_assoc($res)){
                  if($data['id'] == $rows['genre_id'] ){
                    $selected = 'selected';
                  }
                  else{
                    $selected = '';
                  }
                  ?>

                <option <?php echo $selected ?> value="<?php echo $data["id"]?>"><?php echo $data["genre_name"]?></option>
            <?php
                }
            ?>
        </select>
                   
        <select name="Artists_id" id="" class="form-control mt-2">
            <?php
              $qry= "select * from artist";
              $res= mysqli_query($conn, $qry);
              
              while($data = mysqli_fetch_assoc($res)){
                  if($data['Artists_id'] == $rows['Artist_id'] ){
                    $selected = 'selected';
                  }
                  else{
                    $selected = '';
                  }
                  ?>

                <option <?php echo $selected ?> value="<?php echo $data["Artist_id"]?>"><?php echo $data["artist_name"]?></option>
            <?php
                }
            ?>
        </select>
         
                    <button class="btn btn-outline-primary mt-3" name="submit">Edit</button>
                    <a href="songlist.php" class="btn btn-primary mt-3 mx-2">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>