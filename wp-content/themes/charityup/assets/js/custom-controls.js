jQuery(document).ready(function($) {
    "use strict";
    /**
     * ============================================
     * Sortable Repeater Custom Control
     * ============================================
     */

    // Update the values for all our input fields and initialise the sortable repeater
    $('.sortable_repeater_control').each(function() {
        // If there is an existing customizer value, populate our rows
        var defaultValuesArray = $(this).find('.customize-control-sortable-repeater').val().split(',');
        var numRepeaterItems = defaultValuesArray.length;

        if (numRepeaterItems > 0) {
            // Add the first item to our existing input field
            $(this).find('.repeater-input').val(defaultValuesArray[0]);
            // Create a new row for each new value
            if (numRepeaterItems > 1) {
                var i;
                for (i = 1; i < numRepeaterItems; ++i) {
                    charityUpAppendRow($(this), defaultValuesArray[i]);
                }
            }
        }
    });

    // Make our Repeater fields sortable
    $(this).find('.sortable_repeater.sortable').sortable({
        update: function(event, ui) {
            charityUpGetAllInputs($(this).parent());
        }
    });

    // Remove item starting from it's parent element
    $('.sortable_repeater.sortable').on('click', '.customize-control-sortable-repeater-delete', function(event) {
        event.preventDefault();
        var numItems = $(this).parent().parent().find('.repeater').length;

        if (numItems > 1) {
            $(this).parent().slideUp('fast', function() {
                var parentContainer = $(this).parent().parent();
                $(this).remove();
                charityUpGetAllInputs(parentContainer);
            })
        } else {
            $(this).parent().find('.repeater-input').val('');
            charityUpGetAllInputs($(this).parent().parent().parent());
        }
    });

    // Add new item
    $('.customize-control-sortable-repeater-add').click(function(event) {
        event.preventDefault();
        charityUpAppendRow($(this).parent());
        charityUpGetAllInputs($(this).parent());
    });

    // Refresh our hidden field if any fields change
    $('.sortable_repeater.sortable').change(function() {
        charityUpGetAllInputs($(this).parent());
    })

    // Add https:// to the start of the URL if it doesn't have it
    $('.sortable_repeater.sortable').on('blur', '.repeater-input', function() {
        var url = $(this);
        var val = url.val();
        if (val && !val.match(/^.+:\/\/.*/)) {
            // Important! Make sure to trigger change event so Customizer knows it has to save the field
            url.val('https://' + val).trigger('change');
        }
    });

    // Append a new row to our list of elements
    function charityUpAppendRow($element, defaultValue = '') {
        var newRow = '<div class="repeater" style="display:none"><input type="text" value="' + defaultValue + '" class="repeater-input" placeholder="https://" /><span class="dashicons dashicons-sort"></span><a class="customize-control-sortable-repeater-delete" href="#"><span class="dashicons dashicons-no-alt"></span></a></div>';

        $element.find('.sortable').append(newRow);
        $element.find('.sortable').find('.repeater:last').slideDown('slow', function() {
            $(this).find('input').focus();
        });
    }

    // Get the values from the repeater input fields and add to our hidden field
    function charityUpGetAllInputs($element) {
        var inputValues = $element.find('.repeater-input').map(function() {
            return $(this).val();
        }).toArray();
        // Add all the values from our repeater fields to the hidden field (which is the one that actually gets saved)
        $element.find('.customize-control-sortable-repeater').val(inputValues);
        // Important! Make sure to trigger change event so Customizer knows it has to save the field
        $element.find('.customize-control-sortable-repeater').trigger('change');
    }

});

/**
 * Remove attached events from the Upsell Section to stop panel from being able to open/close
 */
(function(api) {
    api.sectionConstructor['charityup-upsell'] = api.Section.extend({

        // Remove events for this section.
        attachEvents: function() {},

        // Ensure this section is active. Normally, sections without contents aren't visible.
        isContextuallyActive: function() {
            return true;
        }
    });

    const charityUpSectionLists = ['about_section', 'banner_section', 'blog_section', 'cause_section', 'counter_section', 'event_section', 'team_section'];
    charityUpSectionLists.forEach(charityUpHomepageScroll);

    function charityUpHomepageScroll(item, index) {
        // Detect when the front page sections section is expanded (or closed) so we can adjust the preview accordingly.
        wp.customize.section('charityup_' + item, function(section) {
            section.expanded.bind(function(isExpanding) {
                // Value of isExpanding will = true if you're entering the section, false if you're leaving it.
                wp.customize.previewer.send(item, { expanded: isExpanding });
            });
        });
    }
})(wp.customize);