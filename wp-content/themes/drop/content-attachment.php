<div class='entry'>
    <div class='entry-header'>
        <h1 class='entry-title'><?php the_title(); ?></h1>
    </div>
    <div class="entry-content">
        <article>
            <?php
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
            $image = $image[0];
            echo "<img src='$image' />";
            ?>
        </article>
        <nav class='further-reading'>
            <p class='prev'>
                <span><?php previous_image_link( false, __( 'Previous Image', 'drop' ) ); ?></span>
            </p>
            <p class='next'>
                <span><?php next_image_link(false, __( 'Next Image', 'drop' )); ?></span>
            </p>
        </nav>
    </div>
</div>

