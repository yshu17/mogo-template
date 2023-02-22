<?php
add_action('wp_enqueue_scripts', function () {
	wp_enqueue_style('main_styles', get_template_directory_uri() . '/styles/main_global.css', false, null);
});

add_action('wp_enqueue_scripts', function () {

	wp_deregister_script('jquery');
	wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js', false, null, true);
	wp_enqueue_script('jquery');

	wp_enqueue_script('fontLoader', get_template_directory_uri() . '/js/font-loader.js', false, null, false);
	wp_enqueue_script('all', get_template_directory_uri() . '/js/all.js', false, null, true);
	wp_enqueue_script('main-script', get_template_directory_uri() . '/js/main.js', array('jquery'), null, true);
});

add_action('after_setup_theme', function () {
	add_theme_support('post-thumbnails');
	add_theme_support('custom-logo');
	add_theme_support('title-tag');
	add_theme_support('custom-background');
});

add_action( 'init', 'register_post_types' );

add_action('wp_head', 'custom_head_css');

add_action( 'manage_posts_custom_column', 'gt_posts_custom_column_views' );

add_filter('nav_menu_link_attributes', 'add_menu_link_class', 1, 3);

add_filter( 'upload_mimes', 'svg_upload_allow' );

add_filter( 'manage_posts_columns', 'gt_posts_column_views' );

register_nav_menus(array('top' => 'Верхнее меню'));

function register_post_types(){

	register_post_type( 'team', [
		'label'  => 'Team',
		'labels' => [
			'name'               => 'Team', // основное название для типа записи
			'singular_name'      => 'Teammate', // название для одной записи этого типа
			'add_new'            => 'Add teammate', // для добавления новой записи
			'add_new_item'       => 'Add new teammate', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование teammate', // для редактирования типа записи
			'new_item'           => 'New teammate', // текст новой записи
			'view_item'          => 'Смотреть teammate', // для просмотра записи этого типа.
			'search_items'       => 'Искать teammate', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Team', // название меню
		],
		'description'			=> '',
		'public'                => true,
		'show_in_menu'          => true, // показывать ли в меню админки
		'menu_position'       	=> 9,
		'menu_icon'           	=> 'dashicons-groups',
		'capability_type'		=> 'post',
		'hierarchical'        	=> false,
		'supports'            	=> [ 'title', 'editor', 'custom-fields', 'thumbnail' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'has_archive'         	=> false,
		'rewrite'             	=> true,
		'query_var'           	=> true,
		'taxonomies'          => array( 'category' ),

	] );
	
	register_post_type( 'testimonials', [
		'label'  => 'Testimonials',
		'labels' => [
			'name'               => 'Testimonials', // основное название для типа записи
			'singular_name'      => 'Testimonials', // название для одной записи этого типа
			'add_new'            => 'Add review', // для добавления новой записи
			'add_new_item'       => 'Add new testimonials', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование review', // для редактирования типа записи
			'new_item'           => 'New review', // текст новой записи
			'view_item'          => 'Смотреть review', // для просмотра записи этого типа.
			'search_items'       => 'Искать review', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Testimonials', // название меню
		],
		'description'			=> '',
		'public'                => true,
		'show_in_menu'          => true, // показывать ли в меню админки
		'menu_position'       	=> 26,
		'menu_icon'           	=> 'dashicons-testimonial',
		'capability_type'		=> 'post',
		'hierarchical'        	=> false,
		'supports'            	=> [ 'title', 'editor', 'custom-fields', 'thumbnail' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'has_archive'         	=> false,
		'rewrite'             	=> true,
		'query_var'           	=> true,
		'taxonomies'          	=> array( 'category' ),
	] );
}
function svg_upload_allow( $mimes ) {
	$mimes['svg']  = 'image/svg+xml';

	return $mimes;
}
function add_menu_link_class($atts, $item, $args) {
	if (property_exists($args, 'link_class')) {
		$atts['class'] = $args->link_class;
	}
	return $atts;
}
function custom_head_css() {
	?>
		<style type="text/css">
			.section.intro_mod {
				background-image: url('<?php echo get_field('hero_bg_image'); ?>');
			}
			.section_title.intro_mod {
				color: <?php echo get_field('hero_text_color'); ?>;
			}
			.section_title.intro_mod::after {
				background: <?php echo get_field('hero_text_color'); ?>;
			}
			.section.what_mod {
				background-image: url('<?php echo get_field('testimonials_bg_image'); ?>');
			}
		</style>
	<?php
}
function gt_get_post_view() {

    $count = get_post_meta( get_the_ID(), 'post_views_count', true );
	if($count == null || $count == '') $count = 0; 
    return $count;

}
function gt_set_post_view() {
    $key = 'post_views_count';
    $post_id = get_the_ID();
    $count = (int) get_post_meta( $post_id, $key, true );
    $count++;

    update_post_meta( $post_id, $key, $count );

}
function gt_posts_column_views( $columns ) {
    $columns['post_views'] = 'Views';
    return $columns;
}
function gt_posts_custom_column_views( $column ) {
    if ( $column === 'post_views') {
        echo gt_get_post_view();
    }
}
?>