<?php
/**
 * Block template file: block.php
 *
 * Hero Internal Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 * 
 * 
 */
// Create id attribute allowing for custom "anchor" value.
$id = 'journal-list-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-journal-list';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
// md:gap-16 md:gap-5 md:gap-6 md:items-center md:items-end md:items-start

$count = intval(get_field('count')) ?? 4;
$isSlider = get_field('is_slider');
$link = get_field('link');

$loop = new WP_Query(array(
    'post_type' => 'post',
    'posts_per_page' => $count,
    'cat' => 13,
    'meta_query'   => [
        'relation' => 'OR',
        [
            'key'     => '_et_pb_use_builder',
            'compare' => 'NOT EXISTS',
        ],
        [
            'key'     => '_et_pb_use_builder',
            'value'   => 'on',
            'compare' => '!=',
        ],
    ],
));
if($loop->have_posts()) :
?>
<section class="<?= esc_attr($classes) ?>" id="<?= esc_attr($id) ?>">
    <?php if($isSlider) : ?><div class="inner pb-8 relative"><?php endif ?>
    <?php if($isSlider) : ?><div class="swiper-pagination" style="--swiper-pagination-bottom: 0;"></div><?php endif ?>
    <div class="<?= $isSlider ? 'swiper' : 'wrapper' ?>">
        <div class="<?= $isSlider ? 'swiper-wrapper' : 'grid grid-cols-12 gap-x-10 gap-y-6' ?>">
            <?php while($loop->have_posts()) : $loop->the_post(); ?>
            <div class="<?= $isSlider ? 'swiper-slide' : 'xl:col-span-3 lg:col-span-4 md:col-span-6 col-span-12' ?>">
                <div class="box <?= $isSlider ? '' : 'py-6' ?>">
                    <div class="inner p-4 pb-6 bg-white journal-box-shadow rounded-3xl">
                        <div class="image-wrapper mb-6 rounded-3xl overflow-hidden relative pt-[73%] w-full">
                            <img src="<?= get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>" class="absolute inset-0 w-full h-full object-cover" alt="">
                        </div>
                        <div class="text-wrapper equalize-height">
                            <div class="title-wrapper text-center">
                                <h3 class="font-serif text-theme-black"><?= get_the_title(get_the_id()) ?></h3>
                            </div>
                            <div class="description-wrapper pb-6 text-center">
                                <p class="font-sans text-theme-dark-gray"><?= get_the_excerpt(get_the_id()) ?></p>
                            </div>
                        </div>
                        <div class="button-wrapper text-center">
                            <a href="<?= get_the_permalink(get_the_id()) ?>" class="px-10 py-3 bg-theme-navy inline-block text-theme-ivory text-center rounded-3xl">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
    <?php if($isSlider) : ?></div><?php endif ?>
    <?php if($link) : ?>
        <div class="button-wrapper text-center pt-10">
            <a href="<?= $link['url'] ?>" class="text-theme-ivory bg-theme-navy py-4 px-8 text-body tracking-[1.5px] inline-block"><?= $link['title'] ?></a>
        </div>
    <?php endif; ?>
</section>
<?php endif; ?>