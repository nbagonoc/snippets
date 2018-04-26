<!-- wordpress functions -->

<?php get_header(); ?> <!-- include header.php -->

<?php get_sidebar('sidebar'); ?> <!-- include sidebar/widget -->

<title><?php bloginfo('name'); ?></title> <!-- gets the name of the website -->

<title><?php wp_title(''); ?></title> <!-- gets the tittle of page -->

<title><?php bloginfo('name'); ?><?php wp_title('-'); ?></title> <!-- gets the name of the  website and the title of the page -->

<meta name="description" content="<?php bloginfo('description'); ?>" /> <!-- gets the description -->

<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico"><!-- favicon -->

<?php wp_head();?> <!-- wordpress include required header data -->

<?php echo home_url(); ?> <!-- website home url  -->

<?php the_permalink();?> <!-- gets the link of the requested post -->

<?php the_title();?> <!-- gets the title of the requested post -->

<?php echo get_the_content(); ?> <!-- gets the content of the requested post -->

<?php echo get_the_excerpt(); ?> <!-- gets the excerpt of the requested post -->

<?php the_post_thumbnail('medium', array('class'=>'img-responsive')); ?> <!-- gets the thumbnail of the requested post -->

<?php get_search_form(); ?> <!-- display search form -->

<?php echo do_shortcode('[wpforms id="00"]') ?> <!-- displays the shortcode requested by ID -->

<?php get_footer(); ?> <!-- include footer.php -->

<?php wp_footer(); ?> <!-- wordpress include required footer data -->

<?php echo get_template_directory_uri() ?> <!-- gets the current theme directory -->

<?php echo paginate_links(); ?> <!-- pagination to multiple post display -->

<?php if(have_posts()) : while(have_posts()) : the_post(); ?> <!-- default post/page checker -->

<?php the_time('F jS, Y'); ?> <!-- date format -->

<?php the_time('g:i a'); ?> <!--time format -->

<?php the_date('F jS, Y'); ?> at <?php the_time('g:i a'); ?> <!-- time and date -->

<?php the_search_query(); ?> <!-- returns the value requested -->

<?php echo home_url('/'); ?> <!-- grabs the home url http://www.example.com/ -->

<?php echo home_url(); ?> <!-- grabs the home url http://www.example.com -->


<p><?php echo get_post_meta($post->ID,'name-of-custom-field',true); ?></p> <!-- gets the custom field -->

<!-- sidebar.php-->
<?php if ( is_active_sidebar( 'sidebar' )  ) : ?>
	<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 sidebar widget-area">
		<?php dynamic_sidebar( 'sidebar' ); ?>
	</div>
<?php endif; ?>



<!-- functions.php -->

<?php

//add menu function
register_nav_menus(array('main-nav'=>'Main Navigation'));

//remove admin bar of frontend
add_filter('show_admin_bar', '__return_false');

//add thumbnail function
add_theme_support('post-thumbnails');

//add sidebar function
register_sidebar( array(
	'name'          => 'sidebar',
	'description'   => 'This is the  sidebar',
	'before_widget' => '<li id="%1" class="widget %2">',
	'after_widget'  => '</li>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>'
	)
);

//add custom image size. add image size b4 uploading images
add_image_size('custom', 480, 320, false);

//insert styles
function add_styles(){
	wp_enqueue_style('bootstrap.min-style', get_template_directory_uri() . '/css/bootstrap.min.css');
	wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
	wp_enqueue_style('animate', get_template_directory_uri() . '/css/animate.css');
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/font-awesome/css/font-awesome.min.css');
}
add_action('wp_enqueue_scripts', 'add_styles');

//insert scripts
function add_scripts(){
	wp_enqueue_script('jsQuery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', array(), '1.12.4', true);
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), false, true);
	wp_enqueue_script('respond', get_template_directory_uri() . '/js/respond.min.js', array(), false, true);
	wp_enqueue_script('sidebarMenu', get_template_directory_uri() . '/js/sidebarMenu.js', array(), false, true);
	wp_enqueue_script('viewportchecker', get_template_directory_uri() . '/js/viewportchecker.js', array(), false, true);
	wp_enqueue_script('animationTrigger', get_template_directory_uri() . '/js/animationTrigger.js', array(), false, true);
	wp_enqueue_script('scroll', get_template_directory_uri() . '/js/scrolling.js', array(), false, true);
	wp_enqueue_script('easing', get_template_directory_uri() . '/js/jquery.easing.min.js', array(), false, true);	
}
add_action('wp_enqueue_scripts', 'add_scripts');

//add page-scroll to anchor tas
function add_menuclass($ulclass) {
   return preg_replace('/<a /', '<a class="page-scroll"', $ulclass);
}
add_filter('wp_nav_menu','add_menuclass');

//add sidebar  support
function sidebar() {
	register_sidebar(array(
		'name'          => 'sidebar',
		'id'            => 'sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="text-center">',
		'after_title'   => '</h2>',
	));
}
add_action( 'widgets_init', 'sidebar' );

?>



<!-- files -->
style.css
404.php
front-page.php
home.php <!-- blog page -->
header.php
footer.php
functions.php 
index.php <!-- default, if required file not available -->
page-PageNameHere.php
page.php <!-- default file for page, if required file not available -->
search.php
searchform.php
single.php <!-- default file for post -->
archive.php
comments.php
widgets.php
sidebar.php





<!-- bootstrap WP menu -->
<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
	    <div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
	      <!-- <a class="navbar-brand text-uppercase" href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a> -->
			<a class="navbar-brand text-uppercase" href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" class="brand"></a>    
	    </div>
		<?php
			$args = array(
				'menu' => 'main-nav',
				'container' => 'div',
				'container_class' => 'collapse navbar-collapse',
				'container_id' => 'navbar',
				'menu_class' => 'nav navbar-nav navbar-right text-uppercase',
			);

			wp_nav_menu( $args );
		?>

	</div>
</nav>



<!-- retrieves a post/page, if any -->
<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
	<h1 class="text-capitalize"><?php the_title(); ?></h1>
	<p><?php echo get_the_content(); ?></p>
<?php endwhile; ?>
<?php else: ?>
<?php endif; ?>
<?php wp_reset_postdata(); ?>	

<!-- clean code version -->
<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
	<!-- insert queries here -->
<?php endwhile; ?>
<?php else: ?>
<?php endif; ?>
<?php wp_reset_postdata(); ?>




<!-- retrieving specific post by  post ID -->
<?php $query = new WP_Query('p=00'); ?>				
<?php if($query->have_posts()) : while($query->have_posts()) : $query->the_post(); ?>
	<div class="textContainer">
		<a href="<?php the_permalink(); ?>"><h1 class="light"><?php the_title(); ?></h1></a>
		<h3 class="light"><?php echo get_the_excerpt(); ?></h3>
	</div>
<?php endwhile; ?>
<?php else: ?>
<?php endif; ?>
<?php wp_reset_postdata(); ?>

<!-- clean code version -->
<?php $query = new WP_Query('p=00'); ?>				
<?php if($query->have_posts()) : while($query->have_posts()) : $query->the_post(); ?>		
	<!-- insert queries here -->
<?php endwhile; ?>
<?php else: ?>
<?php endif; ?>
<?php wp_reset_postdata(); ?>






<!-- retrieving specific post by category ID with post per page-->
<?php $query = new WP_Query('cat=00&posts_per_page=0'); ?>				
<?php if($query->have_posts()) : while($query->have_posts()) : $query->the_post(); ?>
	<div class="featureItemContainer col-xs-12 col-sm-6 col-md-3 col-lg-3">
		<div class="featureItem">
			<a href="<?php the_permalink();?>">
				<?php the_post_thumbnail('medium', array('class'=>'img-responsive blogItemImage')); ?>
					<div class="featureItemOverlay">
						<div class="featureItemText">
							<h5 class="text-uppercase"><?php the_title(); ?></h5>
							<?php the_excerpt(); ?>
						</div>
					</div>
			</a>
		</div>
	</div>
<?php endwhile; ?>
<?php else: ?>
<?php endif; ?>
<?php wp_reset_postdata(); ?>

<!-- clean code version -->
<?php $query = new WP_Query('cat=00&posts_per_page=0'); ?>				
<?php if($query->have_posts()) : while($query->have_posts()) : $query->the_post(); ?>		
	<!-- insert queries here -->
<?php endwhile; ?>
<?php else: ?>
<?php endif; ?>
<?php wp_reset_postdata(); ?>





	<!-- Banner Slider make sure to add active class on 1st item via jqeury-->
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
	  <!-- Indicators -->
	  <ol class="carousel-indicators">
	    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	    <li data-target="#myCarousel" data-slide-to="1"></li>
	    <li data-target="#myCarousel" data-slide-to="2"></li>
	  </ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner">
			<!-- retrieving specific post by category ID with post per page-->
			<?php $query = new WP_Query('cat=30&posts_per_page=3'); ?>				
			<?php if($query->have_posts()) : while($query->have_posts()) : $query->the_post(); ?>
		    <div class="item">
				<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'background' ); ?>
				<div class="banner VerticalAlign" style="background-image: url('<?php echo $thumb['0'];?>');">
					<div class="verticalAlignElement text-center">
			        	<h1><?php the_title(); ?></h1>
			        	<h3><?php echo the_content();?></h3>
					</div>
				</div>
		    </div>
			<?php endwhile; ?>
			<?php else: ?>
			<?php endif; ?>
			<?php wp_reset_postdata(); ?>
		</div>

	  <!-- Left and right controls -->
	  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
	    <span class="glyphicon glyphicon-chevron-left"></span>
	    <span class="sr-only">Previous</span>
	  </a>
	  <a class="right carousel-control" href="#myCarousel" data-slide="next">
	    <span class="glyphicon glyphicon-chevron-right"></span>
	    <span class="sr-only">Next</span>
	  </a>
	</div>



<?php

// plugin development

//hooks

// add_filter('the_title', function($content){
//     return strtoupper($content);
//     return strtolower($content);
//     return ucwords($content);
// });

// add_filter('the_content', function($content){
//     return $content.time(); 
// });

// add_action('wp_footer', function(){
//     echo 'hello from the footer';
// });

// add_action('comment_post', function(){
//     $mail = get_bloginfo('admin_email');
//     wp_mail(
//         $mail,
//         'new comment posted',
//         'a new comment has been left on your blog post'
//     );
// });

//shortcode
// add_shortcode( 'nb_shortcode', function(){
//     return` "hi";
// })