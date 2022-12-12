const { addFilter } = wp.hooks;

wp.domReady( () => {
    // wp.blocks.unregisterBlockStyle(
    //     'core/image', ['default']
    // ); showDownloadButton
    // wp.blocks.unregisterBlockStyle(
    //     'core/file', ['displayPreview']
    // );
    
    wp.blocks.registerBlockStyle(
        'core/image', {
            name: 'squared',
            label: 'Squared',
            isDefault: true,
        }
    );

    wp.blocks.registerBlockStyle(
        'core/image', {
            name: 'post_img_small',
            label: 'Liten bild',
        }
    );

    // wp.hooks.addFilter(
    //     'blocks.registerBlockType', 
    //     'js/staby-remove-file-defaults', 
    //     (settings, name) => {
    //         if (name !== "core/file") {
    //             return settings;
    //         }
    //         let changedAttr = {
    //             attributes: {
    //                 showDownloadButton: {
    //                     default: false,
    //                 }
    //             }
    //         }
    //         let mergedSettings = lodash.merge({}, settings, changedAttr);
    //         return mergedSettings;
    //     }
    // );



// function filterCoverBlockAlignments(settings, name) {
//   console.log({ settings, name });
//   return settings;
// }

// addFilter(
//   'blocks.registerBlockType',
//   'intro-to-filters/cover-block/alignment-settings',
//   filterCoverBlockAlignments,
// );
// console.log(wp.data.select( "core/blocks" ).getBlockTypes());
});