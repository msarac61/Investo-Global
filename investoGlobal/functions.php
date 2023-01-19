<?php


function wpmlStringToLanguage($val)
{

  global $wpdb;
  $sql = "SELECT * FROM wp_icl_strings WHERE value = '$val' AND context = 'Theme Options' ";
  $result = $wpdb->get_results($sql);
  $iclID = $result[0]->id;
  $lng = ICL_LANGUAGE_CODE;
  $sql1 = "SELECT * FROM wp_icl_string_translations WHERE string_id = $iclID AND language = '$lng' ";
  $result1 = $wpdb->get_results($sql1);
  return $result1[0]->value;
}


/*
	add_action( 'pre_get_posts', function ( $q ) {
		if ( $q->is_archive() ) {
			$q->set( 'meta_key', 'sale_price' ); 
			$q->set( 'meta_value', '0');
			$q->set( 'meta_compare', '>');
		}
	});
*/



add_action('after_setup_theme', 'my_theme_setup');

function my_theme_setup()
{
  load_theme_textdomain('InvestoGlobal', get_template_directory() . '/languages');
}

function ArrayGroup($array, $key)
{

  $return = array();

  foreach ($array as $val) {

    $return[$val[$key]][] = $val;
  }

  return $return;
}

function add_image_responsive_class($content)
{
  global $post;

  $pattern = "/<img(.*?)class=\"(.*?)\"(.*?)>/i";
  $replacement = '<img$1class="$2 img-fluid"$3>';
  $content = preg_replace($pattern, $replacement, $content);

  return $content;
}
add_filter('the_content', 'add_image_responsive_class');


function country()
{

  $client  = @$_SERVER['HTTP_CLIENT_IP'];
  $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
  $remote  = $_SERVER['REMOTE_ADDR'];
  $country  = "Unknown";

  if (filter_var($client, FILTER_VALIDATE_IP)) {
    $ip = $client;
  } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
    $ip = $forward;
  } else {
    $ip = $remote;
  }
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "http://www.geoplugin.net/json.gp?ip=" . $ip);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  $ip_data_in = curl_exec($ch); // string
  curl_close($ch);

  $ip_data = json_decode($ip_data_in, true);
  $ip_data = str_replace('&quot;', '"', $ip_data); // for PHP 5.2 see stackoverflow.com/questions/3110487/

  if ($ip_data && $ip_data['geoplugin_countryName'] != null) {
    $country = $ip_data['geoplugin_countryName'];
  }

  return $country;
}


add_action('comment_post',  'save_comment_meta_data');
add_filter('manage_edit-comments_columns', 'sare_comment_add_columns');
add_action('manage_comments_custom_column', 'rudr_add_comment_columns_content', 10, 2);

function save_comment_meta_data($comment_id)
{
  $data = isset($_POST['phone_number']) ? $_POST['phone_number'] : '';
  $phone = wp_filter_kses(sanitize_text_field($data));
  add_comment_meta($comment_id, 'phone_number', $phone);

  $data_country = isset($_POST['country']) ? $_POST['country'] : '';
  $country = wp_filter_kses(sanitize_text_field($data_country));
  add_comment_meta($comment_id, 'country', $country);
}

function sare_comment_add_columns($my_cols)
{
  $sare_columns = array(
    'phone_number' => 'Phone Number',
  );
  $my_cols = array_slice($my_cols, 0, 3, true) + $sare_columns + array_slice($my_cols, 3, NULL, true);
  return $my_cols;
}

function rudr_add_comment_columns_content($column, $comment_ID)
{
  global $comment;
  switch ($column):
    case 'phone_number': {
        echo '' . get_comment_meta($comment_ID, 'phone_number', true) . ' (' . get_comment_meta($comment_ID, 'country', true) . ')';
        break;
      }
  endswitch;
}

function custom_wpp_update_postviews($postid)
{

  $accuracy = 50;

  if (function_exists('wpp_get_views') && (mt_rand(0, 100) < $accuracy)) {
    update_post_meta(
      $postid,
      'views_total',
      wpp_get_views($postid, 'all', false)
    );
    update_post_meta(
      $postid,
      'views_daily',
      wpp_get_views($postid, 'daily', false)
    );
    update_post_meta(
      $postid,
      'views_weekly',
      wpp_get_views($postid, 'weekly', false)
    );
    update_post_meta(
      $postid,
      'views_monthly',
      wpp_get_views($postid, 'monthly', false)
    );
  }
}
add_action('wpp_post_update_views', 'custom_wpp_update_postviews');


function searchForId($v, $id, $array)
{
  foreach ($array as $key => $val) {
    if ($val['title'] === $id) {
      return $val[$v];
    }
  }
  return null;
}

/*
		add_filter('manage_posts_columns', 'posts_columns', 5);
		add_action('manage_posts_custom_column', 'posts_custom_columns', 5, 2);
		 
		function posts_columns($defaults){
			$defaults['riv_post_thumbs'] = __('Thumbs');
			return $defaults;
		}
		 
		function posts_custom_columns($column_name, $id){
			if($column_name === 'riv_post_thumbs'){
				echo the_post_thumbnail( 'archive_project_image' );
			}
		}
		*/

function thousandsCurrencyFormat($num)
{

  if ($num > 1000) {

    $x = round($num);
    $x_number_format = number_format($x);
    $x_array = explode(',', $x_number_format);
    $x_parts = array('k', 'm', 'b', 't');
    $x_count_parts = count($x_array) - 1;
    $x_display = $x;
    $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
    $x_display .= $x_parts[$x_count_parts - 1];

    return $x_display;
  }

  return $num;
}

add_filter('nav_menu_link_attributes', 'investo_global_add_menu_img_hover', 10, 3);
function investo_global_add_menu_img_hover($atts, $item, $args)
{
  if(get_field('menu_image', $item)){
    $img = get_field('menu_image', $item);
    $atts['data-hover'] = wp_get_attachment_url($img['ID']) ;
  }    
 
 
  return $atts;
}


add_theme_support('post-thumbnails');
add_image_size('experts_home', 285, 480);
add_image_size('step_home', 330, 585);
add_image_size('testimonials_home', 460, 630);
add_image_size('portfolio_home', 430, 530);
add_image_size('archive_slider', 1550, 500);
add_image_size('archive_project_image', 325, 450, true);
add_image_size('blog', 480, 270, true);
add_image_size('sidebar_blog', 81, 230, true);
add_image_size('social_slider', 380, 380);
add_image_size('mobil_slider', 400, 400);
add_theme_support('title-tag');
add_theme_support('html5', array('script', 'style'));

function menu($menu_name)
{
  $options = array(
    'echo' => false,
    'container' => false,
    'theme_location' => $menu_name,
    'fallback_cb' => 'fall_back_menu'
  );

  $menu = wp_nav_menu($options);
  echo preg_replace(array(
    '#^<ul[^>]*>#',
    '#</ul>$#'
  ), '', $menu);
}

add_action('init', 'theme_menus');

function theme_menus()
{
  register_nav_menus(
    array(
      'header' => __('Header Menu', 'InvestoGlobal'),
      'open' => __('Opened Menu', 'InvestoGlobal'),
      'footer1' => __('Footer Menu - 1', 'InvestoGlobal'),
      'footer2' => __('Footer Menu - 2', 'InvestoGlobal'),
    )
  );
}


require get_template_directory() . '/inc/register.php';
require get_template_directory() . '/inc/tcmb.php';
require get_template_directory() . '/inc/comment.php';
require get_template_directory() . '/ajax-district.php';

function city()
{

  $labels = array(
    'name'                       => _x('City', 'Taxonomy General Name', 'InvestoGlobal'),
    'singular_name'              => _x('City', 'Taxonomy Singular Name', 'InvestoGlobal'),
    'menu_name'                  => __('City', 'InvestoGlobal'),
  );
  $rewrite = array(
    'slug'                       => 'city',
    'with_front'                 => true,
    'hierarchical'               => false,
  );
  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
    'rewrite'                    => $rewrite,
  );
  register_taxonomy('city', array('post'), $args);
}
add_action('init', 'city', 0);

function district()
{

  $labels = array(
    'name'                       => _x('District', 'Taxonomy General Name', 'InvestoGlobal'),
    'singular_name'              => _x('District', 'Taxonomy Singular Name', 'InvestoGlobal'),
    'menu_name'                  => __('District', 'InvestoGlobal'),
  );

  $rewrite = array(
    'slug'                       => 'district',
    'with_front'                 => true,
    'hierarchical'               => false,
  );

  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
    'rewrite'                    => $rewrite,
  );
  register_taxonomy('district', array('post'), $args);
}
add_action('init', 'district', 0);

function room()
{

  $labels = array(
    'name'                       => _x('Room', 'Taxonomy General Name', 'InvestoGlobal'),
    'singular_name'              => _x('Room', 'Taxonomy Singular Name', 'InvestoGlobal'),
    'menu_name'                  => __('Room', 'InvestoGlobal'),
  );
  $rewrite = array(
    'slug'                       => 'room',
    'with_front'                 => true,
    'hierarchical'               => false,
  );
  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
    'rewrite'                    => $rewrite,
  );
  register_taxonomy('room', array('post'), $args);
}
add_action('init', 'room', 0);


function concept()
{

  $labels = array(
    'name'                       => _x('Concept', 'Taxonomy General Name', 'InvestoGlobal'),
    'singular_name'              => _x('Concept', 'Taxonomy Singular Name', 'InvestoGlobal'),
    'menu_name'                  => __('Concept', 'InvestoGlobal'),
  );
  $rewrite = array(
    'slug'                       => 'concept',
    'with_front'                 => true,
    'hierarchical'               => false,
  );
  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
    'rewrite'                    => $rewrite,
  );
  register_taxonomy('concept', array('post'), $args);
}
add_action('init', 'concept', 0);

function type()
{

  $labels = array(
    'name'                       => _x('Type', 'Taxonomy General Name', 'InvestoGlobal'),
    'singular_name'              => _x('Type', 'Taxonomy Singular Name', 'InvestoGlobal'),
    'menu_name'                  => __('Type', 'InvestoGlobal'),
  );
  $rewrite = array(
    'slug'                       => 'type',
    'with_front'                 => true,
    'hierarchical'               => false,
  );
  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
    'rewrite'                    => $rewrite,
  );
  register_taxonomy('type', array('post'), $args);
}
add_action('init', 'type', 0);


// Register Custom Post Type
function sare_blog()
{

  $labels = array(
    'name'                  => _x('Blog', 'Post Type General Name', 'InvestoGlobal'),
    'singular_name'         => _x('Blog', 'Post Type Singular Name', 'InvestoGlobal'),
    'menu_name'             => __('Blog', 'InvestoGlobal'),
    'name_admin_bar'        => __('Blog', 'InvestoGlobal'),
    'archives'              => __('Item Archives', 'InvestoGlobal'),
    'attributes'            => __('Item Attributes', 'InvestoGlobal'),
    'parent_item_colon'     => __('Parent Item:', 'InvestoGlobal'),
    'all_items'             => __('All Items', 'InvestoGlobal'),
    'add_new_item'          => __('Add New Item', 'InvestoGlobal'),
    'add_new'               => __('Add New Blog', 'InvestoGlobal'),
    'new_item'              => __('New Blog Item', 'InvestoGlobal'),
    'edit_item'             => __('Edit Blog Item', 'InvestoGlobal'),
    'update_item'           => __('Update Blog Item', 'InvestoGlobal'),

  );
  $rewrite = array(
    'slug'                  => 'blog',
    'with_front'            => true,
    'pages'                 => true,
    'feeds'                 => true,
  );
  $args = array(
    'label'                 => __('Blog', 'InvestoGlobal'),
    'description'           => __('Blog', 'InvestoGlobal'),
    'labels'                => $labels,
    'supports'              => array('title', 'editor', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats'),
    'taxonomies'            => array('category', 'post_tag'),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'menu_icon'             => 'dashicons-format-quote',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'rewrite'               => $rewrite,
    'capability_type'       => 'page',
  );
  register_post_type('blog', $args);
}
add_action('init', 'sare_blog', 0);


function pagination($pages = '', $range = 3)
{
  $showitems = ($range * 2) + 1;
  global $paged;
  if (empty($paged)) $paged = 1;
  if ($pages == '') {
    global $the_query;
    $pages = $the_query->max_num_pages;
    if (!$pages) {
      $pages = 1;
    }
  }

  if (1 != $pages) {
    echo '<ul>';

    if ($paged > 1 && $showitems < $pages) echo "<li><a href='" . get_pagenum_link($paged - 1) . "'><i class=\"bi bi-chevron-left\"></i></a></li>";

    if ($paged > 6 && $paged > $range + 1 && $showitems < $pages) {

      echo '<li class="more-pagination">...</li>';
    }

    for ($i = 1; $i <= $pages; $i++) {

      if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
        echo ($paged == $i) ? "<li class=\"active\"><a href=\"#\">" . $i . "</a></li>" : "<li><a href='" . get_pagenum_link($i) . "'>" . $i . "</a></li>";
      }
    }


    if ($paged < $pages - 1 &&  $paged + $range - 1 < $pages && $showitems < $pages) {

      echo '<li class="more-pagination">...</li>';
      echo "<li><a href='" . get_pagenum_link($pages) . "'>" . ($i - 1) . "</a></li>";
    }

    if ($paged < $pages && $showitems < $pages) echo "<li><a href='" . get_pagenum_link($paged + 1) . "'><i class=\"bi bi-chevron-right\"></i></a></li>";

    echo '</ul>';
  }
}

function pagination_wp_query($pages = '', $range = 3)
{
  $showitems = ($range * 2) + 1;
  global $paged;
  if (empty($paged)) $paged = 1;
  if ($pages == '') {
    global $wp_query;
    $pages = $wp_query->max_num_pages;
    if (!$pages) {
      $pages = 1;
    }
  }

  if (1 != $pages) {
    echo '<ul>';

    if ($paged > 1 && $showitems < $pages) echo "<li><a href='" . get_pagenum_link($paged - 1) . "'><i class=\"bi bi-chevron-left\"></i></a></li>";

    if ($paged > 2 && $paged > $range + 1 && $showitems < $pages) {

      echo '<li class="more-pagination">...</li>';
      echo "<li><a href='" . get_pagenum_link(1) . "'>" . ($i - 1) . "</a></li>";
    }


    for ($i = 1; $i <= $pages; $i++) {

      if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
        echo ($paged == $i) ? "<li class=\"active\"><a href=\"#\">" . $i . "</a></li>" : "<li><a href='" . get_pagenum_link($i) . "'>" . $i . "</a></li>";
      }
    }


    if ($paged < $pages - 1 &&  $paged + $range - 1 < $pages && $showitems < $pages) {

      echo '<li class="more-pagination">...</li>';
      echo "<li><a href='" . get_pagenum_link($pages) . "'>" . ($i - 1) . "</a></li>";
    }

    if ($paged < $pages && $showitems < $pages) echo "<li><a href='" . get_pagenum_link($paged + 1) . "'><i class=\"bi bi-chevron-right\"></i></a></li>";

    echo '</ul>';
  }
}

function display_posts_stickiness($column, $post_id)
{
  if ($column == 'realname') {
    echo get_post_meta($post_id, 'project_code', true);
  }
}
add_action('manage_posts_custom_column', 'display_posts_stickiness', 10, 2);

function add_sticky_column($columns)
{
  return array_merge(
    $columns,
    array('realname' => __('Project Code', 'InvestoGlobal'))
  );
}
add_filter('manage_posts_columns', 'add_sticky_column');


add_action('init', 'myStartSession', 1);
add_action('wp_logout', 'myEndSession');
add_action('wp_login', 'myEndSession');

function myStartSession()
{
  if (!session_id()) {
    session_start();
  }
}

function myEndSession()
{
  session_destroy();
}


// fiyat yuvarlama (son haneyi gormuyor su an kullanilmadi);

function price_format($price_text, $unity, $type)
{
  $count= count($type);

  
  if($count <= 3){
    $price_text = $price_text  + 5;
    $last_number = substr($price_text, -2);
    $new_price = $price_text - $last_number;
    echo $new_price = number_format($new_price, 0, ',', '.') . $unity;


  }else{
    $price_text = number_format((float)$price_text, 3, '.','');
    $price_text = str_replace(".", "", $price_text);
    $last_number = substr($price_text, -2);
    $new_price = $price_text - $last_number;
    echo $new_price = number_format($new_price, 0, ',', '.'). ' ' . $unity;
  }
}


// region change alani
function region_price($key, $district_key, $region_district){
  $current_rental_array =  array($district_key);
  $new_percent_array = array_merge($current_rental_array, $region_district);
  $new_big_array = array();
  $current_percent = get_field($key, 'district_' .  $district_key . '');
  foreach($new_percent_array as $districts){
    array_push($new_big_array,  get_field($key, 'district_' . $districts . ''));
  }
  $max_percent_value = max($new_big_array);
  foreach($new_percent_array as $districts) { 
  $term = get_term( $districts, 'district' );    
  $district_percent = get_field($key, 'district_' . $districts . '');
  $district_percent_value = $district_percent;
  if( $district_percent >= $max_percent_value){
    $max_percent_value = $district_percent;
    if( $max_percent_value > 100){
      $district_percent = 100;
    }else{
      $district_percent = 100;
    }
  }
  else if($district_percent < $max_percent_value){
    $district_percent_value;
    $fark =  $max_percent_value - $district_percent_value;
    $fark = 100 - $fark;
    $district_percent = $fark;
  }
  ?>

  <div class="progress-item d-flex align-items-end">
    <div class="city-title"><?php echo $term->name; ?></div>
    <div class="w-100">
      <div class="progress-value text-right" style="width:  <?php if($district_percent > 100){ echo "100"; }else { echo $district_percent; }  ?>%;">
        <div class="value">%<?php echo $district_percent_value; ?></div>
      </div>
      <div class="progress">
        <div class="progress-limit" style="width: <?php if($district_percent > 100){ echo "100"; }else { echo $district_percent; }  ?>%;">
        </div>
      </div>
    </div>
  </div>
  <?php
   } 
}