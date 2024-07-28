<?php
class Elementor_all_categories extends \Elementor\Widget_Base {
    public function get_name() {
        return 'all_categories';
    }
    public function get_title() {
        return esc_html__( 'All Categories', 'tri' );
    }
    public function get_icon() {
        return 'eicon-product-categories';
    }
    public function get_categories() {
        return [ 'basic' ];
    }
    public function get_keywords() {
        return [ 'Categories','tri' ];
    }
    protected function register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'All Categories', 'tri' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {
        $this->most_popular_posts_style(); ?>
                <div class='all_post_categories__container'>
                    <?php
                     $all_categories = get_categories( array(
                        'taxonomy' => 'category',
                        'orderby' => 'post',
                        'order'   => 'ASC'
                
                    ) );?>

                    <ul class="all_post_categories__wrap">
                    <?php foreach( $all_categories as $category ):  ?>
                        <li>
                            <a href="<?php echo get_term_link($category, 'category')  ?>">
                                <?php echo $category->name; ?>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                 </div>      
        <?php
    }
    protected function most_popular_posts_style(){ ?>
            <style>
                .all_post_categories__container{
                    margin-top:10px;
                }
                .all_post_categories__wrap li::marker{
                    font-size:25px;
                    color:#838383;
                    }
                .all_post_categories__wrap li:hover::marker{
                    color: var(--e-global-color-primary);
                    }
                .all_post_categories__wrap li a{
                    color: #838383;
                    display: block;
                    font-size: 20px;
                    font-family: 'Rubik';
                    line-height:1.5em;
                    transition:0.4s;                
                }
                .all_post_categories__wrap li a:hover{
                    color: var(--e-global-color-primary);
                               
                }
            </style>
        <?php
    }
}