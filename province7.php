<?php
// Database connection
$con = mysqli_connect("localhost", "root", "", "db_project");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Create province_content table if not exists
$create_tbl = "CREATE TABLE IF NOT EXISTS province_content (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL
)";

mysqli_query($con, $create_tbl) or die("Table creation error: " . mysqli_error($con));

// Check if province_content table has data
$query_check = "SELECT COUNT(*) as count FROM province_content";
$result_check = mysqli_query($con, $query_check);
$row_check = mysqli_fetch_assoc($result_check);

if ($row_check['count'] == 0) {
    // Insert initial data into province_content table
    $insert = "INSERT INTO province_content (title, content) VALUES (
        'Province:7 (Sudurpaschim)',
        'The Province No. 7, also known as the Sudurpaschim Province covers 19,539 sq km area (about 13.22% of the country’s total area). The capital city is Godawari and the three major cities are Dhangadi, Bhimdutta (Mahendranagar), and Tikapur; Dhangadi being the largest city. The province has Tibet on its North, Province No 5 and 6 (Karnali Province and Lumbini Province respectively) on its East, states of India – Uttarakhand to its West, and Uttar Pradesh to its South. The province has a 40.6% Himalayan region, 34.54% Hilly region, and 24.86% Terai region in total. It lies to the far West of the country. There are a total of 9 districts in this province: Achham, Baitadi, Bajhang, Bajura, Dadeldhura, Darchula, Doti, Kailali, and Kanchanpur. There is 1 sub-metropolitan city, 33 municipalities, and 55 rural municipalities in the province. According to the 2011 census, the population is 2,552,517 which is 9.63% of the total population of Nepal. The majority of the people follow Hinduism (i.e. 97.23% people).'
    )";

    mysqli_query($con, $insert) or die ("Insertion error: " . mysqli_error($con));
}

// Select data from province_content table
$query_select = "SELECT * FROM province_content";
$result_select = mysqli_query($con, $query_select);

if ($result_select) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Province No. 7 Information</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                line-height: 1.6;
            }
            .container {
                width: 80%;
                margin: auto;
                padding: 20px;
            }
            h1 {
                text-align: center;
                margin-bottom: 20px;
            }
        </style>
    </head>
    <body>
    <div class="container">
        <h1>Province No. 7 (Sudurpaschim) Information</h1>
        <?php
        while ($row = mysqli_fetch_assoc($result_select)) {
            echo "<h2>" . htmlspecialchars($row['title']) . "</h2>";
            echo "<p>" . nl2br(htmlspecialchars($row['content'])) . "</p>";
        }
        ?>
    </div>
    </body>
    </html>
    <?php
} else {
    echo "Error retrieving data: " . mysqli_error($con);
}

// Free result set
mysqli_free_result($result_select);

// Close connection
mysqli_close($con);
?>
