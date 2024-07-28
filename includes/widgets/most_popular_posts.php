<?php
class Elementor_most_popular_post extends \Elementor\Widget_Base {
    public function get_name() {
        return 'most_popular_posts';
    }
    public function get_title() {
        return esc_html__( 'Popular Post', 'tri' );
    }
    public function get_icon() {
        return 'eicon-post-list';
    }
    public function get_categories() {
        return [ 'basic' ];
    }
    public function get_keywords() {
        return [ 'Popular post','tri' ];
    }
    protected function register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Most Popular Post', 'tri' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {
        $this->most_popular_posts_style();
        $popularpost  = new WP_Query(array(
            'posts_per_page' => 6,
            'post_type' => 'post',
            'post_status' => 'publish',
            'orderby' => 'meta_value_num',
            'meta_key' => 'post_views_count',
            'order' => 'DESC'
        ));
        ?>
            <section class='most_popular_posts__container'>
                <?php if($popularpost->have_posts()): 
                while($popularpost->have_posts()):
                    $popularpost->the_post();?>
                    <div class='most_popular_posts__wrap'>
                        <!-- popular post image -->
                        <div class="popular_post_thumb">
                            <a href="<?php the_permalink(); ?>" rel="bookmark"
                                aria-label="More about <?php echo get_the_title(); ?>">
                                <?php the_post_thumbnail('thumbnail'); ?>
                            </a>
                        </div>

                        <!-- popular post meta Description -->
                        <div class="most_popular_posts_desc">
                        <h3>
                            <?php echo get_post_time("M d, Y"); ?>
                        </h3>
                        <a href="<?php the_permalink(); ?>" class="most-popular-posts__post__title">
                            <?php echo substr(get_the_title(), 0, 35 ); ?>
                        </a>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php else: ?>
                    <div class='no_popular_posts'>
                        <h3>It looks like there are no popular posts at the moment.</h3>
                    </div>
                <?php endif ?>
                <?php wp_reset_query(); ?>
            </section>        
        
        <?php
    }
    protected function most_popular_posts_style(){ ?>
            <style>
                .most_popular_posts__wrap{
                    display:flex;
                    /* justify-content: space-between; */
                    gap: 15px;
                    align-items: top;
                    margin-top:30px;
                }
                .popular_post_thumb{
                    max-width:90px !important;
                }
                .popular_post_thumb img {
                    width: 100%;
                    border-radius: 8px;
                    height: 77px;
                    object-fit: cover;
                }

                .most_popular_posts_desc h3 {
                    font-size: 16px;
                    font-weight: 400;
                    color: #888686;
                    margin: 0px !important;
                }

                .most_popular_posts_desc a {
                    font-size: 17px;
                    font-weight: 400;
                    color: #ffffff;
                    transition: 0.4s;
                }

                .most_popular_posts_desc a:hover {
                    color: var(--e-global-color-primary);
                }
                .no_popular_posts h3{
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