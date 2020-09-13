(function ($) {
    "use strict";
    wp.domReady(() => {
        wp.blocks.registerBlockStyle('core/paragraph', [
            {
                name: 'no-margin',
                label: 'No Margin',
                isDefault: false,
            }
        ]);

        wp.blocks.registerBlockStyle('core/heading', [
            {
                name: 'no-margin',
                label: 'No Margin',
                isDefault: false,
            }
        ]);
    });
})(jQuery);

