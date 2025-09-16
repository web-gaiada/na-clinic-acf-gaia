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
$id = 'image-overlay-carousel-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-image-overlay-carousel';
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
    <div class="inner pb-8">
        <div class="swiper-pagination"></div>
        <div class="swiper">
            <div class="swiper-wrapper">
                <?php foreach($items as $i => $item) : ?>
                    <div class="swiper-slide">
                        <div class="image-wrapper pt-[56%] relative rounded-3xl overflow-hidden <?= $item['link'] ? 'is--anim' : '' ?>">
                            <?php if($item['link']) : ?> <a href="<?= $item['link'] ?>"> <?php endif; ?>
                            <div class="overlay bg-black absolute inset-0 w-full h-full z-[1]" style="--tw-bg-opacity: .3;"></div>
                            <img src="<?= $item['image']['url'] ?>" class="absolute inset-0 w-full h-full object-cover" alt="">
                            <?php if($item['link']) : ?></a> <?php endif ?>
                        </div>
                        <div class="text-wrapper absolute bottom-6 left-7 z-[2]">
                            <div class="title">
                                <?php if($item['link']) : ?> <a href="<?= $item['link'] ?>"> <?php endif; ?>
                                <h4 class="text-h4 font-serif text-white"><?= $item['title'] ?></h4>
                                <?php if($item['link']) : ?></a> <?php endif ?>
                            </div>
                            <div class="subtitle-wrapper">
                                <p class=""><?= $item['subtitle'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    
</section>