<?php
    $book_title_error_box = $publishing_year_error_box = $description_error_box = "";
    $book_title_check_box = $publishing_year_check_box = $description_check_box = false;

    if (isset($_POST["book_title_box"]) && isset($_POST["publishing_year_box"]) && isset($_POST["description_box"]) && isset($_POST["publisher_box"])) {
      
      if(empty($_POST["book_title_box"])) {
        $book_title_error_box = 'title should not be empty';
      } else if (is_numeric($_POST["book_title_box"])) {
        $book_title_error_box = 'title should not be numeric';
      } else {
        $book_title_check_box = true;
        $book_title_box = $_POST["book_title_box"];
      }
      
      if(empty($_POST["publishing_year_box"])) {
        $publishing_year_error_box = 'publishing year should not be empty';
      } else if (!is_numeric($_POST["publishing_year_box"])) {
        $publishing_year_error_box = 'publishing year should be numeric';
      } else {
        $publishing_year_check_box = true;
        $publishing_year_box = $_POST["publishing_year_box"];
      }
      
      if(empty($_POST["description_box"])) {
        $description_error_box = 'description should not be empty';
      } else if (is_numeric($_POST["description_box"])) {
        $description_error_box = 'description should not be numeric';
      } else {
        $description_check_box = true;
        $description_box = $_POST["description_box"];
      }
      
      
    }
?>

<div class="book_info" id="add_book_box">

      <form method="post">
            
            <span class="error"><?php echo $book_title_error_box; ?></span>
            <input type="text" name="book_title_box" placeholder="Book title...">
            <span class="required">*</span>
            <br>
            
            <span class="error"><?php echo $publishing_year_error_box; ?></span>
            <input type="text" name="publishing_year_box" placeholder="Publishing year...">
            <span class="required">*</span>
            <br>
            
            <span class="error"><?php echo $description_error_box; ?></span>
            <textarea name="description_box" rows=4></textarea>
            <span class="required">*</span>
            <br>
            
            
            <?php
                $query = "SELECT DISTINCT title FROM publishers;";
                $result = $conn->query($query);
  
                if ($result->num_rows > 0) {
                    echo '<select name="publisher_box">';
                
                    while ($row = $result->fetch_assoc()) {
                        $title = $row['title'];
                        echo '<option value="' . $title . '">' . $title . '</option>';
                    }
                
                    echo '</select>';
                    $result->free();
                }
            ?>
          <br>
          <input type="submit" name="submit_box" value="Add new book">
      </form>



<?php
    
    if (isset($_POST['publisher_box'])) {
      $publisher_box = $_POST["publisher_box"];
      
      $query = 'SELECT publisher_id FROM publishers WHERE title="' .$publisher_box .'";';
      $result = $conn->query($query);
      
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $publisher_id_box = $row['publisher_id'];
        }
      }

    }
    
    
    if ($book_title_check_box && $publishing_year_check_box && $description_check_box) {
                            
            $query = "INSERT INTO books (title, description, publishing_year, publisher_id)
                  VALUES ('$book_title_box', '$description_box', " .$publishing_year_box .", " .$publisher_id_box .")";
            
            $result = $conn->query($query);
            
            if($result) {
              echo '<span class="success">Added successfully. Please refresh the page.</span>';
            }
    }

?>

</div>

