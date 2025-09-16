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
$id = 'hero-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-hero';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
// md:gap-16 md:gap-5 md:gap-6 md:items-center md:items-end md:items-start

$image = get_field('image');
$text = get_field('text');
$subtitle = get_field('subtitle');
?>
<section class="<?= esc_attr($classes) ?>" id="<?= esc_attr($id) ?>">

    <div class="h-[60vh] min-h-[600px] relative">
        <img src="<?= $image['url'] ?>" class="absolute inset-0 w-full h-full object-cover" alt="">
        <div class="absolute left-1/2 top-1/2 -translate-y-1/2 -translate-x-1/2 _container text-center">
            <div class="text-wrapper">
                <?php if($subtitle) : ?>
                    <div class="subtitle-wrapper mb-4">
                        <p class="text-body-big text-theme-ivory"><?= $subtitle ?></p>
                    </div>
                <?php endif; ?>
                <?php if($text) : ?>
                    <div class="title-wrapper">
                        <h1 class="text-h1 text-theme-ivory font-serif"><?= $text ?></h1>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </div>

</section>