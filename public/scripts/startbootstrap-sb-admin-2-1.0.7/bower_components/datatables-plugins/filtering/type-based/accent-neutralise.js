/**
 * When search a table with accented characters, it can be frustrating to have
 * an input such as _Zurich_ not match _Z�rich_ in the table (`u !== �`). This
 * type based search plug-in replaces the built-in string formatter in
 * DataTables with a function that will remove replace the accented characters
 * with their unaccented counterparts for fast and easy filtering.
 *
 * Note that with the accented characters being replaced, a search input using
 * accented characters will no longer match. The second example below shows
 * how the function can be used to remove accents from the search input as well,
 * to mitigate this problem.
 *
 *  @summary Replace accented characters with unaccented counterparts
 *  @name Accent neutralise
 *  @author Allan Jardine
 *
 *  @example
 *    $(document).ready(function() {
 *        $('#example').dataTable();
 *    } );
 *
 *  @example
 *    $(document).ready(function() {
 *        var table = $('#example').dataTable();
 *
 *        // Remove accented character from search input as well
 *        $('#myInput').keyup( function () {
 *          table
 *            .search(
 *              jQuery.fn.DataTable.ext.type.search.string( this )
 *            )
 *            .draw()
 *        } );
 *    } );
 */

jQuery.fn.DataTable.ext.type.search.string = function ( data ) {
    return ! data ?
        '' :
        typeof data === 'string' ?
            data
                .replace( /?/g, '?')
                .replace( /?/g, '?')
                .replace( /?/g, '?')
                .replace( /?/g, '?')
                .replace( /?/g, '?')
                .replace( /?/g, '?')
                .replace( /?/g, '?')
                .replace( /\n/g, ' ' )
                .replace( /�/g, 'a' )
                .replace( /�/g, 'e' )
                .replace( /�/g, 'i' )
                .replace( /�/g, 'o' )
                .replace( /�/g, 'u' )
                .replace( /�/g, 'e' )
                .replace( /�/g, 'i' )
                .replace( /�/g, 'o' )
                .replace( /�/g, 'e' )
                .replace( /�/g, 'i' )
                .replace( /�/g, 'u' )
                .replace( /�/g, 'c' )
                .replace( /�/g, 'i' ) :
            data;
};
