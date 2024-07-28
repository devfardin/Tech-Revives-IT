<?php
class Elementor_search_box extends \Elementor\Widget_Base {

    public function get_name() {
        return 'search_posts';
    }
    public function get_title() {
        return esc_html__( 'Search Posts', 'tri' );
    }
    public function get_icon() {
        return 'eicon-post-list';
    }
    public function get_categories() {
        return [ 'basic' ];
    }
    public function get_keywords() {
        return [ 'search','tri' ];
    }
    protected function register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'search Posts', 'tri' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->end_controls_section();
    }

    protected function render() { 

        // link style
        $this->render_inline_styles();
        ?>
        
        <section class='search_post__container'>
            <div class='search_post__wrap'>
                <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ) ?>">
                    
                    <div class='search_post__input'>

                    <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Type Keywords', 'placeholder' ); ?> " value="<?php echo get_search_query(); ?>" name="s" />

                    <button type="submit" class="search_post__btn">
                       
                        <svg aria-hidden="true" class="e-font-icon-svg e-fas-search" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path></svg>
                       
                    </button>

                    </div>
                </form>
            </div>
        </section>
   <?php
   }
    protected function render_inline_styles(){ ?>
         <style>
            .search_post__btn svg.e-font-icon-svg.e-fas-search {
                width: 20px;
            }
            .search_post__btn svg.e-font-icon-svg.e-fas-search {
                fill: #e9e6ed;
            }

            .search_post__input {
                position: relative;
            }

            .search_post__btn {
                position: absolute;
                right: 0;
                top: 8px;
                background: transparent;
                display: flex;
                align-items: center;
                margin: 0px !important;
            }
            .search_post__btn:hover{
                background:transparent; 
            }
            .search_post__btn:focus{
                background:transparent; 
            }

            input.search-field {
                width: 100%;
                height: 50px;
                border: 1px solid rgba(225, 224, 224, 0.2);
                background: transparent;
                border-radius: 0px !important;
                padding-left: 15px;
                font-size: 18px;
                padding: 10px 0px 10px 15px !important;
                font-family: 'Nunito';
                color:white !important;
                
            }         
            input.search-field::placeholder {
                color: #e9e6ed !important;
            }

        
         </style>
        <?php
    }
}