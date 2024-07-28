<?php
class Elementor_all_post_tags extends \Elementor\Widget_Base {
    public function get_name() {
        return 'all_Post_tags';
    }
    public function get_title() {
        return esc_html__( 'All Post Tags', 'tri' );
    }
    public function get_icon() {
        return 'eicon-product-categories';
    }
    public function get_categories() {
        return [ 'basic' ];
    }
    public function get_keywords() {
        return [ 'tags','tri' ];
    }
    protected function register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'All Post tags', 'tri' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {
        $this->most_popular_posts_style(); ?>
                <div class='all_post_tags__container'>
                   
                    <?php
                    $tags = get_terms('post_tag');
                    if($tags):
                    foreach ($tags as $tag) : ?>
                    <a href="<?php echo get_term_link($tag, 'tag'); ?>">
                        <?php echo $tag->name; ?>
                    </a>
                    <?php endforeach?>
                    <?php else: ?>
                        <div class="no_have_tags">
                            <h3>It looks like there are no tags at the moment.</h3>
                        </div>
                    <?php endif; ?>
                    
                 </div>      
        <?php
    }
    protected function most_popular_posts_style(){ ?>
            <style>
                .all_post_tags__container{
                    margin-top:20px;
                    display:flex;
                    gap:15px;
                    align-items:center;
                    flex-wrap:wrap;
                }
                .all_post_tags__container a{
                    color: #838383;
                    display: block;
                    font-size: 16px;
                    font-family: 'Rubik';
                    line-height:1.5em;
                    transition:0.4s;
                    padding:8px 10px;
                    border:1px solid rgba(225, 224, 224, 0.2);
                    display:inline;
                }
                .all_post_tags__container a:hover{
                    background:var(--e-global-color-primary);
                    border-color:var(--e-global-color-primary);
                    color:white;
                }
                
                .no_have_tags h3{
                    font-size:18px;
                    text-align:center;
                    font-weight:400;
                    color:var(--e-global-color-primary);
                    font-family: 'Rubik';
                    padding: 20px 0;
                }
            </style>
        <?php
    }
}