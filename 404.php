<!-- Pulls in Header.php Information -->
<?php get_header(); ?>

<!-- Hero Image and Page Title -->
<main class="hero-404">
  <img src="http://localhost:8888/rtelc/wp-content/uploads/2022/11/404-page.png" alt="404 Blocks">
  <section class="text-404">
    <h1>Look like you're lost.</h1>
    <p>The Page you are looking for is not available!</p>

    <a href="<?php echo get_home_url(); ?>" class="button-404">Go to Home</a>
  </section> <!-- End of page-title Section -->
</main> <!-- End of hero-section Section -->


<!-- Pulls in Footer.php Information -->
<?php get_footer(); ?>
