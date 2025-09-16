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
$id = 'doctor-list-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-doctor-list';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
// md:gap-16 md:gap-5 md:gap-6 md:items-center md:items-end md:items-start

$items = get_field('items');

?>
<div class="<?= esc_attr($classes) ?>" id="<?= esc_attr($id) ?>">

    <div class="grid grid-cols-12 xl:gap-x-16 gap-y-12">
        <?php foreach($items as $i => $item) : ?>
            <div class="xl:col-span-4 col-span-12">
                <div class="grid grid-cols-12 gap-6 items-center">
                    <div class="xl:col-span-12 col-span-12 md:col-span-5">
                        <div class="image-wrapper xl:pt-[120%] relative rounded-[200px] overflow-hidden md:max-w-[600px] max-w-[370px] mx-auto pt-[370px] md:pt-[120%]" style="border: 5px solid #F9EBCB;">
                            <img src="<?= $item['image']['url'] ?>" class="absolute inset-0 w-full h-full object-cover" alt="">
                        </div>
                    </div>
                    <div class=" xl:col-span-12 col-span-12 md:col-span-7">
                        <div class="name-wrapper mb-2">
                            <p class="text-body-big font-serif font-medium tracking-[1.5px] leading-none"><?= $item['name'] ?></p>
                        </div>
                        <div class="title-wrapper mb-4">
                            <p class="font-serif font-medium text-body tracking-[1.5px] leading-none"><?= $item['title'] ?></p>
                        </div>
                        <div class="description-wrapper">
                            <?= $item['description'] ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>