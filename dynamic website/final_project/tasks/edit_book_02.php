<form method="post">
        <input type="submit" value="select the book to edit">
        <select name="books_list" >
        
              <?php
              
                         $query = "SELECT * FROM books;";
                         $result = $conn->query($query);
                         
                         if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="' .$row['id']  .'">' .$row['title'] .'</option>';
                            }
                         }
                        
              ?>
        </select>
</form>

<?php
      if (isset($_POST['books_list'])) {
        $book_id = $_POST['books_list'];
      }
      
      if (!empty($book_id)) {
        $query = 'SELECT * FROM books WHERE id=' .$book_id;
        $result = $conn->query($query);
        
        $title_placeholder = $description_placeholder = $publishing_year_placeholder = "";
        
        if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          
          $title_placeholder = $row['title'];
          $description_placeholder = $row['description'];
          $publishing_year_placeholder = $row['publishing_year'];
          
        }
      
        include('edit_book_form.php');
      }
?>


