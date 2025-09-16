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
$id = 'text-carousel-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-text-carousel';
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
    
    <div class="inner pb-8">
        <div class="swiper-pagination" style="--swiper-pagination-bottom: 0;"></div>
        <div class="swiper">
            <div class="swiper-wrapper">
                <?php foreach($items as $item) :  ?>
                    <div class="swiper-slide">
                        <div class="inner">
                            <?= $item['text'] ?>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>

</div>