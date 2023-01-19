<?php




add_action('wp_ajax_districtAjax', 'district_ajax');

add_action('wp_ajax_nopriv_districtAjax', 'district_ajax');

function district_ajax()
{

  $city_id = $_POST['cityId'];

?>


  <select class="w-100 select2 selectpicker" name="district">
    <option value=""><?php _e('District', 'InvestoGlobal'); ?></option>
    <?php
    $args = array(
      'taxonomy' => 'district',
      'hide_empty' => '0',
    );
    $districts = get_terms($args);
    ?>
    <?php foreach ($districts as $district) {
      if (get_field('city', 'district_' . $district->term_id) == $city_id) {
    ?>
        <option value="<?php echo $district->term_id; ?>" <?php if ($_GET['district'] == $district->term_id) {
                                                            echo 'selected';
                                                          } ?>><?php echo $district->name; ?></option>
    <?php }
    } ?>
  </select>

  <script>
    $('select').niceSelect();
  </script>

<?php

  die();
}

?>