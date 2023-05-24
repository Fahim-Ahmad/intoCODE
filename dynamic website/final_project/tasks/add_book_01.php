<?php
    $book_title_error = $publishing_year_error = $description_error = "";
    $book_title_check = $publishing_year_check = $description_check = false;

    if (isset($_POST["book_title"]) && isset($_POST["publishing_year"]) && isset($_POST["description"]) && isset($_POST["publisher"])) {
      
      if(empty($_POST["book_title"])) {
        $book_title_error = 'title should not be empty';
      } else if (is_numeric($_POST["book_title"])) {
        $book_title_error = 'title should not be numeric';
      } else {
        $book_title_check = true;
        $book_title = $_POST["book_title"];
      }
      
      if(empty($_POST["publishing_year"])) {
        $publishing_year_error = 'publishing year should not be empty';
      } else if (!is_numeric($_POST["publishing_year"])) {
        $publishing_year_error = 'publishing year should be numeric';
      } else {
        $publishing_year_check = true;
        $publishing_year = $_POST["publishing_year"];
      }
      
      if(empty($_POST["description"])) {
        $description_error = 'description should not be empty';
      } else if (is_numeric($_POST["description"])) {
        $description_error = 'description should not be numeric';
      } else {
        $description_check = true;
        $description = $_POST["description"];
      }
      
      // $publisher_id = $_POST["publisher_id"];
      
    }
?>

<div class="center">
    <form method="post" id="add_book">
          Title <span class="required">*</span>
          <span class="error"><?php echo $book_title_error; ?></span>
          <input type="text" name="book_title" placeholder="Book title...">
          <br><br>
          
          Year <span class="required">*</span>
          <span class="error"><?php echo $publishing_year_error; ?></span>
          <input type="text" name="publishing_year" placeholder="Publishing year...">
          <br><br>
          
          Description <span class="required">*</span>
          <span class="error"><?php echo $description_error; ?></span>
          <textarea name="description" rows=10></textarea>
          <br><br>
          
          Publisher<br>
          <?php
                $query = "SELECT DISTINCT title FROM publishers;";
                $result = $conn->query($query);
  
                if ($result->num_rows > 0) {
                    echo '<select name="publisher">';
    
                    while ($row = $result->fetch_assoc()) {
                        $title = $row['title'];
                        echo '<option value="' . $title . '">' . $title . '</option>';
                    }
    
                    echo '</select>';
                    $result->free();
                }
          ?>
          
          <br><br>
          <input type="submit" name="submit">
    </form>
</div>

<?php
    
    if (isset($_POST['publisher'])) {
      $publisher = $_POST["publisher"];
      
      $query = 'SELECT publisher_id FROM publishers WHERE title="' .$publisher .'";';
      // echo $query;
      $result = $conn->query($query);
      
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $publisher_id = $row['publisher_id'];
        }
      }
      
      // echo $publisher_id;
    }
    
    
    if ($book_title_check && $publishing_year_check && $description_check) {
                            
            $query = "INSERT INTO books (title, description, publishing_year, publisher_id)
                  VALUES ('$book_title', '$description', " .$publishing_year .", " .$publisher_id .")";
            
            // echo $query;
            $result = $conn->query($query);
    }
    
?>


