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
$id = 'logo-carousel-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-logo-carousel';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
// md:gap-16 md:gap-5 md:gap-6 md:items-center md:items-end md:items-start

$items = get_field('items');

?>
<section class="<?= esc_attr($classes) ?>" id="<?= esc_attr($id) ?>">

    <div class="inner pb-10">
        <div class="swiper-pagination"></div>
        <div class="swiper">
            <div class="swiper-wrapper">
                <?php foreach($items as $i => $item) : ?>
                    <div class="swiper-slide">
                        <div class="inner w-full h-full flex justify-center items-center">
                            <img src="<?= $item['url'] ?>" class="w-full h-auto" alt="">
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

</section>