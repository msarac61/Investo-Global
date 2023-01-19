<?php

get_header();

// $unity = $_SESSION['unity'] ? $_SESSION['unity'] : '';

?>
<main>
  <div class="sare-pt-50 sare-pb-50">
    <div class="blog-title-about">
      <div class="container">
        <span>
          <div class="blog-title-header-name sare-fs-80">
            <h1><?php single_term_title(); ?></h1>
          </div>
        </span>
      </div>
    </div>
    <div class="container">
      <div class="row sare-mt-50">

        <?php $i = '0';
        if (have_posts()) : while (have_posts()) : the_post();

            $i++;

            $city = get_the_terms($post->ID, 'city');

            $district = get_the_terms($post->ID, 'district');

            $types = get_the_terms($post->ID, 'type');

            $statu = get_post_meta($post->ID, "proje_statu", true);
            $_SESSION['unity'] = "";
            if (isset($_GET['unity'])) {
              $_SESSION['unity'] = $_GET['unity'];
              if($_SESSION['unity']){
                 $unity = $_SESSION['unity'];
              }
            } 
            else if($_SESSION['unity']!=""){
              $unity = $_SESSION['unity'];
            }
             else {

              $unity = get_post_meta($post->ID, "unity", true);
            }

            if (get_post_meta($post->ID, "sale_price", true)) {

              $price = get_post_meta($post->ID, "sale_price", true);
            } else {

              $price = '0';
            }

            if ($unity == 'EUR' or $_SESSION['unity'] == 'EUR') {
              $unity = '€';
            } else if ($unity == 'USD'  or $_SESSION['unity'] == 'USD') {
              $unity = '$';
            } else {
              $unity = '₺';
            }

            if (isset($_GET['unity']) or $_SESSION['unity']) {

              $sale_price = TCMB_Converter($_SESSION['unity'], get_post_meta($post->ID, "unity", true), $price) . ' ' . $unity;
            } else {

              // $sale_price = number_format($price, 0, ',', '.') . ' ' . $unity;

              if ($_SESSION['unity']) {
                if ($unity == 'EUR'  or $_SESSION['unity'] == "EUR") {
                  $unity = '€';
                } else if ($unity == 'USD' or $_SESSION['unity'] == "USD") {
                  $unity = '$';
                } else {

                  $unity = '₺';
                }
                $sale_price = TCMB_Converter($_SESSION['unity'], get_post_meta($post->ID, "unity", true), $price) . ' ' . $unity;
              } else {
                $sale_price = number_format($price, 0, ',', '.') . ' ' . $unity;
              }
            }

        ?>

            <?php if ($i == '5') { ?>
              <?php if (term_description()) { ?>
                <div class="col-md-12 col-12 sare-mb-30 sare-mt-50">
                  <div class="seperator-2 text-center">
                    <div class="title-svg">
                      <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg`" `xmlns:xlink="http://www.w3.org/1999/xlink" width="83px" height="70px">
                          <image x="0px" y="0px" width="83px" height="70px" xlink:href="data:img/png;base64,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" />
                        </svg>
                      </div>
                    </div>
                    <?php echo term_description(); ?>
                  </div>
                </div>
              <?php } ?>
            <?php } ?>

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 sare-mt-30">
              <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                <div class="project-vertical-img">
                  <?php if (!empty($statu)) { ?>
                    <?php if ($statu != 'None') { ?>
                      <div class="project-images-on-features">
                        <div class="project-iof">
                          <span class="icon"><i class="bi bi-check2"></i></span> <span class="text"><?php _e('Ready To Move', 'InvestoGlobal'); ?></span>
                        </div>
                      </div>
                    <?php } ?>
                  <?php } ?>

                  <?php

                  if (has_post_thumbnail($post->ID)) {
                    echo get_the_post_thumbnail($post->ID, 'archive_project_image', array('class' => 'w-100'));
                  } else {
                    echo '<img src="' . get_bloginfo('template_url') . '/assets/img/project-vertical.jpg" class="img-fluid">';
                  }

                  ?>

                  <div class="project-images-on-title">
                    <div class="project-custom-title"><?php the_title(); ?></div>
                    <div class="project-iof-price sare-fw-600 text-transform-uppercase">
                      <div class="row row-no-gutter align-item-center">
                        <div class="col-md-7 col-7">
                          <div class="city-dot-iof sare-fs-14">
                            <?php echo $district[0]->name; ?>
                          </div>
                          <div class="city-iof sare-fs-12"><?php echo $city[0]->name; ?></div>
                        </div>
                        <div class="col-md-5 col-5 Xprice">
                          <div class="<?php if (apply_filters('wpml_is_rtl', NULL)) { ?>text-left<?php } else { ?>text-right<?php } ?> sare-fw-700 color-primary text-transform-uppercase"><?php if (get_post_meta($post->ID, "sale_price", true) > 0 or !empty(get_post_meta($post->ID, "sale_price", true))) {
																																																							echo $sale_price;
																																																						} else if(empty(get_post_meta($post->ID, "sale_price", true)) or get_post_meta($post->ID, "sale_price", true) == 0) {
																																																							echo __('Sold Out', 'InvestoGlobal');
																																																						}; ?></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>

          <?php endwhile;
        else : ?>
        <?php endif; ?>
        <div class="col-md-12">
          <div class="sare-pagination sare-mt-20">
            <?php pagination_wp_query(); ?>
          </div>
        </div>
        <?php wp_reset_query(); ?>
      </div>
    </div>
  </div>
</main>

<?php get_footer(); ?>