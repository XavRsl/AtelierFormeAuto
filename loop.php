<?php
/**
 * The loop that displays posts.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop.php or
 * loop-template.php, where 'template' is the loop context
 * requested by a template. For example, loop-index.php would
 * be used if it exists and we ask for the loop with:
 * <code>get_template_part( 'loop', 'index' );</code>
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>

<?php
	/* Start the Loop.
	 *
	 * In Twenty Ten we use the same loop in multiple contexts.
	 * It is broken into three main parts: when we're displaying
	 * posts that are in the gallery category, when we're displaying
	 * posts in the asides category, and finally all other posts.
	 *
	 * Additionally, we sometimes check for whether we are on an
	 * archive page, a search page, etc., allowing for small differences
	 * in the loop on each template without actually duplicating
	 * the rest of the loop that is shared.
	 *
	 * Without further ado, the loop:
	 */ ?>
<?php $categories = get_categories('orderby=id'); ?>
<?php $cat=0; ?>
<?php foreach ($categories as $category) : ?>
	<?php $cat++; ?>
	<?php query_posts('category_name='.$category->cat_name.'&posts_per_page=7'); ?>
	<?php $c = 0 ; ?>
	<div class="info-col">
		
    		<h2><?php echo $category->cat_name; ?></h2>
    		
    		<a class="image <?php echo $category->category_nicename; ?>" href="#">View Image</a>
    		
    		<dl>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php $c++; $color = ($c % 2 == 0) ? 'white' : 'blue'; ?>
		<?php $special_class = get_post_custom_values('special_class'); ?>
		<?php $starter = ($c==1 && $cat==2)  ? 'id="starter" ' : ''; ?>
			<dt <?php echo $starter; ?>class="<?php echo $color; ?> <?php echo $special_class[0]; ?>"><?php the_title(); ?></dt>
			<dd class="<?php echo $color; ?>">
				<?php the_content(); ?><br />
				<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">Lire la suite →</a>
			</dd>
	<?php endwhile; // End the loop. Whew. ?>
	</div>
<?php endforeach; ?>
