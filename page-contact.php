<?php
  // Template Name: Contact Us Page
  // Template Post Type: page
  get_header();
?>

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


    <!-- Start of Contact Information Section -->
    <section class="container">
      <div class="row">

        <!-- Location Section -->
        <div class="col-md-4 contact-blocks">
          <div class="card">
            <?php
              dynamic_sidebar('contact-location');
            ?>
          </div>
        </div> <!-- End of Location Block (col-md-4) Div -->

        <!-- Phone Number Block -->
        <div class="col-md-4 contact-blocks">
          <div class="card">
            <?php
              dynamic_sidebar('contact-phone');
            ?>
          </div> <!-- End of Card Div -->
        </div> <!-- End of Phone Number Block (col-md-4) Div -->

        <!-- Email Block -->
        <div class="col-md-4 contact-blocks">
            <div class="card">
              <?php
                dynamic_sidebar('contact-email');
              ?>
          </div> <!-- End of Card Div -->
        </div> <!-- End of Email Block (col-md-4) Div -->
      </div> <!-- End of Row Div -->
    </section> <!-- End of Contact Section Div -->
  </div>
</main>

<section class="main-section contact-form">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <!-- Display Content on Page -->
        <p><?php the_content(); ?></p>
      </div>
    </div>
  </div>
</section>

<!-- Pulls in Footer.php Information -->
<?php get_footer(); ?>
