/**
 * @preserve
 * 
 * CIVEM v0.0.5
 *
 * Copyright 2021, Hannu Leinonen <hleinone@gmail.com>
 * Dual licensed under the MIT and GPL licenses:
 *   http://www.opensource.org/licenses/mit-license.php
 *   http://www.gnu.org/licenses/gpl.html
 */
(function(){function t(t){return function(e){e.target.setCustomValidity(""),t&&t(e),e.target.checkValidity()}}function e(t){return function(e){var a,n,o=e.target,i=o.validity,r=i.valueMissing?"value-missing":i.typeMismatch?"type-mismatch":i.patternMismatch?"pattern-mismatch":i.tooLong?"too-long":i.rangeUnderflow?"range-underflow":i.rangeOverflow?"range-overflow":i.stepMismatch?"step-mismatch":i.customError?"custom-error":"";r&&(a=o.getAttribute("data-errormessage-"+r))?o.setCustomValidity(a):(n=o.getAttribute("data-errormessage"))?o.setCustomValidity(n):o.setCustomValidity(o.validationMessage),t&&t(e)}}var a=function(){var a,n=[],o=document.getElementsByTagName("input");for(a=0;o.length>a;a++)n.push(o[a]);var i=document.getElementsByTagName("textarea");for(a=0;i.length>a;a++)n.push(i[a]);var r=document.getElementsByTagName("select");for(a=0;r.length>a;a++)n.push(r[a]);for(a=0;n.length>a;a++){var s=n[a];s.willValidate&&(console.log(s.tagName),"SELECT"===s.tagName||"select"===s.tagName?s.onchange=t(s.onchange):s.oninput=t(s.oninput),s.oninvalid=e(s.oninvalid))}};window.addEventListener?window.addEventListener("load",a,!1):window.attachEvent&&window.attachEvent("onload",a)})();