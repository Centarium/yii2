<?
use app\modules\events\views\events\assets\Assets;
Assets::register($this);
?>



        <!-- Start Region Add_new_post -->
        <?=$this->render('post/new_post_form',['model_posts' => $model_posts]);?>
        <!-- End Region Add_new_post -->

        <!-- Start Region Show_all_post -->
        <?=$this->render('post/show_posts.php',['posts' => $posts]);?>
        <!-- End Region Show_all_post -->
