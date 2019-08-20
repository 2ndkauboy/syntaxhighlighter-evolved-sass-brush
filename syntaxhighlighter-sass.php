<?php
/**
 * SyntaxHighlighter Evolved: SASS Brush
 *
 * @package     SyntaxHighlighterEvolvedSassBrush
 * @author      Bernhard Kau
 * @license     GPLv3
 *
 * @wordpress-plugin
 * Plugin Name: SyntaxHighlighter Evolved: SASS Brush
 * Plugin URI: https://kau-boys.de
 * Description: Adds support for the SASS language to the SyntaxHighlighter Evolved plugin.
 * Version: 1.2.0
 * Author: Bernhard Kau
 * Author URI: https://kau-boys.de
 * License: GPLv3
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt
 */

// SyntaxHighlighter Evolved doesn't do anything until early in the "init" hook, so best to wait until after that.
add_action( 'init', 'syntaxhighlighter_sass_regscript' );

// Tell SyntaxHighlighter Evolved about this new language/brush and name it.
add_filter( 'syntaxhighlighter_brushes', 'syntaxhighlighter_sass_addlang' );
add_filter( 'syntaxhighlighter_brush_names', 'syntaxhighlighter_sass_addname' );

/**
 *  Register the brush file with WordPress
 */
function syntaxhighlighter_sass_regscript() {
	wp_register_script( 'syntaxhighlighter-brush-sass', plugins_url( 'shBrushSass.js', __FILE__ ), array( 'syntaxhighlighter-core' ), '1.2.0', true );
}

/**
 * Filter SyntaxHighlighter Evolved's language array
 *
 * @param array $brushes The available brushes.
 *
 * @return array
 */
function syntaxhighlighter_sass_addlang( $brushes ) {
	$brushes['sass'] = 'sass';
	$brushes['scss'] = 'sass';

	return $brushes;
}

/**
 * Filter SyntaxHighlighter Evolved's name array
 *
 * @param array $names The brushes names.
 *
 * @return array
 */
function syntaxhighlighter_sass_addname( $names ) {
	$names['sass'] = 'SASS / SCSS';

	return $names;
}
