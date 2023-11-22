<?php 
function be_item_post($is_style){
?>
    <div class="item-post item post_recent"> 
        <div class="item-post-inner"> 
            <?php     
            switch ($is_style) {
                case strpos($is_style, 'is-style-goza-dream') !== false:     
                    be_template_post_goza_dream();
                    break;

                case strpos($is_style, 'is-style-goza-fill') !== false:         
                    be_template_post_goza_fill();
                    break; 
                    
                case strpos($is_style, 'is-style-goza-outline') !== false:     
                    be_template_post_goza_outline();
                    break; 
                    
                case strpos($is_style, 'is-style-goza-charity') !== false:     
                    be_template_post_goza_charity();
                    break;  
                
                case strpos($is_style, 'is-style-goza-earthquake') !== false:     
                    be_template_post_goza_earthquake();
                    break;

                default:
                    be_template_post_default();
                    break; 
            } ?>
        </div>
    </div>
    <?php
}
function be_template_post_goza_earthquake(){ 
    $comment      = get_comments_number();
    $post_date    = get_the_date('<\s\p\a\n>d<\/\s\p\a\n> M');
    $categories   = get_the_category();
?>

    <div class="item-post-thumbnail"> 
        <?php if(has_post_thumbnail()): ?>
            <?php the_post_thumbnail('full'); ?>
        <?php endif; ?>
        
        <div class="item-post-inner-cat"> 
            <h2 class="item-post-title"> 
                <a href="<?php the_permalink() ?>"> <?php the_title() ?> </a>
            </h2>
            <?php if(!empty($categories)): ?>
                <?php $num_of_items = count($categories); ?>
                <div class="item-post-category post-term-list"> 
                    <i class="fa fa-tags" aria-hidden="true"></i>
                    <?php foreach ($categories as $key => $value) : ?>
                        <?php $comma = $key + 1 < $num_of_items ? ',' : ''; ?>
                            <a class="item-category" href="<?php echo esc_url(get_category_link($value->term_id)) ?>">
                                <?php echo $value->name ?><?php echo $comma; echo " ";?>
                            </a>
                    <?php endforeach; ?>    
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="item-post-content post-caption">
        <div class="item-post-meta"> 
            <span class="item-post-author"><i class="fa fa-user-o" aria-hidden="true"></i> by: <?php echo get_the_author_meta('display_name', get_the_author_ID()); echo " " ?></span>
            <span class="item-post-date"> <?php echo $post_date ?> </span>
        </div>
            
    </div>    

<?php }

function be_template_post_goza_charity(){ 
    $comment      = get_comments_number();
    $post_date    = get_the_date('d M, Y');
    $categories   = get_the_category();
?>

    <div class="item-post-thumbnail"> 
        <?php if(has_post_thumbnail()): ?>
            <?php the_post_thumbnail('full'); ?>
        <?php endif; ?>
    </div>

    <div class="item-post-content post-caption">
        <div class="item-post-meta"> 
            <?php if(!empty($categories)): ?>
                <?php $num_of_items = count($categories); ?>
                <div class="item-post-category post-term-list"> 
                    <?php foreach ($categories as $key => $value) : ?>
                        <?php $comma = $key + 1 < $num_of_items ? ',' : ''; ?>
                            <a class="item-category" href="<?php echo esc_url(get_category_link($value->term_id)) ?>">
                                <?php echo $value->name ?><?php echo $comma; echo " ";?>
                            </a>
                    <?php endforeach; ?>    
                </div>
            <?php endif; ?>

            <span class="item-post-date"> <?php echo $post_date ?> </span>
        </div>

        <h2 class="item-post-title"> 
            <a href="<?php the_permalink() ?>"> <?php the_title() ?> </a>
        </h2>

        <div class="item-post-excerpt post-excerpt"> <?php the_excerpt() ?> </div>

        <div class="item-post-button">  
            <a href="<?php the_permalink() ?>" class="post-more-link"> Learn More </a>
        </div>
    </div>    

<?php }

function be_template_post_goza_outline(){ 
    $categories   = get_the_category();
?>

    <div class="item-post-thumbnail"> 
        <?php if(has_post_thumbnail()): ?>
            <?php the_post_thumbnail('full'); ?>
        <?php endif; ?>

        <a href="<?php the_permalink() ?>" class="item-post-button"> <i class="fa fa-angle-right" aria-hidden="true"></i> </a>
    </div>

    <div class="item-post-content post-caption"> 
        <?php if(!empty($categories)): ?>
            <?php $num_of_items = count($categories); ?>
            <div class="item-post-category post-term-list"> 
                <?php foreach ($categories as $key => $value) : ?>
                    <?php $comma = $key + 1 < $num_of_items ? ',' : ''; ?>
                        <a class="item-category" href="<?php echo esc_url(get_category_link($value->term_id)) ?>">
                            <?php echo $value->name ?><?php echo $comma; echo " ";?>
                        </a>
                <?php endforeach; ?>    
            </div>
        <?php endif; ?>

        <h2 class="item-post-title"> 
            <a href="<?php the_permalink() ?>"> <?php the_title() ?> </a>
        </h2>
    </div>    

<?php }

function be_template_post_goza_fill(){ 
    $comment      = get_comments_number();
    $post_date    = get_the_date('d M, Y');
?>

    <div class="item-post-thumbnail"> 
        <?php if(has_post_thumbnail()): ?>
            <?php the_post_thumbnail('full'); ?>
        <?php endif; ?>
    </div>

    <div class="item-post-content post-caption"> 
        <div class="item-post-meta"> 
            <span class="item-post-author"> <?php echo get_the_author_meta('display_name', get_the_author_ID()); echo " " ?></span>
            <span class="item-post-comment edu-cmt">  - <?php echo $comment ?> Comments</span>
        </div>

        <h2 class="item-post-title"> 
            <a href="<?php the_permalink() ?>"> <?php the_title() ?> </a>
        </h2>

        <div class="item-post-excerpt post-excerpt"> <?php the_excerpt() ?> </div>

        <span class="item-post-date edu-date"> 
            <?php echo $post_date ?>
        </span>
    </div>
<?php }

function be_template_post_goza_dream(){ 
    $post_date    = get_the_date('d M, Y');
    $comment      = get_comments_number();
    $categories   = get_the_category();
    $day          = get_the_date('d');
    $post_date    = get_the_date('M Y');
?>

    <div class="item-post-thumbnail"> 
        <?php if(has_post_thumbnail()): ?>
            <?php the_post_thumbnail('full'); ?>
        <?php endif; ?>
    </div>

    <div class="item-post-content post-caption"> 
        <span class="item-post-date edu-date"> 
                <span> <?php echo $day ?> </span> <br/> <?php echo $post_date ?>
        </span>

        <?php if(!empty($categories)): ?>
            <?php $num_of_items = count($categories); ?>
            <div class="item-post-category post-term-list"> 
                <?php foreach ($categories as $key => $value) : ?>
                    <?php $comma = $key + 1 < $num_of_items ? ',' : ''; ?>
                        <a class="item-category" href="<?php echo esc_url(get_category_link($value->term_id)) ?>">
                            <?php echo $value->name ?><?php echo $comma; echo " ";?>
                        </a>
                <?php endforeach; ?>    
            </div>
        <?php endif; ?>    

        <a class="post-title-link" href="<?php the_permalink() ?>"> 
            <h2 class="item-post-title post-title"> <?php the_title() ?> </h2>
        </a>

        <div class="item-post-excerpt post-excerpt"> <?php the_excerpt() ?> </div>

        <div class="item-post-button">  
            <a href="<?php the_permalink() ?>" class="post-more-link">
                 Learn More
                <i class="fa fa-arrow-right" aria-hidden="true"></i>
            </a>
        </div>
    </div>

<?php }

function be_template_post_default(){ 
    $is_style     = isset($block['className']) ? $block['className'] : "is-style-default";
    $post_date    = get_the_date('d M, Y');
    $comment      = get_comments_number();
    ?>

    <div class="item-post-thumbnail"> 
        <?php if(has_post_thumbnail()): ?>
            <?php the_post_thumbnail('full'); ?>
        <?php endif; ?>
    </div>

    <div class="item-post-content post-caption"> 
        <a class="post-title-link" href="<?php the_permalink() ?>"> 
            <h2 class="item-post-title post-title"> <?php the_title() ?> </h2>
        </a>

        <div class="item-post-excerpt post-excerpt"> <?php the_excerpt() ?> </div>

        <div class="item-post-meta"> 
            <span class="item-post-date edu-date"> 
                <i class="fa fa-calendar" aria-hidden="true"></i>
                <?php echo $post_date ?>
            </span>

            <span class="item-post-comment edu-cmt"> <?php echo $comment ?> </span>
        </div>
    </div>

<?php }
