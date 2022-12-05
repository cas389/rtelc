    <footer class="container">
      <div class="row">
        <div class="col-md-3 left-footer">
          <?php
            dynamic_sidebar('left-footer');
          ?>

          <div>
              <ul class="social-icon">
                    <?php do_action('social-media-links'); ?>
               </ul>
          </div>
        </div>

        <div class="col-md-2 center-links-footer">
          <?php
            // Footer Menu Bar Section
            // Says, if the footer is filled out, display menu, if not, displays a message.
            if(has_nav_menu('center-footer-links')){ ?>
              <nav class="footer-menu">
                <?php
                // Shows the navigation to the page, created by the user
                wp_nav_menu(array(
                  'theme_location'  => 'center-footer-links',
                ));
                ?>
              </nav><!-- End of footer-menu Navigation -->
            <?php
            } else {
              echo "<p>Please select a menu through the dashboard to display here.</p>";
            }
          ?>
        </div>

        <div class="col-md-4 center-logo-footer">
          <?php
            // Display logo if it's set, if not display site title
            if(get_header_image() == ''){ ?>
              <h1 class="header-logo-text"><a href="<?php echo get_home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
            <?php
            }else { ?>
              <a href="<?php echo get_home_url(); ?>"><img class="logo" src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="Company Logo" /></a>
          <?php
            }
          ?>
        </div>

        <div class="col-md-3 right-footer">
          <?php
            $companyName = get_option('company_name');

            if(!empty($companyName)){
             echo $companyName;
            } ?>

          <?php
            $companyAddress = get_option('company_address');

            if(!empty($companyAddress)){
             echo "<br />" .  $companyAddress;
            } ?>

          <?php
            $companyCityStateZip = get_option('company_city_zip');

            if(!empty($companyCityStateZip)){
             echo "<br />" .  $companyCityStateZip;
            } ?>

          <?php
            $companyNumber = get_option('company_number');

            if(!empty($companyNumber)){
             echo "<br />" .  $companyNumber;
            } ?>


          <?php
            dynamic_sidebar('right-footer');
          ?>
        </div>
      </div>

    </footer><!-- End of Footer -->
  </body><!-- End of Body Tag (Began in Header.php) -->
<?php wp_footer(); ?>
</html><!-- End of HTML Tag (Began in Header.php) -->
