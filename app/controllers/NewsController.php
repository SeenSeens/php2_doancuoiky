<?php
require_once __DIR_ROOT__ . '/app/services/PostService.php';
class NewsController extends Controller {
    public array $data = [];
    private PostService $postService;
    public function __construct() {
        $this->postService = new PostService();
    }
    public function index () {
        $page = $_GET['page'] ?? 1;
        $limit = 6;

        $this->data['sub_content']['page_title'] = "Tin tức";
        $paginationData = $this->postService->getPaginatedPosts(
            limit: $limit,
            page: $page,
            conditions: ['type' => 'post', 'status' => 'published']
        );

        $this->data['sub_content']['posts'] = $paginationData['data'];
        $this->data['sub_content']['pagination'] = [
            'total' => $paginationData['total'],
            'perPage' => $paginationData['perPage'],
            'currentPage' => $paginationData['currentPage'],
            'totalPages' => $paginationData['totalPages'],
        ];
        $this->data['content'] = 'frontend/pages/news'; // truyền dữ liệu qua bên view
        $this->render('frontend/app_layout', $this->data);
    }


    public function detail ($slug = '') {
        $post = $this->postService->findPostBySlug('post', $slug);
        if (!$post) {
            return;
        }
        $this->data['sub_content']['page_title'] = $post['title'];
        $this->data['sub_content']['post'] = $post;
        $this->data['content'] = 'frontend/pages/single'; // truyền dữ liệu qua bên view
        $this->render('frontend/templates/app_layout', $this->data);
    }
}

?>
