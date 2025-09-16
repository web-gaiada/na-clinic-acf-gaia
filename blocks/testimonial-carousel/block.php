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
$id = 'testimonial-carousel-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-testimonial-carousel';
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
    <div class="inner pb-8">
        <div class="swiper-pagination"></div>
        <div class="swiper">
            <div class="swiper-wrapper items-center">
                <?php foreach($items as $i => $item) : ?>
                    <div class="swiper-slide">
                        <div class="wrapper bg-theme-navy rounded-3xl">
                            <div class="inner">
                                <div class="title-wrapper flex gap-x-6 items-center mb-6">
                                    <div class="image-wrapper w-[64px] h-[64px] relative rounded-full overflow-hidden">
                                        <img src="<?= $item['image']['url'] ?>" class="absolute inset-0 w-full h-full object-cover" alt="">
                                    </div>
                                    <div class="text-wrapper">
                                        <div class="name-wrapper mb-3">
                                            <p class="text-body-big text-theme-gold tracking-[.5px]"><?= $item['name'] ?></p>
                                        </div>
                                        <div class="location-wrapper">
                                            <p class="text-base text-theme-ivory"><?= $item['location'] ?></p>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="quote-wrapper">
                                    <p class="text-body text-theme-ivory"><?= $item['quote'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

</section>