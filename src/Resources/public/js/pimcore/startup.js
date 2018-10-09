pimcore.registerNS("pimcore.plugin.YouweDataDictionaryBundle");

pimcore.plugin.YouweDataDictionaryBundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.YouweDataDictionaryBundle";
    },

    initialize: function () {
        pimcore.plugin.broker.registerPlugin(this);
    },

    pimcoreReady: function (params, broker) {
        // alert("YouweDataDictionaryBundle ready!");
    }
});

var YouweDataDictionaryBundlePlugin = new pimcore.plugin.YouweDataDictionaryBundle();
