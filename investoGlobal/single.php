<?php

get_header();

// Single Control(s)

$city = get_the_terms($post->ID, 'city');
$district = get_the_terms($post->ID, 'district');


$return_time =  get_field('return_time_average', 'district_' . $district[0]->term_id . '');
if($return_time == ""){
	$return_time = 17;
}
$video =  get_field('youtube_video_id');

if (isset($district[0]->term_id)) {
	$city_id = $city[0]->term_id;
	$population_age = get_field('population_age', 'district_' . $district[0]->term_id . '');
	$population_of_the_district = get_field('population_of_the_district', 'district_' . $district[0]->term_id . '');
	$population_of_the_education = get_field('population_of_the_education', 'district_' . $district[0]->term_id . '');
	$annual_population_increase = get_field('annual_population_increase', 'district_' . $district[0]->term_id . '');
}

$delivery = get_post_meta($post->ID, "delivery_date", true);
$statu = get_post_meta($post->ID, "proje_statu", true);
$date = DateTime::createFromFormat('Ymd', $delivery);


// Region Changes
$region_district = get_post_meta($post->ID, "other_district", true);
/* TCMB Change & Unit And Full Detail */
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
	$sale_price = number_format($price, 0, ',', '.') . ' ' . $unity;
}

/* Section - 2 */
$house_gallery = get_field('house_gallery');
$section_right_project_title = get_post_meta($post->ID, "right_project_title", true);
$section_right_project_description = get_post_meta($post->ID, "right_project_description", true);
$project_type = get_field('project_type');
$new_project_type = array();
if (is_array($project_type) || is_object($project_type)) {
	foreach ($project_type as $key => $value) {
		$new_project_type[$value['type_name']][] = $value;
	}
}

/* Section - 3 */
$section_3_left_title = get_post_meta($post->ID, "section_-_3_left_title", true);
$section_3_image = get_field('why_list_image');
$types = get_the_terms($post->ID, 'type');
$project_plan = get_post_meta($post->ID, "project_plan", true);
$project_month = get_post_meta($post->ID, "project_month", true);

// Distance
$distance_icon = get_post_meta($post->ID, "distance_icon", true);
$distance_text = get_post_meta($post->ID, "distance_text", true);
$distance = get_post_meta($post->ID, "distance", true);

// Futures Detail
$all_features = ot_get_option('array___futures');
$project_features = get_field('futures');

// Why List Detail
$all_why = ot_get_option('array___why_list');
$project_why = get_field('why_list');

$new_arr1 = array();

foreach ($project_features as $arr1) {
	if (ICL_LANGUAGE_CODE == 'en') {
		$new_arr1[] =  $arr1['features_title'];
	} else {
		$new_arr1[] =  wpmlStringToLanguage($arr1['features_title']);
	}
}


$new_arr2 = array();
foreach ($all_features as $arr2) {
	if ($arr2['detail_statu'] == 'on') {
		$new_arr2[] = $arr2['title'];
	}
}
$detail_futures = array_intersect($new_arr1, $new_arr2);

?>
<main>


	<div class="container">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="project-single-title sare-mt-50">
					<div class="single-top-title"><?php echo __('Project Details', 'InvestoGlobal'); ?></div>
					<div class="single-bottom-title">
						<h1><?php the_title(); ?> </h1>
					</div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
	<div class="container sare-mt-50 position-relative">
		<div class="single-plus"></div>
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-4">
				<div class="future-list">
					<ul>

						<?php if (isset($city[0]->term_id)) { ?>
							<li>
								<div class="futured-icon">
									<svg height="60" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
										<path d="M31.46,48.84a.63.63,0,0,0,1.08,0L43.4,30A13.16,13.16,0,0,0,20.6,16.87,13,13,0,0,0,20.6,30ZM21.68,17.5A11.91,11.91,0,0,1,42.32,29.41L32,47.28,21.68,29.41A11.8,11.8,0,0,1,21.68,17.5Z" />
										<path d="M32,32.45a9.19,9.19,0,1,0-9.19-9.19A9.2,9.2,0,0,0,32,32.45Zm0-17.13a7.94,7.94,0,1,1-7.94,7.94A7.95,7.95,0,0,1,32,15.32Z" />
										<path d="M39.07,42.86a.64.64,0,0,0-.69.57.63.63,0,0,0,.57.68c7.84.76,12.07,2.63,12.07,4,0,1.64-6.25,4.12-17.56,4.33H30.54C19.23,52.24,13,49.76,13,48.12c0-1.38,4.23-3.25,12.07-4a.63.63,0,0,0,.57-.68.64.64,0,0,0-.69-.57c-3.09.3-13.2,1.56-13.2,5.26s9.74,5.41,18.79,5.58h3c9-.17,18.78-2,18.78-5.58S42.16,43.16,39.07,42.86Z" />
									</svg>
								</div>
								<div class="futured-text">
									<div class="futured-text-1"><?php echo $city[0]->name; ?></div>
									<div class="futured-text-2"><?php echo $district[0]->name; ?></div>
								</div>
							</li>
						<?php } ?>

						<?php if ($statu == 'Ready To Move') { ?>
							<li>
								<div class="futured-icon">
									<svg height="60" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
										<path d="M23.8,16.25a3.45,3.45,0,1,0,3.44,3.45A3.45,3.45,0,0,0,23.8,16.25Zm0,5.47a2,2,0,1,1,2-2A2,2,0,0,1,23.8,21.72Z" />
										<path d="M40.75,16l-2.23-2.23a.73.73,0,0,0-1,0L35,16.25H32L32,16.13a8.92,8.92,0,1,0,0,7.13l.05-.12H49a.88.88,0,0,0,.32-.07l5.47-2.74a.72.72,0,0,0,.19-1.14l-5.47-5.47a.73.73,0,0,0-1,0L46.22,16,44,13.72a.73.73,0,0,0-1,0Zm5,1.51a.7.7,0,0,0,1,0L49,15.23l4.27,4.27-4.48,2.22H31.53a.71.71,0,0,0-.67.47,7.5,7.5,0,1,1,0-5,.71.71,0,0,0,.67.47h3.75a.67.67,0,0,0,.5-.21L38,15.23l2.23,2.23a.7.7,0,0,0,1,0l2.23-2.23Z" />
										<path d="M44.4,44.69a.71.71,0,1,0,.71.71A.71.71,0,0,0,44.4,44.69Z" />
										<path d="M55,37.61A6.17,6.17,0,0,0,46.55,36l-5.39,3.58-.11-.18a3.44,3.44,0,0,0-3-1.76H33.62a2.06,2.06,0,0,1-1.34-.49l-.64-.57a9,9,0,0,0-11.78,0l-1.38,1.21-2.72,1.93v-.91a.71.71,0,0,0-.71-.72H9.58a.71.71,0,0,0-.71.72V52.51a.71.71,0,0,0,.71.71h5.47a.71.71,0,0,0,.71-.71V50h3.06l15.77,3.18a.77.77,0,0,0,.57-.13l6.36-4.68a.71.71,0,1,0-.85-1.14l-6.1,4.49-.09,0L19.06,48.62h-3.3V41.49l.08-.06,1.92-1.34a20.16,20.16,0,0,0,2.78-2.18l.26-.23a7.52,7.52,0,0,1,9.9,0l.64.56a3.42,3.42,0,0,0,2.28.85h4.44a2,2,0,0,1,0,4H27.12a.71.71,0,1,0,0,1.42H38.06A3.46,3.46,0,0,0,41.5,41.2v-.11l.09-.05,5.75-3.82a4.75,4.75,0,0,1,5.89.51l.17.16L47.28,42.4a.71.71,0,0,0,.84,1.14l6.73-4.94A.71.71,0,0,0,55,37.61ZM14.33,51.8h-4V39.55h4Z" />
									</svg>
								</div>
								<div class="futured-text">
									<div class="futured-text-1"><?php echo __('Ready To Move', 'InvestoGlobal'); ?></div>
									<div class="futured-text-2"><?php echo __('Delivery Date', 'InvestoGlobal'); ?></div>
								</div>
							</li>
						<?php } else {  ?>
							<?php if ($date) { ?>
								<li>
									<div class="futured-icon">
										<svg height="60" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
											<path d="M23.8,16.25a3.45,3.45,0,1,0,3.44,3.45A3.45,3.45,0,0,0,23.8,16.25Zm0,5.47a2,2,0,1,1,2-2A2,2,0,0,1,23.8,21.72Z" />
											<path d="M40.75,16l-2.23-2.23a.73.73,0,0,0-1,0L35,16.25H32L32,16.13a8.92,8.92,0,1,0,0,7.13l.05-.12H49a.88.88,0,0,0,.32-.07l5.47-2.74a.72.72,0,0,0,.19-1.14l-5.47-5.47a.73.73,0,0,0-1,0L46.22,16,44,13.72a.73.73,0,0,0-1,0Zm5,1.51a.7.7,0,0,0,1,0L49,15.23l4.27,4.27-4.48,2.22H31.53a.71.71,0,0,0-.67.47,7.5,7.5,0,1,1,0-5,.71.71,0,0,0,.67.47h3.75a.67.67,0,0,0,.5-.21L38,15.23l2.23,2.23a.7.7,0,0,0,1,0l2.23-2.23Z" />
											<path d="M44.4,44.69a.71.71,0,1,0,.71.71A.71.71,0,0,0,44.4,44.69Z" />
											<path d="M55,37.61A6.17,6.17,0,0,0,46.55,36l-5.39,3.58-.11-.18a3.44,3.44,0,0,0-3-1.76H33.62a2.06,2.06,0,0,1-1.34-.49l-.64-.57a9,9,0,0,0-11.78,0l-1.38,1.21-2.72,1.93v-.91a.71.71,0,0,0-.71-.72H9.58a.71.71,0,0,0-.71.72V52.51a.71.71,0,0,0,.71.71h5.47a.71.71,0,0,0,.71-.71V50h3.06l15.77,3.18a.77.77,0,0,0,.57-.13l6.36-4.68a.71.71,0,1,0-.85-1.14l-6.1,4.49-.09,0L19.06,48.62h-3.3V41.49l.08-.06,1.92-1.34a20.16,20.16,0,0,0,2.78-2.18l.26-.23a7.52,7.52,0,0,1,9.9,0l.64.56a3.42,3.42,0,0,0,2.28.85h4.44a2,2,0,0,1,0,4H27.12a.71.71,0,1,0,0,1.42H38.06A3.46,3.46,0,0,0,41.5,41.2v-.11l.09-.05,5.75-3.82a4.75,4.75,0,0,1,5.89.51l.17.16L47.28,42.4a.71.71,0,0,0,.84,1.14l6.73-4.94A.71.71,0,0,0,55,37.61ZM14.33,51.8h-4V39.55h4Z" />
										</svg>
									</div>
									<div class="futured-text">
										<div class="futured-text-1"><?php echo $date->format('d.m.Y'); ?></div>
										<div class="futured-text-2"><?php echo __('Delivery Date', 'InvestoGlobal'); ?></div>
									</div>
								</li>
							<?php } ?>
						<?php } ?>

						<?php if ($distance_text) { ?>
							<li>
								<div class="futured-icon"><?php echo wp_get_attachment_image($distance_icon['ID'], 'full'); ?></div>
								<div class="futured-text">
									<div class="futured-text-1 text-transform-uppercase"><?php echo $distance; ?></div>
									<div class="futured-text-2"><?php echo $distance_text; ?></div>
								</div>
							</li>
						<?php } ?>

					</ul>
				</div>
			</div>
			<div class="col-md-2"></div>
			<div class="col-md-4">
				<div class="future-list">
					<ul>
						<?php if (wp_is_mobile()) { ?>
							<li>
								<div class="futured-icon">
									<svg height="60" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
										<path d="M49.44,23.91H44.29v5.16h5.15Zm-1,4.11h-3V25h3Z" />
										<path d="M49.44,31.48H44.29v5.16h5.15Zm-1,4.11h-3V32.53h3Z" />
										<path d="M49.44,39.06H44.29v5.16h5.15Zm-1,4.11h-3V40.11h3Z" />
										<path d="M19.71,23.91H14.56v5.16h5.15ZM18.66,28H15.61V25h3.05Z" />
										<path d="M19.71,31.48H14.56v5.16h5.15Zm-1.05,4.11H15.61V32.53h3.05Z" />
										<path d="M19.71,39.06H14.56v5.16h5.15Zm-1.05,4.11H15.61V40.11h3.05Z" />
										<path d="M30.79,16.44H25.63v5.15h5.16Zm-1.05,4.1H26.68V17.49h3.06Z" />
										<path d="M38.37,16.44H33.21v5.15h5.16Zm-1,4.1H34.26V17.49h3.06Z" />
										<path d="M30.79,24H25.63v5.15h5.16Zm-1.05,4.1H26.68V25.06h3.06Z" />
										<path d="M38.37,24H33.21v5.15h5.16Zm-1,4.1H34.26V25.06h3.06Z" />
										<path d="M30.79,31.59H25.63v5.15h5.16Zm-1.05,4.1H26.68v-3h3.06Z" />
										<path d="M38.37,31.59H33.21v5.15h5.16Zm-1,4.1H34.26v-3h3.06Z" />
										<path d="M52.71,50.53V20.44H42.07v-8H21.93v8H11.29V50.53H8.56v1H55.44v-1Zm-30.78,0H12.34v-29h9.59Zm12.56,0h-5V42.45h5Zm6.53,0H35.54V41.4H28.46v9.13H23V13.47H41Zm10.64,0H42.07v-29h9.59Z" />
									</svg>
								</div>
								<div class="futured-text">
									<div class="futured-text-1"><?php echo $types[0]->name; ?></div>
									<div class="futured-text-2"><?php echo __('Type', 'InvestoGlobal'); ?></div>
								</div>
							</li>

							<?php if ($project_plan) { ?>
								<li>
									<div class="futured-icon futured-project-plan">
										<svg height="60" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
											<line x1="21.85" y1="41.87" x2="27.67" y2="41.87" />
											<path d="M26.84,19.43H45.12a2.5,2.5,0,0,1,2.5,2.49V45.2" />
											<path d="M16.86,13.61H35.15a2.5,2.5,0,0,1,2.49,2.5v1.66" />
											<path d="M32.65,49.35A3.32,3.32,0,0,1,29.33,46V21.92a2.5,2.5,0,0,0-5,0V39.38a2.5,2.5,0,0,1-5,0V16.11a2.49,2.49,0,1,0-5,0V18.6h3.32" />
											<path d="M36,46V45.2H52.6V46a3.32,3.32,0,0,1-3.32,3.32H32.65A3.32,3.32,0,0,0,36,46Z" />
											<rect x="32.65" y="28.57" width="4.16" height="4.16" rx="2" />
											<rect x="40.13" y="34.39" width="4.16" height="4.16" rx="2" />
											<line x1="35.15" y1="39.38" x2="41.8" y2="27.74" />
										</svg>
									</div>
									<div class="futured-text">
										<div class="futured-text-1"><?php echo $project_plan; ?>
										<?php if ($project_plan < 100) {
														echo __('% DownPayment', 'InvestoGlobal');
													} else {
														echo __('% Cash', 'InvestoGlobal');
													}  if ($project_month) 
                          {
													if ($project_plan < 100) {
														echo $project_month . ' ' . __('Months', 'InvestoGlobal');
														}
													} ?>
                    </div>
										<div class="futured-text-2"><?php echo __('Payment Plan', 'InvestoGlobal'); ?></div>
									</div>
								</li>
							<?php } ?>
							<li>
								<div class="futured-icon">
									<svg height="60" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
										<path class="cls-1" d="M43.87,12.42H17.49a.45.45,0,0,0-.45.46V51.12a.45.45,0,0,0,.45.46H43.87A3.1,3.1,0,0,0,47,48.49v-33A3.1,3.1,0,0,0,43.87,12.42Zm2.18,36.07a2.19,2.19,0,0,1-2.18,2.18H18V13.33H43.87a2.19,2.19,0,0,1,2.18,2.18Z" />
										<path class="cls-1" d="M39.25,16.38H24.75a.45.45,0,0,0-.46.45.46.46,0,0,0,.46.46h14.5a.46.46,0,0,0,.46-.46A.45.45,0,0,0,39.25,16.38Z" />
										<path class="cls-1" d="M33.32,42.75H30.68a1.79,1.79,0,0,0-1.78,1.78v2.64a1.78,1.78,0,0,0,1.78,1.77h2.64a1.78,1.78,0,0,0,1.78-1.77V44.53A1.79,1.79,0,0,0,33.32,42.75Zm.86,2.64h-.86a.46.46,0,0,0,0,.92h.86v.86a.87.87,0,0,1-.86.86H30.68a.87.87,0,0,1-.86-.86v-.86h.86a.46.46,0,0,0,0-.92h-.86v-.86a.86.86,0,0,1,.86-.86h2.64a.86.86,0,0,1,.86.86Z" />
										<path class="cls-1" d="M37.93,40.12H26.07a.45.45,0,0,0-.46.45.46.46,0,0,0,.46.46H37.93a.46.46,0,0,0,.46-.46A.45.45,0,0,0,37.93,40.12Z" />
										<path class="cls-2" d="M35.69,29.49l-.57.58L35,29.26l-.74-.36.74-.37.12-.81.57.59.81-.14-.38.73.38.72Zm-1.6,1.09a3.71,3.71,0,1,1,0-3.59,2.85,2.85,0,0,0-2.25-1.09,2.89,2.89,0,1,0,0,5.77,2.85,2.85,0,0,0,2.25-1.09Z" />
										<path class="cls-1" d="M32,21.16a7.63,7.63,0,1,0,7.62,7.63A7.63,7.63,0,0,0,32,21.16Zm6.72,7.63A6.72,6.72,0,1,1,32,22.06,6.73,6.73,0,0,1,38.72,28.79Z" />
									</svg>
								</div>
								<div class="futured-text">
									<div class="futured-text-1"><?php echo __('Suitable', 'InvestoGlobal'); ?></div>
									<div class="futured-text-2"><?php echo __('Citizenship', 'InvestoGlobal'); ?></div>
								</div>
							</li>

						<?php } else { ?>
							<li>
								<div class="futured-text mr">
									<div class="futured-text-1 text-left"><?php echo $types[0]->name; ?></div>
									<div class="futured-text-2 text-left"><?php echo __('Type', 'InvestoGlobal'); ?></div>
								</div>
								<div class="futured-icon mr">
									<svg height="60" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
										<path d="M49.44,23.91H44.29v5.16h5.15Zm-1,4.11h-3V25h3Z" />
										<path d="M49.44,31.48H44.29v5.16h5.15Zm-1,4.11h-3V32.53h3Z" />
										<path d="M49.44,39.06H44.29v5.16h5.15Zm-1,4.11h-3V40.11h3Z" />
										<path d="M19.71,23.91H14.56v5.16h5.15ZM18.66,28H15.61V25h3.05Z" />
										<path d="M19.71,31.48H14.56v5.16h5.15Zm-1.05,4.11H15.61V32.53h3.05Z" />
										<path d="M19.71,39.06H14.56v5.16h5.15Zm-1.05,4.11H15.61V40.11h3.05Z" />
										<path d="M30.79,16.44H25.63v5.15h5.16Zm-1.05,4.1H26.68V17.49h3.06Z" />
										<path d="M38.37,16.44H33.21v5.15h5.16Zm-1,4.1H34.26V17.49h3.06Z" />
										<path d="M30.79,24H25.63v5.15h5.16Zm-1.05,4.1H26.68V25.06h3.06Z" />
										<path d="M38.37,24H33.21v5.15h5.16Zm-1,4.1H34.26V25.06h3.06Z" />
										<path d="M30.79,31.59H25.63v5.15h5.16Zm-1.05,4.1H26.68v-3h3.06Z" />
										<path d="M38.37,31.59H33.21v5.15h5.16Zm-1,4.1H34.26v-3h3.06Z" />
										<path d="M52.71,50.53V20.44H42.07v-8H21.93v8H11.29V50.53H8.56v1H55.44v-1Zm-30.78,0H12.34v-29h9.59Zm12.56,0h-5V42.45h5Zm6.53,0H35.54V41.4H28.46v9.13H23V13.47H41Zm10.64,0H42.07v-29h9.59Z" />
									</svg>
								</div>
							</li>

							<?php if ($project_plan) { ?>
								<li>
									<div class="futured-text mr">
										<div class="futured-text-1 text-left">
                      <?php 
                        echo $project_plan;  
                        if ($project_plan < 100) {
													echo __('% DownPayment', 'InvestoGlobal');
												} else {
													echo __('% Cash', 'InvestoGlobal');
												}
                        if ($project_month) {
													if ($project_plan < 100) {
														echo $project_month . ' ' . __('Months', 'InvestoGlobal');
													}
												} 
                      ?> 
                    </div>
										<div class="futured-text-2 text-left"><?php echo __('Payment Plan', 'InvestoGlobal'); ?></div>
									</div>
									<div class="futured-icon futured-project-plan mr">
										<svg height="60" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
											<line x1="21.85" y1="41.87" x2="27.67" y2="41.87" />
											<path d="M26.84,19.43H45.12a2.5,2.5,0,0,1,2.5,2.49V45.2" />
											<path d="M16.86,13.61H35.15a2.5,2.5,0,0,1,2.49,2.5v1.66" />
											<path d="M32.65,49.35A3.32,3.32,0,0,1,29.33,46V21.92a2.5,2.5,0,0,0-5,0V39.38a2.5,2.5,0,0,1-5,0V16.11a2.49,2.49,0,1,0-5,0V18.6h3.32" />
											<path d="M36,46V45.2H52.6V46a3.32,3.32,0,0,1-3.32,3.32H32.65A3.32,3.32,0,0,0,36,46Z" />
											<rect x="32.65" y="28.57" width="4.16" height="4.16" rx="2" />
											<rect x="40.13" y="34.39" width="4.16" height="4.16" rx="2" />
											<line x1="35.15" y1="39.38" x2="41.8" y2="27.74" />
										</svg>
									</div>
								</li>

							<?php } ?>

							<li>
								<div class="futured-text mr">
									<div class="futured-text-1 text-left"><?php echo __('Suitable', 'InvestoGlobal'); ?></div>
									<div class="futured-text-2 text-left"><?php echo __('Citizenship', 'InvestoGlobal'); ?></div>
								</div>
								<div class="futured-icon mr">
									<svg height="60" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
										<path class="cls-1" d="M43.87,12.42H17.49a.45.45,0,0,0-.45.46V51.12a.45.45,0,0,0,.45.46H43.87A3.1,3.1,0,0,0,47,48.49v-33A3.1,3.1,0,0,0,43.87,12.42Zm2.18,36.07a2.19,2.19,0,0,1-2.18,2.18H18V13.33H43.87a2.19,2.19,0,0,1,2.18,2.18Z" />
										<path class="cls-1" d="M39.25,16.38H24.75a.45.45,0,0,0-.46.45.46.46,0,0,0,.46.46h14.5a.46.46,0,0,0,.46-.46A.45.45,0,0,0,39.25,16.38Z" />
										<path class="cls-1" d="M33.32,42.75H30.68a1.79,1.79,0,0,0-1.78,1.78v2.64a1.78,1.78,0,0,0,1.78,1.77h2.64a1.78,1.78,0,0,0,1.78-1.77V44.53A1.79,1.79,0,0,0,33.32,42.75Zm.86,2.64h-.86a.46.46,0,0,0,0,.92h.86v.86a.87.87,0,0,1-.86.86H30.68a.87.87,0,0,1-.86-.86v-.86h.86a.46.46,0,0,0,0-.92h-.86v-.86a.86.86,0,0,1,.86-.86h2.64a.86.86,0,0,1,.86.86Z" />
										<path class="cls-1" d="M37.93,40.12H26.07a.45.45,0,0,0-.46.45.46.46,0,0,0,.46.46H37.93a.46.46,0,0,0,.46-.46A.45.45,0,0,0,37.93,40.12Z" />
										<path class="cls-2" d="M35.69,29.49l-.57.58L35,29.26l-.74-.36.74-.37.12-.81.57.59.81-.14-.38.73.38.72Zm-1.6,1.09a3.71,3.71,0,1,1,0-3.59,2.85,2.85,0,0,0-2.25-1.09,2.89,2.89,0,1,0,0,5.77,2.85,2.85,0,0,0,2.25-1.09Z" />
										<path class="cls-1" d="M32,21.16a7.63,7.63,0,1,0,7.62,7.63A7.63,7.63,0,0,0,32,21.16Zm6.72,7.63A6.72,6.72,0,1,1,32,22.06,6.73,6.73,0,0,1,38.72,28.79Z" />
									</svg>
								</div>
							</li>

						<?php } ?>
					</ul>
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
	</div>
	<div class="sare-single-section sare-mt-150 sare-mobil-top-50">
		<div class="row row-5-gutter ml-0 mr-0 <?php if($price == 0){ echo 'justify-content-center'; } ?>">
			<div class="<?php if($price ==0 ){ echo 'col-md-8'; }else { echo 'col-md-6 '; } ?>">
				<div class="owl-carousel owl-theme single-slider" <?php if (apply_filters('wpml_is_rtl', NULL)) { ?> data-rtl="true" <?php } ?>>
				<?php 
					if($video){ ?>
						<div class="item">
							<div class="single-slider-img">
								<iframe width="100%" height="500" src="https://www.youtube.com/embed/<?= $video ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
							</div>
						</div>
					<?php }
				?>
					<?php if (is_array($house_gallery) || is_object($house_gallery)) { 
						$i = '0';
						foreach ($house_gallery as $carousel) {
							$i++; ?>
							<div class="item">
								<div class="single-slider-img">
									<?php echo wp_get_attachment_image($carousel['ID'], 'full'); ?>
								</div>
							</div>
						<?php } 
					 } ?>
				</div>
			</div>
			<?php
			if ($price != 0) { ?>
				<div class="col-md-1"></div>
				<div class="col-md-4">
					<div class="project-step2">
						<div class="project-step2-title"><?php echo $section_right_project_title; ?></div>
						<div class="project-step2-description">
							<?php echo $section_right_project_description; ?>
						</div>
						<div class="row align-item-center">
							<div class="col-md-6">
								<div class="project-step2-price">
									<div class="project-step2-price-title"><?php echo __('Starting From', 'InvestoGlobal'); ?></div>
									<div class="project-step2-price-price"><?php echo $sale_price; ?></div>
								</div>
							</div>
							<div class="col-md-2"></div>
							<div class="col-md-4">
								<form method="get">
									<select class="unity w-100 select2" name="unity" onchange="if(this.value != 0) { this.form.submit(); }">>
										<option value=""><?php echo __('Currency', 'InvestoGlobal'); ?></option>
										<option value="TRY" <?php if ($_SESSION['unity'] == 'TRY') { echo 'selected'; } ?>>TRY</option>
										<option value="USD" <?php if ($_SESSION['unity'] == 'USD') { echo 'selected'; } ?>>USD</option>
										<option value="EUR" <?php if ($_SESSION['unity'] == 'EUR') { echo 'selected'; } ?>>EUR</option>
									</select>
								</form>
							</div>
						</div>
						<div class="project-step2-room-list">
							<ul class="owl-carousel owl-theme room-carousel">
								<?php if (is_array($new_project_type) || is_object($new_project_type)) {
									 foreach ($new_project_type as $key => $type) { ?>
										<li>
											<div class="roomli">
												<div class="roomli-icon">
													<img src="<?php bloginfo('template_url'); ?>/assets/img/room.png">
												</div>
												<div class="roomli-plus"><?php echo $key; ?></div>
											</div>
										</li>
									<?php }
							    } ?>
							</ul>
						</div>
					</div>
				</div>
			<?php }
			?>

		</div>
	</div>

	<div class="sare-single-section sare-mt-150 sare-mobil-top-50">
		<div class="row ml-0 mr-0">
			<div class="col-md-12 sare-mb-50">
				<div class="w-w-s-tp"><?php echo __('Why We Suggest This Project ?', 'InvestoGlobal'); ?></div>
			</div>
			<div class="col-md-6">
				<div class="ss-y-1">
					<?php echo $section_3_left_title; ?>
				</div>
				<div class="sare-mt-50 sare-mobil-img">
					<?php echo wp_get_attachment_image($section_3_image['ID'], 'full', '', array("class" => "w-100")); ?>
				</div>
			</div>
			<div class="col-md-6">
				<div class="ss-top-futured sare-mt-100 sare-mobil-top-50">
					<ul>
						<?php if (is_array($project_why) || is_object($project_why)) { 
						 $i = '0';
							foreach ($project_why as $list) {
								$i++;
							  if (ICL_LANGUAGE_CODE == 'en') { ?>
									<li><?php echo $list['list_item']; ?></li>
								<?php } else {
								 if (wpmlStringToLanguage($list['list_item'])) { ?>
										<li><?php echo wpmlStringToLanguage($list['list_item']); ?></li>
									<?php 
                  }
							   }  
                } 
              } 
            ?>
					</ul>
				</div>
				<div class="house-features sare-mt-100 sare-mobil-top-50">
					<div class="house-feautures-title">
						<?php if (apply_filters('wpml_is_rtl', NULL)) { ?>
							<div class="house-feautures-title-2"><?php echo __('Features', 'InvestoGlobal'); ?></div>
							<div class="house-feautures-title-1"><?php echo __('House', 'InvestoGlobal'); ?></div>
						<?php } else { ?>
							<div class="house-feautures-title-1"><?php echo __('House', 'InvestoGlobal'); ?></div>
							<div class="house-feautures-title-2"><?php echo __('Features', 'InvestoGlobal'); ?></div>
						<?php } ?>
					</div>
					<div class="ss-bottom-futured sare-mt-50">
						<ul>
							<?php if (is_array($project_features) || is_object($futures)) { ?>
								<?php $i = '0';
								foreach ($project_features as $futured) {
									$i++; ?>
									<li>
										<?php if (ICL_LANGUAGE_CODE == 'en') { ?>
											<span><?php echo searchForId('icon_code', $futured['features_title'], $all_features); ?></span> <?php echo $futured['features_title']; ?>
										<?php } else { ?>
											<span><?php echo searchForId('icon_code', wpmlStringToLanguage($futured['features_title']), $all_features); ?></span> <?php echo wpmlStringToLanguage($futured['features_title']); ?>
										<?php } ?>
									</li>
								<?php } ?>
							<?php } ?>
						</ul>
					</div>
					<?php if (count($project_features) > 9) { ?>
						<div class="show-more-futures-button">
							<span><?php echo __('Show More', 'InvestoGlobal'); ?></span>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>

	<?php if (!empty($detail_futures)) { ?>
		<div class="sare-single-section sare-mt-150 sare-mobil-top-50">
			<div class="row row-5-gutter mr-0 ml-0">
				<div class="col-md-1"></div>
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-4">
							<div class="b-s-1">
								<?php if (apply_filters('wpml_is_rtl', NULL)) { ?>
									<div class="b-s-1-1"><?php echo __('Feature', 'InvestoGlobal'); ?></div>
									<div class="b-s-1-2"><?php echo __('Details', 'InvestoGlobal'); ?></div>
								<?php } else { ?>
									<div class="b-s-1-1"><?php echo __('Feature', 'InvestoGlobal'); ?></div>
									<div class="b-s-1-2"><?php echo __('Details', 'InvestoGlobal'); ?></div>
								<?php } ?>
							</div>
							<div class="single-plus-detail hidden-mobil"></div>
						</div>

						<div class="col-md-5">
							<div class="carousel-detail">
								<div class="owl-carousel owl-theme single-slider2" <?php if (apply_filters('wpml_is_rtl', NULL)) { ?> data-rtl="true" <?php } ?>>
									<?php if (is_array($detail_futures) || is_object($detail_futures)) { ?>
										<?php $i = '0';
										foreach ($detail_futures as $futured) {
											$i++; ?>
											<div class="carousel-number">
												<div class="carousel-number-l"><?php echo str_pad($i, 2, "0", STR_PAD_LEFT); ?></div>
												<div class="carousel-number-r">
													<div class="carousel-number-r-1"><?php echo str_pad(count($detail_futures), 2, "0", STR_PAD_LEFT); ?></div>
													<div class="carousel-number-r-2"><?php echo $futured; ?></div>
												</div>
											</div>
										<?php } ?>
									<?php } ?>
								</div>
								<div class="owl-carousel owl-theme single-slider2" <?php if (apply_filters('wpml_is_rtl', NULL)) { ?> data-rtl="true" <?php } ?>>
									<?php if (is_array($detail_futures) || is_object($detail_futures)) { ?>
										<?php $i = '0';
										foreach ($detail_futures as $futured) {
											$i++; ?>
											<div class="item">
												<div class="carousel-description">
													<?php echo searchForId('description', $futured, $all_features); ?>
												</div>
											</div>
										<?php } ?>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4 position-relative">
					<?php if (count($detail_futures) > 1) { ?>
						<div class="ss-next-prev-button">
							<div class="sscustomPrevBtn">
								<i class="bi bi-chevron-left"></i>
							</div>
							<div class="sscustomNextBtn">
								<i class="bi bi-chevron-right"></i>
							</div>
						</div>
					<?php } ?>
					<div class="owl-carousel owl-theme single-slider2" <?php if (apply_filters('wpml_is_rtl', NULL)) { ?> data-rtl="true" <?php } ?>>
						<?php if (is_array($detail_futures) || is_object($detail_futures)) { ?>
							<?php $i = '0';
							foreach ($detail_futures as $futured) {
								$i++; ?>
								<div class="item">
									<img src="<?php echo searchForId('futures_img', $futured, $all_features); ?>" class="img-fluid">
								</div>
							<?php } ?>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
	<?php if($price != 0){ ?>
	<div class="sare-single-section sare-mt-150 sare-mobil-top-50">
		<div class="container">
			<div class="pricing-table-title">
				<div class="pricing-table-title-1"><?php echo __('Price List and Housing', 'InvestoGlobal'); ?></div>
				<div class="pricing-table-title-2"><?php echo __('Price Changes', 'InvestoGlobal'); ?></div>
			</div>
			<div class="pricing-tab">
				<ul class="nav nav-tabs">
					<?php if (is_array($new_project_type) || is_object($new_project_type)) { ?>
						<?php $i = '0';
						foreach ($new_project_type as $key => $type) {
							$i++; ?>
							<li class="nav-item">
								<a <?php if ($i == '1') { ?>class="active" <?php } ?> data-toggle="tab" href="#<?php echo base64_encode($key); ?>"><?php echo $key; ?></a>
							</li>
						<?php } ?>
					<?php } ?>
				</ul>
				<div class="tab-content">
					<?php $i = '0';
					foreach ($new_project_type as $key => $type) {
						$i++; ?>
						<div class="tab-pane <?php if ($i == '1') { ?>active<?php } ?>" id="<?php echo base64_encode($key); ?>">
							<?php if (is_array($type) || is_object($type)) { 
							 $j = '0';
								foreach ($type as $val) {
									$j++; ?>
									<div class="row <?php if ($j != '1') {
														echo 'sare-mt-20 tab-border-top';
													} ?>">
										<div class="col-md-4">
											<div class="price-tablo-in">
												<div class="price-table-title text-transform-uppercase"><?php echo __('Sale Price ', 'InvestoGlobal'); ?> <span><?php echo $val['min_m2_sale']; ?>m² - <?php echo $val['max_m2_sale']; ?>m²</span></div>
												<div class="price-table-price-min-max">
													<?php
													$sale_min = $val['min_price_sale'];
													$sale_min_price = TCMB_Converter($_SESSION['unity'], get_post_meta($post->ID, "unity", true), $sale_min) . ' ' . $unity;
													$sale_max = $val['max_price_sale'];
													
													$sale_max_price = TCMB_Converter($_SESSION['unity'], get_post_meta($post->ID, "unity", true), $sale_max) . ' ' . $unity;
													?>
													<?php if (isset($_GET['unity'])) { ?>
														<div class="pt-price-min text-transform-uppercase"><?php echo __('Min : ', 'InvestoGlobal'); ?> <span><?php echo $sale_min_price; ?></span></div>
														<div class="pt-price-max text-transform-uppercase"><?php echo __('Max : ', 'InvestoGlobal'); ?> <span><?php echo $sale_max_price; ?></span></div>
													<?php } else { ?>
														<div class="pt-price-min text-transform-uppercase"><?php echo __('Min : ', 'InvestoGlobal'); ?> <span><?php echo number_format($sale_min, 0, ',', '.') . ' ' . $unity; ?></span></div>
														<div class="pt-price-max text-transform-uppercase"><?php echo __('Max : ', 'InvestoGlobal'); ?> <span><?php echo number_format($sale_max, 0, ',', '.') . ' ' . $unity; ?></span></div>
													<?php } ?>
												</div>
											</div>
										</div>

										<?php if ($val['min_price_rental'] && $val['max_price_rental']) { ?>
											<div class="col-md-4">
												<div class="price-tablo-in">
													<div class="price-table-title text-transform-uppercase"><?php echo __('Rental Price', 'InvestoGlobal'); ?> <span><?php echo $val['min_big_rental']; ?>m² - <?php echo $val['max_big_rental']; ?>m²</span></div>
													<div class="price-table-price-min-max">
														<?php
															$rental_min = $val['min_price_rental'];
															$rental_min_price = TCMB_Converter($_SESSION['unity'], get_post_meta($post->ID, "unity", true), $rental_min) . ' ' . $unity;
															$rental_max = $val['max_price_rental'];
															$rental_max_price = TCMB_Converter($_SESSION['unity'], get_post_meta($post->ID, "unity", true), $rental_max) . ' ' . $unity;
														?>
														<?php if (isset($_GET['unity'])) {  ?>
															<div class="pt-price-min text-transform-uppercase"><?php echo __('Min : ', 'InvestoGlobal'); ?> <span><?php echo $rental_min_price; ?></span></div>
															<div class="pt-price-max text-transform-uppercase"><?php echo __('Max : ', 'InvestoGlobal'); ?> <span><?php echo $rental_max_price; ?></span></div>
														<?php } else {
															?>
															<div class="pt-price-min text-transform-uppercase"><?php echo __('Min : ', 'InvestoGlobal'); ?> <span><?php echo $rental_min_price; ?></span></div>
															<div class="pt-price-max text-transform-uppercase"><?php echo __('Max : ', 'InvestoGlobal'); ?> <span><?php echo $rental_max_price; ?></span></div>
														<?php } ?>
													</div>
												</div>
											</div>
										<?php } else { ?>
											<div class="col-md-4">
												<div class="price-tablo-in">
													<div class="price-table-title text-transform-uppercase"><?php echo __('Rental Price', 'InvestoGlobal'); ?> <span><?php echo $val['min_m2_sale']; ?>m² - <?php echo $val['max_m2_sale']; ?>m²</span></div>
													<div class="price-table-price-min-max">
														<?php

														$rental_min = ceil(($val['min_price_sale']) / ($return_time * 0.52 * 20));
														$rental_min_price = TCMB_Converter($_SESSION['unity'], get_post_meta($post->ID, "unity", true), $rental_min) . ' ' . $unity;
														$rental_max = ceil(($val['max_price_sale']) / ($return_time * 0.30 * 20));
														$rental_max_price = TCMB_Converter($_SESSION['unity'], get_post_meta($post->ID, "unity", true), $rental_max) . ' ' . $unity;
														$rental_min_price_count  = array_map('intval', str_split(TCMB_Converter($_SESSION['unity'], get_post_meta($post->ID, "unity", true), $rental_min)));
														$rental_max_price_count  = array_map('intval', str_split(TCMB_Converter($_SESSION['unity'], get_post_meta($post->ID, "unity", true), $rental_max)));
														?>
														<?php if (isset($_GET['unity'])) {  ?>
															<div class="pt-price-min text-transform-uppercase"><?php echo __('Min : ', 'InvestoGlobal'); ?> <span><?php echo price_format($rental_min_price, $unity, $rental_min_price_count); ?></span></div>
															<div class="pt-price-max text-transform-uppercase"><?php echo __('Max : ', 'InvestoGlobal'); ?> <span><?php echo price_format($rental_max_price, $unity, $rental_max_price_count); ?></span></div>
														<?php } else { ?>

															<div class="pt-price-min text-transform-uppercase"><?php echo __('Min : ', 'InvestoGlobal'); ?> <span><?php echo price_format($rental_min_price, $unity, $rental_min_price_count); ?></span></div>
															<div class="pt-price-max text-transform-uppercase"><?php echo __('Max : ', 'InvestoGlobal'); ?> <span><?php echo price_format($rental_max_price, $unity, $rental_max_price_count); ?></span></div>
														<?php } ?>
													</div>
												</div>
											</div>
										<?php } ?>

										<?php if ($val['return_time']) { ?>
											<div class="col-md-4">
												<div class="price-tablo-in border-none">
													<div class="price-table-title text-transform-uppercase"><?php echo __('Return Time', 'InvestoGlobal'); ?></div>
													<div class="price-table-price-min-max">
														<div class="pt-price-min text-transform-uppercase"><?php echo $val['return_time']; ?></div>
													</div>
												</div>
											</div>
										<?php } else { ?>
											<div class="col-md-4">
												<div class="price-tablo-in border-none">
													<div class="price-table-title text-transform-uppercase"><?php echo __('Return Time', 'InvestoGlobal'); ?></div>
													<div class="price-table-price-min-max">
														<div class="pt-price-min text-transform-uppercase"> <?php echo $return_time . ' ' . __('Years', 'InvestoGlobal'); ?></div>
													</div>
												</div>
											</div>
										<?php } ?>
									</div>
								<?php } ?>
							<?php } ?>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
	<?php 
  }
	 if (isset($district[0]->term_id)) { ?>
		<div class="sare-single-section sare-mt-150 sare-mobil-top-50">
			<div class="container">
				<div class="population-table-title">
					<?php if (isset($district[0]->term_id)) { ?>
						<div class="population-table-title-1"><?php echo $district[0]->name; ?></div>
					<?php } ?>
					<div class="population-table-title-2"><?php echo __('Population Informations', 'InvestoGlobal'); ?></div>
				</div>
				<div class="row row-5-gutter sare-mt-50">
					<div class="col-md-3">
						<div class="population-age-title"><?php echo __('Population Age', 'InvestoGlobal'); ?></div>
						<div class="population-age-list">
							<ul>
								<?php if (is_array($population_age) || is_object($type)) { 
									foreach ($population_age as $population) { ?>
										<li>
											<div class="population-age-list-left">
												<div class="pagl-age"><?php echo $population['age_range']; ?></div>
												<div class="pagl-text"><?php echo __('Years Old', 'InvestoGlobal'); ?></div>
											</div>
											<div class="population-age-list-right">
												<div class="pagl-percent">%<?php $percent =  ($population['age_percent_person'] * 100) / ($population_of_the_district);	echo number_format($percent, 2, ',', ' '); ?></div>
											</div>
										</li>
									<?php } ?>
								<?php } ?>
							</ul>
						</div>
					</div>
					<div class="col-md-1"></div>
					<div class="col-md-8 sare-mt-50">
						<div class="row">
							<div class="col-md-4 sare-mobil-bottom">
								<div class="population-icon-box border-none">
									<div class="population-icon population-icon1">
										<svg height="130" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
											<path d="M26.66,38.58a3.46,3.46,0,0,0,3.28-3.29v-7.4c0-2.72-5.36-4.11-8.22-4.11s-8.22,1.39-8.22,4.11v7.4a3.47,3.47,0,0,0,3.29,3.29" />
											<path d="M36.52,40.22c1.6,0,3.29-.87,3.29-2.46v-7.4c0-2.72-4.83-4.12-7.4-4.12a8.17,8.17,0,0,0-.82.05" />
											<path d="M21.72,21.31A3.15,3.15,0,0,0,25,18V16.38a3.15,3.15,0,0,0-3.29-3.29,3.16,3.16,0,0,0-3.29,3.29V18A3.16,3.16,0,0,0,21.72,21.31Z" />
											<line x1="36.52" y1="50.91" x2="36.52" y2="32" />
											<path d="M47.21,43.51c1.6,0,3.29-.87,3.29-2.47v-7.4c0-2.71-4.83-4.11-7.4-4.11a10.08,10.08,0,0,0-1.64.15" />
											<line x1="47.21" y1="50.91" x2="47.21" y2="35.29" />
											<line x1="26.66" y1="50.91" x2="26.66" y2="29.53" />
											<line x1="16.79" y1="29.53" x2="16.79" y2="50.91" />
											<line x1="21.72" y1="37.76" x2="21.72" y2="50.91" />
											<path d="M32.41,23.78a3.16,3.16,0,0,0,3.29-3.29V18.84a3.29,3.29,0,0,0-6.58,0v1.65A3.16,3.16,0,0,0,32.41,23.78Z" />
											<path d="M43.92,27.07a3.16,3.16,0,0,0,3.29-3.29V22.13a3.29,3.29,0,1,0-6.58,0v1.65A3.16,3.16,0,0,0,43.92,27.07Z" />
										</svg>
									</div>
									<?php if (isset($city[0]->term_id)) { ?>
										<div class="population-title"><?php echo __('Population Of The ', 'InvestoGlobal'); ?> <br> <?php echo $district[0]->name; ?></div>
									<?php } ?>
									<div class="population-text"><?php echo thousandsCurrencyFormat($population_of_the_district); ?></div>
								</div>
							</div>
							<div class="col-md-4 sare-mobil-bottom">
								<div class="population-icon-box border-none">
									<div class="population-icon">
										<svg height="130" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
											<path d="M32.14,34.39a.71.71,0,0,1-.32-.07l-20.4-8.54a.83.83,0,0,1,0-1.52l20.13-8.82a.82.82,0,0,1,.65,0L52.58,24a.83.83,0,0,1,0,1.52L32.47,34.32A.93.93,0,0,1,32.14,34.39ZM13.84,25l18.29,7.66,18-7.91L31.87,17.09Z" />
											<path d="M23.65,43.27H22V29.66a.84.84,0,0,1,.45-.74l9.18-4.78.76,1.47-8.73,4.55Z" />
											<path d="M25.78,51.13H19.85A.83.83,0,0,1,19,50.3V46.24a3.79,3.79,0,1,1,7.58,0V50.3A.83.83,0,0,1,25.78,51.13Zm-5.1-1.66H25V46.24a2.14,2.14,0,0,0-4.28,0Z" />
											<path d="M32.14,40.16c-7.17,0-13.57-2.29-15.95-5.71a.86.86,0,0,1-.14-.47V27.19H17.7v6.52c2.17,2.83,8.05,4.8,14.44,4.8s12.27-2,14.44-4.8V26.87h1.65V34a.86.86,0,0,1-.14.47C45.71,37.87,39.31,40.16,32.14,40.16Z" />
										</svg>
									</div>
									<div class="population-title"><?php echo __('Population Of The Education', 'InvestoGlobal'); ?></div>
									<div class="population-text"><?php echo $population_of_the_education; ?></div>
								</div>
							</div>
							<div class="col-md-4 sare-mobil-bottom">
								<div class="population-icon-box border-none">
									<div class="population-icon">
										<svg height="130" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
											<path class="cls-1" d="M31.77,42a13,13,0,1,1,13.05-13A13.06,13.06,0,0,1,31.77,42Zm0-24.46A11.42,11.42,0,1,0,43.19,28.93,11.43,11.43,0,0,0,31.77,17.51Z" />
											<path class="cls-1" d="M53.17,51.14a.8.8,0,0,1-.57-.24L39.84,38.15A.82.82,0,0,1,41,37L53.75,49.75a.81.81,0,0,1,0,1.15A.82.82,0,0,1,53.17,51.14Z" />
											<path class="cls-1" d="M12.65,34.94a.81.81,0,0,1-.81-.81V33a.82.82,0,0,1,.81-.82.82.82,0,0,1,.82.82v1.09A.82.82,0,0,1,12.65,34.94Z" />
											<path class="cls-1" d="M9,34.94a.82.82,0,0,1-.82-.81v-3.7A.82.82,0,0,1,9,29.62a.81.81,0,0,1,.81.81v3.7A.81.81,0,0,1,9,34.94Z" />
											<path class="cls-1" d="M16.46,34.94a.82.82,0,0,1-.82-.81V28.47a.82.82,0,0,1,.82-.81.81.81,0,0,1,.81.81v5.66A.81.81,0,0,1,16.46,34.94Z" />
											<path class="cls-1" d="M24.07,34.94a.82.82,0,0,1-.82-.81V28.58a.82.82,0,0,1,.82-.81.81.81,0,0,1,.81.81v5.55A.81.81,0,0,1,24.07,34.94Z" />
											<path class="cls-1" d="M28.09,34.94a.82.82,0,0,1-.82-.81v-7.5a.82.82,0,0,1,.82-.82.82.82,0,0,1,.81.82v7.5A.81.81,0,0,1,28.09,34.94Z" />
											<path class="cls-1" d="M32.11,34.94a.82.82,0,0,1-.82-.81V21.63a.82.82,0,0,1,.82-.82.82.82,0,0,1,.81.82v12.5A.81.81,0,0,1,32.11,34.94Z" />
											<path class="cls-1" d="M36,34.94a.81.81,0,0,1-.81-.81V21.63a.82.82,0,0,1,.81-.82.82.82,0,0,1,.82.82v12.5A.82.82,0,0,1,36,34.94Z" />
											<path class="cls-1" d="M40,34.94a.81.81,0,0,1-.81-.81V28.37a.82.82,0,0,1,.81-.82.82.82,0,0,1,.82.82v5.76A.82.82,0,0,1,40,34.94Z" />
											<path class="cls-1" d="M47.32,34.94a.81.81,0,0,1-.81-.81V28.91a.82.82,0,0,1,.81-.82.82.82,0,0,1,.82.82v5.22A.82.82,0,0,1,47.32,34.94Z" />
											<path class="cls-1" d="M51.13,34.94a.82.82,0,0,1-.82-.81V25a.82.82,0,0,1,.82-.82.82.82,0,0,1,.81.82v9.13A.81.81,0,0,1,51.13,34.94Z" />
											<path class="cls-1" d="M55,34.94a.81.81,0,0,1-.81-.81V27.28a.82.82,0,0,1,.81-.82.82.82,0,0,1,.82.82v6.85A.82.82,0,0,1,55,34.94Z" />
										</svg>
									</div>
									<div class="population-title"><?php echo __('Annual Population Increase', 'InvestoGlobal'); ?></div>
									<div class="population-text">%<?php echo $annual_population_increase; ?></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>



  <?php 
  $region_control = 0;
  $current_rental_array =  array( $district[0]->term_id);
  if(!empty($region_district)){
 
  $new_percent_array = array_merge($current_rental_array, $region_district);
  foreach($region_district as $districts) { 
    $region_control++;
  }
  echo $region_control;
  if($region_control>1){
	
  ?>

	<div class="region sare-mt-150 sare-mobil-top-50 sare-mt-150">
    <div class="container">
	<div class="population-table-title  mb-5">
		<div class="population-table-title-1"><?php echo __('region', 'InvestoGlobal'); ?></div>
			<div class="population-table-title-2"><?php echo __('Price Changes', 'InvestoGlobal'); ?></div>
		</div>
      <div class="row mt-4">
        <div class="col-md-6">
          <div class="item">
            <div class="top-area d-md-flex align-items-center justify-content-between">
              <div class="text">
                <div class="city"><?php echo $city[0]->name; ?></div>
                <div class="distinct"><?php echo $district[0]->name; ?></div>
                <div class="info"><?php echo __('changes in house rental prices', 'InvestoGlobal'); ?></div>
              </div>
              <div class="region-tab">
				<div class="tab-title"><?php echo __('For Rent', 'InvestoGlobal'); ?></div>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <a class="nav-link " id="one-rental-tab" data-toggle="tab" href="#one-rental" role="tab"
                      aria-controls="one-rental" aria-selected="true"><?php echo __('1 year', 'InvestoGlobal'); ?></a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="two-rental-tab" data-toggle="tab" href="#two-rental" role="tab"
                      aria-controls="two-rental" aria-selected="false"><?php echo __('3 years', 'InvestoGlobal'); ?></a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a class="nav-link" id="three-rental-tab" data-toggle="tab" href="#three-rental" role="tab"
                      aria-controls="three-rental" aria-selected="false"><?php echo __('5 years', 'InvestoGlobal'); ?></a>
                  </li>
                </ul>
              </div>
            </div>
           
            <div class="bottom-area">
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade " id="one-rental" role="tabpanel" aria-labelledby="one-rental-tab">
                <?php echo region_price('1_years__rental_percent', $district[0]->term_id, $region_district);  ?>
                </div><!-- tab-->
                <div class="tab-pane fade show active" id="two-rental" role="tabpanel" aria-labelledby="two-rental-tab">
                <?php echo region_price('3_years__rental_percent', $district[0]->term_id, $region_district);  ?>
                </div>
                <div class="tab-pane fade" id="three-rental" role="tabpanel" aria-labelledby="three-rental-tab">
                <?php echo region_price('5_years__rental_percent', $district[0]->term_id, $region_district);  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="item">
            <div class="top-area d-md-flex align-items-center justify-content-between">
              <div class="text">
              <div class="city"><?php echo $city[0]->name; ?></div>
                <div class="distinct"><?php echo $district[0]->name; ?></div>
                <div class="info"><?php echo __('changes in house sale prices', 'InvestoGlobal'); ?></div>
              </div>
              <div class="region-tab">
				      <div class="tab-title"><?php echo __('For Sale', 'InvestoGlobal'); ?></div>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <a class="nav-link " id="one-sale-tab" data-toggle="tab" href="#one-sale" role="tab" aria-controls="one-sale" aria-selected="true"><?php echo __('1 year', 'InvestoGlobal'); ?></a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="two-sale-tab" data-toggle="tab" href="#two-sale" role="tab" aria-controls="two-sale" aria-selected="false"><?php echo __('3 years', 'InvestoGlobal'); ?></a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a class="nav-link" id="three-sale-tab" data-toggle="tab" href="#three-sale" role="tab" aria-controls="three-sale" aria-selected="false"><?php echo __('5 years', 'InvestoGlobal'); ?></a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="bottom-area">
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade" id="one-sale" role="tabpanel" aria-labelledby="one-sale-tab">
                <?php echo region_price('1_years__sale_percent', $district[0]->term_id, $region_district);  ?>
                </div>
                <div class="tab-pane fade  show active" id="two-sale" role="tabpanel" aria-labelledby="two-sale-tab">
                <?php echo region_price('3_years__sale_percent', $district[0]->term_id, $region_district);  ?>
                </div>
                <div class="tab-pane fade" id="three-sale" role="tabpanel" aria-labelledby="three-sale-tab">
                <?php echo region_price('5_years__sale_percent', $district[0]->term_id, $region_district);  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php } } ?>
</main>
<?php get_footer(); ?>