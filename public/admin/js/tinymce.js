'use strict';

class TinyMCEManager {
    constructor() {
        this.initTinyMCE();
    }


    initTinyMCE() {
        tinymce.init({
            selector: 'textarea',
            entity_encoding: 'raw',
            license_key: 'gpl|1qa5t0dn0b46dukvifb2b500e7ausw3qelzj0jie038xyejf',
            height: 500,
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }',
            plugins: [
                'advlist', 'autolink', 'lists', 'link', 'image', 'editimage', 'charmap', 'preview',
                'anchor', 'searchreplace', 'visualblocks', 'fullscreen', 'file-manager',
                'insertdatetime', 'media', 'table', 'code', 'help', 'wordcount',
            ],
            toolbar: 'undo redo | link image | code | blocks | bold italic backcolor | ' +
               'alignleft aligncenter alignright alignjustify | ' +
               'bullist numlist outdent indent | removeformat | help ',
            image_title: true,
            automatic_uploads: true,
            images_file_types: 'jpg, svg, webp, png',
            file_picker_types: 'file image media',

            images_upload_handler: this.example_image_upload_handler
        });
    }

    example_image_upload_handler = (blobInfo, progress) => new Promise((resolve, reject) => {
        const xhr = new XMLHttpRequest();
        xhr.withCredentials = false;
        xhr.open('POST', BASE_URL + '/postacceptor');

        xhr.upload.onprogress = (e) => {
            progress(e.loaded / e.total * 100);
        };

        xhr.onload = () => {
            if (xhr.status === 403) {
                reject({ message: 'HTTP Error: ' + xhr.status, remove: true });
                return;
            }

            if (xhr.status < 200 || xhr.status >= 300) {
                reject('HTTP Error: ' + xhr.status);
                return;
            }

            const json = JSON.parse(xhr.responseText);

            if (!json || typeof json.location != 'string') {
                reject('Invalid JSON: ' + xhr.responseText);
                return;
            }

            resolve(json.location);
        };

        xhr.onerror = () => {
            reject('Image upload failed due to a XHR Transport error. Code: ' + xhr.status);
        };

        const formData = new FormData();
        formData.append('file', blobInfo.blob(), blobInfo.filename());

        xhr.send(formData);
    });


}

// Khởi tạo class khi DOM đã sẵn sàng
document.addEventListener("DOMContentLoaded", () => {
    new TinyMCEManager();
});
