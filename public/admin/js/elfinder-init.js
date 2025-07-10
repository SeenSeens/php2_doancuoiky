'use strict'
class ElfinderManager {
    constructor(selector = '#elfinder', options = {}) {
        this.selector = selector;
        this.options = options;
        this.init();
    }

    init() {
        // Đảm bảo jQuery sẵn sàng
        $(document).ready(() => {
            const $container = $(this.selector);
            if ($container.length === 0) {
                console.warn(`⚠️ Không tìm thấy phần tử "${this.selector}" để khởi tạo elFinder`);
                return;
            }

            const defaultOptions = {
                url: window.ELFINDER_CONNECTOR_URL || '/admin/media/connector',
                height: 600,
                handlers: {
                    request: function (event) {
                        console.log('📡 elFinder request:', event.data);
                    },
                    error: function (event) {
                        console.error('❌ elFinder error:', event.data);
                    }
                },
                uiOptions: {
                    toolbar: [
                        ['back', 'forward'],
                        ['mkdir', 'upload'],
                        ['open', 'download'],
                        ['info'],
                        ['quicklook'],
                        ['copy', 'cut', 'paste'],
                        ['rm'],
                        ['rename'],
                        ['search'],
                        ['view']
                    ]
                }
            };

            const mergedOptions = $.extend(true, {}, defaultOptions, this.options);

            // Khởi tạo elFinder
            $container.elfinder(mergedOptions);
        });
    }
}

// Tự động khởi tạo nếu có DOM element #elfinder
new ElfinderManager();
