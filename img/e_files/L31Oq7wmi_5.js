/*!CK:4117580208!*//*1440515547,*/

if (self.CavalryLogger) { CavalryLogger.start_js(["QvNlC"]); }

__d('ScrollColumn.react',['cx','invariant','throttle','tidyEvent','Arbiter','Event','React','ReactDOM','Vector','ViewportBounds'],function a(b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q){if(c.__markCompiled)c.__markCompiled();var r=n.PropTypes,s='ScrollColumn/adjust',t=n.createClass({displayName:'ScrollColumn',propTypes:{topOffset:r.number,zIndex:r.number},getDefaultProps:function(){return {topOffset:0,zIndex:0};},_scroll:0,_scrollDelta:0,getInitialState:function(){return {fixed:null,fixedBottom:0,fixedTop:this.props.topOffset,top:0};},render:function(){var u='auto',v=this.state.fixedLeft,w='auto';if(this.state.fixed==='bottom'){u=this.state.fixedBottom;}else if(this.state.fixed==='top'){w=this.state.fixedTop;}else{v='auto';w=this.state.top;}return (n.createElement('div',{className:"_5ss7",ref:'container'},n.createElement('div',{className:"_5ss8"+(this.state.fixed?' '+"fixed_always":''),ref:'column',style:{bottom:u,left:v,top:w,zIndex:this.props.zIndex}},this.props.children)));},componentDidMount:function(){this.setState({adjustEventListener:k(l.subscribe(s,(function(){this._adjust();}).bind(this))),resizeListener:k(m.listen(window,'resize',j(this._adjust))),scrollListener:k(m.listen(window,'scroll',this._onScroll)),viewportBoundsUpdateListener:k(q.subscribe('change',this._adjust))});this._adjust();},componentDidUpdate:function(u,v){if(v.fixed!==this.state.fixed)l.inform('reflow');},componentWillUnmount:function(){this.state.adjustEventListener.unsubscribe();this.state.resizeListener.remove();this.state.scrollListener.remove();},_onScroll:function(event){var u=p.getScrollPosition().y;this._scrollDelta=u-this._scroll;this._scroll=u;this._adjust();},_adjust:function(){if(!this.isMounted())return;this._updateContainerHeight();this._updateColumnWidth();if(this._isContainerBelowViewportTop()){this._setNotFixed(0);return;}if(!this._isColumnLargerThanViewport()){this._setFixedToTop();return;}if(this._scrollDelta>0)if(this._isBottomOfColumnVisible()){this._setFixedToBottom();return;}if(this._scrollDelta<0)if(this._isTopOfColumnVisible()){this._setFixedToTop();return;}var u=this._getTopPositionForRef('column'),v=this._getTopPositionForRef('container'),w=u-v;this._setNotFixed(w);},_getTopPositionForRef:function(u){var v=this.refs[u];!v?i(0):undefined;var w=p.getElementPosition(o.findDOMNode(v),'viewport').y;if(this._scroll<0)w+=this._scroll;return w;},_getTopBoundWithOffset:function(){return q.getTop()+this.props.topOffset;},_isContainerBelowViewportTop:function(){var u=this._getTopPositionForRef('container');return u>=this._getTopBoundWithOffset();},_isColumnLargerThanViewport:function(){var u=p.getViewportDimensions().y-q.getBottom()-this._getTopBoundWithOffset();return o.findDOMNode(this.refs.column).offsetHeight>u;},_isBottomOfColumnVisible:function(){var u=this._getTopPositionForRef('column'),v=p.getElementDimensions(o.findDOMNode(this.refs.column),'viewport').y,w=u+v;return w<=p.getViewportDimensions().y-q.getBottom();},_isTopOfColumnVisible:function(){var u=this._getTopPositionForRef('column');return u>=this._getTopBoundWithOffset();},_getFixedLeft:function(){return (p.getElementPosition(o.findDOMNode(this.refs.container),'viewport').x);},_setFixedToBottom:function(){this.setState({fixed:'bottom',fixedBottom:q.getBottom(),fixedLeft:this._getFixedLeft()});},_setFixedToTop:function(){this.setState({fixed:'top',fixedLeft:this._getFixedLeft(),fixedTop:this._getTopBoundWithOffset()});},_setNotFixed:function(u){this.setState({fixed:false,top:u});},_updateContainerHeight:function(){o.findDOMNode(this.refs.container).style.height=o.findDOMNode(this.refs.column).offsetHeight+'px';},_updateColumnWidth:function(){o.findDOMNode(this.refs.column).style.width=o.findDOMNode(this.refs.container).offsetWidth+'px';}});t.EVENT_SHOULD_ADJUST=s;f.exports=t;},null);
__d('TabBarItem.react',['React','cx','joinClasses'],function a(b,c,d,e,f,g,h,i,j){if(c.__markCompiled)c.__markCompiled();var k=h.createClass({displayName:'TabBarItem',getDefaultProps:function(){return {wrapper:'li'};},render:function(){var l="_45hc"+(this.props.selected?' '+"_1hqh":''),m=this.props.wrapper,n=this.props.href||'#',o=this.props.ajaxify,p=this.props.rel;if(m)return (h.createElement(m,babelHelpers._extends({},this.props,{className:j(this.props.className,l)}),h.createElement('a',{ajaxify:o,href:n,rel:p,target:this.props.target},this.props.children)));return (h.createElement('a',babelHelpers._extends({},this.props,{ajaxify:o,className:j(this.props.className,l),href:n,rel:p}),this.props.children));}});f.exports=k;},null);
__d('TabBarDropdownItem.react',['ContextualDialogArrow','ContextualLayerAutoFlip','InlineBlock.react','PopoverMenu.react','React','ReactXUIMenu','TabBarItem.react','cx','onlyChild','joinClasses'],function a(b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q){if(c.__markCompiled)c.__markCompiled();var r=l.PropTypes,s=l.createClass({displayName:'TabBarDropdownItem',propTypes:{tabComponent:r.func},getDefaultProps:function(){return {tabComponent:n};},_renderTab:function(){var t=this.props.tabComponent,u="_45hd _45hc";return (l.createElement(t,babelHelpers._extends({},this.props,{wrapper:false,className:q(this.props.className,u)}),l.createElement('span',{className:"_1b0"},this.props.label)));},render:function(){if(this.props.children){var t=this.props.selected?m.SelectableMenu:m,u=l.createElement(t,null,this.props.children.map(this.convertTabItemWrapperToMenuItem)),v=[i,h];return (l.createElement('li',{className:"_45hd"},l.createElement(k,{menu:u,layerBehaviors:v},this._renderTab())));}else return (l.createElement('li',{className:"_45hd"},l.createElement(j,null,this._renderTab())));},convertTabItemWrapperToMenuItem:function(t,u){var v=this.props.selected?m.SelectableItem:m.Item,w=p(t.type.getComponent(t.props));return (l.createElement(v,babelHelpers._extends({},w.props,{key:u,onclick:w.props.onClick}),w.props.children));}});f.exports=s;},null);
__d('TabBar.react',['React','ReactDOM','ReactChildren','TabBarDropdownItem.react','TabBarItem.react','cx','fbt','joinClasses'],function a(b,c,d,e,f,g,h,i,j,k,l,m,n,o){if(c.__markCompiled)c.__markCompiled();var p=h.PropTypes,q=n._("Mais"),r=h.createClass({displayName:'TabBarItemWrapper',statics:{getComponent:function(t){return t.component;}},render:function(){return this.props.component;}}),s=h.createClass({displayName:'TabBar',propTypes:{activeTabKey:p.string,alwaysShowActive:p.bool,defaultActiveTabKey:p.string,maxTabsVisible:p.number,moreLabel:p.string,onTabClick:p.func,dropdownTabComponent:p.func,onWidthCalculated:p.func,shouldCalculateVisibleTabs:p.bool},getDefaultProps:function(){return {alwaysShowActive:true,dropdownTabComponent:l,maxTabsVisible:Infinity,moreLabel:q,onTabClick:function(){return true;},shouldCalculateVisibleTabs:true};},getInitialState:function(){return {activeTabKey:this.props.defaultActiveTabKey,visibleTabs:0,shouldCalculateVisibleTabs:true};},setWidth:function(t){i.findDOMNode(this).style.width=t;this.setState({shouldCalculateVisibleTabs:true});},render:function(){var t=[];j.forEach(this.props.children,function(ca){if(ca)t.push(ca);});var u=t.length,v=this.getActiveTabIndex(),w=t[v];if(this.state.shouldCalculateVisibleTabs){t=t.map(function(ca,da){ca=h.cloneElement(ca,{selected:da===v});return (h.createElement(r,{key:ca.key,component:ca,ref:da}));});if(u>2)t.push(h.createElement(k,{key:'_dropdown',ref:'more',label:this.props.moreLabel,tabComponent:this.props.dropdownTabComponent}));}else{t=t.map((function(ca,da){ca=h.cloneElement(ca,{selected:w&&w.key===ca.key,onClick:this.onTabClick.bind(this,ca.key)});return (h.createElement(r,{key:ca.key,component:ca,ref:da}));}).bind(this));var x=this.state.visibleTabs,y;if(x>0){var z;if(!this.props.alwaysShowActive||v<x){z=t.splice(x);if(v>=x)y=true;}else{w=t.splice(v,1)[0];z=t.splice(x-1);t.push(w);}if(z.length)t.push(h.createElement(k,{selected:y,key:'_dropdown',label:this.props.moreLabel,tabComponent:this.props.dropdownTabComponent},z));}else{var aa=w;if(!w)aa=r.getComponent(t[0].props);var ba=aa.props.children;t=h.createElement(k,{label:ba,tabComponent:this.props.dropdownTabComponent,selected:this.getActiveTabIndex()!==-1},t);}}return (h.createElement('ul',babelHelpers._extends({},this.props,{className:o(this.props.className,"_43o4")}),t));},componentDidMount:function(){this.calculateVisibleTabs();this.calculateWidth();},componentWillReceiveProps:function(t){this.setState({shouldCalculateVisibleTabs:true});},componentDidUpdate:function(){if(this.state.shouldCalculateVisibleTabs)this.calculateVisibleTabs();this.calculateWidth();},calculateWidth:function(){if(this.props.onWidthCalculated)this.props.onWidthCalculated(i.findDOMNode(this).clientWidth);},calculateVisibleTabs:function(){var t=[];j.forEach(this.props.children,function(da){if(da)t.push(da);});var u=t.length;if(!this.props.shouldCalculateVisibleTabs){this.setState({visibleTabs:Math.min(u,this.props.maxTabsVisible),shouldCalculateVisibleTabs:false});return;}var v=[];for(var w=0;w<u;w++)v.push(i.findDOMNode(this.refs[w]).offsetWidth);var x=this.getActiveTabIndex();if(this.props.alwaysShowActive&&x!==-1){t.unshift(t.splice(x,1)[0]);v.unshift(v.splice(x,1)[0]);}var y=i.findDOMNode(this).offsetWidth,z=0,aa=0;for(w=0;w<u;w++){var ba=v[w];if(aa+ba>y){if(z>0&&u>2){var ca=i.findDOMNode(this.refs.more).offsetWidth;while(z>0&&(aa+ca>y||u-z<2)){z--;aa-=v[z];}}else z=0;break;}z++;aa+=ba;}this.setState({visibleTabs:Math.min(z,this.props.maxTabsVisible),shouldCalculateVisibleTabs:false});},getActiveTabIndex:function(){var t=this.props.activeTabKey||this.state.activeTabKey,u=-1;if(t)j.forEach(this.props.children,function(v,w){if(v&&v.key===t)u=w;});return u;},onTabClick:function(t,event){var u=this.props.onTabClick(t,event);if(u!==false&&this.isMounted())this.setState({activeTabKey:t,shouldCalculateVisibleTabs:true});return u;}});s.Tab=l;s.DropdownItem=k;f.exports=s;},null);
__d('XUIPageNavigationItem.react',['React','TabBarItem.react','cx','fbt','joinClasses'],function a(b,c,d,e,f,g,h,i,j,k,l){if(c.__markCompiled)c.__markCompiled();var m=h.PropTypes,n=h.createClass({displayName:'XUIPageNavigationItem',statics:{propsForMenuItem:function(o){return babelHelpers._extends({},o,{className:"_5vwz _5vw-"});}},propTypes:{selected:m.bool},getDefaultProps:function(){return {selected:false};},render:function(){var o="_5vwz"+(this.props.selected?' '+"_5vwy":''),p=null;if(this.props.selected)p=h.createElement('span',{className:'accessible_elem'},k._("selecionados"));return (h.createElement(i,babelHelpers._extends({},this.props,{className:l(this.props.className,o)}),this.props.children,p,h.createElement('span',{className:"_13xf"})));}});f.exports=n;},null);
__d('XUIPageNavigationGroup.react',['React','TabBar.react','XUIPageNavigationItem.react'],function a(b,c,d,e,f,g,h,i,j){if(c.__markCompiled)c.__markCompiled();var k=h.PropTypes,l=h.createClass({displayName:'XUIPageNavigationGroup',propTypes:{moreLabel:k.string,maxTabsVisible:function(m,n,o){var p=m[n];if(p!=null&&!(typeof p==='number'&&p>=0))return new Error('Invalid `'+n+'` supplied to `'+o+'`, '+'expected positive integer.');},width:k.string},getDefaultProps:function(){return {maxTabsVisible:Infinity};},componentDidUpdate:function(){this.refs.bar.setWidth(this.props.width);},componentDidMount:function(){this.refs.bar.setWidth(this.props.width);},render:function(){return h.createElement(i,babelHelpers._extends({},this.props,{ref:'bar'}),this.props.children);}});l.Item=j;f.exports=l;},null);
__d('XUIPageNavigation.react',['Arbiter','CSS','DOMQuery','Event','LeftRight.react','React','ReactDOM','ReactChildren','ReactComponentWithPureRenderMixin','SubscriptionsHandler','UITinyViewportAction','Vector','ViewportBounds','XUIPageNavigationGroup.react','cloneWithProps','csx','cx','invariant','joinClasses','throttle'],function a(b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z,aa){if(c.__markCompiled)c.__markCompiled();var ba=m.PropTypes,ca=15,da='bluebar',ea='caret',fa=m.createClass({displayName:'XUIPageNavigation',mixins:[p],propTypes:{selectedIndicator:ba.oneOf([ea,da]),caretColor:ba.oneOf(['bg-blue','fbui-desktop-wash','fbui-desktop-background-light','fbui-red','fbui-green','fbui-desktop-divider-dark','white']),size:ba.oneOf(['small','medium']),scrollThreshold:ba.number},getDefaultProps:function(){return {selectedIndicator:da,caretColor:'fbui-desktop-wash',size:'medium',scrollThreshold:0};},getInitialState:function(){return {activeTabKey:undefined,leftWidth:null};},componentDidMount:function(){this._subscriptions=new q();this.resizeNavbarGroups();this._listenForNavbarResize();var ga="^.fixed_elem._5vx1";this.wrapper=j.scry(n.findDOMNode(this),ga)[0];if(this.wrapper){this._setViewportBounds();this._subscriptions.addSubscriptions(r.subscribe('change',(function(){if(r.isTiny()){this._bound.remove();}else this._setViewportBounds();}).bind(this)));}if(this.wrapper||j.scry(n.findDOMNode(this),"^._k").length)this._showDropshadowOnScroll();},componentWillUnmount:function(){this._subscriptions.release();},onTabClick:function(ga,event){if(this.props.onTabClick){var ha=this.props.onTabClick(ga,event);if(!ha)return ha;}if(!k.$E(event).isDefaultRequested())this.setState({activeTabKey:ga});},onWidthCalculated:function(ga,ha){this[ga?'_rightWidth':'_leftWidth']=ha;},render:function(){var ga=this.props.selectedIndicator,ha=this.props.size,ia="_5vx2"+(ha==='small'?' '+"_5vx3":'')+(ha==='medium'?' '+"_5vx4":'')+(ga===ea?' '+"_5vx5":'')+(ga===da?' '+"_5vx6":''),ja=null;if(ga===ea){var ka=this.props.caretColor;ja=(ka==='bg-blue'?"_2d2c":'')+(ka==='fbui-desktop-wash'?' '+"_4_np":'')+(ka==='fbui-desktop-background-light'?' '+"_4_nr":'')+(ka==='fbui-red'?' '+"_4_ns":'')+(ka==='fbui-green'?' '+"_4_nv":'')+(ka==='fbui-desktop-divider-dark'?' '+"_4_nz":'')+(ka==='white'?' '+"_5-f":'');}var la=z(ia,ja,this.props.className),ma=[],na=this.props.activeTabKey||this.state.activeTabKey||this.props.defaultActiveTabKey;o.forEach(this.props.children,(function(oa,pa){var qa={onTabClick:this.onTabClick,activeTabKey:na,onWidthCalculated:this.onWidthCalculated.bind(this,pa),ref:pa?'right':'left',key:pa};if(pa===0)qa.width=this.state.leftWidth;ma.push(v(oa,qa));}).bind(this));!(ma.length===1||ma.length===2)?y(0):undefined;return (m.createElement('div',{className:la},m.createElement(l,{className:"_5vx7"},ma)));},_setViewportBounds:function(){var ga=this.wrapper.offsetHeight,ha=t.getTop();this._bound=t.addTop(ha+ga);h.subscribe('page_transition',function(){this._bound.remove();});},_listenForNavbarResize:function(){this._subscriptions.addSubscriptions(k.listen(window,'resize',aa(this.resizeNavbarGroups,30)));},_showDropshadowOnScroll:function(){this._subscriptions.addSubscriptions(k.listen(window,'scroll',(function(){var ga=s.getScrollPosition().y>this.props.scrollThreshold;if(this._hasDropshadow===ga)return;this._hasDropshadow=ga;i.conditionClass(n.findDOMNode(this),"_51j8",ga);}).bind(this)));},resizeNavbarGroups:function(){if(!this.refs.left)return;var ga=n.findDOMNode(this).clientWidth,ha;if(this.refs.right){ha=ga-this._rightWidth-ca;if(ha<this._rightWidth)ha=this._rightWidth+ca;}else ha=ga;this.setState({leftWidth:ha+'px'});}});fa.Group=u;fa.Item=u.Item;fa.Indicator={BlueBar:da,Caret:ea};f.exports=fa;},null);
__d("XComposerActorChangeController",["XController"],function a(b,c,d,e,f,g){c.__markCompiled&&c.__markCompiled();f.exports=c("XController").create("\/composer\/actor\/change\/",{composer_id:{type:"String",required:true},entry_point:{type:"Enum",required:true,enumType:1},from_actor_id:{type:"Int",required:true},target_id:{type:"Int",required:true}});},null,{});
__d('ComposerXActorSelector.react',['ActorSelector.react','ActorSelectorNuxTypes','ActorURI','Arbiter','AsyncRequest','React','emptyFunction','XActorSelectorNuxSeenWriteController','XComposerActorChangeController','fbt'],function a(b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q){if(c.__markCompiled)c.__markCompiled();var r=m.PropTypes,s=m.createClass({displayName:'ComposerXActorSelector',propTypes:{actorIDs:r.array.isRequired,composerID:r.string.isRequired,coverEnabled:r.bool.isRequired,entryPoint:r.string.isRequired,nuxEnabledCovered:r.bool,nuxEnabledUncovered:r.bool,nuxHoverContext:r.object,onChange:r.func,pagePermissions:r.object.isRequired,selectedActorID:r.string.isRequired,settingsURI:r.string,targetID:r.string.isRequired},getInitialState:function(){return {loading:false};},componentWillMount:function(){k.subscribe('ComposerXPages/composePostWithActor',(function(t,u){if(u.actorID)this._updateCurrentActor(u.actorID,function(){if(u.callback)u.callback();});}).bind(this));},render:function(){return (m.createElement(h,{actorIDs:this.props.actorIDs,actorPermissions:this.props.pagePermissions,className:this.props.className,coverEnabled:this.props.coverEnabled,loading:this.state.loading,nuxBody:this._getNUXBody(),nuxEnabledCovered:this.props.nuxEnabledCovered,nuxEnabledUncovered:this.props.nuxEnabledUncovered,nuxHoverContext:this.props.nuxHoverContext,onChange:this._onChange,onCompleteNux:this._onCompleteNux,ref:'selector',selectedActorID:this.props.selectedActorID,settingsURI:this.props.settingsURI,tooltipConstructor:this._getTooltipForActorName,tooltipConstructorCovered:this._getCoveredTooltip}));},_getNUXBody:function(){return q._("Escolha se deseja publicar como voc\u00ea mesmo ou como uma das P\u00e1ginas que gerencia.");},_getTooltipForActorName:function(t){return q._("Publicando como {actorName}",[q.param('actorName',t)]);},_getCoveredTooltip:function(){return q._("Publique como uma das P\u00e1ginas que voc\u00ea gerencia.");},_onChange:function(t){if(this.props.onChange){this.props.onChange(t.value);}else this._updateCurrentActor(t.value);},_updateCurrentActor:function(t,u){u=u||n;if(this.props.selectedActorID===t){u();return;}this.setState({loading:true});var v=j.create(p.getURIBuilder().setString('composer_id',this.props.composerID).setEnum('entry_point',this.props.entryPoint).setInt('from_actor_id',this.props.selectedActorID).setInt('target_id',this.props.targetID).getURI(),t),w=(function(){this.setState({loading:false});}).bind(this);new l().setURI(v).setErrorHandler(w).setServerDialogCancelHandler(w).setFinallyHandler(u).send();},_onCompleteNux:function(t){var u=t.isCovered,v=u?i.COMPOSER_COVERED:i.COMPOSER,w=o.getURIBuilder().setEnum('nux_type',v).getURI();new l().setURI(w).send();}});f.exports=s;},null);
__d('SwapButtonDEPRECATED',['Event','Arbiter','CSS','Focus'],function a(b,c,d,e,f,g,h,i,j,k){if(c.__markCompiled)c.__markCompiled();function l(m,n,o){this._swapperButton=m;this._swappeeButton=n;h.listen(m,'click',this.swap.bind(this));if(o)h.listen(n,'click',this.unswap.bind(this));i.subscribe('SwapButtonDEPRECATED/focusOnJoinButton',this.setFocusOnSwapper.bind(this),i.SUBSCRIBE_ALL);}Object.assign(l.prototype,{_swapperButton:null,_swappeeButton:null,swap:function(m){j.hide(this._swapperButton);j.show(this._swappeeButton);m!==false&&k.setWithoutOutline(this._swappeeButton);},unswap:function(m){j.show(this._swapperButton);j.hide(this._swappeeButton);m!==false&&k.setWithoutOutline(this._swapperButton);},toggle:function(){j.toggle(this._swapperButton);j.toggle(this._swappeeButton);},setFocusOnSwapper:function(){this._swapperButton.focus();}});f.exports=l;},null);
__d("HubbleContext",[],function a(b,c,d,e,f,g){if(c.__markCompiled)c.__markCompiled();var h={},i={get:function(j){return h[j];},getPageID:function(){return h.page&&h.page.id;},setContext:function(j){h=j;},setKey:function(j,k){h[j]=k;},reset:function(){h={};}};f.exports=i;},null);
__d('HubbleLogger',['BanzaiLogger','ErrorUtils','HubbleContext','HubbleSurfaces','arrayContains'],function a(b,c,d,e,f,g,h,i,j,k,l){if(c.__markCompiled)c.__markCompiled();var m=null,n=null,o=null,p=null,q=Object.keys(k).map(function(s){return k[s];}),r={getStatefulFields:function(){return {pageid:j.getPageID(),platform:o,prev_section:p,section:m,surface:n};},logAction:function(s){h.log('HubbleLoggerConfig',babelHelpers._extends({},this.getStatefulFields(),{action:s}));},logMetric:function(s,t){h.log('HubbleLoggerConfig',babelHelpers._extends({},this.getStatefulFields(),{metric:s,metric_value:t}));},reset:function(){m=null;n=null;o=null;p=null;},setActiveSection:function(s){p=m;m=s;},setActiveSurface:function(s){if(!l(q,s)){i.reportError('Hubble: Invalid surface value: '+s);return;}n=s;},setPlatform:function(s){o=s;}};f.exports=r;},null);
__d("XPageTabsReorderingController",["XController"],function a(b,c,d,e,f,g){c.__markCompiled&&c.__markCompiled();f.exports=c("XController").create("\/pages\/tabs\/reorder\/",{page_id:{type:"Int",required:true},__asyncDialog:{type:"Int"}});},null,{});
__d("XPagesAddSectionDialogController",["XController"],function a(b,c,d,e,f,g){c.__markCompiled&&c.__markCompiled();f.exports=c("XController").create("\/pages\/add_section\/dialog\/",{page_id:{type:"Int",required:true},__asyncDialog:{type:"Int"}});},null,{});
__d('PagesNavTabs',['AsyncRequest','Image.react','Link.react','PagesEventObserver','PagesEventType','React','ReactDOM','XPageTabsReorderingController','XUIPageNavigation.react','XUIPageNavigationGroup.react','XUIPageNavigationItem.react','XPagesAddSectionDialogController','cx','fbt','xuiglyph'],function a(b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v){if(c.__markCompiled)c.__markCompiled();var w='manage_tabs',x={renderPagesNavTabs:function(y,z,aa,ba,ca,da,ea){var fa=z.map(function(ja){return (m.createElement(r,{href:ja.href,key:ja.key},ja.label));});if(ca){var ga=o.getURIBuilder().setInt('page_id',ea).getURI();fa.push(m.createElement(r,{className:"_3ew_",key:w},u._("Gerenciar guias")));}if(fa.length===ba+1)ba++;var ha=m.createElement('span',null);if(da){var ia=s.getURIBuilder().setInt('page_id',ea).getURI();ha=m.createElement('div',{className:"_2pi9"},m.createElement(j,{href:ia,rel:'dialog',className:"_4dne"},m.createElement(i,{className:"_3-8_",src:v({name:'plus',shade:'accent',size:'small'})}),u._("Add a Section")));}n.render(m.createElement(p,{defaultActiveTabKey:aa,onTabClick:function(ja){k.notify(l.CLICK_PROFILE_NAVBAR_TAB,ea,{tab_key:ja});if(ja===w){new h(ga).setData({rel:'dialog'}).send();return false;}return true;}},m.createElement(q,{maxTabsVisible:ba},fa),m.createElement(q,{maxTabsVisible:ba},ha)),y);}};f.exports=x;},null);
__d('PagesTimelineController',['Arbiter'],function a(b,c,d,e,f,g,h){if(c.__markCompiled)c.__markCompiled();var i={LOAD_SECTION:'PagesTimelineController/loadSection',SECTION_FULLY_LOADED:'PagesTimelineController/sectionFullyLoaded',ACTIVATE_SCRUBBER_ITEM:'PagesTimelineController/activateScrubberItem',FIRST_POSTS_LOADED:'PagesTimelineController/firstPostsLoaded',REMOVE_SECTION:'PagesTimelineController/removeSection',RECENT_SECTION_KEY:'recent',NAV_BAR_LOADED:'PagesTimelineController/navBarLoaded',ADJUST_ADS:'PagesTimelineController/adjustAds',BOTTOM_OFFSET:100,loadSection:function(j){h.inform(this.LOAD_SECTION,{section_key:j},h.BEHAVIOR_STATE);},sectionFullyLoaded:function(j){h.inform(this.SECTION_FULLY_LOADED,{section_index:j},h.BEHAVIOR_PERSISTENT);},activateScrubberItem:function(j){h.inform(this.ACTIVATE_SCRUBBER_ITEM,{section_key:j},h.BEHAVIOR_STATE);},firstPostsLoaded:function(j){h.inform(this.FIRST_POSTS_LOADED,{section_key:j},h.BEHAVIOR_STATE);},removeSection:function(j){h.inform(this.REMOVE_SECTION,{section_key:j},h.BEHAVIOR_STATE);},navBarLoaded:function(){h.inform(this.NAV_BAR_LOADED,{},h.BEHAVIOR_STATE);},adjustAds:function(){h.inform(this.ADJUST_ADS,{},h.BEHAVIOR_STATE);}};f.exports=i;},null);
__d('PagesPageletScrollColumn.react',['Arbiter','DOMContainer.react','PagesTimelineController','React','ScrollColumn.react'],function a(b,c,d,e,f,g,h,i,j,k,l){if(c.__markCompiled)c.__markCompiled();var m=k.PropTypes,n=5,o=k.createClass({displayName:'PagesPageletScrollColumn',propTypes:{pagelets:m.object.isRequired},render:function(){var p=k.createElement(l,{ref:'scrollColumn',zIndex:n},k.createElement(i,null,this.props.pagelets));return p;},_adjustSize:function(){h.inform(l.EVENT_SHOULD_ADJUST);},componentDidMount:function(){this._subscribers=[h.subscribe(j.NAV_BAR_LOADED,(function(){h.inform(l.EVENT_SHOULD_ADJUST);}).bind(this)),h.subscribe('footerLoaded',this._adjustSize),h.subscribe('pagesSidePageletLoaded',this._adjustSize)];},componentWillUnmount:function(){while(this._subscribers&&this._subscribers.length)this._subscribers.pop().unsubscribe();}});f.exports=o;},null);