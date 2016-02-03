/*!CK:3473051113!*//*1440386897,*/

if (self.CavalryLogger) { CavalryLogger.start_js(["gJRiU"]); }

__d('NotificationImpressions',['AsyncSignal','NotificationTokens','URI'],function a(b,c,d,e,f,g,h,i,j){if(c.__markCompiled)c.__markCompiled();var k='/ajax/notifications/impression.php';function l(m,n){var o={ref:n};i.untokenizeIDs(m).forEach(function(p,q){o['alert_ids['+q+']']=p;});new h(new j(k).getQualifiedURI().toString(),o).send();}f.exports={log:l};},null);
__d('NotificationBeeperItemContents.react',['Animation','AsyncRequest','Bootloader','CloseButton.react','ImageBlock.react','NotificationURI','NotificationUserActions','React','ReactDOM','TextWithEntities.react','Timestamp.react','URI','cx'],function a(b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t){if(c.__markCompiled)c.__markCompiled();function u(w,x){return o.createElement('span',{className:'fwb'},w);}var v=o.createClass({displayName:'NotificationBeeperItemContents',_markAsRead:function(){n.markNotificationsAsRead([this.props.beep.notificationID]);},_onClick:function(w){this._markAsRead();this.props.onHide();if(w.button===1||w.altKey||w.ctrlKey||w.metaKey||w.shiftKey)return;var x=this.props.beep,y=new s(x.url).getPath();if(m.isAlbumDraftRecoveryDialogURI(x.link)){new i(x.link).send();w.preventDefault();}else if(x.photo&&m.snowliftable(x.link)){j.loadModules(["PhotoSnowlift"],function(z){z.bootstrap(x.link,w.currentTarget);});w.preventDefault();}else if(x.ajaxifyLink){j.loadModules(["AsyncDialog"],function(z){z.bootstrap(x.ajaxifyLink,w.currentTarget,'dialog');});w.preventDefault();}},_onClose:function(){this._markAsRead();this.props.onHide();},_doFlash:function(){new h(p.findDOMNode(this.refs.inner)).from('opacity','0').to('opacity','1').duration(200).go();},componentDidMount:function(){this.props.onReadyToHide(this.props.beep.notificationID);},componentDidUpdate:function(w){if(w.beep.beepID!==this.props.beep.beepID){this._doFlash();this.props.onReadyToHide(this.props.beep.notificationID);}},render:function(){var w=this.props.beep;return (o.createElement('div',{ref:'inner'},o.createElement(k,{className:"_3soc",onClick:this._onClose,size:'medium'}),o.createElement('a',{href:w.link,onClick:this._onClick,className:"_3soi"},o.createElement(l,{className:"_3soj",spacing:'medium'},o.createElement('img',{src:w.actors[0].profile_picture.uri,className:"_3sok"}),o.createElement('div',{className:"_3sol"},o.createElement(q,{renderEmoticons:true,renderEmoji:true,interpolator:u,ranges:w.text.ranges,aggregatedranges:w.text.aggregated_ranges,text:w.text.text}),o.createElement(l,{className:"_3som"},o.createElement('img',{className:"_1x8t",src:w.icon.uri}),o.createElement(r,{time:w.timestamp.time,text:w.timestamp.text,verbose:w.timestamp.verbose})))))));}});f.exports=v;},null);
__d('NotificationBeeperConst',['keyMirror'],function a(b,c,d,e,f,g,h){if(c.__markCompiled)c.__markCompiled();var i={IDLE_DELAY:10000,ACTIVE_DELAY_LONG:4000,FADE_OUT_LENGTH:1500,BeepStates:h({PENDING:true,RENDERED:true,READY_TO_HIDE:true,FADING_OUT:true})};f.exports=i;},null);
__d('NotificationBeeperItem.react',['Animation','BrowserSupport','NotificationBeeperItemContents.react','React','ReactDOM','NotificationBeeperItemRenderersList','Style','NotificationBeeperConst','cx','setTimeoutAcrossTransitions'],function a(b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q){if(c.__markCompiled)c.__markCompiled();var r=k.createClass({displayName:'NotificationBeeperItem',getInitialState:function(){return {fadedIn:false,hidden:false};},componentDidMount:function(){var s;if(i.hasCSSAnimations()){s=this.setState.bind(this,{fadedIn:true},null);}else s=(function(){new h(l.findDOMNode(this.refs.item)).from('top','-30px').from('opacity','0').to('top','0px').to('opacity','1').duration(200).ondone(this.setState.bind(this,{fadedIn:true},null)).go();}).bind(this);q(s,50);this.props.onInserted(this.props.beep);},componentWillUnmount:function(){if(this._fadeOutAnimation){this._fadeOutAnimation.stop();this._fadeOutAnimation=null;}},_onHide:function(){this.setState({hidden:true});},render:function(){var s=this.props.beep,t="_3sod"+(this.state.fadedIn?' '+"_3soe":'')+(this.state.hidden?' '+"_3sof":''),u=this._getRenderer(s.beepRenderer);return (k.createElement('li',{className:t,ref:'item','data-gt':s.tracking},k.createElement(u,{beep:s,onHide:this._onHide,onReadyToHide:this.props.onReadyToHide,ref:'itemContents'})));},componentDidUpdate:function(s,t,u){if(this.props.fadingOut){if(!this._fadeOutAnimation)this._fadeOutAnimation=new h(l.findDOMNode(this.refs.item)).from('opacity','1').to('opacity','0').duration(o.FADE_OUT_LENGTH).ondone(this._onHide).go();l.findDOMNode(this.refs.item).style.transitionDuration='0ms';}else if(this._fadeOutAnimation){this._fadeOutAnimation.stop();this._fadeOutAnimation=null;n.set(l.findDOMNode(this.refs.item),'opacity','1');}},_getRenderer:function(s){if(s in m)return m[s];return j;}});f.exports=r;},null);
__d('NotificationSound',['Sound'],function a(b,c,d,e,f,g,h){if(c.__markCompiled)c.__markCompiled();var i=5000;h.init(['audio/mpeg']);function j(k){this._soundPath=k;this._lastPlayed=0;}Object.assign(j.prototype,{play:function(k){if(!this._soundPath)return;var l=Date.now();if(l-this._lastPlayed<i)return;this._lastPlayed=l;h.play(this._soundPath,k);}});f.exports=j;},null);
__d('NotificationBeeper.react',['Arbiter','ChannelConstants','NotificationBeeperItem.react','NotificationConstants','NotificationImpressions','NotificationPhotoThumbnail','NotificationSound','NotificationUpdates','NotificationURI','NotificationUserActions','React','NotificationBeeperConst','NotificationBeeperPinnedPostLoader','cx','setTimeoutAcrossTransitions','shield'],function a(b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w){if(c.__markCompiled)c.__markCompiled();var x=s.BeepStates,y='beeper',z=k.PayloadSourceType.LIVE_SEND,aa=k.PayloadSourceType.OTHER_APPLICATION,ba=r.createClass({displayName:'NotificationBeeper',getInitialState:function(){return {soundEnabled:this.props.soundEnabled,hovering:false,fading:false,beeps:{}};},componentWillMount:function(){var ca=i.getArbiterType('notif_sound_pref_changed'),da='update-notifications';this.subscriptions=[o.subscribe(da,(function(ea,fa){if(fa.payloadsource===z||fa.payloadsource===aa){var ga=fa.nodes;if(ga&&ga.length)this._handleBeepChanges(this._convertNotifications(ga));}}).bind(this)),h.subscribe(ca,(function(ea,fa){this.setState({soundEnabled:fa.obj.enabled});}).bind(this))];h.inform('NotificationBeeper/mounted',null,h.BEHAVIOR_PERSISTENT);if(t.payload)this._handleBeepChanges(this._convertNotifications(t.payload.nodes));},componentWillUnmount:function(){this.subscriptions.forEach(function(ca){ca.unsubscribe();});this.subscriptions=null;},_onMouseEnter:function(){this._hideWait&&clearTimeout(this._hideWait);var ca=[],da=this.state.beeps;Object.keys(da).forEach(function(ea){if(da[ea].state!=x.PENDING){ca.push(ea);}else da[ea].state=x.RENDERED;});q.markNotificationsAsSeen(ca);this.setState({hovering:true,fading:false,beeps:da});},_onMouseLeave:function(){this._waitToHide(s.ACTIVE_DELAY_LONG);this.setState({hovering:false});},_onInsertedItem:function(ca){if(!this.state.hovering)this._waitToHide();if(this.state.soundEnabled&&ca.sound){if(!this._notifSound)this._notifSound=new n(this.props.soundPath);this._notifSound.play(ca.beepID);}if(this.props.shouldLogImpressions)l.log([ca.notificationID],y);},_waitToHide:function(ca){this._hideWait&&clearTimeout(this._hideWait);this._hideWait=v(w(this._hide,this),ca||s.IDLE_DELAY);},_onReadyToHide:function(ca){this.state.beeps[ca].state=x.READY_TO_HIDE;if(!this._hideWait)this._waitToHide();},_hide:function(){this._hideWait=null;var ca=this.state.beeps;Object.keys(ca).forEach(function(da){if(ca[da].state==x.READY_TO_HIDE)ca[da].state=x.FADING_OUT;});this.setState({fading:true});v(w(this._finishHide,this),s.FADE_OUT_LENGTH);},_finishHide:function(){if(!this.state.fading)return;var ca=this.state.beeps;Object.keys(ca).forEach(function(da){if(ca[da].state==x.FADING_OUT)delete ca[da];});this.setState({fading:false,beeps:ca});v((function(){var da=this.state.beeps;Object.keys(da).forEach(function(ea){if(da[ea].state==x.PENDING)da[ea].state=x.RENDERED;});this.setState({beeps:da});}).bind(this));},_handleBeepChanges:function(ca){var da=this.state.fading?x.PENDING:x.RENDERED,ea=this.state.beeps,fa=false;Object.keys(ca).reverse().forEach(function(ga){var ha={state:da,data:ca[ga]};if(!ea[ga]||ea[ga].data.beepID!=ha.data.beepID){if(ea[ga]){fa=true;if(ha.data.beepUpdatesOnTop)delete ea[ga];}ea[ga]=ha;}});if(fa)this._waitToHide();this.forceUpdate();},render:function(){var ca=this.state.beeps,da=[];Object.keys(ca).reverse().forEach(function(ga){var ha=ca[ga];if(ha.state==x.PENDING)return;da.push(r.createElement(j,{key:ga,fadingOut:this.state.fading&&ha.state==x.FADING_OUT,beep:ha.data,onInserted:this._onInsertedItem,onReadyToHide:this._onReadyToHide}));},this);var ea=da.length>0,fa=(!ea?"hidden_elem":'')+(' '+"_50d1");return (r.createElement('ul',{ref:'container',className:fa,'data-gt':this.props.tracking,onMouseEnter:this._onMouseEnter,onMouseLeave:this._onMouseLeave},da));},_convertNotifications:function(ca){var da={};ca.forEach(function(ea){if(!ea.showBeep)return;var fa=ea.alert_id,ga=fa+'-'+ea.receivedTime,ha=m.getThumbnail(ea.attachments,ea.attached_story),ia=da[fa]={notificationID:fa,notifID:ea.id,beepID:ga,beepRenderer:ea.beepRenderer,rendererData:ea.rendererData,beepUpdatesOnTop:ea.beepUpdatesOnTop,actors:ea.unaggregatedActors||ea.actors,icon:ea.icon,link:ea.url?p.localize(ea.url):'#',url:ea.url,ajaxifyLink:ea.ajaxify_url,photo:ha,text:ea.unaggregatedTitle||ea.title,timestamp:ea.timestamp,receivedTime:ea.receivedTime,sound:!!ea.sound,tracking:ea.tracking};});return da;}});f.exports=ba;},null);