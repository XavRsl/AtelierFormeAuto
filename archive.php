<?php get_header(); ?>

		<div id="page-wrap">
				<div class="info-col">&nbsp;</div>
				<div class="info-col">
					
			    		<h2>
			    		<?php if ( is_day() ) : ?>
							<?php printf( __( 'Archives: %s', 'atelier' ), get_the_date() ); ?>
						<?php elseif ( is_month() ) : ?>
							<?php printf( __( 'Archives du mois : %s', 'atelier' ), get_the_date('F Y') ); ?>
						<?php elseif ( is_year() ) : ?>
							<?php printf( __( 'Archives de l\'année %s', 'atelier' ), get_the_date('Y') ); ?>
						<?php else : ?>
							<?php _e( 'Blog Archives', 'twentyten' ); ?>
						<?php endif; ?>
						</h2>
			    		
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
<?php get_footer(); ?>
