<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['name'] ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333;
        }

        header {
            background-color: #0f4eb4; /* Primary color */
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        nav {
            background-color: #0056b3;
            padding: 10px;
            text-align: center;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
        }

        section {
            padding: 20px;
            margin: 20px;
            background-color: #fff;
            border-radius: 10px;
        }

        footer {
            background-color: #0f4eb4; /* Primary color */
            color: #fff;
            padding: 10px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
<header>
    <h1><?php echo $data['name'] ?></h1>
</header>

<nav>
    <ul>
        <li><a href="https://baylanka.net/">Company Website</a></li>
    </ul>
</nav>

<section>
    <h2>About BayFrame</h2>
    <p>BayFrame is a PHP framework designed with the MVC (Model-View-Controller) pattern. It provides a structured approach to developing web applications, separating the concerns of data, presentation, and logic.</p>

    <h2>Key Features</h2>
    <ul>
        <li>Modularity: BayFrame allows developers to organize code into modules, promoting code reusability and maintainability.</li>
        <li>Database Integration: BayFrame offers seamless integration with various databases, making data management efficient and scalable.</li>
        <li>Security: Built-in security features help protect web applications from common vulnerabilities such as SQL injection and cross-site scripting (XSS).</li>
        <li>Routing: BayFrame's routing system enables clean and customizable URLs, enhancing the user experience and SEO.</li>
    </ul>
</section>

<footer>
    <p>&copy; 2024 <?php echo $data['name'] ?>. All rights reserved.</p>
</footer>
</body>
</html>
