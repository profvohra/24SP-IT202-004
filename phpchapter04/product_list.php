<?php
  // Slide 26
  // USE database_local OR database_njit, which ever one works!
  require_once('database_local.php');

  // Get category ID
  $category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
  if($category_id == NULL || $category_id == FALSE) {
    $category_id = 1;
  }

  $queryCategory = 'SELECT * FROM categories WHERE categoryID = :category_id';
  $statement1 = $db->prepare($queryCategory);
  $statement1->bindValue(':category_id', $category_id);
  $statement1->execute();
  $category = $statement1->fetch();
  $category_name = $category['categoryName'];
  $statement1->closeCursor();
  // DEBUGGING ONLY
  // echo "<pre>";
  // print_r($category);
  // echo "</pre>";
  // echo "The category name is $category_name";

  $queryAllCategories = 'SELECT * FROM categories ORDER BY categoryID';
  $statement2 = $db->prepare($queryAllCategories);
  $statement2->execute();
  $categories = $statement2->fetchAll();
  $statement2->closeCursor();
  // DEBUGGING ONLY
  // echo "<pre>";
  // print_r($categories);
  // echo "</pre>";
?>
<html>
  <head>
    <title>My Guitar Shop</title>
  </head>
  <body>
    <main>
      <h1>Product List</h1>
      <h2>Categories</h2>
      <ul>
        <?php foreach( $categories as $category) : ?>
          <li>
            <a href="?category_id=<?php echo $category['categoryID']; ?>"><?php echo $category['categoryName']; ?></a>
          </li>
        <?php endforeach ?>
      </ul>
    </main>
  </body>
</html>
