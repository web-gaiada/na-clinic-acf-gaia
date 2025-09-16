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
$id = 'promotion-list-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-promotion-list';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
// md:gap-16 md:gap-5 md:gap-6 md:items-center md:items-end md:items-start

$items = get_field('promotions_list', 'option');

?>
<section class="<?= esc_attr($classes) ?>" id="<?= esc_attr($id) ?>">
    <div class="_container">
        <div class="tab-wrapper mb-16 flex flex-col lg:flex-row justify-around border-b border-b-[#AEAAA0] border-solid">
            <?php $count = 0 ?>
                <div class="tab relative">
                    <button class="uppercase py-6 font-medium text-body-big text-theme-navy<?= !$count ? ' active' : '' ?>" data-index="<?= $count++ ?>">ALL PROMOTIONS</button>
                </div>
            <?php foreach($items as $i =>$item) : ?>
                <div class="tab relative">
                    <button class="uppercase py-6 font-medium text-body-big text-theme-navy<?= !$count ? ' active' : '' ?>" data-index="<?= $count++ ?>"><?= $item['promotion_type'] ?></button>
                </div>
            <?php endforeach ?>
        </div>
        <div class="swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="inner">
                        <div class="grid grid-cols-12 gap-6">
                            <?php foreach($items as $i => $type) : ?>
                            <?php foreach($type['promotions'] as $promotion) : ?>
                                <div class="xl:col-span-4 md:col-span-6 col-span-12">
                                    <div class="image-wrapper pt-[83%] rounded-3xl overflow-hidden relative">
                                        <div class="overlay bg-theme-black absolute inset-0 w-full h-full z-[1]" style="--tw-bg-opacity: .34;"></div>
                                        <img src="<?= $promotion['image']['url'] ?>" class="absolute inset-0 w-full h-full object-cover" alt="">
        
                                        <div class="text-wrapper absolute z-[2] bottom-4 left-6 text-theme-ivory">
                                            <div class="title mb-4">
                                                <p class="text-h3 font-serif leading-none"><?= $promotion['title'] ?></p>
                                            </div>
                                            <?php foreach($promotion['packages'] as $package) : ?>
                                                <div class="packages mb-2">
                                                    <?php if($package['package_title']) : ?>
                                                        <p class="text-body"><?= $package['package_title'] ?></p>
                                                    <?php endif ?>
                                                    <?php if($package['package_old_price'] || $package['package_new_price']) :  ?>
                                                        <div class="flex gap-x-2">
                                                            <?php if($package['package_old_price']) : ?>
                                                            <div class="old-price">
                                                                <s class="text-small"><?= $package['package_old_price'] ?></s>
                                                            </div>
                                                            <?php endif ?>
                                                            <?php if($package['package_new_price']) : ?>
                                                            <div class="new-price">
                                                                <p clsas="text-base"><?= $package['package_new_price'] ?></p>
                                                            </div>
                                                            <?php endif ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php foreach($items as $i => $type) : ?>
                <div class="swiper-slide">
                    <div class="inner">
                        <div class="grid grid-cols-12 gap-6">
                            <?php foreach($type['promotions'] as $i => $promotion) : ?>
                            <div class="xl:col-span-4 md:col-span-6 col-span-12">
                                <div class="image-wrapper pt-[83%] rounded-3xl overflow-hidden relative">
                                    <div class="overlay bg-theme-black absolute inset-0 w-full h-full z-[1]" style="--tw-bg-opacity: .34;"></div>
                                    <img src="<?= $promotion['image']['url'] ?>" class="absolute inset-0 w-full h-full object-cover" alt="">
    
                                    <div class="text-wrapper absolute z-[2] bottom-4 left-6 text-theme-ivory">
                                        <div class="title mb-3">
                                            <p class="text-h3 font-serif leading-none"><?= $promotion['title'] ?></p>
                                        </div>
                                        <?php foreach($promotion['packages'] as $package) : ?>
                                            <div class="packages mb-2">
                                                <?php if($package['package_title']) : ?>
                                                    <p class="text-body"><?= $package['package_title'] ?></p>
                                                <?php endif ?>
                                                <?php if($package['package_old_price'] || $package['package_new_price']) :  ?>
                                                    <div class="flex gap-x-2">
                                                        <?php if($package['package_old_price']) : ?>
                                                        <div class="old-price">
                                                            <s class="text-small"><?= $package['package_old_price'] ?></s>
                                                        </div>
                                                        <?php endif ?>
                                                        <?php if($package['package_new_price']) : ?>
                                                        <div class="new-price">
                                                            <p clsas="text-base"><?= $package['package_new_price'] ?></p>
                                                        </div>
                                                        <?php endif ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>

</section>