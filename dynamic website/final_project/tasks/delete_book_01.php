<?php

    if (isset($_GET['book_id'])) {
        $book_id = $_GET['book_id'];
        $query = 'SELECT * FROM books WHERE id=' .$book_id;
        $result = $conn->query($query);
        
        if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $title_delete = $row['title'];
          $description_delete = $row['description'];
          $publishing_year_delete = $row['publishing_year'];
          
          echo '<h4>You are going to delete book # '  .$book_id .' with below details:</h4>';
          echo '<p>Title: ' .$title_delete .'</p>';
          echo '<p>Publication year: ' .$publishing_year_delete .'</p>';
          echo '<p>Description: ' .$description_delete .'</p>';
          // echo '<p>Book id: ' .$book_id .'<p>';
          
          echo '<form method="post">
                    <input type="submit" name="confirm" value="Confirm">
                </form>';

        }
    
    
    if (isset($_POST['confirm'])) {
            
            $query = "DELETE FROM books WHERE id=" .$book_id;
            
            if ($conn->query($query) == true) {
              echo '<span class="success">The above book is deleted successfully.</span>';
              echo '<br>';
              echo '<span class="success">Please refresh the page or click <a href="index.php">here<a> to go back to main page.</span>';
            } else {
              echo '<span class="warning">a problem has occured</span>';
            }
    }
    }

?>





