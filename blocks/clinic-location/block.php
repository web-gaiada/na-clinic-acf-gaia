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
$id = 'clinic-location-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-clinic-location';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
// md:gap-16 md:gap-5 md:gap-6 md:items-center md:items-end md:items-start

$image = get_field('image');
$title = get_field('title');
$location = get_field('location');
$extra = get_field('extra');
$link = get_field('link');

?>
<div class="<?= esc_attr($classes) ?>" id="<?= esc_attr($id) ?>">

    <div class="image-wrapper sm:pt-[75%] pt-[140%] relative rounded-[26px] overflow-hidden <?= $link ? 'is--anim' : '' ?>">
        <?php if($link) : ?>
        <a href="<?= $link ?>">
        <?php endif ?>
        <div class="overlay z-[1] bg-black absolute inset-0" style="--tw-bg-opacity: .3;"></div>
            <img src="<?= $image['url'] ?>" class="absolute inset-0 w-full h-full object-cover" alt="">
            <div class="text-wrapper absolute bottom-6 left-6 z-[2]">
                <div class="title-wrapper mb-4">
                    <p class="text-h4 font-medium font-serif text-white tracking-[1.5px] "><?= $title ?></p>
                </div>
                <div class="location-wrapper">
                    <p class="text-base font-medium text-white"><?= $location ?></p>
                </div>
                <?php if($extra) : ?>
                <div class="extra-wrapper mt-2">
                    <p class="text-body text-white"><?= $extra ?></p>
                </div>
                <?php endif ?>
            </div>
        <?php if($link) : ?>
        </a>
        <?php endif ?>
    </div>

</div>