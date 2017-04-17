(function ($) {
	$.each({
		checked: "checked",
		colspan: "colspan",
		disabled: "disabled",
		href: "href",
		id: "id",
		label: "label",
		multiple: "multiple",
		readonly: "readonly",
		rel: "rel",
		rowspan: "rowspan",
		selected: "selected",
		src: "src",
		target: "target",
		title: "title",
		type: "type"
	}, function (name, type) {
		elem = this[0]
		$.fn[name] = function (value) {
			return $.access(this, function (elem, type, value) {
				if (value === undefined) {
					orig = $.attr(elem, type);
					ret = parseFloat(orig);
					return ($.isNumeric(ret) ? ret : orig);
				}
				$(elem).attr(type, value);
			}, type, value, arguments.length, null)
		}
	})

	$.each({
		background: "background",
		backgroundColor: "background-color",
		border: "border",
		bottom: "bottom",
		color: "color",
		cursor: "cursor",
		display: "display",
		float: "float",
		font: "font",
		height: "height",
		left: "left",
		margin: "margin",
		padding: "padding",
		right: "right",
		top: "top"
	}, function (name, type) {
		elem = this[0]
		$.fn[name] = function (value) {
			return $.access(this, function (elem, type, value) {
				if (value === undefined) {
					orig = $.css(elem, type);
					ret = parseFloat(orig);
					return ($.isNumeric(ret) ? ret : orig);
				}
				$(elem).css(type, value);
			}, type, value, arguments.length, null)
		}
	});
})
(jQuery);