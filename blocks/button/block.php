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
$id = 'button-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-button';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
// text-center text-left text-right
// md:text-center md:text-left md:text-right

$url = get_field('url');
$align = get_field('align');
$mobileAlign = get_field('mobile_align') ?? $align;
$bgColor = get_field('bg_color') ?? '#2C3E58';
$textColor = get_field('text_color') ?? '#FFFBF3';

$hoverBgColor = get_field('hover_bg_color') ?? $bgColor;
$hoverTextColor = get_field('hover_text_color') ?? $textColor;
?>
<div class="<?= esc_attr($classes) ?>" data-bg-color="<?= $bgColor ?>" data-text-color="<?= $textColor ?>" id="<?= esc_attr($id) ?>">

    <div class="button-wrapper text-<?= $mobileAlign ?> md:text-<?= $align ?>">
        <a href="<?= $url['url'] ?>" class="px-10 py-3 bg-theme-navy inline-block text-theme-ivory button-el"><?= $url['title'] ?></a>
    </div>

</div>