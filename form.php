<?php
<div class="contact-form">
  <form id="form"  action="retrieveform.php" method="POST">
      <label form="name">Name:</label>
      <input type="text" id="name" name="txtname" required>

      <label form="email">Email:</label>
      <input type="email" id="email" name="txtemail" required>

      <label form="phone">Phone no:</label>
      <input type="text" id="phone" name="txtphone" required>

      <label form="message">Message:</label>
      <textarea id="message" name="txtmessage" rows="4" required></textarea>

      <button type="submit">Submit</button>
  </form>
</div>
?>