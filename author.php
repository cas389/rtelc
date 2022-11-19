<!-- Pulls in Header.php Information -->
<?php get_header(); ?>
<!-- Pulls in Header -->
<?php get_header(); ?>

<main class="container">
  <div class="row">
    <div class="col-md-12">
      <section class="main-section">
        <!-- Displays name of user -->
        <h2><?php echo get_the_author_meta('nickname'); ?></h2>

        <div class="row">
          <!-- Makes the users profile photo/avatar populate -->
          <p class="col-lg-2 col-md-3"><?php echo get_avatar(get_the_author_meta('ID')); ?></p>

          <ul class="col-md-9">
            <!-- Displays users email address -->
            <li><span class="bold">Email:</span> <a href="mailto:<?php echo get_the_author_meta('user_email'); ?>"><?php echo get_the_author_meta('user_email'); ?></a></li>

            <!-- Displays users website -->
            <li><a href="<?php echo get_the_author_meta('user_url'); ?>" target="_blank">Website</a></li>

            <!-- Displays users registration date -->
            <li><span class="bold">Registered Since:</span> <?php echo get_the_author_meta('user_registered'); ?></li>
          </ul><!-- End col-md-9 list -->
        </div><!-- End of row -->

        <div class="author-bio">
          <h3>Bio</h3>
          <!-- Displays users bio information -->
          <p><?php echo get_the_author_meta('description'); ?></p>
        </div><!-- End Author Bio -->
      </section><!-- End of author information section -->

      <section class="row main-section">
        <h3>Posts written by <?php echo get_the_author_meta('user_firstname') . " " .  get_the_author_meta('user_lastname'); ?></h3>
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
      </section> <!-- End of Blog Post Sections -->
    </div><!-- End of col-md-9 -->
  </div><!-- End of row -->
</main><!-- End of container -->

<!-- Pulls in Footer -->
<?php get_footer(); ?>

<!-- Pulls in Footer.php Information -->
<?php get_footer(); ?>
