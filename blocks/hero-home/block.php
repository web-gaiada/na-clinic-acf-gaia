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
$id = 'hero-home-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-hero-home';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
// md:gap-16 md:gap-5 md:gap-6 md:items-center md:items-end md:items-start

$image = get_field('image');
$title = get_field('title');
$subtitle = get_field('subtitle');
$sliderItems = get_field('items');
?>
<section class="<?= esc_attr($classes) ?>" id="<?= esc_attr($id) ?>" style="overflow: hidden;">

    <div class="h-screen min-h-[600px] image-wrapper relative">
        <div class="overlay absolute inset-0 w-full h-full bg-[rgba(0,0,0,.3)] z-[1]"></div>
        <img src="<?= $image['url'] ?>" class="absolute inset-0 object-cover w-full h-full" alt="">
        <div class="absolute _container left-1/2 top-1/2 -translate-y-1/2 -translate-x-1/2 w-full z-[2]">
            <div class="text-wrapper text-center lg:text-left lg:w-1/2">
                <div class="title-wrapper mb-6">
                    <h1 class="text-h1 font-serif font-normal text-white tracking-[2.5px]"><?= $title ?></h1>
                </div>
                <div class="title-wrapper">
                    <p class="text-body-big text-white font-medium"><?= $subtitle ?></p>
                </div>
            </div>
        </div>

        <div class="absolute hero-home-slider _container left-1/2 bottom-0 translate-y-1/2 -translate-x-1/2 w-full z-[2]">
            <div class="swiper lg:overflow-x-hidden overflow-x-visible">
                <div class="swiper-wrapper">
                    <?php foreach($sliderItems as $i => $item) : ?>
                        <div class="swiper-slide">
                            <div class="inner">
                                <div class="image-wrapper cursor-pointer pt-[135%] relative rounded-full overflow-hidden border-[3px] border-solid border-theme-gold">
                                    <?php if($item['url']) : ?> <a href="<?= $item['url'] ?>"> <?php endif; ?>
                                    <div class="overlay absolute inset-0 w-full h-full bg-black z-[1]" style="--tw-bg-opacity: .3;"></div>
                                    <img src="<?= $item['image']['url'] ?>" class="absolute inset-0 top-0 w-full h-full object-cover" alt="">
                                    <div class="text-wrapper absolute text-center left-1/2 translate-y-1/2 bottom-16 -translate-x-1/2 z-[2]">
                                        <p class="text-subtitle text-white"><?= $item['text'] ?></p>
                                    </div>
                                    <?php if($item['url']) : ?> </a> <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>

    </div>

    <div class="spacer"></div>

</section>