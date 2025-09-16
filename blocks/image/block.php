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
$id = 'image-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-image';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
// md:gap-16 md:gap-5 md:gap-6 md:items-center md:items-end md:items-start
// rounded-3xl rounded-2xl rounded-xl rounded-full border-theme-champagne

$image = get_field('image');
$ratio = get_field('ratio') ?? '78%';
$mobileRatio = get_field('mobile_ratio') ? get_field('mobile_ratio') : $ratio;
$isRounded = get_field('rounded');
$isBorder = get_field('border');
?>
<div class="<?= esc_attr($classes) ?>" id="<?= esc_attr($id) ?>" data-desktop-ratio="<?= $ratio ?>" data-mobile-ratio="<?= $mobileRatio ?>" <?= $is_preview ? 'style="--ratio: '.$ratio.'"' : '' ?>>
    
    <div class="image-wrapper relative <?= $isBorder ? 'border-theme-champagne border border-solid' : '' ?> <?= $isRounded ? 'rounded-3xl overflow-hidden' : '' ?>" style="padding-top: var(--ratio);">
        <img src="<?= $image['url'] ?>" class="absolute inset-0 w-full h-full object-cover" alt="">
    </div>    

</div>