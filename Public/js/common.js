//----------全站共享JS----------//

/**
 * ajax 为同步执行
 * 
 * @param {type}
 *            param
 */
$.ajaxSetup({
	async : false
});

/**
 * 判断是否IOS系统
 * 
 * @returns bool
 */
function isIOS() {
	var u = navigator.userAgent, app = navigator.appVersion;
	var isiOS = u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/); // ios终端
	return isiOS;
}
/**
 * 判断是否为微信游览器
 * 
 * @returns {Boolean}
 */
function isWeiXin() {
	var ua = navigator.userAgent.toLowerCase();
	return ua.match(/MicroMessenger/i) == "micromessenger";
}

/**
 * 获取游览器语言
 * 
 * @returns {String}
 */
function getNavigatorLang() {
	var baseLang = '';
	if (navigator.userLanguage) {
		baseLang = navigator.userLanguage;
	} else {
		baseLang = navigator.language;
	}

	return baseLang;
}

/**
 * 普通工具对象
 */
var Utils = {
	htmlEncode : function(text) {
		return text.replace(/&/g, '&amp;').replace(/"/g, '&quot;').replace(
				/</g, '&lt;').replace(/>/g, '&gt;');
	},
	trim : function(text) {
		if (typeof (text) == "string") {
			return text.replace(/^\s*|\s*$/g, "");
		} else {
			return text;
		}
	},
	isEmpty : function(val) {
		switch (typeof (val)) {
		case 'string':
			return Utils.trim(val).length == 0 ? true : false;
			break;
		case 'number':
			return val == 0;
			break;
		case 'object':
			return val == null;
			break;
		case 'array':
			return val.length == 0;
			break;
		default:
			return true;
		}
	},
	isNumber : function(val) {
		var reg = /^[\d|\.|,]+$/;
		return reg.test(val);
	},
	isInt : function(val) {
		if (val == "") {
			return false;
		}
		var reg = /\D+/;
		return !reg.test(val);
	},
	isEmail : function(email) {
		var reg1 = /([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)/;
		return reg1.test(email);
	},
	isTel : function(tel) {
		var reg = /^[\d|\-|\s|\_]+$/; // 只允许使用数字-空格等

		return reg.test(tel);
	},
	fixEvent : function(e) {
		var evt = (typeof e == "undefined") ? window.event : e;
		return evt;
	},
	srcElement : function(e) {
		if (typeof e == "undefined")
			e = window.event;
		var src = document.all ? e.srcElement : e.target;

		return src;
	},
	isTime : function(val) {
		var reg = /^\d{4}-\d{2}-\d{2}\s\d{2}:\d{2}$/;

		return reg.test(val);
	},
	x : function(e) { // 当前鼠标X坐标
		return Browser.isIE ? event.x + document.documentElement.scrollLeft - 2
				: e.pageX;
	},
	y : function(e) { // 当前鼠标Y坐标
		return Browser.isIE ? event.y + document.documentElement.scrollTop - 2
				: e.pageY;
	},
	request : function(url, item) {
		var sValue = url.match(new RegExp("[\?\&]" + item + "=([^\&]*)(\&?)",
				"i"));
		return sValue ? sValue[1] : sValue;
	},
	$ : function(name) {
		return document.getElementById(name);
	}
}
