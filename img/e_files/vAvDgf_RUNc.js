/*!CK:3940147133!*//*1440391939,*/

if (self.CavalryLogger) { CavalryLogger.start_js(["yjAM6"]); }

__d('TooltipLink.react',['React','TooltipMixin'],function a(b,c,d,e,f,g,h,i){if(c.__markCompiled)c.__markCompiled();var j=h.createClass({displayName:'TooltipLink',mixins:[i],render:function(){return h.createElement('a',this.props,this.props.children);}});f.exports=j;},null);
__d("DOMWrapper",[],function a(b,c,d,e,f,g){if(c.__markCompiled)c.__markCompiled();var h,i,j={setRoot:function(k){h=k;},getRoot:function(){return h||document.body;},setWindow:function(k){i=k;},getWindow:function(){return i||self;}};f.exports=j;},null);
__d('Flash',['DOMEventListener','DOMWrapper','QueryString','UserAgent_DEPRECATED','guid','htmlSpecialChars'],function a(b,c,d,e,f,g,h,i,j,k,l,m){if(c.__markCompiled)c.__markCompiled();var n={},o,p=i.getWindow().document;function q(v){var w=p.getElementById(v);if(w)w.parentNode.removeChild(w);delete n[v];}function r(){for(var v in n)if(n.hasOwnProperty(v))q(v);}function s(v){return v.replace(/\d+/g,function(w){return '000'.substring(w.length)+w;});}function t(v){if(!o){if(k.ie()>=9)h.add(window,'unload',r);o=true;}n[v]=v;}var u={embed:function(v,w,x,y){var z=l();v=m(v).replace(/&amp;/g,'&');x=babelHelpers._extends({allowscriptaccess:'always',flashvars:y,movie:v},x);if(typeof x.flashvars=='object')x.flashvars=j.encode(x.flashvars);var aa=[];for(var ba in x)if(x.hasOwnProperty(ba)&&x[ba])aa.push('<param name="'+m(ba)+'" value="'+m(x[ba])+'">');var ca=w.appendChild(p.createElement('span')),da='<object '+(k.ie()?'classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" ':'type="application/x-shockwave-flash"')+'data="'+v+'" '+(x.height?'height="'+x.height+'" ':'')+(x.width?'width="'+x.width+'" ':'')+'id="'+z+'">'+aa.join('')+'</object>';ca.innerHTML=da;var ea=ca.firstChild;t(z);return ea;},remove:q,getVersion:function(){var v='Shockwave Flash',w='application/x-shockwave-flash',x='ShockwaveFlash.ShockwaveFlash',y;if(navigator.plugins&&typeof navigator.plugins[v]=='object'){var z=navigator.plugins[v].description;if(z&&navigator.mimeTypes&&navigator.mimeTypes[w]&&navigator.mimeTypes[w].enabledPlugin)y=z.match(/\d+/g);}if(!y)try{y=new ActiveXObject(x).GetVariable('$version').match(/(\d+),(\d+),(\d+),(\d+)/);y=Array.prototype.slice.call(y,1);}catch(aa){}return y;},getVersionString:function(){var v=u.getVersion();return v?v.join('.'):'';},checkMinVersion:function(v){var w=u.getVersion();if(!w)return false;return s(w.join('.'))>=s(v);},isAvailable:function(){return !!u.getVersion();}};f.exports=u;},null);
__d("XPhotosWaterfallBatchLoggingController",["XController"],function a(b,c,d,e,f,g){c.__markCompiled&&c.__markCompiled();f.exports=c("XController").create("\/photos\/logging\/waterfall\/batch\/",{});},null,{});
__d('PhotosUploadWaterfall',['AsyncRequest','AsyncSignal','Banzai','PhotosUploadWaterfallXConfig','XPhotosWaterfallBatchLoggingController','emptyFunction','randomInt','throttle'],function a(b,c,d,e,f,g,h,i,j,k,l,m,n,o){if(c.__markCompiled)c.__markCompiled();var p=[],q={APP_FLASH:'flash_pro',APP_SIMPLE:'simple',APP_ARCHIVE:'archive',APP_COMPOSER:'composer',APP_MESSENGER:'messenger',APP_HTML5:'html5',APP_CHAT:'chat',INSTALL_CANCEL:1,INSTALL_INSTALL:2,INSTALL_UPDATE:3,INSTALL_REINSTALL:4,INSTALL_PERMA_CANCEL:5,INSTALL_SILENT_SKIP:6,INSTALL_DOWNLOAD:7,CERROR_RESIZING_FAILED:6,CERROR_MARKER_EXTRACTION_FAILED:9,BEGIN:1,UPLOAD_START:4,ALL_UPLOADS_DONE:6,CLIENT_ERROR:7,RECOVERABLE_CLIENT_ERROR:12,IMAGES_SELECTED:9,UPGRADE_REQUIRED:11,VERSION:15,SELECT_START:18,SELECT_CANCELED:19,CANCEL:22,CANCEL_DURING_UPLOAD:83,ONE_RESIZING_START:2,ONE_UPLOAD_START:10,ONE_UPLOAD_DONE:29,ONE_RESIZING_DONE:34,PROGRESS_BAR_STOPPED:44,MISSED_BEAT:45,HEART_ATTACK:46,PUBLISH_SENT:99,PUBLISH_START:100,PUBLISH_SUCCESS:101,PUBLISH_FAILURE:102,CLUSTERING_START:103,CLUSTERING_SUCCESS:104,CLUSTERING_FAILURE:105,POST_BUTTON_CLICKED:110,POST_BUTTON_ERROR:111,PHOTO_DELETED:114,PUBLISH_CLIENT_SUCCESS:115,PHOTO_ROTATED:117,SAVE_DRAFT_BUTTON_CLICKED:123,RECOVERY_START_ON_CLIENT:124,CHANGE_PHOTO_QUALITY_SETTING:126,TAG_ADDED:127,TAG_REMOVED:128,TAB_BUTTON_CLICKED:129,EDITABLE_PHOTO_FETCH_START:106,EDITABLE_PHOTO_FETCH_SUCCESS:107,EDITABLE_PHOTO_FETCH_FAILURE:108,EDITABLE_PHOTO_FETCH_DELAY:116,CANCEL_INDIVIDUAL_UPLOAD:109,MISSING_OVERLAY_NODE:118,PUBLISH_RETRY_FAILURE:119,MISSING_UPLOAD_STATE:120,SESSION_POSTED:72,POST_PUBLISHED:80,ONE_UPLOAD_CANCELED:81,ONE_UPLOAD_CANCELED_DURING_UPLOAD:82,RESIZER_AVAILABLE:20,OVERLAY_FIRST:61,ASYNC_AVAILABLE:63,FALLBACK_TO_FLASH:13,FALLBACK_TO_HTML5:130,RETRY_UPLOAD:17,TAGGED_ALL_FACES:14,VAULT_IMAGES_SELECTED:62,VAULT_CREATE_POST_CANCEL:65,VAULT_SEND_IN_MESSAGE_CLICKED:66,VAULT_DELETE_CANCEL:68,VAULT_ADD_TO_ALBUM_CANCEL:74,VAULT_SHARE_IN_AN_ALBUM_CLICKED:76,VAULT_SHARE_OWN_TIMELINE_CLICKED:77,VAULT_SHARE_FRIENDS_TIMELINE_CLICKED:78,VAULT_SHARE_IN_A_GROUP_CLICKED:79,VAULT_SYNCED_PAGED_LINK_CLICKED:84,VAULTBOX:'vaultbox',GRID:'grid',SPOTLIGHT_VAULT_VIEWER:'spotlight_vault_viewer',REF_VAULT_NOTIFICATION:'vault_notification',_checkRequiredFields:function(s){},sendBanzai:function(s,t){this._checkRequiredFields(s);var u={};s.scuba_ints=s.scuba_ints||{};s.scuba_ints.client_time=Math.round(Date.now()/1000);if(k.retryBanzai){u.retry=true;s.scuba_ints.nonce=n(4294967296);}j.post(k.deprecatedBanzaiRoute,s,u);if(t)setTimeout(t,0);},sendSignal:function(s,t){this._checkRequiredFields(s);if(k.useBanzai){this.sendBanzai(s,t);}else if(k.reduceLoggingRequests){this.queueLog(s,t);}else{var u=new i('/ajax/photos/waterfall.php',{data:JSON.stringify(s)}).setHandler(t);if(k.timeout)u.setTimeout(10*1000);u.send();}},queueLog:function(s,t){p.push(s);if(!!t){this.flushQueue(t);}else r();},flushQueue:function(s){var t=JSON.stringify(p);p=[];var u=l.getURIBuilder().getURI();new h().setURI(u).setData({logs:t}).setFinallyHandler(s||m).setTimeoutHandler(10*1000,s||m).send();}},r=o(q.flushQueue,k.batchInterval*1000);f.exports=q;},null);