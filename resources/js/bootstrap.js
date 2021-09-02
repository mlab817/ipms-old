window._ = require('lodash');
window.marked = require('marked');
import '@github/markdown-toolbar-element';
import '@github/details-dialog-element';
import '@github/clipboard-copy-element';
import '@github/auto-complete-element';

function formatNumber(val) {
    return val && parseFloat(val).toLocaleString('en-US', { minimumFractionDigits: 2 })
}

function removeCommas(val) {
    return parseFloat(val.toString().replace(',',''))
}

const options = {
    // used to match objects when diffing arrays, by default only === operator is used
    objectHash: function(obj) {
        // this function is used only to when objects are not equal by ref
        return obj._id || obj.id;
    },
    arrays: {
        // default true, detect items moved inside the array (otherwise they will be registered as remove+add)
        detectMove: true,
        // default false, the value of items moved is not included in deltas
        includeValueOnMove: false
    },
    textDiff: {
        minLength: 60
    },
    propertyFilter: function(name, context) {
        return name.slice(0, 1) !== '$';
    },
    cloneDiffValues: false
}

window.jsondiffpatch = require('jsondiffpatch').create(options);
window.formatters = require('jsondiffpatch').formatters

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {
    console.log(e)
}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */
//
// import Echo from 'laravel-echo';
//
// console.log(Echo)
//
// window.Pusher = require('pusher-js');
//
// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });
