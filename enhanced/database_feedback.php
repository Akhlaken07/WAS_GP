<title>Feedback Table</title>
<style>
    body {
        font-family: Arial, sans-serif;
    }
    table {
        width: 80%;
        margin: 20px auto;
        border-collapse: collapse;
    }
    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    th {
        background-color: #f2f2f2;
    }
    tr:hover {
        background-color: #f5f5f5;
    }
</style>
</head>
<body>
    <div class="centered">
        <?php
        $conn = new mysqli('localhost', 'root', '', 'healthywebsite');
        if ($conn->connect_error) {
            die('Connection Failed : ' . $conn->connect_error);
        }

        $sql = "SELECT id, name, mail, phone, address, message FROM feedback";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table border='1' align='center'>";
            echo "<tr><th>ID</th><th>Name</th><th>Mail</th><th>Phone</th><th>Address</th><th>Message</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['mail']) . "</td>";
                echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
                echo "<td>" . htmlspecialchars($row['address']) . "</td>";
                echo "<td>" . htmlspecialchars($row['message']) . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No results found.";
        }
        ?>

    </div>
</body>