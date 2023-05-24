<div style="margin:0 20% 0 20%;">

    <div id="wrapper">
        <div><a href="?form=add">Add book</a></div>
        <div><a href="?form=edit_2">Edit book</a></div>
        <div><a href="?form=delete_2">Delete book</a></div>
    </div>
    <br>
    
    <?php
        include("tasks/connect_db.php");
        
        $form = "add";
        if (isset($_GET['form'])) {
            $form = $_GET['form'];
        }
        
        if ($form == "add") {
            include_once("tasks/add_book_01.php");
        } else if ($form == "edit_2") {
        
            include_once("tasks/edit_book_02.php");
        } else if ($form == "edit_1") {
            include_once("tasks/edit_book_01.php");
            
        } else if ($form == "delete_2") {
            include_once("tasks/delete_book_02.php");
        } else if ($form == "delete_1") {
            include_once("tasks/delete_book_01.php");
        }
        
        echo '<hr>';
        include_once("tasks/books_box.php");
        
    ?>

</div>

