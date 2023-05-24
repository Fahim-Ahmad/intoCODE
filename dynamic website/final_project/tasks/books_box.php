<?php
$query = "SELECT b.id, b.title, b.description, b.publishing_year, b.publisher_id,
	               p.title AS publisher_title
          FROM books b
          INNER JOIN publishers p ON b.publisher_id = p.publisher_id;";

$result = $conn->query($query);

if ($result->num_rows > 0) {

  while ($row = $result->fetch_assoc()) {
    $id = $row['id'];
    $title = $row['title'];
    $description = $row['description'];
    $publishing_year = $row['publishing_year'];
    $publisher_title = $row['publisher_title'];
    
    echo '<div class="book_info">';
        echo '<span class="book_title">' .$title .'</span>';
        echo '<br>';
        echo '<span class="publisher"> Published by ' .$publisher_title .' in ' .$publishing_year .'</span>';
        echo '<br>';
        echo '<p>' .$description .'</p>';
        
        echo '<div id="delete_edit" >';

              echo '<form method="get">';
              echo '<input type="hidden" name="book_id" value="' .$id . '">';
              echo '<input type="hidden" name="form" value="delete_1">';
              echo '<input type="submit" name="delete" value="Delete book ' .$id .'">';
              echo '</form>';
              
              echo '<form method="get">';
              echo '<input type="hidden" name="book_id" value="' .$id . '">';
              echo '<input type="hidden" name="form" value="edit_1">';
              echo '<input type="submit" name="edit" value="Edit book ' .$id .'">';
              echo '</form>';
              
        echo '</div>';
    echo '</div>';
  }
  
   // include_once('tasks/delete_book.php');
  // include_once('tasks/edit_book.php');
}
  
  include_once('add_book_02.php'); 
  echo '<div class="clearfix"></div>';
?>







