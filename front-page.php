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





  <!-- Start of Program Section -->
  <section class="container">
    <h1 class="text-center">Our Programs</h1>
    <div class="row">

      <!-- Preschool Block -->
      <div class="col-md-4 program-section">
        <div class="card">
          <?php
            dynamic_sidebar('left-home-page-widget-programs');
          ?>
        </div>
      </div> <!-- End of Preschool Block (col-md-4) Div -->

      <!-- Pre-K Block -->
      <div class="col-md-4 program-section">
        <div class="card">
          <?php
            dynamic_sidebar('middle-home-page-widget-programs');
          ?>
        </div> <!-- End of Card Div -->
      </div> <!-- End of Pre-K Block (col-md-4) Div -->

      <!-- Kindergarten Block -->
      <div class="col-md-4 program-section">
          <div class="card">
            <?php
              dynamic_sidebar('right-home-page-widget-programs');
            ?>
        </div> <!-- End of Card Div -->
      </div> <!-- End of Pre-K Block (col-md-4) Div -->
    </div> <!-- End of Row Div -->
  </section> <!-- End of Program Section Div -->


  <section class="instagram-feed-home">
    <h1 class="text-center">Our Gallery</h1>
    <?php
      dynamic_sidebar('instagram-feed');
    ?>
  </section>
</main>

<!-- Pulls in Footer.php Information -->
<?php get_footer(); ?>
