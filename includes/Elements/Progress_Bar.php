<?php
namespace Essential_Addons_Elementor\Elements;

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    exit;
}

use \Elementor\Controls_Manager as Controls_Manager;
use \Elementor\Group_Control_Background as Group_Control_Background;
use \Elementor\Group_Control_Box_Shadow as Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography as Group_Control_Typography;
use \Elementor\Scheme_Typography as Scheme_Typography;
use \Elementor\Widget_Base;

class Progress_Bar extends Widget_Base
{

    public function get_name()
    {
        return 'eael-progress-bar';
    }

    public function get_title()
    {
        return esc_html__('Progress Bar', 'px-elements');
    }

    public function get_icon()
    {
        return 'eaicon-progress-bar';
    }

    public function get_categories()
    {
        return ['essential-addons-elementor'];
    }

    public function get_keywords()
    {
        return [
            'ea progessbar',
            'ea progess bar',
            'status bar',
            'ea status bar',
            'indicator',
            'progress indicator',
            'gradient',
            'ea',
            'scroll indicator',
            'essential addons',
        ];
    }

    public function get_custom_help_url()
    {
        return 'https://essential-addons.com/elementor/docs/progress-bar/';
    }

    protected function _register_controls()
    {

        /*-----------------------------------------------------------------------------------*/
        /*  CONTENT TAB
        /*-----------------------------------------------------------------------------------*/

        /**
         * Content Tab: Layout
         */
        $this->start_controls_section(
            'progress_bar_section_layout',
            [
                'label' => __('Layout', 'px-elements'),
            ]
        );

        // Progressbar Layout Options
        $options = apply_filters(
            'add_eael_progressbar_layout',
            [
                'layouts' => [
                    'line' => __('Line', 'px-elements'),
                    'line_rainbow' => __('Line Rainbow (Pro)', 'px-elements'),
                    'circle' => __('Circle', 'px-elements'),
                    'circle_fill' => __('Circle Fill (Pro)', 'px-elements'),
                    'half_circle' => __('Half Circle', 'px-elements'),
                    'half_circle_fill' => __('Half Circle Fill (Pro)', 'px-elements'),
                    'box' => __('Box (Pro)', 'px-elements'),
                ],
                'conditions' => [
                    'line_rainbow', 'circle_fill', 'half_circle_fill', 'box',
                ],
            ]
        );

        $this->add_control(
            'progress_bar_layout',
            [
                'label' => __('Layout', 'px-elements'),
                'type' => Controls_Manager::SELECT,
                'options' => $options['layouts'],
                'default' => 'line',
            ]
        );

        $this->add_control(
            'eael_pricing_table_style_pro_alert',
            [
                'label' => esc_html__('Only Available in Pro Version!', 'px-elements'),
                'type' => Controls_Manager::HEADING,
                'condition' => [
                    'progress_bar_layout' => $options['conditions'],
                ],
            ]
        );

        $this->add_control(
            'progress_bar_title',
            [
                'label' => __('Title', 'px-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Progress Bar', 'px-elements'),
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'progress_bar_title_html_tag',
            [
                'label' => __('Title HTML Tag', 'px-elements'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'h1' => __('H1', 'px-elements'),
                    'h2' => __('H2', 'px-elements'),
                    'h3' => __('H3', 'px-elements'),
                    'h4' => __('H4', 'px-elements'),
                    'h5' => __('H5', 'px-elements'),
                    'h6' => __('H6', 'px-elements'),
                    'div' => __('div', 'px-elements'),
                    'span' => __('span', 'px-elements'),
                    'p' => __('p', 'px-elements'),
                ],
                'default' => 'div',
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'progress_bar_value_type',
            [
                'label' => esc_html__('Counter Value Type', 'px-elements'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'static' => __('Static', 'px-elements'),
                    'dynamic' => __('Dynamic', 'px-elements'),
                ],
                'default' => 'static',
            ]
        );

        $this->add_control(
            'progress_bar_value',
            [
                'label' => __('Counter Value', 'px-elements'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['%'],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 50,
                ],
                'condition' => [
                    'progress_bar_value_type' => 'static',
                ],
            ]
        );

        $this->add_control(
            'progress_bar_value_dynamic',
            [
                'label' => __('Counter Value', 'px-elements'),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'progress_bar_value_type' => 'dynamic',
                ],
            ]
        );

        $this->add_control(
            'progress_bar_show_count',
            [
                'label' => esc_html__('Display Count', 'px-elements'),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'progress_bar_animation_duration',
            [
                'label' => __('Animation Duration', 'px-elements'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 1000,
                        'max' => 10000,
                        'step' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 1500,
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'progress_bar_prefix_label',
            [
                'label' => __('Prefix Label', 'px-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Prefix', 'px-elements'),
                'condition' => [
                    'progress_bar_layout' => 'half_circle',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'progress_bar_postfix_label',
            [
                'label' => __('Postfix Label', 'px-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Postfix', 'px-elements'),
                'condition' => [
                    'progress_bar_layout' => 'half_circle',
                ],
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();

        if (!apply_filters('eael/pro_enabled', false)) {
            $this->start_controls_section(
                'eael_section_pro',
                [
                    'label' => __('Go Premium for More Features', 'px-elements'),
                ]
            );

            $this->add_control(
                'eael_control_get_pro',
                [
                    'label' => __('Unlock more possibilities', 'px-elements'),
                    'type' => Controls_Manager::CHOOSE,
                    'options' => [
                        '1' => [
                            'title' => '',
                            'icon' => 'fa fa-unlock-alt',
                        ],
                    ],
                    'default' => '1',
                    'description' => '<span class="pro-feature"> Get the  <a href="https://wpdeveloper.net/in/upgrade-essential-addons-elementor" target="_blank">Pro version</a> for more stunning elements and customization options.</span>',
                ]
            );

            $this->end_controls_section();
        }

        /*-----------------------------------------------------------------------------------*/
        /*  STYLE TAB
        /*-----------------------------------------------------------------------------------*/

        /**
         * Style Tab: General(Line)
         */
        $style_condition = apply_filters('eael_progressbar_general_style_condition', ['line', 'line_rainbow']);

        $this->start_controls_section(
            'progress_bar_section_style_general_line',
            [
                'label' => __('General', 'px-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'progress_bar_layout' => $style_condition,
                ],
            ]
        );

        $this->add_control(
            'progress_bar_line_alignment',
            [
                'label' => __('Alignment', 'px-elements'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'px-elements'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'px-elements'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'px-elements'),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => 'center',
            ]
        );

        $this->end_controls_section();

        /**
         * Style Tab: Background
         */
        $this->start_controls_section(
            'progress_bar_section_style_bg',
            [
                'label' => __('Background', 'px-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'progress_bar_layout' => $style_condition, // ['line', 'line_rainbow'] ( Pro Only )
                ],
            ]
        );

        $this->add_control(
            'progress_bar_line_width',
            [
                'label' => __('Width', 'px-elements'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 1,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 100,
                ],
                'selectors' => [
                    '{{WRAPPER}} .eael-progressbar-line-container' => 'width: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'progress_bar_line_height',
            [
                'label' => __('Height', 'px-elements'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 12,
                ],
                'selectors' => [
                    '{{WRAPPER}} .eael-progressbar-line' => 'height: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'progress_bar_line_bg_color',
            [
                'label' => __('Color', 'px-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '#eee',
                'selectors' => [
                    '{{WRAPPER}} .eael-progressbar-line' => 'background-color: {{VALUE}}',
                ],
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();

        /**
         * Style Tab: Fill
         */
        $this->start_controls_section(
            'progress_bar_section_style_fill',
            [
                'label' => __('Fill', 'px-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'progress_bar_layout' => $style_condition, // will here ['line', 'line_rainbow'] ( Pro Only )
                ],
            ]
        );

        $this->add_control(
            'progress_bar_line_fill_height',
            [
                'label' => __('Height', 'px-elements'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 12,
                ],
                'selectors' => [
                    '{{WRAPPER}} .eael-progressbar-line-fill' => 'height: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        if (apply_filters('eael/pro_enabled', false)) {
            $line_fill_color_condition = [
                'progress_bar_layout' => 'line',
            ];
        } else {
            $line_fill_color_condition = [];
        }
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'progress_bar_line_fill_color',
                'label' => __('Color', 'px-elements'),
                'types' => ['classic', 'gradient'],
                'exclude' => [
                    'image',
                ],
                'condition' => $line_fill_color_condition,
                'selector' => '{{WRAPPER}} .eael-progressbar-line-fill',
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'progress_bar_line_fill_stripe',
            [
                'label' => __('Show Stripe', 'px-elements'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'condition' => $line_fill_color_condition,
                'default' => 'no',
                'separator' => 'before',
            ]
        );

        $fill_stripe_animate_condition = apply_filters('eael_progressbar_line_fill_stripe_condition', ['progress_bar_line_fill_stripe' => 'yes']);

        $this->add_control(
            'progress_bar_line_fill_stripe_animate',
            [
                'label' => __('Stripe Animation', 'px-elements'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'normal' => __('Left To Right', 'px-elements'),
                    'reverse' => __('Right To Left', 'px-elements'),
                    'none' => __('Disabled', 'px-elements'),
                ],
                'default' => 'none',
                'condition' => $fill_stripe_animate_condition,
            ]
        );

        $this->end_controls_section();

        /**
         * Style Tab: General(Circle)
         */
        $circle_general_condition = apply_filters('eael_circle_style_general_condition', ['circle', 'half_circle']);

        $this->start_controls_section(
            'progress_bar_section_style_general_circle',
            [
                'label' => __('General', 'px-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'progress_bar_layout' => $circle_general_condition,
                ],
            ]
        );

        $this->add_control(
            'progress_bar_circle_alignment',
            [
                'label' => __('Alignment', 'px-elements'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'px-elements'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'px-elements'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'px-elements'),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => 'center',
            ]
        );

        $this->add_control(
            'progress_bar_circle_size',
            [
                'label' => __('Size', 'px-elements'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 500,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 200,
                ],
                'selectors' => [
                    '{{WRAPPER}} .eael-progressbar-circle' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .eael-progressbar-half-circle' => 'width: {{SIZE}}{{UNIT}}; height: calc({{SIZE}} / 2 * 1{{UNIT}});',
                    '{{WRAPPER}} .eael-progressbar-half-circle-after' => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .eael-progressbar-circle-shadow' => 'width: calc({{SIZE}}{{UNIT}} + 20px); height: calc({{SIZE}}{{UNIT}} + 20px);',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'progress_bar_circle_bg_color',
            [
                'label' => __('Background Color', 'px-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .eael-progressbar-circle-inner' => 'background-color: {{VALUE}}',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'progress_bar_circle_stroke_width',
            [
                'label' => __('Stroke Width', 'px-elements'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 12,
                ],
                'selectors' => [
                    '{{WRAPPER}} .eael-progressbar-circle-inner' => 'border-width: {{SIZE}}{{UNIT}}',
                    '{{WRAPPER}} .eael-progressbar-circle-half' => 'border-width: {{SIZE}}{{UNIT}}',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'progress_bar_circle_stroke_color',
            [
                'label' => __('Stroke Color', 'px-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '#eee',
                'selectors' => [
                    '{{WRAPPER}} .eael-progressbar-circle-inner' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        if (apply_filters('eael/pro_enabled', false)) {
            $circle_fill_color_condition = [
                '{{WRAPPER}} .eael-progressbar-circle-half' => 'border-color: {{VALUE}}',
                '{{WRAPPER}} .eael-progressbar-circle-fill .eael-progressbar-circle-half' => 'background-color: {{VALUE}}',
                '{{WRAPPER}} .eael-progressbar-half-circle-fill .eael-progressbar-circle-half' => 'background-color: {{VALUE}}',
            ];
        } else {
            $circle_fill_color_condition = [
                '{{WRAPPER}} .eael-progressbar-circle-half' => 'border-color: {{VALUE}}',
            ];
        }

        $this->add_control(
            'progress_bar_circle_fill_color',
            [
                'label' => __('Fill Color', 'px-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => $circle_fill_color_condition,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'progress_bar_circle_box_shadow',
                'label' => __('Box Shadow', 'px-elements'),
                'selector' => '{{WRAPPER}} .eael-progressbar-circle-shadow',
                'condition' => [
                    'progress_bar_layout' => 'circle',
                ],
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();

        // Import progress bar style controlls
        do_action('add_progress_bar_control', $this);

        /**
         * Style Tab: Typography
         */
        $this->start_controls_section(
            'progress_bar_section_style_typography',
            [
                'label' => __('Typography', 'px-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'progress_bar_title_typography',
                'label' => __('Title', 'px-elements'),
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .eael-progressbar-title',
            ]
        );

        $this->add_control(
            'progress_bar_title_color',
            [
                'label' => __('Title Color', 'px-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .eael-progressbar-title' => 'color: {{VALUE}}',
                ],
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'progress_bar_count_typography',
                'label' => __('Counter', 'px-elements'),
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .eael-progressbar-count-wrap',
            ]
        );

        $this->add_control(
            'progress_bar_count_color',
            [
                'label' => __('Counter Color', 'px-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .eael-progressbar-count-wrap' => 'color: {{VALUE}}',
                ],
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'progress_bar_after_typography',
                'label' => __('Prefix/Postfix', 'px-elements'),
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .eael-progressbar-half-circle-after span',
                'condition' => [
                    'progress_bar_layout' => 'half_circle',
                ],
            ]
        );

        $this->add_control(
            'progress_bar_after_color',
            [
                'label' => __('Prefix/Postfix Color', 'px-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .eael-progressbar-half-circle-after' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'progress_bar_layout' => 'half_circle',
                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $wrap_classes = ['eael-progressbar'];
        $circle_wrapper = [];

        if (!apply_filters('eael/pro_enabled', false)) {
            if (in_array($settings['progress_bar_layout'], ['line', 'line_rainbow', 'circle_fill', 'half_circle_fill', 'box'])) {
                $settings['progress_bar_layout'] = 'line';
            }
        }

        if ($settings['progress_bar_layout'] == 'line' || $settings['progress_bar_layout'] == 'line_rainbow') {
            $wrap_classes[] = 'eael-progressbar-line';
            $wrap_classes = apply_filters('eael_progressbar_rainbow_wrap_class', $wrap_classes, $settings);

            if ($settings['progress_bar_line_fill_stripe'] == 'yes') {
                $wrap_classes[] = 'eael-progressbar-line-stripe';
            }

            if ($settings['progress_bar_line_fill_stripe_animate'] == 'normal') {
                $wrap_classes[] = 'eael-progressbar-line-animate';
            } else if ($settings['progress_bar_line_fill_stripe_animate'] == 'reverse') {
                $wrap_classes[] = 'eael-progressbar-line-animate-rtl';
            }

            $this->add_render_attribute('eael-progressbar-line', [
                'class' => $wrap_classes,
                'data-layout' => 'line',
                'data-count' => $settings['progress_bar_value_type'] == 'static' ? $settings['progress_bar_value']['size'] : $settings['progress_bar_value_dynamic'],
                'data-duration' => $settings['progress_bar_animation_duration']['size'],
            ]);

            $this->add_render_attribute('eael-progressbar-line-fill', [
                'class' => 'eael-progressbar-line-fill',
                'style' => '-webkit-transition-duration:' . $settings['progress_bar_animation_duration']['size'] . 'ms;-o-transition-duration:' . $settings['progress_bar_animation_duration']['size'] . 'ms;transition-duration:' . $settings['progress_bar_animation_duration']['size'] . 'ms;',
            ]);

            echo '<div class="eael-progressbar-line-container ' . $settings['progress_bar_line_alignment'] . '">
                ' . ($settings['progress_bar_title'] ? sprintf('<%1$s class="%2$s">', $settings['progress_bar_title_html_tag'], 'eael-progressbar-title') . $settings['progress_bar_title'] . sprintf('</%1$s>', $settings['progress_bar_title_html_tag']) : '') . '

                <div ' . $this->get_render_attribute_string('eael-progressbar-line') . '>
                    ' . ($settings['progress_bar_show_count'] === 'yes' ? '<span class="eael-progressbar-count-wrap"><span class="eael-progressbar-count">0</span><span class="postfix">' . __('%', 'px-elements') . '</span></span>' : '') . '
                    <span ' . $this->get_render_attribute_string('eael-progressbar-line-fill') . '></span>
                </div>
            </div>';
        }

        if ($settings['progress_bar_layout'] == 'circle' || $settings['progress_bar_layout'] == 'circle_fill') {
            $wrap_classes[] = 'eael-progressbar-circle';
            $wrap_classes = apply_filters('eael_progressbar_circle_fill_wrap_class', $wrap_classes, $settings);

            $this->add_render_attribute(
                'eael-progressbar-circle',
                [
                    'class' => $wrap_classes,
                    'data-layout' => $settings['progress_bar_layout'],
                    'data-count' => $settings['progress_bar_value_type'] == 'static' ? $settings['progress_bar_value']['size'] : $settings['progress_bar_value_dynamic'],
                    'data-duration' => $settings['progress_bar_animation_duration']['size'],
                ]
            );

            echo '<div class="eael-progressbar-circle-container ' . $settings['progress_bar_circle_alignment'] . '">
                ' . ($settings['progress_bar_circle_box_shadow_box_shadow'] ? '<div class="eael-progressbar-circle-shadow">' : '') . '

                <div ' . $this->get_render_attribute_string('eael-progressbar-circle') . '>
                    <div class="eael-progressbar-circle-pie">
                        <div class="eael-progressbar-circle-half-left eael-progressbar-circle-half"></div>
                        <div class="eael-progressbar-circle-half-right eael-progressbar-circle-half"></div>
                    </div>
                    <div class="eael-progressbar-circle-inner"></div>
                    <div class="eael-progressbar-circle-inner-content">
                        ' . ($settings['progress_bar_title'] ? sprintf('<%1$s class="%2$s">', $settings['progress_bar_title_html_tag'], 'eael-progressbar-title') . $settings['progress_bar_title'] . sprintf('</%1$s>', $settings['progress_bar_title_html_tag']) : '') . '
                        ' . ($settings['progress_bar_show_count'] === 'yes' ? '<span class="eael-progressbar-count-wrap"><span class="eael-progressbar-count">0</span><span class="postfix">' . __('%', 'px-elements') . '</span></span>' : '') . '
                    </div>
                </div>

                ' . ($settings['progress_bar_circle_box_shadow_box_shadow'] ? '</div>' : '') . '
            </div>';
        }

        if (apply_filters('eael/pro_enabled', false)) {
            $circle_condition = $settings['progress_bar_layout'] == 'half_circle' || $settings['progress_bar_layout'] == 'half_circle_fill';
        } else {
            $circle_condition = $settings['progress_bar_layout'] == 'half_circle';
        }

        if ($circle_condition) {
            $wrap_classes[] = 'eael-progressbar-half-circle';
            $wrap_classes = apply_filters('eael_progressbar_half_circle_wrap_class', $wrap_classes, $settings);

            $this->add_render_attribute(
                'eael-progressbar-circle-half',
                [
                    'class' => 'eael-progressbar-circle-half',
                    'style' => '-webkit-transition-duration:' . $settings['progress_bar_animation_duration']['size'] . 'ms;-o-transition-duration:' . $settings['progress_bar_animation_duration']['size'] . 'ms;transition-duration:' . $settings['progress_bar_animation_duration']['size'] . 'ms;',
                ]
            );

            $this->add_render_attribute(
                'eael-progressbar-half-circle',
                [
                    'class' => $wrap_classes,
                    'data-layout' => $settings['progress_bar_layout'],
                    'data-count' => $settings['progress_bar_value_type'] == 'static' ? $settings['progress_bar_value']['size'] : $settings['progress_bar_value_dynamic'],
                    'data-duration' => $settings['progress_bar_animation_duration']['size'],
                ]
            );

            echo '<div class="eael-progressbar-circle-container ' . $settings['progress_bar_circle_alignment'] . '">
                <div ' . $this->get_render_attribute_string('eael-progressbar-half-circle') . '>
                    <div class="eael-progressbar-circle">
                        <div class="eael-progressbar-circle-pie">
                            <div ' . $this->get_render_attribute_string('eael-progressbar-circle-half') . '></div>
                        </div>
                        <div class="eael-progressbar-circle-inner"></div>
                    </div>
                    <div class="eael-progressbar-circle-inner-content">
                        ' . ($settings['progress_bar_title'] ? sprintf('<%1$s class="%2$s">', $settings['progress_bar_title_html_tag'], 'eael-progressbar-title') . $settings['progress_bar_title'] . sprintf('</%1$s>', $settings['progress_bar_title_html_tag']) : '') . '
                        ' . ($settings['progress_bar_show_count'] === 'yes' ? '<span class="eael-progressbar-count-wrap"><span class="eael-progressbar-count">0</span><span class="postfix">' . __('%', 'px-elements') . '</span></span>' : '') . '
                    </div>
                </div>
                <div class="eael-progressbar-half-circle-after">
                    ' . ($settings['progress_bar_prefix_label'] ? sprintf('<span class="eael-progressbar-prefix-label">%1$s</span>', $settings['progress_bar_prefix_label']) : '') . '
                    ' . ($settings['progress_bar_postfix_label'] ? sprintf('<span class="eael-progressbar-postfix-label">%1$s</span>', $settings['progress_bar_postfix_label']) : '') . '
                </div>
            </div>';
        }
        do_action('add_eael_progressbar_block', $settings, $this, $wrap_classes);
    }
}
