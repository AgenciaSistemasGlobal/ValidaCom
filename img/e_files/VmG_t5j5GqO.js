/*!CK:1965234272!*//*1440390167,*/

if (self.CavalryLogger) { CavalryLogger.start_js(["Djx\/P"]); }

__d('PopoverAsyncMenu.react',['CSS','InlineBlock.react','MenuTheme','Popover','PopoverLoadingMenu','PopoverAsyncMenu','React','ReactDOM','ReactElement','PopoverMenu.react','URI','cx','joinClasses'],function a(b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t){if(c.__markCompiled)c.__markCompiled();var u=n.PropTypes,v=n.createClass({displayName:'ReactPopoverAsyncMenu',statics:{getButtonSize:q.getButtonSize},propTypes:{alignh:u.oneOf(['left','center','right']),alignv:u.oneOf(['baseline','bottom','middle','top']),position:u.oneOf(['above','below','left','right']),layerBehaviors:u.array,disabled:u.bool,endpoint:u.oneOfType([u.string.isRequired,u.instanceOf(r).isRequired]),endpointData:u.object},getDefaultProps:function(){return {alignv:'middle'};},componentDidMount:function(){var w=o.findDOMNode(this.refs.root),x=w.firstChild;h.addClass(x,"_p");this._popover=new k(w,x,this.props.layerBehaviors,{alignh:this.props.alignh,position:this.props.position,disabled:this.props.disabled});this._popoverMenu=new m(this._popover,x,this._createLoadingMenu(),this.props.endpoint,this.props.behaviors,this.props.endpointData);},componentDidUpdate:function(w){if(this.props.alignh!==w.alignh)this._popoverMenu.getPopover().getLayer().setAlignment(this.props.alignh);if(this.props.disabled!==w.disabled)if(this.props.disabled){this._popoverMenu.disable();}else this._popoverMenu.enable();},render:function(){var w=n.Children.map(this.props.children,function(x,y){if(y===0){return p.cloneAndReplaceProps(x,babelHelpers._extends({},x.props,{className:t(x.props.className,"_p")}));}else return x;});return (n.createElement(i,babelHelpers._extends({},this.props,{className:t(this.props.className,"uiPopover"),ref:'root',disabled:null}),w));},componentWillUnmount:function(){this.hidePopover();},_createLoadingMenu:function(){return new l({theme:j});},getPopoverMenu:function(){return this._popoverMenu;},getMenu:function(){return this._popoverMenu.getMenu();},showPopover:function(w){this._popover.showLayer();if(w){var x=this._popoverMenu.getMenu();x.blur();x.focusAnItem(w);}},hidePopover:function(){var w=this._popover;if(w&&w.isShown())w.hideLayer();},getFocusedItem:function(){var w=this._popoverMenu.getMenu();return w.getFocusedItem();}});f.exports=v;},null);
__d('UFIShareNowMenu.react',['ContextualDialogArrow','ContextualLayerAsyncRelative','ContextualLayerAutoFlip','PopoverAsyncMenu.react','React','ShareNowController'],function a(b,c,d,e,f,g,h,i,j,k,l,m){if(c.__markCompiled)c.__markCompiled();var n=l.PropTypes,o=l.createClass({displayName:'UFIShareNowMenu',propTypes:{focusOnInit:n.bool,openOnInit:n.bool},_mountWithMenu:function(p){if(!p)return;var q=p.getPopoverMenu();m.initMenu(q);if(this.props.focusOnInit)q.getTriggerElem().focus();if(this.props.openOnInit)q.getTriggerElem().click();},render:function(){return (l.createElement(k,babelHelpers._extends({alignv:'baseline'},this.props,{layerBehaviors:[h,i,j],ref:this._mountWithMenu}),this.props.children));}});f.exports=o;},null);