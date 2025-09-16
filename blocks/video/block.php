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
$id = 'video-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-video';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
// md:gap-16 md:gap-5 md:gap-6 md:items-center md:items-end md:items-start

$video = get_field('video');
$ratio = get_field('ratio') ?? '45%';
$mobileRatio = get_field('mobile_ratio') ? get_field('mobile_ratio') : $ratio;
$roundedBig = get_field('rounded_big');
?>
<div class="<?= esc_attr($classes) ?>" id="<?= esc_attr($id) ?>" data-desktop-ratio="<?= $ratio ?>" data-mobile-ratio="<?= $mobileRatio ?>">
    <div class="video-wrapper cursor-pointer relative overflow-hidden <?= $roundedBig ? 'md:rounded-[100px]' : '' ?> rounded-2xl" style="padding-top: var(--ratio);">
        <video src="<?= $video['url'] ?>" class="absolute inset-0 w-full h-full object-cover"></video>

        <div class="button play-button w-[80px] h-[80px] bg-white rounded-full flex justify-center items-center absolute left-1/2 top-1/2 -translate-y-1/2 -translate-x-1/2">
            <svg width="28" height="34" viewBox="0 0 28 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M27.5 16.9998C27.501 17.4242 27.3922 17.8417 27.1841 18.2116C26.976 18.5815 26.6758 18.8913 26.3125 19.1107L3.8 32.8826C3.42045 33.115 2.98573 33.2419 2.54075 33.2502C2.09576 33.2584 1.65665 33.1477 1.26875 32.9295C0.884547 32.7147 0.564494 32.4014 0.341506 32.0219C0.118518 31.6424 0.000641965 31.2103 0 30.7701V3.22949C0.000641965 2.78931 0.118518 2.35725 0.341506 1.97773C0.564494 1.59821 0.884547 1.28493 1.26875 1.07012C1.65665 0.85191 2.09576 0.741212 2.54075 0.749452C2.98573 0.757693 3.42045 0.884574 3.8 1.11699L26.3125 14.8889C26.6758 15.1084 26.976 15.4181 27.1841 15.788C27.3922 16.1579 27.501 16.5754 27.5 16.9998Z" fill="url(#paint0_linear_228_3714)"/>
                <defs>
                    <linearGradient id="paint0_linear_228_3714" x1="-7.5" y1="5.5" x2="23" y2="28" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#D4B888"/>
                        <stop offset="0.5" stop-color="#F9EBCB"/>
                        <stop offset="1" stop-color="#D4B888"/>
                    </linearGradient>
                </defs>
            </svg>
        </div>
    </div>
</div>