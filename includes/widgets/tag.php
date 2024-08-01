<?php
class Elementor_tag extends \Elementor\Widget_Base {

    public function get_name() {
        return 'tri_tag';
    }
    public function get_title() {
        return esc_html__( 'tag', 'tri' );
    }
    public function get_icon() {
        return 'eicon-post-list';
    }
    public function get_categories() {
        return [ 'basic' ];
    }
    public function get_keywords() {
        return [ 'tag','tri' ];
    }
    protected function register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'tag', 'tri' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {

        $this->render_inline_styles();  ?>

    <section class="tag_row">
         <?php if ( have_posts() ):  
            while ( have_posts() ): the_post();?>
        <article class="tag__container">
            <div class="tag_thumb">
                <a href="<?php the_permalink(); ?>" rel="bookmark"
                    aria-label="More about <?php echo get_the_title(); ?>">
                    <?php the_post_thumbnail('medium'); ?>
                </a>
            </div>
        

            <div class="tag__info_wrap">
                <!-- Post Meta Info Start-->
                <div class="tag__meta_info_wrap">
                <?php $tag_id= get_the_tag_meta('ID'); ?>
                
                <!-- post tag Inof    -->
                    <div class="tag__auther_wrap">
                        <a href="<?php  echo get_tag_posts_url( $tag_id );?>"     class='tag__auther'>
                            <img  class='most-popular-post__tag_avatar'
                            src="<?php echo get_avatar_url($tag_id)?>" alt="<?php echo get_the_tag_meta('display_name', $tag_id) ?>" >

                            <h3 class='auther_display_name'>
                                <?php echo get_the_tag_meta('display_name', $tag_id); ?>
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
            <!-- tag Meta Info End -->
            <!-- --------------------------- -->
            <div class='tag_text__info'>
                <!-- Post Title -->
                <a href="<?php the_permalink(); ?>" class="most-popular-tag__post__title">
                    <?php echo substr(get_the_title(), 0, 40 ); ?>
                </a>
                <!-- Post Description  -->
                <p>
                <?php
                    $post_content= get_the_content();
                    echo substr( $post_content, 0, 300); ?>
                </p>
                
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
            .tag_row {
                display: flex;
                flex-direction: column;
                gap: 55px;
            }
            .tag_thumb a img {
                border-radius: 25px;
            }
            .tag__auther{
                display:flex;
                align-items: center;
                gap: 15px;
            }
            .tag__auther img {
                width: 50px;
                height: 50px;
                object-fit: cover;
                border-radius: 50px;
            }
            .tag__auther h3 {
                margin: 0px;
                font-size: 17px;
                font-weight: 400;
                color: #262420;
            }
            @media only screen and (min-width:425px){
                .tag__auther h3 {
                font-size: 20px;
                }
            }
            .tag__meta_info_wrap {
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
            .tag_text__info{
                margin-top:10px;
            }
            .tag_text__info a {
                color: #222222;
                font-size: 25px;
                line-height:1.2em;
                font-weight: 500;
                transition: all 0.3s;
                margin-bottom:10px;
            }
            @media only screen and (min-width:768px){
                .tag_text__info a {
                font-size: 34px;
            }
            }

            .tag_text__info a:hover {
                color:var(--e-global-color-primary)
            }
            .tag_text__info p {
                font-size: 18px;
                color: #585858;
                margin: 10px 0;
            }
            @media only screen and (min-width:768px){
                .tag_text__info p {
                font-size: 20px;
            }
            }
         </style>
        <?php
    }
}