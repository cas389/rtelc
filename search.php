<!-- Pulls in Header.php Information -->
<?php get_header(); ?>

<div class="container">
  <main class="row">
    <section class="col-md-12 main-section">
      <!-- Variable $s is the item you are searching for in search bar -->
      <h2 class="search-title">Search Results for "<?php echo $s; ?>"</h2>

      <section class="row main-section">
        <?php
          // WordPress Loop
          if(have_posts()){
            while(have_posts()){
              the_post(); ?>

              <div class="blog-post col-md-6">
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium');?></a>
                <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                <p><?php echo get_the_excerpt(); ?></p>
                <p><a class="read-more-link" href="<?php the_permalink(); ?>">Read More...</a></p>
              </div>
            <?php
          } //End of while loop ?>
        <!-- Add Pagination to Blog Index Page -->
        <p class="pagination-para"><?php pagination_for_site(); ?></p>
        <?php }else { ?>
        <div class="col-lg-12">
          <?php
            echo "<p>We're sorry, the term you are looking for was not found in our website. Please try another search.</p>";

            get_search_form(); // Build in WordPress function. Retrieves search functionality
          ?>
        </div>
      <?php
    } // End of else loop?>
      </section>
    </section>
  </main><!-- End of row Main -->
</div><!-- End of container Div -->

<!-- Pulls in Footer.php Information -->
<?php get_footer(); ?>
