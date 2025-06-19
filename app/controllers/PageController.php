<?php
require_once __DIR_ROOT__ . '/app/services/TermService.php';
require_once __DIR_ROOT__ . '/app/services/PostService.php';
class PageController extends Controller {
    public array $data = [];
    private TermService $termService;
    private PostService $postService;
    public function __construct(){
        $this->termService = new TermService();
        $this->postService = new PostService();
    }

    public function contact(){
        $this->data['sub_content']['page_title'] = 'Liên hệ';
        $this->data['sub_content']['product_categories'] = $this->termService->getTerms('product_cat');
        $this->data['content'] = 'frontend/pages/contact';
        $this->render('frontend/templates/app_layout', $this->data);
    }
    public function news(){
        $this->data['sub_content']['page_title'] = 'Tin tức';
        $this->data['sub_content']['product_categories'] = $this->termService->getTerms('product_cat');
        $this->data['sub_content']['news'] = $this->postService->allPostsWithExcerpt('post', 'publish');
        $this->data['content'] = 'frontend/pages/news';
        $this->render('frontend/templates/app_layout', $this->data);
    }
    public function detail ($slug = '') {
        $post = $this->postService->findPostBySlug('post', $slug);
        if (!$post) {
            return;
        }
        $this->data['sub_content']['page_title'] = $post['title'];
        $this->data['sub_content']['post'] = $post;
        $this->data['sub_content']['product_categories'] = $this->termService->getTerms('product_cat');
        $this->data['sub_content']['news_limit'] = $this->postService->getPostLimit('post', '3');
        $this->data['content'] = 'frontend/single'; // truyền dữ liệu qua bên view
        $this->render('frontend/templates/app_layout', $this->data);
    }
}
