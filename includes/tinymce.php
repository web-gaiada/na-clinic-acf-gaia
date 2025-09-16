<?php
add_filter('acf/fields/wysiwyg/toolbars', function($toolbars) {
    $toolbars['Full'] = array();
    $toolbars['Full'][1] = array(
        'formatselect', 'styleselect', 'bold', 'italic', 'underline', 'link', 'unlink', 'bullist', 'numlist', 'aligncenter', 'alignleft', 'alignright', 'alignjustify'
    );
    return $toolbars;
});

add_action('acf/input/admin_footer', function(){
    ?>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            acf.addFilter('wysiwyg_tinymce_settings', function( mceInit, id, field ){

                // mceInit.setup = function(editor) {
                //     console.log(editor.getContent(), editor)
                //     editor.on('ApplyFormat', function(e) {
                //         if (e.format && e.format.classes && e.format.classes.startsWith('split-text')) {
                //             const content = editor.getContent();
                //             if (content.includes('<!-- pagebreak -->')) {
                //                 const newContent = content.replace(/<!-- pagebreak -->/g, '');
                //                 editor.setContent(newContent);
                //                 alert('Page break removed due to animation being applied.');
                //             }
                //         }
                //     });
                // };

                mceInit.block_formats =
                'Paragraph=p.text-body;' +
                'Body Big=p.text-body-big;' +
                'Headline=p.text-headline;' +
                'Heading 1=h1.text-h1;' +
                'Heading 2=h2.text-h2;' +
                'Heading 3=h3.text-h3;' +
                'Small=p.text-small;' +
                'Button=p.text-button;' +
                'Quote=p.text-quote';

                mceInit.formats = {
                    'p.text-body-big': { block: 'p', classes: ['text-body-big'] },
                    'h1.text-h1': { block: 'h1', classes: ['text-h1'] },
                    'h2.text-h2': { block: 'h2', classes: ['text-h2'] },
                    'h3.text-h3': { block: 'h3', classes: ['text-h3'] },
                    'p.text-body': { block: 'p', classes: ['text-body'] },
                    'p.text-small': { block: 'p', classes: ['text-small'] },
                    'p.text-button': { block: 'p', classes: ['text-button'] },
                    'p.text-quote': { block: 'p', classes: ['text-quote'] },
                };


                mceInit.style_formats = [
                    {
                        title: 'Colors',
                        items: [
                            { title: 'Gold', inline: 'span', classes: 'text-theme-gold' },
                            { title: 'Ivory', inline: 'span', classes: 'text-theme-ivory' },
                            { title: 'Black', inline: 'span', classes: 'text-theme-black' },
                            { title: 'Soft Gold', inline: 'span', classes: 'text-theme-soft-gold' },
                            { title: 'Champagne', inline: 'span', classes: 'text-theme-champagne' },
                            { title: 'Blacker', inline: 'span', classes: 'text-theme-blacker' },
                            { title: 'Dark Grey', inline: 'span', classes: 'text-theme-dark-grey'},
                            { title: 'Light Grey', inline: 'span', classes: 'text-theme-light-grey'},
                        ]
                    },
                    {
                        title: 'Fonts',
                        items: [
                            { title: 'Serif', inline: 'span', classes: 'font-serif' },
                            { title: 'Sans Serif', inline: 'span', classes: 'font-sans' },
                        ]
                    },
                ];
                return mceInit;
            });
        })
    </script>
    <?php
});