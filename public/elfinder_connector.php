<?php
require_once __DIR_ROOT__ . '/core/MediaLogger.php';

$opts = [
    'roots' => [
        [
            'driver' => 'LocalFileSystem',
            'path'   => __DIR_ROOT__ . '/public/uploads/',
            'URL'    => '/uploads/',
            'accessControl' => 'access',
        ]
    ],
    'bind' => [
        'upload' => ['MediaLogger::onUpload'],
        'rm'     => ['MediaLogger::onRemove'], // nếu bạn muốn xóa DB khi xóa file
    ]
];

function access($attr, $path, $data, $volume) {
    return strpos(basename($path), '.') === 0 ? !($attr == 'read' || $attr == 'write') : null;
}

$connector = new elFinderConnector(new elFinder($opts));
try {
    $connector->run();
} catch (Exception $e) {

}
