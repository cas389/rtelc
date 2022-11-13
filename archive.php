<!-- Pulls in Header.php Information -->
<?php get_header(); ?>

  <div class="container">
    <div class="row">
      <main class="col-md-9">
        <section class="archive-container">
          <h2 class="archive-title">
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

          <?php
            // WordPress Loop
            if(have_posts()){
              while(have_posts()){
                the_post(); ?>
                <article class="individual-posts">
                  <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                  <?php
                    // Display Author and Publish Date Links
                    post_data();
                  ?>

                  <?php the_post_thumbnail('medium');?>

                  <?php the_excerpt(); ?>
                </article> <!-- Individual Post -->
              <?php } //End of while loop

              //Pagination function
              pagination_for_site();
            }

          ?>
        </section> <!-- End of archive-container -->
      </main> <!-- End of col-md-9 -->
    </div> <!-- End of row -->
  </div> <!-- End of Container -->

<!-- Pulls in Footer.php Information -->
<?php get_footer(); ?>
