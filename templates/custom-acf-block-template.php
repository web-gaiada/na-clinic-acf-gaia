<?php
/* Template Name: Custom Gaia Template */
 ?>

<?php

function get_the_user_ip() {
    if ( ! empty( $_SERVER['HTTP_CLIENT_IP'] ) ) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif ( ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return apply_filters( 'wpb_get_ip', $ip );
}

?>
    <?php if(have_posts()) : ?>
        <?php while(have_posts()) : the_post(); ?>
        <?php $menus = wp_get_menu_array('Menu 2025'); ?>
            <header class="fixed w-full z-[100]">
                <div class="wrapper bg-theme-blacker py-6">
                    <div class="_container">
                        <div class="flex items-center justify-between">
                            <div class="logo">
                                <a href="/">
                                    <img src="/wp-content/uploads/2024/10/logo.png" class="w-[146px] h-[71px]" alt="">
                                </a>
                            </div>
                            <div class="menu-wrapper items-center hidden lg:flex lg:gap-x-6 md:gap-x-4">
                                <?php foreach($menus as $i => $menu) : ?>
                                    <div class="menu -mb-2">
                                        <a class="text-theme-champagne text-base<?= $menu['is_active'] ? ' active' : '' ?>" href="<?= $menu['url'] ?>"><?= $menu['title'] ?></a>
                                    </div>
                                <?php endforeach ?>
                                <div class="menu book-button">
                                    <div class="trigger-book-button cursor-pointer py-4 px-6 text-theme-blacker font-serif font-medium text-base tracking-[1.5px] open-popup-form" style="border-radius: 8px; background: linear-gradient(90deg, #D4B888, #F9EBCB, #D4B888)">
                                        Book Consultation
                                    </div>
                                </div>
                            </div>
                            <div class="menu-wrapper lg:hidden block">
                                <div class="hamburger cursor-pointer">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <div id="smooth-wrapper">
                <div id="smooth-content">
                    <div class="page-container font-sans bg-theme-ivory">

                        <?php the_content() ?>

                        <footer>
                            <div class="inner bg-theme-blacker py-14">
                                <div class="_container">

                                    <div class="flex gap-y-8 flex-col lg:flex-row lg:justify-between justify-center pb-8">

                                        <div class="item">
                                            <div class="logo mb-8">
                                                <a href="/">
                                                    <img src="/wp-content/uploads/2024/10/logo.png" class="w-[146px] h-[71px]" alt="">
                                                </a>
                                            </div>
                                            <div class="address-wrapper menu mb-8 text-white">
                                                <a href="https://share.google/gwg1n9TgxEKeMHYsn" target="_blank" class="text-base text-white">Jl. Raya Puputan No.122, Sumerta Kelod,<br />Kec. Denpasar Timur, Kota Denpasar, Bali 80234</a>
                                            </div>
                                            <div class="address-wrapper menu text-white">
                                                <a href="https://share.google/AbVWigPdFYl038uHf" target="_blank" class="text-base text-white">Jl. Danau Toba No.15, Sanur, Denpasar Selatan,<br />Kota Denpasar, Bali 80228</a>
                                            </div>
                                        </div>

                                        <div class="item">
                                            <div class="flex gap-x-16 flex-wrap md:flex-nowrap">
                                                <div class="contacts-wrapper">
                                                    <div class="title mb-6">
                                                        <p class="text-body font-medium tracking-[.5px] text-white">Social Media</p>
                                                    </div>
                                                    <div class="menu-wrapper flex gap-x-6">
                                                        <div class="menu tiktok mb-4">
                                                            <a href="https://www.tiktok.com/@naclinicbali" target="_blank" class="w-[24px] h-[24px] justify-center items-center flex no-anim" style="--fill: #FFFBF3; scale: 1.4;">
                                                                <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M19 5.9375C17.7573 5.93601 16.5658 5.44167 15.6871 4.56292C14.8083 3.68416 14.314 2.49275 14.3125 1.25C14.3125 1.10082 14.2532 0.957742 14.1477 0.852252C14.0423 0.746763 13.8992 0.6875 13.75 0.6875H10C9.85082 0.6875 9.70774 0.746763 9.60225 0.852252C9.49676 0.957742 9.4375 1.10082 9.4375 1.25V13.625C9.43727 13.994 9.33803 14.3563 9.15013 14.6739C8.96223 14.9915 8.69255 15.2529 8.36921 15.4308C8.04588 15.6087 7.68074 15.6966 7.31187 15.6853C6.943 15.674 6.58392 15.5639 6.27208 15.3666C5.96023 15.1692 5.70705 14.8918 5.53894 14.5633C5.37082 14.2348 5.29393 13.8672 5.31629 13.4988C5.33864 13.1304 5.45943 12.7748 5.66604 12.469C5.87265 12.1632 6.15752 11.9185 6.49094 11.7603C6.58712 11.7147 6.6684 11.6428 6.72532 11.5528C6.78224 11.4629 6.81247 11.3586 6.8125 11.2522V7.25C6.81242 7.16825 6.79451 7.08749 6.76004 7.01336C6.72556 6.93923 6.67534 6.87351 6.61287 6.82077C6.55041 6.76803 6.47719 6.72954 6.39833 6.70798C6.31947 6.68642 6.23686 6.68231 6.15625 6.69594C2.89375 7.27625 0.4375 10.2547 0.4375 13.625C0.4375 15.4649 1.16841 17.2295 2.46945 18.5306C3.77048 19.8316 5.53506 20.5625 7.375 20.5625C9.21494 20.5625 10.9795 19.8316 12.2806 18.5306C13.5816 17.2295 14.3125 15.4649 14.3125 13.625V9.58719C15.7428 10.3941 17.3578 10.8163 19 10.8125C19.1492 10.8125 19.2923 10.7532 19.3977 10.6477C19.5032 10.5423 19.5625 10.3992 19.5625 10.25V6.5C19.5625 6.35082 19.5032 6.20774 19.3977 6.10225C19.2923 5.99676 19.1492 5.9375 19 5.9375ZM18.4375 9.66875C16.866 9.56839 15.3548 9.02598 14.0781 8.10406C13.994 8.04362 13.8948 8.0076 13.7914 7.99997C13.6881 7.99234 13.5847 8.01339 13.4926 8.06081C13.4004 8.10823 13.3232 8.18017 13.2694 8.26869C13.2155 8.35722 13.1872 8.45889 13.1875 8.5625V13.625C13.1875 15.1666 12.5751 16.645 11.4851 17.7351C10.395 18.8251 8.91657 19.4375 7.375 19.4375C5.83343 19.4375 4.355 18.8251 3.26494 17.7351C2.17489 16.645 1.5625 15.1666 1.5625 13.625C1.5625 11.0262 3.29406 8.705 5.6875 7.96438V10.9203C5.21677 11.2141 4.83088 11.6256 4.56798 12.1142C4.30509 12.6029 4.1743 13.1517 4.18855 13.7064C4.20281 14.261 4.36161 14.8024 4.64925 15.2769C4.93689 15.7514 5.34341 16.1425 5.82861 16.4117C6.3138 16.6809 6.86086 16.8188 7.41568 16.8117C7.9705 16.8046 8.51386 16.6528 8.99203 16.3714C9.47019 16.0899 9.8666 15.6884 10.142 15.2068C10.4175 14.7251 10.5624 14.1799 10.5625 13.625V1.8125H13.2147C13.3466 3.15287 13.9392 4.40602 14.8916 5.35839C15.844 6.31075 17.0971 6.90339 18.4375 7.03531V9.66875Z" stroke="#1C1915" style="fill: var(--fill);" stroke-width="0.5"/>
                                                                </svg>
                                                            </a>
                                                        </div>
                                                        <div class="menu mb-4">
                                                            <a href="https://www.instagram.com/naclinicbali" target="_blank" class="w-[24px] h-[24px] justify-center items-center flex no-anim" style="--fill: #FFFBF3; scale: 1.4;">
                                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M10 5.6875C9.14707 5.6875 8.31329 5.94042 7.6041 6.41429C6.89492 6.88815 6.34217 7.56167 6.01577 8.34968C5.68937 9.13768 5.60397 10.0048 5.77036 10.8413C5.93676 11.6779 6.34749 12.4463 6.9506 13.0494C7.55372 13.6525 8.32213 14.0632 9.15867 14.2296C9.99522 14.396 10.8623 14.3106 11.6503 13.9842C12.4383 13.6578 13.1118 13.1051 13.5857 12.3959C14.0596 11.6867 14.3125 10.8529 14.3125 10C14.311 8.85671 13.8562 7.76067 13.0478 6.95225C12.2393 6.14382 11.1433 5.68899 10 5.6875ZM10 13.1875C9.36957 13.1875 8.7533 13.0006 8.22912 12.6503C7.70494 12.3001 7.29639 11.8022 7.05513 11.2198C6.81388 10.6374 6.75076 9.99646 6.87375 9.37815C6.99674 8.75984 7.30032 8.19188 7.7461 7.7461C8.19188 7.30032 8.75984 6.99674 9.37815 6.87375C9.99646 6.75076 10.6374 6.81388 11.2198 7.05513C11.8022 7.29639 12.3001 7.70494 12.6503 8.22912C13.0006 8.7533 13.1875 9.36957 13.1875 10C13.1875 10.8454 12.8517 11.6561 12.2539 12.2539C11.6561 12.8517 10.8454 13.1875 10 13.1875ZM14.5 0.4375H5.5C4.1578 0.438989 2.871 0.972836 1.92192 1.92192C0.972836 2.871 0.438989 4.1578 0.4375 5.5V14.5C0.438989 15.8422 0.972836 17.129 1.92192 18.0781C2.871 19.0272 4.1578 19.561 5.5 19.5625H14.5C15.8422 19.561 17.129 19.0272 18.0781 18.0781C19.0272 17.129 19.561 15.8422 19.5625 14.5V5.5C19.561 4.1578 19.0272 2.871 18.0781 1.92192C17.129 0.972836 15.8422 0.438989 14.5 0.4375ZM18.4375 14.5C18.4375 15.5443 18.0227 16.5458 17.2842 17.2842C16.5458 18.0227 15.5443 18.4375 14.5 18.4375H5.5C4.45571 18.4375 3.45419 18.0227 2.71577 17.2842C1.97734 16.5458 1.5625 15.5443 1.5625 14.5V5.5C1.5625 4.45571 1.97734 3.45419 2.71577 2.71577C3.45419 1.97734 4.45571 1.5625 5.5 1.5625H14.5C15.5443 1.5625 16.5458 1.97734 17.2842 2.71577C18.0227 3.45419 18.4375 4.45571 18.4375 5.5V14.5ZM15.8125 5.125C15.8125 5.31042 15.7575 5.49168 15.6545 5.64585C15.5515 5.80002 15.4051 5.92018 15.2338 5.99114C15.0625 6.06209 14.874 6.08066 14.6921 6.04449C14.5102 6.00831 14.3432 5.91902 14.2121 5.78791C14.081 5.6568 13.9917 5.48975 13.9555 5.3079C13.9193 5.12604 13.9379 4.93754 14.0089 4.76623C14.0798 4.59493 14.2 4.44851 14.3542 4.3455C14.5083 4.24248 14.6896 4.1875 14.875 4.1875C15.1236 4.1875 15.3621 4.28627 15.5379 4.46209C15.7137 4.6379 15.8125 4.87636 15.8125 5.125Z" stroke="#1C1915" style="fill: var(--fill);" stroke-width="0.5"/>
                                                                </svg>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="link-wrapper">
                                                    <div class="title mb-6">
                                                        <p class="text-body font-medium tracking-[.5px] text-white">Links</p>
                                                    </div>
                                                    <div class="menu-wrapper">
                                                        <div class="menu mb-4">
                                                            <a href="/" class="text-base text-theme-ivory">Home</a>
                                                        </div>
                                                        <div class="menu mb-4">
                                                            <a href="/treatments" class="text-base text-theme-ivory">Treatment</a>
                                                        </div>
                                                        <div class="menu mb-4">
                                                            <a href="/promotions" class="text-base text-theme-ivory">Promotions</a>
                                                        </div>
                                                        <div class="menu mb-4">
                                                            <a href="/about" class="text-base text-theme-ivory">About Us</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="contacts-wrapper">
                                                    <div class="title mb-6">
                                                        <p class="text-body font-medium tracking-[.5px] text-white">Contacts</p>
                                                    </div>
                                                    <div class="menu-wrapper">
                                                        <div class="menu mb-4">
                                                            <a href="/plan-a-visit" class="text-base text-theme-ivory">Plan a Visit</a>
                                                        </div>
                                                        <div class="menu mb-4">
                                                            <a href="mailto:hello@naclinicbali.com" class="text-base text-theme-ivory">Email Us</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <hr style="border-color: rgba(255, 251, 243, 0.3);">
                                    <div class="flex pt-4">
                                        <p class="text-base text-white">@2025 NA Clinic LLC. PT. Mulus Berkah Abadi</p>
                                    </div>

                                </div>
                            </div>
                        </footer>
                    </div>
                </div>
            </div>

            <aside class="fixed inset-0 w-full h-full z-[101]" style="transform: translateX(101%);">
                <div class="overlay bg-theme-black absolute inset-0 w-full h-full"></div>
                <div class="container h-full overflow-auto">
                    <div class="menu-wrapper h-min w-full flex flex-col gap-6 justify-center items-center overflow-y-scroll">
                        <div class="close-button cursor-pointer">
                            <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M24.9125 23.5876C25.0046 23.6734 25.0785 23.7769 25.1297 23.8919C25.181 24.0069 25.2085 24.131 25.2107 24.2569C25.213 24.3828 25.1898 24.5078 25.1427 24.6245C25.0955 24.7413 25.0253 24.8473 24.9363 24.9364C24.8473 25.0254 24.7412 25.0956 24.6245 25.1427C24.5078 25.1899 24.3827 25.213 24.2568 25.2108C24.131 25.2086 24.0068 25.181 23.8918 25.1298C23.7768 25.0785 23.6733 25.0047 23.5875 24.9126L13 14.3266L2.4125 24.9126C2.23478 25.0782 1.99972 25.1683 1.75685 25.164C1.51397 25.1597 1.28224 25.0613 1.11047 24.8896C0.938705 24.7178 0.840315 24.4861 0.83603 24.2432C0.831745 24.0003 0.921899 23.7653 1.0875 23.5876L11.6734 13.0001L1.0875 2.41255C0.921899 2.23483 0.831745 1.99978 0.83603 1.7569C0.840315 1.51402 0.938705 1.28229 1.11047 1.11052C1.28224 0.938759 1.51397 0.840369 1.75685 0.836084C1.99972 0.831798 2.23478 0.921952 2.4125 1.08755L13 11.6735L23.5875 1.08755C23.7652 0.921952 24.0003 0.831798 24.2432 0.836084C24.486 0.840369 24.7178 0.938759 24.8895 1.11052C25.0613 1.28229 25.1597 1.51402 25.164 1.7569C25.1683 1.99978 25.0781 2.23483 24.9125 2.41255L14.3266 13.0001L24.9125 23.5876Z" fill="#D4B888"/>
                            </svg>
                        </div>
                        <?php foreach($menus as $menu) : ?>
                            <div class="menu">
                                <a class="text-theme-champagne text-base" href="<?= $menu['url'] ?>"><?= $menu['title'] ?></a>
                            </div>
                        <?php endforeach ?>
                        <div class="menu book-button">
                            <div class="trigger-book-button cursor-pointer py-4 px-6 text-theme-blacker font-serif font-medium text-base tracking-[1.5px] open-popup-form close-button" style="border-radius: 8px; background: linear-gradient(90deg, #D4B888, #F9EBCB, #D4B888)">
                                Book Consultation
                            </div>
                        </div>
                        <a href="/">
                            <img src="<?= assets_url('/dist/images/logo.png') ?>" alt="">
                        </a>
                    </div>
                </div>

            </aside>



            <div id="popup-form" class="fixed inset-0 w-full h-full" style="opacity: 0; z-index: 101; pointer-events: none;">
                <div class="overlay absolute inset-0 w-full h-full bg-black" style="--tw-bg-opacity: .4;"></div>
                <div class="content-wrapper absolute inset-0 w-full h-full">
                    <div class="md:_container h-full mt-8 justify-center items-center overflow-y-scroll relative z-[10]">
                        <div class="inner xl:px-24 lg:py-16 lg:px-16 md:py-12 md:px-12 py-8 px-8 bg-theme-ivory w-full relative">
                            <div class="close-button-form mx-auto text-center md:absolute md:mb-0 mb-8 w-[40px] h-[40px] top-8 right-20 cursor-pointer">
                                <img src="<?= assets_url('/dist/images/close.svg') ?>" class="w-full h-full object-cover" alt="">
                            </div>
                            <div class="title mb-8 text-center">
                                <p class="text-h2 font-medium text-theme-gold font-serif leading-none"><?= get_field('popup_form_title_text', 'option');  ?></p>
                            </div>
                            <div class="form py-8 form-wrapper">
                                <?= do_shortcode(get_field('popup_form_form_shortcode', 'option')); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile ?>
    <?php endif; ?>

    <div id="float" class="fixed bottom-10 right-10 text-right">
        <div class="choices-wrapper mb-6" style="height: 0; overflow: hidden;">
            <?php foreach(get_field('whatsapp_button_whatsapp', 'option') as $item) : ?>
            <div class="choices">
                <a href="<?= $item['url'] ?>" class="cursor-pointer inline-block py-2 px-6 text-theme-blacker font-serif font-medium text-base tracking-[1.5px]" target="_blank" style="border-radius: 12px; background: linear-gradient(90deg, #D4B888, #F9EBCB, #D4B888);"><?= $item['title'] ?></a>
            </div>
            <?php endforeach; ?>
        </div>
        <div id="float-wa" class="w-[60px] h-[60px] flex justify-center items-center bg-[#25d366] text-white rounded-full cursor-pointer ml-auto" style="font-size: 30px;">
            <i class="fa fa-whatsapp"></i>
        </div>
    </div>
    
    <?php wp_footer(); ?>

    <script>
        const userIP = '<?= get_the_user_ip() ?>'
    </script>

