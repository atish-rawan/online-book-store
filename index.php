<?php  
// Sample array of books (this could come from a database)  
$books = [  
    ["title" => "Book 1", "author" => "Author 1", "image" => "images/book1.jpg"],  
    ["title" => "Book 2", "author" => "Author 2", "image" => "images/book2.jpg"],  
    ["title" => "Book 3", "author" => "Author 3", "image" => "images/book3.jpg"],  
    ["title" => "Book 4", "author" => "Author 4", "image" => "images/book4.jpg"],  
    // Add more books as needed  
];  
?>  

<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" href="css/style.css">  
    <title>Book Store</title>  
</head>  
<body>  

<header>  
    <h1>Welcome to Our Book Store</h1>  
    <nav>  
        <a href="#">Home</a>  
        <a href="#">About</a>  
        <a href="#">Contact</a>  
    </nav>  
</header>  

<div class="container">  
    <h2>Featured Books</h2>  
    <div class="books">  
        <?php foreach ($books as $book): ?>  
            <div class="book">  
                <img src="<?php echo $book['image']; ?>" alt="<?php echo $book['title']; ?>">  
                <h3><?php echo $book['title']; ?></h3>  
                <p>by <?php echo $book['author']; ?></p>  
            </div>  
        <?php endforeach; ?>  
    </div>  
</div>  

<footer>  
    <p>&copy; 2023 Book Store. All rights reserved.</p>  
</footer>  

</body>  
</html>