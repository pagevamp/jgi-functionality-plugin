<?php
function registerCommonSettings($wp_customize)
{
    $wp_customize->add_panel('common_settings', array(
        'title' => 'Common Settings',
        'description' => 'This is panel Description',
        'priority' => 10,
    ));
    addSections($wp_customize);
    addControls($wp_customize);
}

add_action('customize_register', 'registerCommonSettings');

function addSections($wp_customize)
{
    $wp_customize->add_section('header_settings', array(
        'title' => 'Header Settings',
        'priority' => 1,
        'panel' => 'common_settings',
    ));
    $wp_customize->add_section('social_media_links', array(
        'title' => 'Social Media Links',
        'priority' => 2,
        'panel' => 'common_settings',
    ));
    $wp_customize->add_section('footer_settings', array(
        'title' => 'Footer Settings',
        'priority' => 3,
        'panel' => 'common_settings',
    ));

    $wp_customize->add_section('contact_settings', array(
        'title' => 'Contact Settings',
        'priority' => 5,
        'panel' => 'common_settings',
    ));

}

function addControls($wp_customize)
{
    addHeaderSettings($wp_customize);
    addSocialMediaSettings($wp_customize);
    addFooterSettings($wp_customize);
    addContactSettings($wp_customize);

}

function addHeaderSettings($wp_customize)
{
    $wp_customize->add_setting('site_logo', []);

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'site_logo', array(
        'label' => 'Default Logo',
        'description' => 'Preferred size 200px by 50 px',
        'section' => 'header_settings',
        'settings' => 'site_logo',
    )));


}

function addSocialMediaSettings($wp_customize)
{

    $wp_customize->add_setting('linkedin_link', []);

    $wp_customize->add_control('linkedin_link', array(
        'label' => 'LinkedIn Link',
        'type' => 'text',
        'section' => 'social_media_links',
        'settings' => 'linkedin_link',
    ));

}

function addFooterSettings($wp_customize)
{
    $wp_customize->add_setting('footer_logo', []);

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'footer_logo', array(
        'label' => 'Footer Logo',
        'description' => 'Preferred size 130px by 50 px',
        'section' => 'footer_settings',
        'settings' => 'footer_logo',
    )));

    $wp_customize->add_setting('copyright_text', []);

    $wp_customize->add_control('copyright_text', array(
        'label' => 'Copyright Text',
        'type' => 'text',
        'section' => 'footer_settings',
        'settings' => 'copyright_text',
    ));

    $wp_customize->add_setting('footer_bg_image', []);

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'footer_bg_image',array(
        'label' => 'Footer Background Image',
        'description' => 'Preferred size 1600px by 820 px',
        'section' => 'footer_settings',
        'settings' => 'footer_bg_image',
    )));

}

function addContactSettings($wp_customize)
{
    $wp_customize->add_setting('phone1', []);
    $wp_customize->add_control('phone1', array(
        'label' => 'Contact No 1',
        'type' => 'text',
        'section' => 'contact_settings',
        'settings' => 'phone1',
    ));
    $wp_customize->add_setting('phone2', []);
    $wp_customize->add_control('phone2', array(
        'label' => 'Contact No 2',
        'type' => 'text',
        'section' => 'contact_settings',
        'settings' => 'phone2',
    ));


    $wp_customize->add_setting('contact_email', []);
    $wp_customize->add_control('contact_email', array(
        'label' => 'Contact Email',
        'type' => 'text',
        'section' => 'contact_settings',
        'settings' => 'contact_email',
    ));
}
