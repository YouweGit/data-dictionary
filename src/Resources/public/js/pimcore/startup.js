pimcore.registerNS("pimcore.plugin.dataDictionaryBundle");

pimcore.plugin.dataDictionaryBundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.dataDictionaryBundle";
    },

    initialize: function () {
        pimcore.plugin.broker.registerPlugin(this);
    },

    pimcoreReady: function (params, broker) {
        var user = pimcore.globalmanager.get('user');

        if (user.isAllowed('data_flow_permission')) {

            //Add item to settings menu
            var importMenu = new Ext.Action({
                text: t('Show current dataflow'),
                icon: '/bundles/pimcoreadmin/img/flat-color-icons/tree_structure.svg',
                handler: this.openPanel.bind(this)
            });

            layoutToolbar.settingsMenu.add(importMenu);
        }
    },


    /**
     * Creates a new tab panel with a iFrame inside
     *
     * @param panelId
     * @returns {Ext.panel.Panel|Ext.dashboard.Panel|Ext.form.Panel|Ext.grid.Panel|Ext.tab.Panel|Ext.tree.Panel|*}
     */
    createPanel: function(panelId) {
        return new Ext.Panel({
            id: panelId,
            title: t('Data flow'),
            iconCls: 'pimcore_icon_multihref',
            border: false,
            layout: 'fit',
            closable: true,
            items: [{
                html: '<iframe src="/admin/data-dictionary" width="100%" height="100%" frameborder="0"></iframe>',
                autoHeight: true
            }]
        });
    },

    /**
     * Opens the tab panel or creates it
     */
    openPanel: function () {

        var panelId = "dataDictionaryFlow";
        var tabPanels = Ext.getCmp('pimcore_panel_tabs');

        try {
            tabPanels.activate(panelId);
        }
        catch (e) {
            var panel = this.createPanel(panelId);

            tabPanels.add(panel);
            tabPanels.setActiveTab(panelId);
        }

        pimcore.layout.refresh();
    }
});

var dataDictionaryBundlePlugin = new pimcore.plugin.dataDictionaryBundle();
