
;(function ( $, window, document, undefined ) {
    'use strict';
    var pluginName = "menuButton";
    var menuClass = ".button-dropdown";
    var defaults = {
        propertyName: "value"
    };

    // The actual plugin constructor
    function Plugin( element, options ) {

        //SET OPTIONS
        this.options = $.extend( {}, defaults, options );
        this._defaults = defaults;
        this._name = pluginName;

        //REGISTER ELEMENT
        this.$element = $(element);

        //INITIALIZE
        this.init();
    }

    Plugin.prototype = {
        constructor: Plugin,

        init: function() {
            // WE DON'T STOP PROPGATION SO CLICKS WILL AUTOMATICALLY
            // TOGGLE AND REMOVE THE DROPDOWN & OVERLAY
            this.toggle();
        },

        toggle: function(el, options) {
            if(this.$element.data('dropdown') === 'show') {
                this.hideMenu();
            }
            else {
                this.showMenu();
            }
        },

        showMenu: function() {
            this.$element.data('dropdown', 'show');
            this.$element.find('ul').show();

            if(this.$overlay) {
                this.$overlay.show();
            }
            else {
                this.$overlay = $('<div style="position: fixed; top: 0px;left: 0px; right: 0px; bottom: 0px; z-index: 999;"></div>');
                this.$element.append(this.$overlay);
            }
        },

        hideMenu: function() {
            this.$element.data('dropdown', 'hide');
            this.$element.find('ul').hide();
            this.$overlay.hide();
        }
    };

    // A really lightweight plugin wrapper around the constructor,
    // preventing against multiple instantiations
    $.fn[pluginName] = function ( options ) {
        return this.each(function () {

            // TOGGLE BUTTON IF IT EXISTS
            if ($.data(this, "plugin_" + pluginName)) {
                $.data(this, "plugin_" + pluginName).toggle();
            }
            // OTHERWISE CREATE A NEW INSTANCE
            else {
                $.data(this, "plugin_" + pluginName, new Plugin( this, options ));
            }
        });
    };


    //DELEGATE CLICK EVENT FOR DROPDOWN MENUS
    $(document).on('click', '[data-buttons=dropdown]', function(e) {
        var $dropdown = $(e.currentTarget);
        $dropdown.menuButton();
    });

    //IGNORE CLICK EVENTS FROM DISPLAY BUTTON IN DROPDOWN
    $(document).on('click', '[data-buttons=dropdown] > a', function(e) {
        e.preventDefault();
    });

})( jQuery, window, document);