<?php
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Presentation";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GYM WORKOUTS BY RAJ KUMAR</title>
    <style>
        body {
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f8f8f8;
}

header {
    background-color: #2b2d42;
    color: #fff;
    padding: 40px 0;
    text-align: center;
    font-size: 48px;
    letter-spacing: 2px;
    text-transform: uppercase;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

nav {
    background-color: #333;
    padding: 15px 0;
    text-align: center;
}

nav a {
    color: #fff;
    text-decoration: none;
    margin: 0 20px;
    font-size: 20px;
    font-weight: bold;
    letter-spacing: 1px;
    transition: color 0.3s ease;
}

nav a:hover {
    color: #ff6600;
}

section {
    padding: 40px 20px;
}

h2 {
    color: #2b2d42;
    font-size: 36px;
    text-align: center;
    margin-bottom: 30px;
}

.articles, .tutorials {
    background-color: #fff;
    border-radius: 20px;
    padding: 30px;
    margin-bottom: 40px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
}

.articles h3, .tutorials h3 {
    color: #2b2d42;
    font-size: 24px;
    margin-bottom: 20px;
}

.articles p, .tutorials p {
    color: #555;
    font-size: 18px;
    line-height: 1.6;
}

footer {
    background-color: #2b2d42;
    color: #fff;
    padding: 30px 0;
    text-align: center;
    position: fixed;
    bottom: 0;
    width: 100%;
}

.footer-text {
    font-size: 14px;
}

.footer-text a {
    color: #fff;
    text-decoration: none;
}

.footer-text a:hover {
    color: #ff6600;
}

    </style>
</head>
<body>
    <header>
        <h1>GYM WORKOUTS BY RAJ KUMAR</h1>
        <p>Student ID: 202105897</p>
    </header>
    <nav>
        <a href="#articles">Articles</a>
        <a href="#tutorials">Tutorials</a>
    </nav>
    <section id="articles" class="articles">
        <h2>Articles</h2>
        <?php
            // Query articles from database
            $sql = "SELECT title, content, author, publish_date FROM articles";
            $result = $conn->query($sql);

            // Display articles
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<article>";
                    echo "<h3>" . $row["title"] . "</h3>";
                    echo "<p>" . $row["content"] . "</p>";
                    echo "<p>Author: " . $row["author"] . " | Publish Date: " . $row["publish_date"] . "</p>";
                    echo "</article>";
                }
            } else {
                echo "No articles found.";
            }
        ?>
    </section>
    <section id="tutorials" class="tutorials">
        <h2>Tutorials</h2>
        <?php
            // Query tutorials from database
            $sql = "SELECT title, description, video_url, author, publish_date FROM tutorials";
            $result = $conn->query($sql);

            // Display tutorials
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<article>";
                    echo "<h3>" . $row["title"] . "</h3>";
                    echo "<p>" . $row["description"] . "</p>";
                    echo "<p>Author: " . $row["author"] . " | Publish Date: " . $row["publish_date"] . "</p>";
                    if ($row["video_url"]) {
                        echo "<p>Video URL: <a href='" . $row["video_url"] . "'>" . $row["video_url"] . "</a></p>";
                    }
                    echo "</article>";
                }
            } else {
                echo "No tutorials found.";
            }
        ?>
    </section>
    <footer>
        <p>&copy; 2024 GYM WORKOUTS BY RAJ KUMAR. All rights reserved.</p>
    </footer>
    <?php
        // Close connection
        $conn->close();
    ?>
</body>
</html>
