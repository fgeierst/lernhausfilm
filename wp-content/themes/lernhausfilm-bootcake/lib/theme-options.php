<?php
/**
 * Defines customizer options
 *
 * @package Customizer Library themescode
 */

function customizer_library_themescode_options() {


    $options = array();

    $sections = array();

    $panels = array();

    $options['sections'] = $sections;


//Site bootcake Options

$section = 'themescode-bootcake-layout-section';

    $sections[] = array(
        'id' => $section,
        'title' => __('Bootcake Blog Options', 'bootcake'),
        'priority' => '30',
        'description' => __('', 'bootcake')
    );
    $choices = array(
        'themescode-left-sidebar' => 'Left Sidebar',
        'themescode-right-sidebar' => 'Right Sidebar'
    );

    $options['themescode-bootcake-layout'] = array(
        'id' => 'themescode-bootcake-layout',
        'label'   => __('Blog Layout', 'bootcake'),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'themescode-left-sidebar',
        'description' => __('', 'bootcake')
    );

    $choices = array(
        'themescode-left-sidebar' => 'Left Sidebar',
        'themescode-right-sidebar' => 'Right Sidebar'
    );


    $options['themescode-Singlepage-layout'] = array(
        'id' => 'themescode-Singlepage-layout',
        'label'   => __('Single Page Layout', 'bootcake'),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'themescode-right-sidebar',
        'description' => __('', 'bootcake')
    );



    $options['themescode-change-read-more'] = array(
        'id' => 'themescode-change-read-more',
        'label'   => __( 'Change Read More Text', 'bootcake' ),
        'section' => $section,
        'type'    => 'text',
        'default' => 'Read More',
    );


    // Colors
    $section = 'colors';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Colors', 'bootcake' ),
        'priority' => '80'
    );


    $options['themescode-body-text-color'] = array(
        'id' => 'themescode-body-text-color',
        'label'   => __( 'Body Color', 'bootcake' ),
        'section' => $section,
        'type'    => 'color',
        'default' =>'#343434',
    );

    $options['tcode-theme-color'] = array(
        'id' => 'tcode-theme-color',
        'label'   => __( 'Theme Color', 'bootcake' ),
        'section' => $section,
        'type'    => 'color',
        'default' => '#ff8a3c',
    );

    // Font Options

    $section = 'themescode-typography-section';
    $font_choices = customizer_library_get_font_choices();

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Typhography  Options', 'bootcake' ),
        'priority' => '80'
    );

    $options['themescode-body-font-name'] = array(
        'id' => 'themescode-body-font-name',
        'label'   => __( 'select Google Font', 'bootcake' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $font_choices,
        'default' => 'Open Sans'
    );

   $options['themescode-bodyfs'] = array(
        'id' => 'themescode-bodyfs',
        'label'   => __( 'Body Font Size', 'bootcake' ),
        'section' => $section,
        'type'    => 'text',
        'default' => 14,
    );

    $options['themescode-heading-one-font'] = array(
        'id'      => 'themescode-heading-one-font',
        'label'   => __( 'Title Font Size', 'bootcake' ),
        'section' => $section,
        'type'    => 'text',
        'default' => '18'
    );

    $options['themescode-heading-two-font'] = array(
        'id'      => 'themescode-menu-font',
        'label'   => __( 'Menu Font Size', 'bootcake' ),
        'section' => $section,
        'type'    => 'text',
        'default' => '14'
    );

        // Adds the sections to the $options array
    $options['sections'] = $sections;

    // Adds the panels to the $options array
    $options['panels'] = $panels;

    $customizer_library = Customizer_Library::Instance();
    $customizer_library->add_options( $options );

    // To delete custom mods use: customizer_library_remove_theme_mods();

}

     add_action( 'init', 'customizer_library_themescode_options' );
