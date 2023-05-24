
<?php

      if (isset($_GET['book_id'])) {
        $book_id = $_GET['book_id'];
    
        $query = 'SELECT * FROM books WHERE id=' .$book_id;
        $result = $conn->query($query);
        
        if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          
          // $id_placeholder = $row['id'];
          $title_placeholder = $row['title'];
          $description_placeholder = $row['description'];
          $publishing_year_placeholder = $row['publishing_year'];
          
        }
        
        include('edit_book_form.php');
      }

?>









