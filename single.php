<?php get_header(); ?>

		<div id="page-wrap">
				<div class="info-col">
					<?php previous_post_link( '%link', '' . _x( '&larr;', 'Previous post link', 'twentyten' ) . ' %title' ); ?>&nbsp;
				</div>
				<div class="info-col">
					
			    		<h2>
			    			<?php the_title(); ?>
						</h2>
			    		
			    		<a class="image SINGLE" href="#">View Image</a>
			    		
			    		<dl>
			    <?php $c = 0; ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php $c++; $color = ($c % 2 == 0) ? 'white' : 'blue'; ?>
					<?php $special_class = get_post_custom_values('special_class'); ?>
					<?php $starter = ($c==1)  ? 'id="starter" ' : ''; ?>
						<dt <?php echo $starter; ?>class="<?php echo $color; ?> <?php echo $special_class[0]; ?>"><?php the_title(); ?></dt>
						<dd class="<?php echo $color; ?>">
						<?php the_content(); ?>
						<br />
						<?php //sfc_like_button(); ?>
	<?php //$script = '<script type="text/javascript" charset="utf-8">TopUp.addPresets({'; ?>
	<?php //$script .= '".gallery-icon a": {group: ".gallery-icon",layout: "dashboard",overlayClose: 1,modal: 0},'; ?>
	<?php //$script .= '}); </script>'; ?>
	<?php //echo $script; ?>
						<?php echo do_shortcode('[gallery itemtag="div" size="thumbnail" icontag="span" captiontag="p" link="file" columns="2"]'); ?>
						<?php comments_template( '', true ); ?>
						</dd>
				<?php endwhile; // End the loop. Whew. ?>
				</div>
				<div class="info-col">
					<div class="next">
					<?php next_post_link( '%link', '%title ' . _x( '&rarr;', 'Next post link', 'twentyten' ) . '' ); ?>
					</div>
					<?php get_sidebar(); ?>
				</div>			
		</div><!-- #container -->
<?php get_footer(); ?>
