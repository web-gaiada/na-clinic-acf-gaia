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
$id = 'column-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block column';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
// $isContainer = get_field('is_container');
$colspan = get_field('column') ? get_field('column') : '12';
$bgColor = get_field('color');
$isLarge = get_field('breakpoint');
$breakpoint = $isLarge ? 'lg' : 'md';
// md:col-span-4 md:col-span-6 md:col-span-8 md:col-span-12
// lg:col-span-4 lg:col-span-6 lg:col-span-8 lg:col-span-12
?>
<div class="<?= esc_attr($classes . ' col-span-12 '.$breakpoint.':col-span-' . $colspan) ?>" style="<?= $bgColor ? 'background-color: '.$bgColor.';' : '' ?>">
    <InnerBlocks template="<?= esc_attr(wp_json_encode($template)) ?>" />
</div>