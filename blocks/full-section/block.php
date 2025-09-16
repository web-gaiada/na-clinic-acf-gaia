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
$id = 'full-section-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-full-section';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
// md:gap-16 md:gap-5 md:gap-6 md:items-center md:items-end md:items-start

$image = get_field('image');
?>
<section class="<?= esc_attr($classes) ?>" id="<?= esc_attr($id) ?>">

    <div class="grid grid-cols-12">
        <div class="lg:col-span-5 col-span-12">
            <div class="image-wrapper relative h-full min-h-[600px]">
                <img src="<?= $image['url'] ?>" class="absolute inset-0 w-full h-full object-cover" alt="">
            </div>
        </div>
        <div class="lg:col-span-7 col-span-12">
            <div class="inner xl:py-32 xl:px-36 lg:py-18 lg:px-20 md:py-12 md:px-14 _container py-8 bg-theme-soft-gold">
                <InnerBlocks templates=""/>
            </div>
        </div>
    </div>

</section>