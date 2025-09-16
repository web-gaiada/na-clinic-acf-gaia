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
$id = 'accordion-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-accordion';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
// md:gap-16 md:gap-5 md:gap-6 md:items-center md:items-end md:items-start
// rounded-3xl rounded-2xl rounded-xl rounded-full border-theme-champagne

$items = get_field('items');
?>
<div class="<?= esc_attr($classes) ?>" id="<?= esc_attr($id) ?>" data-desktop-ratio="<?= $ratio ?>" data-mobile-ratio="<?= $mobileRatio ?>">
    
    <div class="accordion-wrapper">
        <?php foreach($items as $i => $item) : ?>
            <div class="accordion-item cursor-pointer <?= !$i ? 'active' : '' ?> <?= count($items) != ($i + 1) ? 'border-b border-theme-ivory border-solid mb-6' : '' ?>">
                <div class="accordion-inner pb-8">
                    <div class="accordion-title flex justify-between items-center">
                        <p class="text-subtitle leading-none text-white font-serif font-medium"><?= $item['title'] ?></p>
                        <div class="icon">
                            <svg class="default" width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <?php if(!$i) : ?>
                                    <path d="M11 7V15M7 11H15M21 11C21 16.5228 16.5228 21 11 21C5.47715 21 1 16.5228 1 11C1 5.47715 5.47715 1 11 1C16.5228 1 21 5.47715 21 11Z" stroke="#FFFBF3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <?php else : ?>
                                    <path d="M7 11H15M21 11C21 16.5228 16.5228 21 11 21C5.47715 21 1 16.5228 1 11C1 5.47715 5.47715 1 11 1C16.5228 1 21 5.47715 21 11Z" stroke="#FFFBF3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <?php endif; ?>
                            </svg>


                            <svg width="22" class="open" height="22" style="display: none;" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11 7V15M7 11H15M21 11C21 16.5228 16.5228 21 11 21C5.47715 21 1 16.5228 1 11C1 5.47715 5.47715 1 11 1C16.5228 1 21 5.47715 21 11Z" stroke="#FFFBF3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <svg width="22" class="close" style="display: none;" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7 11H15M21 11C21 16.5228 16.5228 21 11 21C5.47715 21 1 16.5228 1 11C1 5.47715 5.47715 1 11 1C16.5228 1 21 5.47715 21 11Z" stroke="#FFFBF3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <!-- <svg width="22" class="open" height="22" style="display: <?= !$i ? 'none' : 'block' ?>;" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11 7V15M7 11H15M21 11C21 16.5228 16.5228 21 11 21C5.47715 21 1 16.5228 1 11C1 5.47715 5.47715 1 11 1C16.5228 1 21 5.47715 21 11Z" stroke="#FFFBF3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <svg width="22" class="close" style="display: <?= !$i ? 'block' : 'none' ?>;" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7 11H15M21 11C21 16.5228 16.5228 21 11 21C5.47715 21 1 16.5228 1 11C1 5.47715 5.47715 1 11 1C16.5228 1 21 5.47715 21 11Z" stroke="#FFFBF3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg> -->
                        </div>
                    </div>
    
                    <div class="accordion-content overflow-hidden" style="height: <?= !$i ? 'auto' : '0' ?>;">
                        <p class="text-body leading-tight text-white pt-6 pb-2"><?= $item['description'] ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>

</div>