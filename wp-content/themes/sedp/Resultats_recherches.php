<?php 
/*
Template Name: Search Page
*/
require( 'header.php' ); ?>
<?php require( 'template_part/header_part.php'); ?>
<?php require( 'template_part/fil_ariane.php'); ?>
	
	<?php  
			
			$args = array('s' => 'keyword', 'post_type' => array('post', 'projets', 'publicationsas', 'metiersas', 'partenaires', 'page', 'offre_recrutement'), 'posts_per_page'=> '7' );
	   
			$query = new WP_Query($args);
	
	?>
	<section class="pages recherches">
		<div class="row">
				<div class="columns medium-8 rechercheBloc">
					<div class="recherche">votre recherche : <strong><?php  echo  get_query_var("s" , "") ; ?></strong></div>
					<div class="resultat"><?php echo $wp_query->found_posts ?> résultats</div>
				</div>

				<div class="columns medium-4">
					<?php include( 'searchform.php' );  ?>
				</div>
	 
			</div>
		<?php 
		
		
		if ( $query->have_posts() ) : ?>

			<?php
			while ( $query->have_posts() ) : $query->the_post(); ?>

				<div class="resultats_recherches">
					<div class="row">

						<div class="columns medium-12 hr"><hr></div>
						<div class="columns large-7 medium-12 small-12 end">
							<div class="title"><a href="<?php echo the_permalink(); ?>"><?php the_title() ?></a></div>
							<div class="exerpt"><?php the_content() ?></div>
						</div>
					</div>
				</div>

				<?php
			endwhile;


		else : ?>

		<div class="resultats_recherches">
			<div class="row">
				<div class="columns large-7 medium-12 small-12 end">
				<div class="h1"><?php printf( __( 'Résultats de la recherche pour: %s', 'systemepc' ), get_search_query() );?></div>
			</div>
		</div>
			
		<?php get_template_part( '', 'none' ); 

		endif;

		?>
		<div class="row">
			<div class="columns medium-12 small-12">
				<div class="navigation">
					<div class="previous"> <a href="#"> <?php echo get_previous_posts_link( 'Page précédente' ); ?> </a></div>
					<div class="next"> <a href="#"> <?php echo get_next_posts_link( 'Page suivante' ); ?> </a></div>
				</div>
			</div>
		</div>
		
	</section>	
	
		

<?php require( 'footer.php' ); ?>
