<?php include 'db.php'; session_start();
if(!isset($_SESSION['user_id'])) { header("Location: login.php"); exit; }

$user_id = $_SESSION['user_id'];

// CREATE item
if(isset($_POST['add'])){
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO items (user_id, title, description) VALUES ('$user_id','$title','$desc')";
    mysqli_query($conn, $sql);
}

// UPDATE item
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $sql = "UPDATE items SET title='$title', description='$desc' WHERE id=$id AND user_id=$user_id";
    mysqli_query($conn, $sql);
}

// DELETE item
if(isset($_POST['delete'])){
    $id = $_POST['id'];
    $sql = "DELETE FROM items WHERE id=$id AND user_id=$user_id";
    mysqli_query($conn, $sql);
}

// READ items
$items = mysqli_query($conn, "SELECT * FROM items WHERE user_id=$user_id");
?>

<h2>Welcome <?php echo $_SESSION['username']; ?>!</h2>
<a href="logout.php">Logout</a>

<h3>Add Item</h3>
<form method="POST">
    <input type="text" name="title" placeholder="Title" required>
    <input type="text" name="desc" placeholder="Description" required>
    <button type="submit" name="add">Add</button>
</form>

<h3>Your Items</h3>
<?php while($row = mysqli_fetch_assoc($items)): ?>
<form method="POST">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <input type="text" name="title" value="<?php echo $row['title']; ?>">
    <input type="text" name="desc" value="<?php echo $row['description']; ?>">
    <button type="submit" name="update">Update</button>
    <button type="submit" name="delete">Delete</button>
</form>
<?php endwhile; ?>
