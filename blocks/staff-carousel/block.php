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
$id = 'staff-carousel-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-staff-carousel';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
// md:gap-16 md:gap-5 md:gap-6 md:items-center md:items-end md:items-start
// rounded-3xl rounded-2xl rounded-xl rounded-full border-theme-champagne

$items = get_field('items');
?>
<div class="<?= esc_attr($classes) ?>" id="<?= esc_attr($id) ?>" data-desktop-ratio="<?= $ratio ?>" data-mobile-ratio="<?= $mobileRatio ?>">
    
    <div class="inner pb-8">
        <div class="swiper-pagination" style="--swiper-pagination-bottom: 0;"></div>
        <div class="swiper">
            <div class="swiper-wrapper">
                <?php foreach( $items as $item ) : ?>
                    <div class="swiper-slide">
                        <div class="inner">
                            <div class="box p-4 bg-white">
                                <div class="image-wrapper pt-[110%] relative mb-4">
                                    <img src="<?= $item['image']['url'] ?>" class="absolute inset-0 w-full h-full object-cover" alt="">
                                </div>
                                <div class="text-wrapper">
                                    <div class="name mb-2">
                                        <p class="text-subtitle font-serif font-medium"><?= $item['name'] ?></p>
                                    </div>
                                    <div class="title">
                                        <p class="text-theme-dark-gray text-base font-medium"><?= $item['title'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>

</div>