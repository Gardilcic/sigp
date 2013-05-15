/*
jQWidgets v2.8.3 (2013-Apr-29)
Copyright (c) 2011-2013 jQWidgets.
License: http://jqwidgets.com/license/
*/

(function(a){a.jqx.jqxWidget("jqxDropDownList","",{});a.extend(a.jqx._jqxDropDownList.prototype,{defineInstance:function(){this.disabled=false;this.width=null;this.height=null;this.items=new Array();this.selectedIndex=-1;this.source=null;this.scrollBarSize=15;this.arrowSize=19;this.enableHover=true;this.enableSelection=true;this.visualItems=new Array();this.groups=new Array();this.equalItemsWidth=true;this.itemHeight=-1;this.visibleItems=new Array();this.emptyGroupText="Group";this.checkboxes=false;if(this.openDelay==undefined){this.openDelay=250}if(this.closeDelay==undefined){this.closeDelay=300}this.animationType="default";this.autoOpen=false;this.dropDownWidth="auto";this.dropDownHeight="200px";this.autoDropDownHeight=false;this.keyboardSelection=true;this.enableBrowserBoundsDetection=false;this.dropDownHorizontalAlignment="left";this.displayMember="";this.valueMember="";this.searchMode="startswithignorecase";this.incrementalSearch=true;this.incrementalSearchDelay=700;this.renderer=null;this.placeHolder="Please Choose:";this.promptText="Please Choose:";this.emptyString="";this.rtl=false;this.selectionRenderer=null;this.listBox=null;this.popupZIndex=9999999999999;this.aria={"aria-disabled":{name:"disabled",type:"boolean"}};this.events=["open","close","select","unselect","change","checkChange","bindingComplete"]},createInstance:function(b){this.render()},render:function(){this.element.innerHTML="";this.isanimating=false;this.id=this.element.id||a.jqx.utilities.createId();this.host.attr("role","combobox");a.jqx.aria(this,"aria-autocomplete","both");a.jqx.aria(this,"aria-readonly",false);var d=a("<div tabIndex=0 style='background-color: transparent; -webkit-appearance: none; outline: none; width:100%; height: 100%; padding: 0px; margin: 0px; border: 0px; position: relative;'><div id='dropdownlistWrapper' style='outline: none; background-color: transparent; border: none; float: left; width:100%; height: 100%; position: relative;'><div id='dropdownlistContent' style='outline: none; background-color: transparent; border: none; float: left; position: relative;'/><div id='dropdownlistArrow' style='background-color: transparent; border: none; float: right; position: relative;'><div></div></div></div></div>");this._addInput();if(a.jqx._jqxListBox==null||a.jqx._jqxListBox==undefined){throw new Error("jqxDropDownList: Missing reference to jqxlistbox.js.")}var h=this;this.touch=a.jqx.mobile.isTouchDevice();this.comboStructure=d;this.host.append(d);this.dropdownlistWrapper=this.host.find("#dropdownlistWrapper");this.dropdownlistArrow=this.host.find("#dropdownlistArrow");this.arrow=a(this.dropdownlistArrow.children()[0]);this.dropdownlistContent=this.host.find("#dropdownlistContent");this.dropdownlistContent.addClass(this.toThemeProperty("jqx-dropdownlist-content"));this.dropdownlistWrapper.addClass(this.toThemeProperty("jqx-disableselect"));if(this.rtl){this.dropdownlistContent.addClass(this.toThemeProperty("jqx-rtl"));this.dropdownlistContent.addClass(this.toThemeProperty("jqx-dropdownlist-content-rtl"))}this.addHandler(this.dropdownlistWrapper,"selectstart",function(){return false});this.dropdownlistWrapper[0].id="dropdownlistWrapper"+this.element.id;this.dropdownlistArrow[0].id="dropdownlistArrow"+this.element.id;this.dropdownlistContent[0].id="dropdownlistContent"+this.element.id;if(this.promptText!="Please Choose:"){this.placeHolder=this.promptText}var j=this.toThemeProperty("jqx-widget")+" "+this.toThemeProperty("jqx-widget-content")+" "+this.toThemeProperty("jqx-dropdownlist-state-normal")+" "+this.toThemeProperty("jqx-rc-all")+" "+this.toThemeProperty("jqx-fill-state-normal");this.element.className+=" "+j;this._firstDiv=this.host.find("div:first");try{var k="listBox"+this.id;var f=a(a.find("#"+k));if(f.length>0){f.remove()}a.jqx.aria(this,"aria-owns",k);a.jqx.aria(this,"aria-haspopup",true);var b=a("<div style='overflow: hidden; background-color: transparent; border: none; position: absolute;' id='listBox"+this.id+"'><div id='innerListBox"+this.id+"'></div></div>");b.hide();b.appendTo(document.body);this.container=b;this.listBoxContainer=a(a.find("#innerListBox"+this.id));var c=this.width;if(this.dropDownWidth!="auto"){c=this.dropDownWidth}if(c==null){c=this.host.width();if(c==0){c=this.dropDownWidth}}if(this.dropDownHeight==null){this.dropDownHeight=200}var h=this;this.container.width(parseInt(c)+25);this.container.height(parseInt(this.dropDownHeight)+25);this.addHandler(this.listBoxContainer,"bindingComplete",function(e){h._raiseEvent("6")});this.listBoxContainer.jqxListBox({_checkForHiddenParent:false,checkboxes:this.checkboxes,rtl:this.rtl,emptyString:this.emptyString,itemHeight:this.itemHeight,width:c,searchMode:this.searchMode,incrementalSearch:this.incrementalSearch,incrementalSearchDelay:this.incrementalSearchDelay,displayMember:this.displayMember,valueMember:this.valueMember,height:this.dropDownHeight,autoHeight:this.autoDropDownHeight,scrollBarSize:this.scrollBarSize,selectedIndex:this.selectedIndex,source:this.source,theme:this.theme,rendered:function(){if(h.selectedIndex!=h.listBoxContainer.jqxListBox("selectedIndex")){h.listBox=a.data(h.listBoxContainer[0],"jqxListBox").instance;h.listBoxContainer.jqxListBox({selectedIndex:h.selectedIndex});h.renderSelection("mouse")}else{h.renderSelection("mouse")}},renderer:this.renderer});this.listBoxContainer.css({position:"absolute",zIndex:this.popupZIndex,top:0,left:0});this.listBox=a.data(this.listBoxContainer[0],"jqxListBox").instance;this.listBox.enableSelection=this.enableSelection;this.listBox.enableHover=this.enableHover;this.listBox.equalItemsWidth=this.equalItemsWidth;this.listBox.selectIndex(this.selectedIndex);this.listBox._arrange();this.listBoxContainer.addClass(this.toThemeProperty("jqx-popup"));if(a.jqx.browser.msie){this.listBoxContainer.addClass(this.toThemeProperty("jqx-noshadow"))}this.addHandler(this.listBoxContainer,"unselect",function(e){h._raiseEvent("3",{index:e.args.index,type:e.args.type,item:e.args.item})});this.addHandler(this.listBoxContainer,"change",function(e){h._raiseEvent("4",{index:e.args.index,type:e.args.type,item:e.args.item})});if(this.animationType=="none"){this.container.css("display","none")}else{this.container.hide()}}catch(g){}var l=this;this.propertyChangeMap.disabled=function(e,n,m,o){if(o){e.host.addClass(l.toThemeProperty("jqx-dropdownlist-state-disabled"));e.host.addClass(l.toThemeProperty("jqx-fill-state-disabled"));e.dropdownlistContent.addClass(l.toThemeProperty("jqx-dropdownlist-content-disabled"))}else{e.host.removeClass(l.toThemeProperty("jqx-dropdownlist-state-disabled"));e.host.removeClass(l.toThemeProperty("jqx-fill-state-disabled"));e.dropdownlistContent.removeClass(l.toThemeProperty("jqx-dropdownlist-content-disabled"))}a.jqx.aria(e,"aria-disabled",e.disabled)};if(this.disabled){this.host.addClass(this.toThemeProperty("jqx-dropdownlist-state-disabled"));this.host.addClass(this.toThemeProperty("jqx-fill-state-disabled"));this.dropdownlistContent.addClass(this.toThemeProperty("jqx-dropdownlist-content-disabled"))}this.arrow.addClass(this.toThemeProperty("jqx-icon-arrow-down"));this.arrow.addClass(this.toThemeProperty("jqx-icon"));this._setSize();this._updateHandlers();if(a.jqx.browser.msie&&a.jqx.browser.version<8){if(this.host.parents(".jqx-window").length>0){var i=this.host.parents(".jqx-window").css("z-index");b.css("z-index",i+10);this.listBoxContainer.css("z-index",i+10)}}},val:function(c){if(!this.dropdownlistContent){return""}if(this.input&&arguments.length==0){return this.input.val()}var b=this.getItemByValue(c);if(b!=null){this.selectItem(b)}if(this.input){return this.input.val()}},focus:function(){try{var d=this;var c=function(){d.host.focus();if(d._firstDiv){d._firstDiv.focus()}};c();setTimeout(function(){c()},10)}catch(b){}},_addInput:function(){var b=this.host.attr("name");if(!b){b=this.element.id}this.input=a("<input type='hidden'/>");this.host.append(this.input);this.input.attr("name",b)},getItems:function(){if(!this.listBox){return new Array()}return this.listBox.items},getVisibleItems:function(){return this.listBox.getVisibleItems()},_setSize:function(){if(this.width!=null&&this.width.toString().indexOf("px")!=-1){this.host.width(this.width)}else{if(this.width!=undefined&&!isNaN(this.width)){this.host.width(this.width)}}if(this.height!=null&&this.height.toString().indexOf("px")!=-1){this.host.height(this.height)}else{if(this.height!=undefined&&!isNaN(this.height)){this.host.height(this.height)}}var e=false;if(this.width!=null&&this.width.toString().indexOf("%")!=-1){e=true;this.host.width(this.width)}if(this.height!=null&&this.height.toString().indexOf("%")!=-1){e=true;this.host.height(this.height)}var c=this;var d=function(){c._arrange();if(c.dropDownWidth=="auto"){var f=c.host.width();c.listBoxContainer.jqxListBox({width:f});c.container.width(parseInt(f)+25)}};if(e){var b=this.host.width();if(this.dropDownWidth!="auto"){b=this.dropDownWidth}this.listBoxContainer.jqxListBox({width:b});this.container.width(parseInt(b)+25);this.removeHandler(a(window),"resize."+this.id);this.addHandler(a(window),"resize."+this.id,function(){d()})}if(!this._hiddenParentTimer){if(a.jqx.isHidden(this.host)){this._hiddenParentTimer=setInterval(function(){try{if(!a.jqx.isHidden(c.host)){clearInterval(c._hiddenParentTimer);c._hiddenParentTimer=0;d()}}catch(f){}},10)}}},isOpened:function(){var c=this;var b=a.data(document.body,"openedJQXListBox"+this.id);if(b!=null&&b==c.listBoxContainer){return true}return false},_updateHandlers:function(){var c=this;var d=false;this.removeHandlers();if(!this.touch){this.host.hover(function(){if(!c.disabled&&c.enableHover){d=true;c.host.addClass(c.toThemeProperty("jqx-dropdownlist-state-hover"));c.arrow.addClass(c.toThemeProperty("jqx-icon-arrow-down-hover"));c.host.addClass(c.toThemeProperty("jqx-fill-state-hover"))}},function(){if(!c.disabled&&c.enableHover){c.host.removeClass(c.toThemeProperty("jqx-dropdownlist-state-hover"));c.host.removeClass(c.toThemeProperty("jqx-fill-state-hover"));c.arrow.removeClass(c.toThemeProperty("jqx-icon-arrow-down-hover"));d=false}})}var b="mousedown";if(this.touch){b=a.jqx.mobile.getTouchEventName("touchstart")}this.addHandler(this.dropdownlistWrapper,b,function(f){if(!c.disabled){var e=c.container.css("display")=="block";if(!c.isanimating){if(e){c.hideListBox()}else{c.showListBox()}}}});if(c.autoOpen){this.addHandler(this.host,"mouseenter",function(){var e=c.isOpened();if(!e&&c.autoOpen){c.open();c.host.focus()}});a(document).on("mousemove."+c.id,function(h){var g=c.isOpened();if(g&&c.autoOpen){var l=c.host.coord();var k=l.top;var j=l.left;var i=c.container.coord();var e=i.left;var f=i.top;canClose=true;if(h.pageY>=k&&h.pageY<=k+c.host.height()){if(h.pageX>=j&&h.pageX<j+c.host.width()){canClose=false}}if(h.pageY>=f&&h.pageY<=f+c.container.height()){if(h.pageX>=e&&h.pageX<e+c.container.width()){canClose=false}}if(canClose){c.close()}}})}if(this.touch){this.addHandler(a(document),a.jqx.mobile.getTouchEventName("touchstart")+"."+this.id,c.closeOpenedListBox,{me:this,listbox:this.listBox,id:this.id})}else{this.addHandler(a(document),"mousedown."+this.id,c.closeOpenedListBox,{me:this,listbox:this.listBox,id:this.id})}this.addHandler(this.host,"keydown",function(f){var e=c.container.css("display")=="block";if(c.host.css("display")=="none"){return true}if(f.keyCode=="13"||f.keyCode=="9"){if(!c.isanimating){if(e){c.renderSelection();c.hideListBox();if(!c.keyboardSelection){c._raiseEvent("2",{index:c.selectedIndex,type:"keyboard",item:c.getItem(c.selectedIndex)})}}else{if(f.keyCode!="9"){c.showListBox()}}if(e&&f.keyCode!="9"){return false}return true}}if(f.keyCode==115){if(!c.isanimating){if(!c.isOpened()){c.showListBox()}else{if(c.isOpened()){c.hideListBox()}}}return false}if(f.altKey){if(c.host.css("display")=="block"){if(f.keyCode==38){if(c.isOpened()){c.hideListBox();return true}}else{if(f.keyCode==40){if(!c.isOpened()){c.showListBox();return true}}}}}if(f.keyCode=="27"){if(!c.ishiding){c.hideListBox();if(c.tempSelectedIndex!=undefined){c.selectIndex(c.tempSelectedIndex)}return false}}if(!c.disabled){return c.listBox._handleKeyDown(f)}});this.addHandler(this.listBoxContainer,"checkChange",function(e){c.renderSelection();c._updateInputSelection();c._raiseEvent(5,{label:e.args.label,value:e.args.value,checked:e.args.checked,item:e.args.item})});this.addHandler(this.listBoxContainer,"select",function(e){if(!c.disabled){if(e.args.type=="keyboard"&&!c.isOpened()){c.renderSelection()}if(e.args.type!="keyboard"||c.keyboardSelection){c.renderSelection();c._raiseEvent("2",{index:e.args.index,type:e.args.type,item:e.args.item,originalEvent:e.args.originalEvent});if(e.args.type=="mouse"){if(!c.checkboxes){c.hideListBox();if(c._firstDiv){c._firstDiv.focus()}}}}}});if(this.listBox){if(this.listBox.content){this.addHandler(this.listBox.content,"click",function(e){if(!c.disabled){if(c.listBox.itemswrapper&&e.target===c.listBox.itemswrapper[0]){return true}c.renderSelection("mouse");if(!c.touch){if(!c.ishiding){if(!c.checkboxes){c.hideListBox();if(c._firstDiv){c._firstDiv.focus()}}}}if(!c.keyboardSelection){if(c._oldSelectedInd==undefined){c._oldSelectedIndx=c.selectedIndex}if(c.selectedIndex!=c._oldSelectedIndx){c._raiseEvent("2",{index:c.selectedIndex,type:"keyboard",item:c.getItem(c.selectedIndex)});c._oldSelectedIndx=c.selectedIndex}}}})}}this.addHandler(this.host,"focus",function(e){c.host.addClass(c.toThemeProperty("jqx-dropdownlist-state-focus"));c.host.addClass(c.toThemeProperty("jqx-fill-state-focus"))});this.addHandler(this.host,"blur",function(){c.host.removeClass(c.toThemeProperty("jqx-dropdownlist-state-focus"));c.host.removeClass(c.toThemeProperty("jqx-fill-state-focus"))});this.addHandler(this._firstDiv,"focus",function(e){c.host.addClass(c.toThemeProperty("jqx-dropdownlist-state-focus"));c.host.addClass(c.toThemeProperty("jqx-fill-state-focus"))});this.addHandler(this._firstDiv,"blur",function(){c.host.removeClass(c.toThemeProperty("jqx-dropdownlist-state-focus"));c.host.removeClass(c.toThemeProperty("jqx-fill-state-focus"))})},removeHandlers:function(){var c=this;var b="mousedown";if(this.touch){b=a.jqx.mobile.getTouchEventName("touchstart")}this.removeHandler(this.dropdownlistWrapper,b);if(this.listBox){if(this.listBox.content){this.removeHandler(this.listBox.content,"click")}}this.removeHandler(this.host,"loadContent");this.removeHandler(this.listBoxContainer,"checkChange");this.removeHandler(this.host,"keydown");this.removeHandler(this.host,"focus");this.removeHandler(this.host,"blur");this.removeHandler(this._firstDiv,"focus");this.removeHandler(this._firstDiv,"blur");this.removeHandler(this.host,"mouseenter");this.removeHandler(a(document),"mousemove."+c.id)},getItem:function(b){var c=this.listBox.getItem(b);return c},getItemByValue:function(c){var b=this.listBox.getItemByValue(c);return b},selectItem:function(b){if(this.listBox!=undefined){this.listBox.selectItem(b);this.selectedIndex=this.listBox.selectedIndex;this.renderSelection("mouse")}},unselectItem:function(b){if(this.listBox!=undefined){this.listBox.unselectItem(b);this.renderSelection("mouse")}},checkItem:function(b){if(this.listBox!=undefined){this.listBox.checkItem(b)}},uncheckItem:function(b){if(this.listBox!=undefined){this.listBox.uncheckItem(b)}},indeteterminateItem:function(b){if(this.listBox!=undefined){this.listBox.indeteterminateItem(b)}},renderSelection:function(){if(this.listBox==null){return}var p=this.listBox.visibleItems[this.listBox.selectedIndex];var m=this;if(this.checkboxes){var g=this.getCheckedItems();if(g!=null&&g.length>0){p=g[0]}else{p=null}}if(p==null){var d=a('<span style="color: inherit; border: none; background-color: transparent;"></span>');d.appendTo(a(document.body));d.addClass(this.toThemeProperty("jqx-widget"));d.addClass(this.toThemeProperty("jqx-listitem-state-normal"));d.addClass(this.toThemeProperty("jqx-item"));a.jqx.utilities.html(d,this.placeHolder);var c=this.dropdownlistContent.css("padding-top");var q=this.dropdownlistContent.css("padding-bottom");d.css("padding-top",c);d.css("padding-bottom",q);var b=d.outerHeight();d.remove();d.removeClass();a.jqx.utilities.html(this.dropdownlistContent,d);var o=this.host.height();if(this.height!=null&&this.height!=undefined){o=parseInt(this.height)}var n=parseInt((parseInt(o)-parseInt(b))/2);if(n>0){this.dropdownlistContent.css("margin-top",n+"px");this.dropdownlistContent.css("margin-bottom",n+"px")}if(this.selectionRenderer){a.jqx.utilities.html(this.dropdownlistContent,this.selectionRenderer());this._updateInputSelection()}this.selectedIndex=this.listBox.selectedIndex;return}this.selectedIndex=this.listBox.selectedIndex;var d=a('<span style="color: inherit; border: none; background-color: transparent;"></span>');d.appendTo(a(document.body));d.addClass(this.toThemeProperty("jqx-widget"));d.addClass(this.toThemeProperty("jqx-listitem-state-normal"));d.addClass(this.toThemeProperty("jqx-item"));var e=false;try{if(p.html!=undefined&&p.html!=null&&p.html.toString().length>0){a.jqx.utilities.html(d,p.html)}else{if(p.label!=undefined&&p.label!=null&&p.label.toString().length>0){a.jqx.utilities.html(d,p.label)}else{if(p.value!=undefined&&p.value!=null&&p.value.toString().length>0){a.jqx.utilities.html(d,p.value)}else{if(p.title!=undefined&&p.title!=null&&p.title.toString().length>0){a.jqx.utilities.html(d,p.title)}else{if(p.label==""||p.label==null){e=true;a.jqx.utilities.html(d,"Item")}}}}}}catch(l){var h=l}var c=this.dropdownlistContent.css("padding-top");var q=this.dropdownlistContent.css("padding-bottom");d.css("padding-top",c);d.css("padding-bottom",q);var b=d.outerHeight();if((p.label==""||p.label==null)&&e){a.jqx.utilities.html(d,"")}d.remove();d.removeClass();if(this.selectionRenderer){a.jqx.utilities.html(this.dropdownlistContent,this.selectionRenderer(d,p.index,p.label,p.value))}else{if(this.checkboxes){var j=this.getCheckedItems();var k="";for(var f=0;f<j.length;f++){if(f==j.length-1){k+=j[f].label}else{k+=j[f].label+","}}d.text(k);d.css("max-width",this.host.width()-30);d.css("overflow","hidden");d.css("display","block");d.css("width",this.host.width()-30);d.css("text-overflow","ellipsis");this.dropdownlistContent.html(d)}else{this.dropdownlistContent.html(d)}}var o=this.host.height();if(this.height!=null&&this.height!=undefined){o=parseInt(this.height)}var n=parseInt((parseInt(o)-parseInt(b))/2);if(n>0){this.dropdownlistContent.css("margin-top",n+"px");this.dropdownlistContent.css("margin-bottom",n+"px")}if(this.dropdownlistContent&&this.input){this._updateInputSelection()}if(this.listBox&&this.listBox._activeElement){a.jqx.aria(this,"aria-activedescendant",this.listBox._activeElement.id)}},_updateInputSelection:function(){if(this.input){if(this.selectedIndex==-1){this.input.val("")}else{var d=this.getSelectedItem();if(d!=null){this.input.val(d.value)}else{this.input.val(this.dropdownlistContent.text())}}if(this.checkboxes){var b=this.getCheckedItems();var e="";if(b!=null){for(var c=0;c<b.length;c++){if(c==b.length-1){e+=b[c].value}else{e+=b[c].value+","}}}this.input.val(e)}}},setContent:function(b){a.jqx.utilities.html(this.dropdownlistContent,b);this._updateInputSelection()},dataBind:function(){this.listBoxContainer.jqxListBox({source:this.source});this.renderSelection("mouse");if(this.source==null){this.clearSelection()}},clear:function(){this.listBoxContainer.jqxListBox({source:null});this.clearSelection()},clearSelection:function(b){this.selectedIndex=-1;this.listBox.clearSelection();this.renderSelection();a.jqx.utilities.html(this.dropdownlistContent,this.placeHolder)},unselectIndex:function(b,c){if(isNaN(b)){return}this.listBox.unselectIndex(b,c);this.renderSelection()},selectIndex:function(b,d,e,c){this.listBox.selectIndex(b,d,e,c);this.renderSelection()},getSelectedIndex:function(){return this.selectedIndex},getSelectedItem:function(){return this.getItem(this.selectedIndex)},getCheckedItems:function(){return this.listBox.getCheckedItems()},checkIndex:function(b){this.listBox.checkIndex(b)},uncheckIndex:function(b){this.listBox.uncheckIndex(b)},indeterminateIndex:function(b){this.listBox.indeterminateIndex(b)},checkAll:function(){this.listBox.checkAll()},uncheckAll:function(){this.listBox.uncheckAll()},insertAt:function(c,b){if(c==null){return false}return this.listBox.insertAt(c,b)},addItem:function(b){return this.listBox.addItem(b)},removeAt:function(c){var b=this.listBox.removeAt(c);this.renderSelection("mouse");return b},ensureVisible:function(b){this.listBox.ensureVisible(b)},disableAt:function(b){this.listBox.disableAt(b)},enableAt:function(b){this.listBox.enableAt(b)},_findPos:function(c){while(c&&(c.type=="hidden"||c.nodeType!=1||a.expr.filters.hidden(c))){c=c.nextSibling}var b=a(c).coord();return[b.left,b.top]},testOffset:function(h,f,c){var g=h.outerWidth();var j=h.outerHeight();var i=a(window).width()+a(window).scrollLeft();var e=a(window).height()+a(window).scrollTop();if(f.left+g>i){if(g>this.host.width()){var d=this.host.coord().left;var b=g-this.host.width();f.left=d-b+2}}if(f.left<0){f.left=parseInt(this.host.coord().left)+"px"}f.top-=Math.min(f.top,(f.top+j>e&&e>j)?Math.abs(j+c+22):0);return f},open:function(){this.showListBox()},close:function(){this.hideListBox()},_getBodyOffset:function(){var c=0;var b=0;if(a("body").css("border-top-width")!="0px"){c=parseInt(a("body").css("border-top-width"));if(isNaN(c)){c=0}}if(a("body").css("border-left-width")!="0px"){b=parseInt(a("body").css("border-left-width"));if(isNaN(b)){b=0}}return{left:b,top:c}},showListBox:function(){a.jqx.aria(this,"aria-expanded",true);if(this.dropDownWidth=="auto"&&this.width!=null&&this.width.indexOf&&this.width.indexOf("%")!=-1){if(this.listBox.host.width()!=this.host.width()){var c=this.host.width();this.listBoxContainer.jqxListBox({width:c});this.container.width(parseInt(c)+25)}}var p=this;var e=this.listBoxContainer;var j=this.listBox;var m=a(window).scrollTop();var h=a(window).scrollLeft();var k=parseInt(this._findPos(this.host[0])[1])+parseInt(this.host.outerHeight())-1+"px";var g=parseInt(Math.round(this.host.coord().left))+"px";var o=a.jqx.mobile.isSafariMobileBrowser()||a.jqx.mobile.isWindowsPhone();if(this.listBox==null){return}var d=a.jqx.utilities.hasTransform(this.host);this.ishiding=false;if(!this.keyboardSelection){this.listBox.selectIndex(this.selectedIndex);this.listBox.ensureVisible(this.selectedIndex)}this.tempSelectedIndex=this.selectedIndex;if(this.autoDropDownHeight){this.container.height(this.listBoxContainer.height()+25)}if(d||(o!=null&&o)){g=a.jqx.mobile.getLeftPos(this.element);k=a.jqx.mobile.getTopPos(this.element)+parseInt(this.host.outerHeight());if(a("body").css("border-top-width")!="0px"){k=parseInt(k)-this._getBodyOffset().top+"px"}if(a("body").css("border-left-width")!="0px"){g=parseInt(g)-this._getBodyOffset().left+"px"}}e.stop();this.host.addClass(this.toThemeProperty("jqx-dropdownlist-state-selected"));this.host.addClass(this.toThemeProperty("jqx-fill-state-pressed"));this.arrow.addClass(this.toThemeProperty("jqx-icon-arrow-down-selected"));this.container.css("left",g);this.container.css("top",k);j._arrange();var f=true;var q=false;if(this.dropDownHorizontalAlignment=="right"||this.rtl){var l=this.container.outerWidth();var b=Math.abs(l-this.host.outerWidth()+1);if(a.jqx.browser.chrome){b++}if(l>this.host.width()){this.container.css("left",25+parseInt(g)-b+"px")}else{this.container.css("left",25+parseInt(g)+b+"px")}}if(this.enableBrowserBoundsDetection){var i=this.testOffset(e,{left:parseInt(this.container.css("left")),top:parseInt(k)},parseInt(this.host.outerHeight()));if(parseInt(this.container.css("top"))!=i.top){q=true;e.css("top",23)}else{e.css("top",0)}this.container.css("top",i.top);if(parseInt(this.container.css("left"))!=i.left){this.container.css("left",i.left)}}if(this.animationType=="none"){this.container.css("display","block");a.data(document.body,"openedJQXListBoxParent",p);a.data(document.body,"openedJQXListBox"+this.id,e);e.css("margin-top",0);e.css("opacity",1)}else{this.container.css("display","block");p.isanimating=true;if(this.animationType=="fade"){e.css("margin-top",0);e.css("opacity",0);e.animate({opacity:1},this.openDelay,function(){a.data(document.body,"openedJQXListBoxParent",p);a.data(document.body,"openedJQXListBox"+p.id,e);p.ishiding=false;p.isanimating=false})}else{e.css("opacity",1);var n=e.outerHeight();if(q){e.css("margin-top",n)}else{e.css("margin-top",-n)}e.animate({"margin-top":0},this.openDelay,function(){a.data(document.body,"openedJQXListBoxParent",p);a.data(document.body,"openedJQXListBox"+p.id,e);p.ishiding=false;p.isanimating=false})}}if(!q){this.host.addClass(this.toThemeProperty("jqx-rc-b-expanded"));e.addClass(this.toThemeProperty("jqx-rc-t-expanded"))}else{this.host.addClass(this.toThemeProperty("jqx-rc-t-expanded"));e.addClass(this.toThemeProperty("jqx-rc-b-expanded"))}e.addClass(this.toThemeProperty("jqx-fill-state-focus"));this.host.addClass(this.toThemeProperty("jqx-dropdownlist-state-focus"));this.host.addClass(this.toThemeProperty("jqx-fill-state-focus"));this.host.focus();setTimeout(function(){p.host.focus()});j._renderItems();this._raiseEvent("0",j)},hideListBox:function(){a.jqx.aria(this,"aria-expanded",false);var f=this.listBoxContainer;var g=this.listBox;var c=this.container;var d=this;a.data(document.body,"openedJQXListBox"+this.id,null);if(this.animationType=="none"){this.container.css("display","none")}else{if(!d.ishiding){f.stop();var b=f.outerHeight();f.css("margin-top",0);d.isanimating=true;var e=-b;if(parseInt(this.container.coord().top)<parseInt(this.host.coord().top)){e=b}if(this.animationType=="fade"){f.css({opacity:1});f.animate({opacity:0},this.closeDelay,function(){c.css("display","none");d.isanimating=false;d.ishiding=false})}else{f.animate({"margin-top":e},this.closeDelay,function(){c.css("display","none");d.isanimating=false;d.ishiding=false})}}}this.ishiding=true;this.host.removeClass(this.toThemeProperty("jqx-dropdownlist-state-selected"));this.host.removeClass(this.toThemeProperty("jqx-fill-state-pressed"));this.arrow.removeClass(this.toThemeProperty("jqx-icon-arrow-down-selected"));this.host.removeClass(this.toThemeProperty("jqx-rc-b-expanded"));f.removeClass(this.toThemeProperty("jqx-rc-t-expanded"));this.host.removeClass(this.toThemeProperty("jqx-rc-t-expanded"));f.removeClass(this.toThemeProperty("jqx-rc-b-expanded"));f.removeClass(this.toThemeProperty("jqx-fill-state-focus"));this._raiseEvent("1",g)},closeOpenedListBox:function(e){var d=e.data.me;var b=a(e.target);var c=e.data.listbox;if(c==null){return true}if(a(e.target).ischildof(e.data.me.host)){return true}if(!d.isOpened()){return true}var f=d;var g=false;a.each(b.parents(),function(){if(this.className!="undefined"){if(this.className.indexOf){if(this.className.indexOf("jqx-listbox")!=-1){g=true;return false}if(this.className.indexOf("jqx-dropdownlist")!=-1){if(d.element.id==this.id){g=true}return false}}}});if(c!=null&&!g&&d.isOpened()){d.hideListBox()}return true},loadFromSelect:function(b){this.listBox.loadFromSelect(b)},refresh:function(b){this._setSize();this._arrange();if(this.listBox){this.renderSelection()}},_arrange:function(){var f=parseInt(this.host.width());var b=parseInt(this.host.height());var e=this.arrowSize;var d=this.arrowSize;var g=3;var c=f-d-2*g;if(c>0){this.dropdownlistContent.width(c+"px")}this.dropdownlistContent.height(b);this.dropdownlistContent.css("left",0);this.dropdownlistContent.css("top",0);this.dropdownlistArrow.width(d);this.dropdownlistArrow.height(b);if(this.rtl){this.dropdownlistArrow.css("float","left");this.dropdownlistContent.css("float","right")}},destroy:function(){this.removeHandler(this.listBoxContainer,"select");this.removeHandler(this.listBoxContainer,"unselect");this.removeHandler(this.listBoxContainer,"change");this.removeHandler(this.dropdownlistWrapper,"selectstart");this.removeHandler(this.dropdownlistWrapper,"mousedown");this.removeHandler(this.host,"keydown");this.removeHandler(this.listBoxContainer,"select");this.removeHandler(this.listBox.content,"click");this.removeHandlers();this.listBoxContainer.jqxListBox("destroy");this.listBoxContainer.remove();this.host.removeClass();this.removeHandler(a(document),"mousedown."+this.id,this.closeOpenedListBox);if(this.touch){this.removeHandler(a(document),a.jqx.mobile.getTouchEventName("touchstart")+"."+this.id)}this.container.remove();this.host.remove()},_raiseEvent:function(f,c){if(c==undefined){c={owner:null}}var d=this.events[f];args=c;args.owner=this;var e=new jQuery.Event(d);e.owner=this;if(f==2||f==3||f==4||f==5){e.args=c}var b=this.host.trigger(e);return b},propertyChangedHandler:function(b,c,f,e){if(b.isInitialized==undefined||b.isInitialized==false){return}if(c=="autoOpen"){b._updateHandlers()}if(c=="emptyString"){b.listBox.emptyString=b.emptyString}if(c=="renderer"){b.listBox.renderer=b.renderer}if(c=="itemHeight"){b.listBox.itemHeight=e}if(c=="rtl"){if(e){b.dropdownlistArrow.css("float","left");b.dropdownlistContent.css("float","right")}else{b.dropdownlistArrow.css("float","right");b.dropdownlistContent.css("float","left")}b.listBoxContainer.jqxListBox({rtl:b.rtl})}if(c=="source"){b.listBoxContainer.jqxListBox({source:b.source});b.listBox.selectedIndex=-1;b.listBox.selectIndex(this.selectedIndex);b.renderSelection();if(e==null){b.clear()}}if(c=="displayMember"||c=="valueMember"){b.listBoxContainer.jqxListBox({displayMember:b.displayMember,valueMember:b.valueMember});b.renderSelection()}if(c=="theme"&&e!=null){b.listBoxContainer.jqxListBox({theme:e});b.listBoxContainer.addClass(b.toThemeProperty("jqx-popup"));if(a.jqx.browser.msie){b.listBoxContainer.addClass(b.toThemeProperty("jqx-noshadow"))}b.dropdownlistContent.removeClass();b.dropdownlistContent.addClass(b.toThemeProperty("jqx-dropdownlist-content"));b.dropdownlistWrapper.removeClass();b.dropdownlistWrapper.addClass(b.toThemeProperty("jqx-disableselect"));b.host.removeClass();b.host.addClass(b.toThemeProperty("jqx-fill-state-normal"));b.host.addClass(b.toThemeProperty("jqx-dropdownlist-state-normal"));b.host.addClass(b.toThemeProperty("jqx-rc-all"));b.host.addClass(b.toThemeProperty("jqx-widget"));b.host.addClass(b.toThemeProperty("jqx-widget-content"));b.arrow.removeClass();b.arrow.addClass(b.toThemeProperty("jqx-icon-arrow-down"));b.arrow.addClass(b.toThemeProperty("jqx-icon"))}if(c=="autoDropDownHeight"){b.listBoxContainer.jqxListBox({autoHeight:b.autoDropDownHeight});if(b.autoDropDownHeight){b.container.height(b.listBoxContainer.height()+25)}else{b.listBoxContainer.jqxListBox({height:b.dropDownHeight});b.container.height(parseInt(b.dropDownHeight)+25)}}if(c=="searchMode"){b.listBoxContainer.jqxListBox({searchMode:b.searchMode})}if(c=="incrementalSearch"){b.listBoxContainer.jqxListBox({incrementalSearch:b.incrementalSearch})}if(c=="incrementalSearchDelay"){b.listBoxContainer.jqxListBox({incrementalSearchDelay:b.incrementalSearchDelay})}if(c=="dropDownHeight"){if(!b.autoDropDownHeight){b.listBoxContainer.jqxListBox({height:b.dropDownHeight});b.container.height(parseInt(b.dropDownHeight)+25)}}if(c=="dropDownWidth"||c=="scrollBarSize"){var d=b.width;if(b.dropDownWidth!="auto"){d=b.dropDownWidth}b.listBoxContainer.jqxListBox({width:d,scrollBarSize:b.scrollBarSize});b.container.width(parseInt(d)+25)}if(c=="width"||c=="height"){if(e!=f){this.refresh();if(c=="width"){if(b.dropDownWidth=="auto"){var d=b.host.width();b.listBoxContainer.jqxListBox({width:d});b.container.width(parseInt(d)+25)}}}}if(c=="checkboxes"){b.listBoxContainer.jqxListBox({checkboxes:b.checkboxes})}if(c=="selectedIndex"){if(b.listBox!=null){b.listBox.selectIndex(e);b.renderSelection()}}}})})(jQuery);