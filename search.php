<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>


<?php if ( have_posts() ) : ?>
		<div id="page-wrap">
				<div class="info-col">&nbsp;</div>
				<div class="info-col">
					
			<h2 class="page-title"><?php printf( __( 'Résultats de la recherche pour: %s', 'twentyten' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
			    		<a class="image ARCH" href="#">View Image</a>
			    		
			    		<dl>
			    <?php $c = 0; ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php $c++; $color = ($c % 2 == 0) ? 'white' : 'blue'; ?>
					<?php $special_class = get_post_custom_values('special_class'); ?>
					<?php $starter = ($c==1)  ? 'id="starter" ' : ''; ?>
						<dt <?php echo $starter; ?>class="<?php echo $color; ?> <?php echo $special_class[0]; ?>"><?php the_title(); ?></dt>
						<dd class="<?php echo $color; ?>"><?php the_content(); ?><br />
							<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">Lire la suite →</a>
						</dd>
				<?php endwhile; // End the loop. Whew. ?>
				</div>
				<div class="info-col">
					<?php get_sidebar(); ?>
				</div>			
		</div><!-- #container -->


		<div id="images">
		<?php
			get_template_part( 'images', 'index' );
		?>
		</div>
<?php else : ?>
		<div id="container">
			<div id="content" role="main">
				<div id="post-0" class="post no-results not-found">
					<h2 class="entry-title"><?php _e( 'Nothing Found', 'twentyten' ); ?></h2>
					<div class="entry-content">
						<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'twentyten' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</div><!-- #post-0 -->
<?php endif; ?>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_footer(); ?>
