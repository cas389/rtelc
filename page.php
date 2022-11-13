<!-- Pulls in Header.php Information -->
<?php get_header(); ?>

<!-- Hero Image and Page Title -->
<section class="hero-section-page">
  <?php the_post_thumbnail('full'); ?>
  <div class="container">
    <div class="row">
      <div class="col-md-12 main-section">
        <h2 class="page-h2"><?php the_title(); ?></h2>
      </div>
    </div>
  </div>
</section> <!-- End of hero-section Section -->

<!-- Main Text on Page.php pages -->
<main class="container">
  <div class="row">
    <section class="col-md-12 main-section">
      <?php
      //Adds Breadcrumb
      BreadcrumFunction();
      ?>
    </section>
    <section class="col-md-8 main-section">
      <?php
        // WordPress Loop
        if(have_posts()){
          while(have_posts()){
            the_post(); ?>

            <!-- Display Content on Page -->
            <p><?php the_content(); ?></p>
          <?php
          } // End of While
        } // End of If statement
      ?>
    </section>

    <aside class="col-md-4 aside-section">
      <!-- Right Side Widget Bar Code -->
      <?php dynamic_sidebar('right-sidebar-pages'); ?>
    </aside>
  </div>
</main> <!-- End of text-area Section -->

<section class="orange-bottom-border">

</section>

<!-- Pulls in Footer.php Information -->
<?php get_footer(); ?>
