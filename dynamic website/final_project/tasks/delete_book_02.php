<?php
    include("tasks/connect_db.php");
?>

<form method="post">
        <input type="submit" value="select the book to remove">
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
                    <input type="hidden" value="' .$book_id .'" name="books_list">
                    <input type="submit" name="confirm" value="Confirm">
                </form>';
          
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
    }
    
?>

