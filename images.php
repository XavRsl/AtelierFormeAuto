	<?php $script = '<script type="text/javascript" charset="utf-8">TopUp.addPresets({'; ?>
	<?php query_posts('order_by=ID&posts_per_page=20'); ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php
			$images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC', 'numberposts' => 999 ) );
		?>
		<?php $cat = get_the_category($post->ID); ?>
		<?php $special_class = get_post_custom_values('special_class'); ?>
		<?php if (has_post_thumbnail()) : ?>
		<?php $pt = get_post_thumbnail_id(); ?>
		<?php endif; ?>
		<?php foreach($images as $img) : ?>
		<?php if($img->ID == $pt) { continue; } ?>
		<?php $image = wp_get_attachment_image_src($img->ID, 'large'); ?>
		<a class="<?php echo $special_class[0]; ?>" href="<?php echo $image[0]; ?>"><?php echo $cat[0]->cat_name ?> <?php the_title(); ?></a>	
		<?php endforeach; ?>
	<?php $script .= '"a.'. $special_class[0] . '": {group: "' . $special_class[0] . '",layout: "dashboard",overlayClose: 1,modal: 0},'; ?>
	<?php endwhile; // End the loop. Whew. ?>
	<?php $script .= '}); </script>'; ?>
	<?php echo $script; ?>
