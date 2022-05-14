<?php
/*
 * In der functions.php werden über Actions, Filter & Hooks sämtliche WordPress Funktionen de-/aktiviert bzw. angepasst
 * https://developer.wordpress.org/themes/basics/theme-functions/
 * https://kinsta.com/de/blog/wordpress-hooks/
 *
 * Offizielle Doku zu WordPress Themes: https://developer.wordpress.org/themes/
 * Offizielle Doku zum Gutenberg Editor: https://developer.wordpress.org/block-editor/
 *
 * Auch eigene PHP-Funktionen, die man in den Teplates verwenden möchte, können in die functions.php geschrieben werden
 */

add_filter('upload_mimes', function ($mimes = array()) {
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    $mimes['zip'] = 'application/zip';
    return $mimes;
});


/* ---- Theme Setups ----
* Dieser Hook wird bei jedem Laden der Seite aufgerufen, nachdem das Theme initialisiert wurde. Es wird im Allgemeinen verwendet, um grundlegende Setup-, Registrierungs- und Initiierungsaktionen für ein Theme auszuführen.
* https://developer.wordpress.org/reference/hooks/after_setup_theme/
*/
add_action('after_setup_theme', function () {

    // Title Tag in <head> : <title>...</title>
    add_theme_support('title-tag');

    /* Pfad zur Sprachdatei
    * load_textdomain() gibt den Namen der Übersetzungsdatei (beliebiger Name) und den Pfad an, wo diese zu finden ist.
    * https://developer.wordpress.org/reference/functions/load_textdomain/
    * get_template_directory() liefert den absoluten Server-Pfad zum Theme-Verzeichnis (ZB: "/var/www/html/wp-content/themes/webdev-theme") https://developer.wordpress.org/reference/functions/get_template_directory/
    *
    * Sämtliche Texte die wir in unserer functions.php oder in Templates schreiben und im Frontend oder Backend angezeigt werden, sollten über die Textdomain übersetzbar sein!
    * die Ausgabe im PHP wird in der Funktion als echo "_e('Zu übersetzender Text','TEXTDOMAIN' )" oder return "__('Zu übersetzender Text','TEXTDOMAIN' )" eingebunden
    * https://developer.wordpress.org/reference/functions/_e/
    */
    load_textdomain('wifi', get_template_directory() . '/languages');

    /*
     * add_theme_support() registriert die Themenunterstützung für bestimmte WordPress-Funktionen
     * https://developer.wordpress.org/reference/functions/add_theme_support/
     */

    // Aktivierung von Beitragsbildern
    add_theme_support('post-thumbnails');

    // WordPress HTML5-Markup
    add_theme_support('html5', array(
        'search-form',
        'gallery',
        'caption',
        'style',
        'script',
        'comment-list',
        'comment-form'
    ));

    //Suport fur Custom Logo
    add_theme_support('custom-logo', array(
        'height' => 60,
        'width' => 100,
        'flex-height' => false,
        'flex-width' => true,
    ));

     //Menus registrieren
     register_nav_menus(array(
         'primary' => __('Hauptnavigation', 'wifi'),
         'footer' => __('Footernavigation', 'wifi'),
     ));


    /*Zusätzliche Bild grösse */
    add_image_size('post-image', 800, 400, array('center', 'top'));

    /* -- Gutenberg Editor --
    * https://developer.wordpress.org/block-editor/developers/themes/theme-support/
    * Offizielle Doku zum Gutenberg Editor: https://developer.wordpress.org/block-editor/
    */

    // Theme für Gutenberg optimiert - Lade default Block styles
    add_theme_support('wp-block-styles');

    // aktiviere wide & fullwidth Layouts
    add_theme_support('align-wide');

    // Responsive Embeds (ZB. YouTube Videos, Iframes) erlauben
    add_theme_support('responsive-embeds');

    // Block Vorlagen deaktivieren
    remove_theme_support('core-block-patterns');

    // Adminbar im Frontend deaktivieren (wenn aktiviert, sollten die Syles für Navigation angepasst werden)
    //add_filter('show_admin_bar', '__return_false');

});

/* ---- CSS & JS in <head> bzw. vor dem </body> einfügen [ wp_head() , wp_footer() ] ----
* https://developer.wordpress.org/reference/functions/wp_enqueue_script/
* der "Hanle" muss eindeutig sein
* Liste aller Scripten, die WordPress bereits inkludiert hat: https://developer.wordpress.org/reference/functions/wp_enqueue_script/#default-scripts-and-js-libraries-included-and-registered-by-wordpress
*/
add_action('wp_enqueue_scripts', function () {

    $theme_version = wp_get_theme()->get('Version');

    wp_enqueue_style('normalize-css', get_template_directory_uri() . '/assets/normalize/normalize.min.css');
    wp_enqueue_style('icons-css', get_template_directory_uri() . '/assets/icons/style.min.css');
    wp_enqueue_style('lightbox-css', get_template_directory_uri() . '/assets/lightbox/css/lightbox.min.css');
    wp_enqueue_style('webdev-css', get_template_directory_uri() . '/style.css');
    
    //CSS Dataien im Theme registrieren
    wp_register_style('owl-css', get_template_directory_uri() . '/assets/owl-carousel/assets/owl.carousel.min.css');
    wp_enqueue_style('owl-theme-css', get_template_directory_uri() . '/assets/owl-carousel/assets/owl.theme.default.min.css');

    //JS Dataien im Theme einbinden
    wp_enqueue_script('lightbox', get_template_directory_uri() . '/assets/lightbox/js/lightbox.min.js', array('jquery'), $theme_version, true);
    wp_enqueue_script('webdev-scripts', get_template_directory_uri() . '/assets/scripts.js', array('jquery'), $theme_version, true);


    //JS Dataien im Theme registrieren
    wp_register_script('owl-script', get_template_directory_uri() . '/assets/owl-carousel/owl.carousel.min.js', array('jquery'), $theme_version, true);


});


//Sidebar registrieren
add_action('widgets_init', function(){

     register_sidebar(array(
       'name' => __('Sidebar fur Blogdetailseite', 'wifi'),
       'id' => 'sidebar_posts',
       'before_widget' => '<div class="widget %2$s">', // HTML-Markup vor dem Widget. "%2$s" ist ein Platzhalter für die Widget-Klassen ("%1$s" wäre der Platzhalter für die Widget-ID falls notwendig)
       'after_widget' => '</div>', // HTML-Markup nach dem Widget.
       'before_title' => '<h4 class="widget-title"><span>', // HTML-Markup vor dem Titel (Text).
       'after_title' => '</span></h4>' // HTML-Markup nach dem Titel (Text).

     ));
});


// Register Custom Post Type
function post_type_references() {

	$labels = array(
		'name'                  => _x( 'Referenzen', 'Post Type General Name', 'wifi' ),
		'singular_name'         => _x( 'Referenz', 'Post Type Singular Name', 'wifi' ),
		'menu_name'             => __( 'Referenzen', 'wifi' ),
		'name_admin_bar'        => __( 'Post Type', 'wifi' ),
		'archives'              => __( 'Item Archives', 'wifi' ),
		'attributes'            => __( 'Item Attributes', 'wifi' ),
		'parent_item_colon'     => __( 'Parent Item:', 'wifi' ),
		'all_items'             => __( 'Alle Referenzen', 'wifi' ),
		'add_new_item'          => __( 'Add New Item', 'wifi' ),
		'add_new'               => __( 'Neue Referenz', 'wifi' ),
		'new_item'              => __( 'New Item', 'wifi' ),
		'edit_item'             => __( 'Referenz bearbeiten', 'wifi' ),
		'update_item'           => __( 'Referenz aktualisieren', 'wifi' ),
		'view_item'             => __( 'View Item', 'wifi' ),
		'view_items'            => __( 'View Items', 'wifi' ),
		'search_items'          => __( 'Search Item', 'wifi' ),
		'not_found'             => __( 'Not found', 'wifi' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'wifi' ),
		'featured_image'        => __( 'Featured Image', 'wifi' ),
		'set_featured_image'    => __( 'Set featured image', 'wifi' ),
		'remove_featured_image' => __( 'Remove featured image', 'wifi' ),
		'use_featured_image'    => __( 'Use as featured image', 'wifi' ),
		'insert_into_item'      => __( 'Insert into item', 'wifi' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'wifi' ),
		'items_list'            => __( 'Items list', 'wifi' ),
		'items_list_navigation' => __( 'Items list navigation', 'wifi' ),
		'filter_items_list'     => __( 'Filter items list', 'wifi' ),
	);
	$args = array(
		'label'                 => __( 'Referenz', 'wifi' ),
		'description'           => __( 'CPT fur unsere Testimonials/Referenzen', 'wifi' ),
		'labels'                => $labels,
		'supports'              => array( 'title' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 10,
		'menu_icon'             => 'dashicons-admin-users',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => false,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'references', $args );

}
add_action( 'init', 'post_type_references', 0 );



/* --- Funktonen für das Plugin ACF-Pro --- */

/* Bedingung: Prüfe ob ACF Pro installiert und aktiviert ist
* die PHP Funktion "function_exists()" prüft ob es diese Funktion mit dem Funktionsnamen gibt - "acf_add_options_page()" wird über das Plugin ACF-Pro deklariert
* wenn (if) das Plugin ACF-Pro installiert ist, existiert diese Funktion und wir können ACF-Option-Pages und/oder ACF-Gutenberg-Blöcke erstellen
* sonst (else) geben wir im WordPress Adminbereich eine Fehlermeldung aus, dass diese Plugin benötigt wird
* https://www.php.net/manual/de/function.function-exists.php
*/
if (function_exists('acf_add_options_page')) {

    /* ACF Option Page erstellen
    * https://www.advancedcustomfields.com/resources/acf_add_options_page/
    */
    acf_add_options_page(array(
        'page_title' => 'Theme Einstellungen',
        'menu_title' => 'Theme Einstellungen',
        'menu_slug' => 'theme-settings',
        'capability' => 'edit_pages',
        'position' => 100,
        'redirect' => false,
        'post_id' => 'options',
        'icon_url' => 'dashicons-smiley', //https://developer.wordpress.org/resource/dashicons/#smiley
        'update_button' => __('Änderungen speichern', 'wifi'),
        'updated_message' => __('Einstellungen wurden gespeichert', 'wifi'),
    ));


    /* Hinzufügen von Gutenberg-Block-Kategorie
    * https://developer.wordpress.org/reference/hooks/block_categories/
    * https://wordpress.stackexchange.com/questions/315511/gutenberg-editor-add-a-custom-category-as-wrapper-for-custom-blocks
    */

    add_filter('block_categories_all', function ($categories) {
       

        /* "array_merge()" fügt zwei oder mehrere arrays zusammen: https://www.php.net/manual/de/function.array-merge.php  */

        
        return array_merge(
            array(
                array(
                    'slug' => 'wifi-category',
                    'title' => __('Eigene', 'wifi')
                ),
            ),
            $categories
        );
    }, 10, 2);
  /*

  /* -- ACF Gutenberg-Blöcke erstellen --

    * https://www.advancedcustomfields.com/resources/acf_register_block_type/

    */

    add_action('acf/init', 'my_acf_init');

    function my_acf_init()

    {



        // check function exists

        if (function_exists('acf_register_block')) {



            // register a block

            acf_register_block(array(

                'name' => 'wifi_teaser', // Interner Name

                'title' => __('Teaser', 'wifi'), // Titel (Anzeigename)

                'description' => __('Teaser 3-Spalten', 'wifi'), // Beschreibung (wird im Editor bei der Blockauswahl angezeigt)

                'supports' => array('anchor' => true), // Ermöglicht bei den Block-Einstellungen eine ID (Anchor) einzufügen

                'render_template' => 'template-parts/block-teaser.php', // Pfad zum Template (HTML & PHP) des Gutenberg-Block

                'category' => 'wifi-category', // in welcher Kategorie der Block erscheint - in diesem Fall in unserer eigenen Kategorie, die mit "add_action('block_categories'..)" angelegt wurde

                'icon' => 'post-status', // https://developer.wordpress.org/resource/dashicons/#smiley

                'keywords' => array('Teaser', 'Neuigkeiten'), // optional für die Suche im Editor

                'post_types' => array('posts', 'page'), // bei welchen Post-Types der Block angezeigt wird bzw. verwendet werden kann. In diesem Fall bei Seiten (page) und Beiträgen (post)

                'align' => false, // optional ( left, center, right, wide u. full)

                'mode' => false, // verhindert das Links im Editor nicht weiterleiten, sondern die Bearbeitung des ACF-Blocks erzwungen wird

            ));

        }

    }

} else {
    /* Backend-Fehlermeldung, wenn ACF-Pro nicht installiert ist
    * https://developer.wordpress.org/reference/hooks/admin_notices/
    * https://digwp.com/2016/05/wordpress-admin-notices/
    */
    add_action('admin_notices', function () {
        ?>
        <div class="error notice">
            <p><?php _e('<b>ACHTUNG: </b> Das Plugin "ACF Pro" muss installiert werden!', 'wifi'); ?></p>
        </div>
        <?php
    });
}