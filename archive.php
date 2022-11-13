<!-- Pulls in Header.php Information -->
<?php get_header(); ?>



<!-- Page Title -->
<section class="hero-section-page">
  <div class="container">
    <div class="row">
      <div class="col-md-12 main-section">
        <h2 class="page-h2">
          <?php
            if(is_category()){
              single_cat_title();
            }elseif(is_tag()){
              single_tag_title();
            }elseif(is_day()){
              echo "Daily Archives: " . get_the_date();
            }elseif(is_month()){
              echo "Monthly Archives: " . get_the_date('F Y');
            }elseif(is_year()){
              echo "Yearly Archives: " . get_the_date('Y');
            }else {
              echo "Archives";
            }
          ?>
        </h2> <!-- End of archive-title -->
      </div>
    </div>
  </div>
</section> <!-- End of hero-section Section -->




<!-- Main Text -->
<main class="container">
  <div class="row main-section">
    <div class="col-md-12">
      <?php
      //Adds Breadcrumb
      BreadcrumFunction();
      ?>
    </div>
  </div>

  <section class="row main-section">
    <?php
      // WordPress Loop
      if(have_posts()){
        while(have_posts()){
          the_post(); ?>

          <div class="blog-post col-md-3">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium');?></a>
            <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
            <p><?php echo get_the_excerpt(); ?></p>
            <p><a class="read-more-link" href="<?php the_permalink(); ?>">Read More...</a></p>
          </div>
        <?php
        } //End of while loop
      } // End of If Statment ?>
    <!-- Add Pagination to Blog Index Page -->
    <p class="pagination-para"><?php pagination_for_site(); ?></p>
  </section>
</main> <!-- End of col-md-9 -->

<section class="orange-bottom-border">

</section>

<!-- Pulls in Footer.php Information -->
<?php get_footer(); ?>
