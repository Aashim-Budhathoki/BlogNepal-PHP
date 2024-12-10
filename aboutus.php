<?php
include('header.php');

$con = mysqli_connect("localhost", "root", "", "db_project") or die("Connection Error");

// Fetch content from the database
$result = mysqli_query($con, "SELECT * FROM tbl_aboutus");
$content = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $content[$row['section_name']] = $row['content'];
    }
} else {
    die("Error fetching content: " . mysqli_error($con));
}

mysqli_close($con);
?>

<h1 style="text-align: center;">About Us - Blog Nepal</h1>

<div class="container">
    <section class="mission-section">
        <h2>Our Mission</h2>
        <p><?php echo nl2br($content['mission']); ?></p>
    </section>
    <section class="why-choose-section">
        <h2>Why Choose Us?</h2>
        <p><?php echo nl2br($content['why_choose_us']); ?></p>
    </section>
    <section class="connect-section">
        <h2>Connect With Us</h2>
        <p><?php echo nl2br($content['connect_with_us']); ?></p>
        <ul class="list-inline" style="display:flex; flex-direction: row;">
            <li class="list-inline-item"><a href="https://www.facebook.com/ExploreNepalAdventures" target="_blank" class="social-icons">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                </svg></a>
            </li>
            <li class="list-inline-item"><a href="https://www.instagram.com/ExploreNepalAdventures" target="_blank" class="social-icons">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51c.99.635 2.472.977 3.932.977 1.461 0 2.943-.342 3.933-.977.445-.446.718-.892.923-1.417.198-.51.333-1.09.372-1.942C15.99 10.445 16 10.173 16 8.001c0-2.174-.01-2.446-.048-3.299-.04-.852-.174-1.434-.372-1.942a3.925 3.925 0 0 0-.923-1.417A3.933 3.933 0 0 0 13.24.42C12.733.222 12.15.088 11.3.048 10.445.01 10.173 0 8 0zM8 1.533c1.412 0 1.581.005 2.137.03.555.024.92.11 1.233.232.32.124.61.299.88.57.27.27.445.56.57.88.123.312.208.678.232 1.233.025.556.03.726.03 2.137s-.005 1.582-.03 2.138c-.024.554-.11.92-.232 1.233-.124.32-.3.61-.57.88-.27.27-.56.445-.88.57-.313.123-.679.208-1.233.232-.556.025-.726.03-2.137.03zM8 3.533a4.467 4.467 0 0 0-4.467 4.467A4.467 4.467 0 0 0 8 12.467 4.467 4.467 0 0 0 12.467 8 4.467 4.467 0 0 0 8 3.533zM8 4.533a3.467 3.467 0 1 1 0 6.934A3.467 3.467 0 0 1 8 4.533zm4.567-1.066a1.067 1.067 0 1 1 0 2.134 1.067 1.067 0 0 1 0-2.134z"/>
                </svg></a>
            </li>
        </ul>
    </section>
    <section class="contact-section">
        <h2>Contact Information</h2>
        <p><?php echo nl2br($content['contact']); ?></p>
    </section>
    <section class="journey-section">
        <h2>Your Journey Begins Here</h2>
        <p><?php echo nl2br($content['journey']); ?></p>
    </section>
</div>
<?php include('footer.php'); ?>
