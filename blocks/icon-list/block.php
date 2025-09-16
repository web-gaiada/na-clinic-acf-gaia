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
$id = 'icon-list-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-icon-list';
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

    <div class="wrapper">
        <div class="grid grid-cols-12 xl:gap-x-14 lg:gap-x-12 md:gap-x-8 md:gap-y-12 gap-y-8">
            <?php foreach($items as $i => $item) : ?>
                <div class="md:col-span-6 col-span-12">
                    <div class="inner text-center md:text-left">
                        <div class="icon mb-6 w-[34px] h-[34px] mx-auto md:mx-0 flex justify-center items-center">
                            <img src="<?= $item['icon'] ?>" class="w-full h-full object-cover" alt="">
                        </div>
                        <div class="title-wrapper mb-1.5">
                            <p class="text-body-big font-medium text-white"><?= $item['title'] ?></p>
                        </div>
                        <div class="description-wrapper">
                            <p class="text-base font-medium text-white"><?= $item['description'] ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>

</section>