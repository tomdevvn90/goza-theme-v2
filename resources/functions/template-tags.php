<?php
function goza_post_item() {
	?>
    <div class="item-inner">
        <a href="<?= get_the_permalink(); ?>" class="img-wrap"
           title="<?= get_the_title(); ?>"
           style="background-image: url('<?= has_post_thumbnail() ? get_the_post_thumbnail_url() : ''; ?>')">
        </a>
        <div class="item-content">
            <div class="date-time"><?= get_the_date(); ?></div>
            <h3 class="title">
                <a href="<?= get_the_permalink(); ?>"><?= get_the_title(); ?></a>
            </h3>
            <div class="excerpt"><?= wp_trim_words( get_the_excerpt(), 10, '...' ); ?></div>
            <a class="btn-more" href="<?= get_the_permalink() ?>">Read more</a>
        </div>
    </div>
	<?php
}
