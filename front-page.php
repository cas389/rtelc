<!-- Pulls in Header.php Information -->
<?php get_header(); ?>

<main>
  <!-- Hero Image and Page Title -->
  <section class="hero-section">
    <?php the_post_thumbnail('full'); ?>
    <section class="home-title">
      <h1><?php the_title(); ?></h1>
      <h2><?php // Showing custom fields from plugin named "Advanced Custom Fields" from plugin library
      the_field('sub_heading'); ?> </h2>

      <button class="orange-button btn-slide"><a href="<?php the_field('button_link') ?>"><span class="button-arrow"> &#8702; &nbsp;</span> <?php the_field('button_text') ?></a></button>  


    </section> <!-- End of page-title Section -->
  </section> <!-- End of hero-section Section -->

</main>

<!-- Pulls in Footer.php Information -->
<?php get_footer(); ?>
