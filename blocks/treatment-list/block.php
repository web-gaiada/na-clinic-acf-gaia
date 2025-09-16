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
$id = 'treatment-list-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-treatment-list';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
// md:gap-16 md:gap-5 md:gap-6 md:items-center md:items-end md:items-start
$pageId = get_field('page_id') ?? 250891;

$firstChilds = get_children(array(
    'post_parent' => $pageId,
    'post_type' => 'page',
    'post_status' => 'publish',
    'order' => 'ASC'
));
?>
<div class="<?= esc_attr($classes) ?>" id="<?= esc_attr($id) ?>">
    <div class="_container">
        <div class="tab-wrapper mb-16 flex flex-col lg:flex-row justify-around border-b border-b-[#AEAAA0] border-solid">
            <?php $count = 0 ?>
            <?php foreach($firstChilds as $i =>$firstChild) : ?>
                <div class="tab relative">
                    <button class="uppercase py-6 font-medium text-body-big text-theme-navy<?= !$count ? ' active' : '' ?>" data-index="<?= $count++ ?>" id="<?= $firstChild->post_name ?>"><?= $firstChild->post_title ?></button>
                </div>
            <?php endforeach ?>
        </div>
        <div class="swiper">
            <div class="swiper-wrapper">
                <?php foreach($firstChilds as $i => $firstChild) : ?>
                    <div class="swiper-slide">
                        <?php $excerpt = $firstChild->post_excerpt ? $firstChild->post_excerpt : 'To be the trusted best friend in beauty treatments, empowering people to enhance their natural features with care and grace, so they can live confidently and happily every day.' ?>
                        <div class="tab-content">
                            <div class="grid grid-cols-12 items-center lg:mb-16 mb-8 gap-6">
                                <div class="lg:col-span-4 col-span-12">
                                    <div class="title">
                                        <h2 class="font-serif font-medium text-h2 pb-0 text-theme-gold use-text-shadow"><?= $firstChild->post_title ?></h2>
                                    </div>
                                </div>
                                <div class="lg:col-span-8 col-span-12">
                                    <p class="text-body text-theme-dark-grey" style="line-height: 1.4;"><?= $excerpt ?></p>
                                </div>
                            </div>
                            <div class="grid grid-cols-12 mb-12 gap-6">
                            <?php 
                                $secondChilds = get_children([
                                    'post_parent'  => $firstChild->ID, 
                                    'post_type'    => 'page', 
                                    'post_status'  => 'publish', 
                                    'order'        => 'ASC',
                                    'meta_query'   => [
                                        'relation' => 'OR',
                                        [
                                            'key'     => '_et_pb_use_builder',
                                            'compare' => 'NOT EXISTS',
                                        ],
                                        [
                                            'key'     => '_et_pb_use_builder',
                                            'value'   => 'on',
                                            'compare' => '!=',
                                        ],
                                    ],
                                ]); 
                            ?>
                                <?php foreach($secondChilds as $i => $secondChild) : ?>
                                <div class="xl:col-span-4 md:col-span-6 col-span-12">
                                    <div class="image-wrapper pt-[83%] rounded-3xl overflow-hidden relative">
                                        <div class="overlay bg-theme-black absolute inset-0 w-full h-full z-[1]" style="--tw-bg-opacity: .34;"></div>
                                        <img src="<?= get_the_post_thumbnail_url($i) ?>" class="absolute inset-0 w-full h-full object-cover" alt="">
                                        <div class="text-wrapper-top absolute top-6 left-6 z-[2]">
                                            <div class="extra mb-2">
                                                <p class="text-base font-medium text-theme-ivory">NA Clinic Treatment</p>
                                            </div>
                                            <div class="title">
                                                <p class="tracking-[1.5px] text-theme-ivory text-body font-serif font-medium"><?= $secondChild->post_title ?></p>
                                            </div>
                                        </div>
                                        <div class="absolute bottom-6 left-6 z-[2]">
                                            <a href="<?= get_the_permalink($i) ?>" class="py-2 px-4 border border-theme-ivory border-solid text-theme-ivory cta-button bg-transparent">View Detail</a>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>

</div>