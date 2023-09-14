<!DOCTYPE html>
<html>
  <head>
    <title>Night Club | Home</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <header>
      <nav>
        <ul>
          <li><a href="#about">О нас</a></li>
          <li><a href="#book a table">Забронировать столик</a></li>
          <li><a href="#gallery">Галерея</a></li>
          <li><a href="#contact">Связаться с нами</a></li>
        </ul>
      </nav>
      <div class="hero">
        <h1>Pandora</h1>
        <p>Dance all night in our club!!</p>
      </div>
    </header>
    <main>
      <section id="about">
        <h2>О нас</h2>
        <p>We are a premier night club located in the heart of the city. Our club offers a wide range of music and drinks to satisfy all your party needs! Come and experience the night with us!</p>
      </section>
      <section id="book a table">
      <div class="container">
      <h2>Забронировать столик</h2>
      <form method="post" action="book-table.php">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" required>
        <label for="date">Booking date:</label>
        <input type="date" id="date" name="date" required>
        <label for="table">Choose a table:</label>
        <select id="table" name="table" required>
          <option value="">-- Please choose a table --</option>
          <option value="1">Table 1</option>
          <option value="2">Table 2</option>
          <option value="3">Table 3</option>
          <option value="4">Table 4</option>
          <option value="5">Table 5</option>
        </select>
        <input type="submit" value="Book">
      </form>
      <div class="gallery">
          <?php
            // Get list of image files from directory
            $files = glob("images2/*.{jpg,jpeg,png,gif}", GLOB_BRACE);
            foreach ($files as $file) {
              echo '<img src="' . $file . '" alt="Night Club Image">';
            }
          ?>
    </div>
      
      </section>
      <section id="gallery">
        <h2>Галерея</h2>
        <div class="gallery">
          <?php
            // Get list of image files from directory
            $files = glob("images/*.{jpg,jpeg,png,gif}", GLOB_BRACE);
            foreach ($files as $file) {
              echo '<img src="' . $file . '" alt="Night Club Image">';
            }
          ?>
        </div>
      </section>
      <section id="contact">
        <h2>Связаться с нами</h2>
        <form action="submit-form.php" method="post">
          <input type="text" name="name" placeholder="Your Name (Required)" required>
          <input type="email" name="email" placeholder="Your Email (Required)" required>
          <textarea name="message" placeholder="Your Message"></textarea>
          <button type="submit">Send Message</button>
        </form>
      </section>
    </main>
    <footer>
      <p>&copy; 2023 Night Club</p>
    </footer>
  </body>
</html>