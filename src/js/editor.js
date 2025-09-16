// const { addFilter } = wp.hooks;
// const { createHigherOrderComponent } = wp.compose;
// const { createElement } = wp.element;
// const { BlockListBlock } = wp.blockEditor;

// addFilter(
//     'editor.BlockListBlock',
//     'custom-acf-blocks/dynamic-class',
//     createHigherOrderComponent((BlockListBlock) => {
//         return function (props) {
//             if (props.block.name === 'acf/column') {
//                 const attrs = props.block.attributes;
//                 const fieldVal = attrs?.data?.column ?? 12;
//                 let newClass = `w-full col-span-${fieldVal}`;
//                 console.log(props.block)

//                 return createElement(BlockListBlock, {
//                     ...props,
//                     className: newClass
//                 });
//             }

//             return createElement(BlockListBlock, props);
//         };
//     }, 'withDynamicClass')
// );


const { addFilter } = wp.hooks;
const { createHigherOrderComponent } = wp.compose;
const { createElement } = wp.element;

addFilter(
    'editor.BlockListBlock',
    'custom-acf-blocks/dynamic-class',
    createHigherOrderComponent((BlockListBlock) => {
        return function (props) {
            if (props.block.name === 'acf/column') {
                // ACF field values are inside attributes.data
                const attrs = props.block.attributes;
                const fieldVal = attrs?.data?.column; // replace with your field key

                // Build dynamic class
                let newClass = 'w-full col-span-12';
                if (fieldVal) {
                    newClass = 'w-full col-span-' + fieldVal;
                }

                return createElement(BlockListBlock, {
                    ...props,
                    className: newClass
                });
            }

            return createElement(BlockListBlock, props);
        };
    }, 'withDynamicClass')
);