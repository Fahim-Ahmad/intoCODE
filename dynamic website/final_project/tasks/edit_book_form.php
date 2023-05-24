<form action="" method="post" id="edit_book">

      <?php
              $book_title_edit_error = $publishing_year_edit_error = $description_edit_error = "";
              $book_title_edit_check = $publishing_year_edit_check = $description_edit_check = false;
              
              if (isset($_POST["book_title_edit"]) && isset($_POST["publishing_year_edit"]) && isset($_POST["description_edit"]) && isset($_POST["publisher_id_edit"])) {
                  
                            if(empty($_POST["book_title_edit"])) {
                              $book_title_edit_error = 'title should not be empty';
                            } else if (is_numeric($_POST["book_title_edit"])) {
                              $book_title_error = 'title should not be numeric';
                            } else {
                              $book_title_edit_check = true;
                              $book_title_edit = $_POST["book_title_edit"];
                            }
                  
                            if(empty($_POST["publishing_year_edit"])) {
                              $publishing_year_edit_error = 'publishing year should not be empty';
                            } else if (!is_numeric($_POST["publishing_year_edit"])) {
                              $publishing_year_edit_error = 'publishing year should be numeric';
                            } else {
                              $publishing_year_edit_check = true;
                              $publishing_year_edit = $_POST["publishing_year_edit"];
                            }
                  
                            if(empty($_POST["description_edit"])) {
                              $description_edit_error = 'description should not be empty';
                            } else if (is_numeric($_POST["description_edit"])) {
                              $description_edit_error = 'description should not be numeric';
                            } else {
                              $description_edit_check = true;
                              $description_edit = $_POST["description_edit"];
                            }
                  
              }
      ?>
      
      <input type="hidden" name="id_edit" value="<?php echo $book_id ?>">
      <input type="hidden" value="' .$book_id .'" name="books_list">
      
      update title <span class="required">*</span>
      <span class="error"><?php echo $book_title_edit_error; ?></span>
      <input type="text" name="book_title_edit" value="<?php echo $title_placeholder ?>" >
      <br><br>

      update year <span class="required">*</span>
      <span class="error"><?php echo $publishing_year_edit_error; ?></span>
      <input type="text" name="publishing_year_edit" value="<?php echo $publishing_year_placeholder ?>" >
      <br><br>

      update description <span class="required">*</span>
      <span class="error"><?php echo $description_edit_error; ?></span>
      <textarea name="description_edit" rows=10> <?php echo $description_placeholder ?> </textarea>
      <br><br>

      update publisher<span class="required">*</span><br>
      <select class="form-control" id="publisher_id" name="publisher_id_edit" >

      <?php
      
                 $query = "SELECT * FROM publishers";
                 $result = $conn->query($query);
                 
                 if ($result->num_rows > 0) {
                 while ($publisher_row = $result->fetch_assoc()) {
                    $selected_val = ($publisher_row['publisher_id'] == $row['publisher_id']) ? 'selected' : '';
                    echo '<option value="' . $publisher_row['publisher_id'] . '" ' . $selected_val . '>' . $publisher_row['title'] . '</option>';
                 }
                 }
                
      ?>
      </select>
      <br><br>

      <button type="submit">Update</button>
</form>

<?php

    /*
    echo $book_title_edit;
    echo '<br>';
    echo $description_edit;
    echo '<br>';
    echo $publishing_year_edit;
    echo '<br>';
    echo $publisher_id_edit;
    echo '<br>';
    echo $id_edit;
    */
    
    
    if ($book_title_edit_check && $publishing_year_edit_check && $description_edit_check) {
        $book_title_edit = $_POST['book_title_edit'];
        $description_edit = $_POST['description_edit'];
        $publishing_year_edit = $_POST['publishing_year_edit'];
        $publisher_id_edit = $_POST['publisher_id_edit'];
        $id_edit = $_POST['id_edit'];
    
            $query = "UPDATE books SET title='$book_title_edit',
                                       description='$description_edit',
                                       publishing_year=$publishing_year_edit,
                                       publisher_id=$publisher_id_edit
                                       WHERE id=" .$id_edit;
                                               
             // echo $query;
            $result = $conn->query($query);
            
    }
    
?>

