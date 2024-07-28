<?php
class Elementor_posts extends \Elementor\Widget_Base {

    public function get_name() {
        return 'tri_posts';
    }
    public function get_title() {
        return esc_html__( 'posts', 'tri' );
    }
    public function get_icon() {
        return 'eicon-post-list';
    }
    public function get_categories() {
        return [ 'basic' ];
    }
    public function get_keywords() {
        return [ 'posts','tri' ];
    }
    protected function register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Posts', 'tri' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {

        $this->render_inline_styles(); 
        $settings = $this->get_settings_for_display();
        $popularpost  = new WP_Query(array(
            'posts_per_page' => 6,
            'post_type' => 'post',
            'post_status' => 'publish'
        ));
        ?>

    <section class="posts_row">
         <?php if ($popularpost->have_posts()):  
                while ($popularpost->have_posts()):
                $popularpost->the_post(); ?>
        <article class="post__container">
            <div class="post_thumb">
                <a href="<?php the_permalink(); ?>" rel="bookmark"
                    aria-label="More about <?php echo get_the_title(); ?>">
                    <?php the_post_thumbnail('medium'); ?>
                </a>
            </div>
        

            <div class="posts__info_wrap">
                <!-- Post Meta Info Start-->
                <div class="posts__meta_info_wrap">
                <?php $author_id= get_the_author_meta('ID'); ?>
                <!-- post Author Inof    -->
                    <div class="posts__auther_wrap">
                        <a href="<?php  echo get_author_posts_url( $author_id );?>"     class='posts__auther'>
                            <img  class='most-popular-post__author_avatar'
                            src="<?php echo get_avatar_url($author_id)?>" alt="<?php echo get_the_author_meta('display_name', $author_id) ?>" >

                            <h3 class='auther_display_name'>
                                <?php echo get_the_author_meta('display_name', $author_id); ?>
                            </h3>
                        </a>
                    </div>

                <!-- post Published date -->
                    <div class="post_published_date">
                        <?php $post_time = get_post_time() ;?>
                        <div class='post_published_date__icon'>
                        <svg aria-hidden="true" class="e-font-icon-svg e-far-calendar-alt" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M148 288h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12zm108-12v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm-96 96v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm-96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm192 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm96-260v352c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h48V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h128V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h48c26.5 0 48 21.5 48 48zm-48 346V160H48v298c0 3.3 2.7 6 6 6h340c3.3 0 6-2.7 6-6z"></path>
                        </svg>

                        </div>

                        <h3>
                            <?php echo date("M d, Y", $post_time ); ?>
                        </h3>
                    </div>       
            </div>
            <!-- Posts Meta Info End -->
            <!-- --------------------------- -->
            <div class='posts_text__info'>
                <!-- Post Title -->
                <a href="<?php the_permalink(); ?>" class="most-popular-posts__post__title">
                    <?php echo substr(get_the_title(), 0, 40 ); ?>
                </a>
                <!-- Post Description  -->
                <p>
                <?php
                    $post_content= get_the_content();
                    echo substr( $post_content, 0, 300); ?>
                </p>

                <a class='btn btn__post' href="<?php the_permalink(); ?>" class="most-popular-posts__post__title">
                Continue Reading

                <svg aria-hidden="true" class="e-font-icon-svg e-fas-arrow-right" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M190.5 66.9l22.2-22.2c9.4-9.4 24.6-9.4 33.9 0L441 239c9.4 9.4 9.4 24.6 0 33.9L246.6 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.2-22.2c-9.5-9.5-9.3-25 .4-34.3L311.4 296H24c-13.3 0-24-10.7-24-24v-32c0-13.3 10.7-24 24-24h287.4L190.9 101.2c-9.8-9.3-10-24.8-.4-34.3z"></path></svg>

                </a>

            
            </div>
        </div>
        </article>
                         <?php endwhile; ?>
                        <?php wp_reset_query(); ?>
                <?php endif; ?>
        </section>
    <?php
    }
    protected function render_inline_styles(){ ?>
         <style>
            .posts_row {
                display: flex;
                flex-direction: column;
                gap: 55px;
            }
            .post_thumb a img {
                border-radius: 25px;
            }
            .posts__auther{
                display:flex;
                align-items: center;
                gap: 15px;
            }
            .posts__auther img {
                width: 50px;
                height: 50px;
                object-fit: cover;
                border-radius: 50px;
            }
            .posts__auther h3 {
                margin: 0px;
                font-size: 17px;
                font-weight: 400;
                color: #262420;
            }
            @media only screen and (min-width:425px){
                .posts__auther h3 {
                font-size: 20px;
                }
            }
            .posts__meta_info_wrap {
                display: flex;
                align-items: center;
                gap: 25px;
                margin-top:25px;
            }
            .post_published_date h3 {
                font-size: 17px;
                color: #262420;
                font-weight: 400;
                margin:0px;
            }
            @media only screen and (min-width:425px){
                .post_published_date h3 {
                font-size: 20px;
                }
            }
            .post_published_date {
                display: flex;
                align-items: center;
                gap:15px;
            }

            .post_published_date__icon svg {
                width: 20px;
                margin: -5px;
                padding: 0px;
                fill: var(--e-global-color-primary);
            }
            .posts_text__info{
                margin-top:10px;
            }
            .posts_text__info a {
                color: #222222;
                font-size: 25px;
                line-height:1.2em;
                font-weight: 500;
                transition: all 0.3s;
                margin-bottom:10px;
            }
            @media only screen and (min-width:768px){
                .posts_text__info a {
                font-size: 34px;
            }
            }

            .posts_text__info a:hover {
                color:var(--e-global-color-primary)
            }
            .posts_text__info p {
                font-size: 18px;
                color: #585858;
                margin: 10px 0;
            }
            @media only screen and (min-width:768px){
                .posts_text__info p {
                font-size: 20px;
            }
            }

            .btn.btn__post {
                font-size: 20px;
                display: inline-flex;
                align-items: center;
                gap: 12px;
                font-weight: 700;
                font-family: 'Nunito';
                color: var(--e-global-color-primary);
                margin-top: 7px;
            }

            .btn.btn__post svg {
                width: 20px;
                fill: var(--e-global-color-primary);
            }

            

         </style>
        <?php
    }
}