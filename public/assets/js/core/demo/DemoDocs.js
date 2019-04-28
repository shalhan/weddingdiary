(function(namespace, $) {
	"use strict";

	var DemoDocs = function() {
		// Create reference to this instance
		var o = this;
		// Initialize app when document is ready
		$(document).ready(function() {
			o.initialize();
		});

	};
	var p = DemoDocs.prototype;

	// =========================================================================
	// INIT
	// =========================================================================

	p.menuBuild = false;

	// =========================================================================
	// INIT
	// =========================================================================

	p.initialize = function() {
		this._enableEvents();
		
		this._initTasks();
	};

	// =========================================================================
	// EVENTS
	// =========================================================================

	// events
	p._enableEvents = function() {
		var o = this;

		$('.main-menu').on('ready', function(e) {
			o._handleMenuReady(e);
		});
		$('#sidebar').on('activate.bs.scrollspy', function() {
			$('.main-menu li > a').removeClass('active');
			$('.main-menu li.active > a').addClass('active');
			$('.main-menu li').removeClass('expanded');
			boostbox.App._invalidateMenu();
		});
	};

	// handlers
	p._handleMenuReady = function(e) {
		if (this.menuBuild) {
			return;
		}

		this._buildMenu();
		this.menuBuild = true;

		$('.main-menu').addClass('nav');
		$('body').scrollspy({target: '#sidebar', offset: 50});
	};

	// =========================================================================
	// MENU
	// =========================================================================

	p._buildMenu = function() {
		var expandedMenu = $('.main-menu > li.expanded > ul');
		var tree = this._getMenuStructure();
		var i = 0;
		for (i; i < tree.length; i++) {
			var node = tree[i];
			if (node.children.length > 0) {
				var subitemHTML = ('<li><a href="#' + node.id + '"><span class="expand-sign">+</span> <span class="title">' + node.header + '</span></a></li>');
				var subitem = $(subitemHTML).appendTo(expandedMenu);
				this._addSubMenu(subitem, node.children);
			}
			else {
				var subitemHTML = ('<li><a href="#' + node.id + '"><span class="title">' + node.header + '</span></a></li>');
				var subitem = $(subitemHTML).appendTo(expandedMenu);
			}
		}
		expandedMenu.find('li:first').remove();
		expandedMenu.find('li:first a').addClass('active');
	};
	p._addSubMenu = function(subitem, nodes) {
		var menu = $('<ul></ul>').appendTo(subitem);
		var i = 0;
		for (i; i < nodes.length; i++) {
			var node = nodes[i];
			var subitemHTML = ('<li><a href="#' + node.id + '">' + node.label + '</a></li>');
			var subitem = $(subitemHTML).appendTo(menu);
		}
	};

	p._getMenuStructure = function() {
		var tree = [];
		$('.doc-section').each(function() {
			var section = $(this);
			var node = {header: section.find('h1').text(), id: section.find('h1').attr('id')};
			node.children = [];
			section.find('h3').each(function() {
				var subItem = $(this);
				var id = subItem.attr('id');
				if (id !== undefined) {
					node.children.push({label: subItem.text(), id: id});
				}
			});
			tree.push(node);
		});
		return tree;
	};

	// =========================================================================
	// TASK LIST
	// =========================================================================

	p._initTasks = function() {
		$('#doc-task-list').on('task.bb.completed', function(event, task, completed) {
			// Example output: console.log(event, task, completed, task.data('id'));
		});

		$('#doc-task-list').on( "sortchange", function( event, ui ) {
			// Example output: console.log(event, ui);
		});
	};
	
	// =========================================================================
	namespace.DemoDocs = new DemoDocs;
}(this.boostbox, jQuery)); // pass in (namespace, jQuery):
