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
$image = get_field('image');
$cols = get_field('cols');
$cols_mobile = get_field('cols_mobile') ?? '12';
$breakpoint = get_field('large_breakpoint');
?>
<div class="<?= esc_attr($classes . ' h-full col-span-'.$cols_mobile.' '.$breakpoint.':col-span-'.$cols.'') ?>" id="<?= esc_attr($id) ?>">
    

</div>