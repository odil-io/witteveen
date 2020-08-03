(window.webpackJsonp=window.webpackJsonp||[]).push([[2],{"./app/components/dialogs/AboutDialog.js":function(e,o,t){"use strict";Object.defineProperty(o,"__esModule",{value:!0});var i,r=(i="function"==typeof Symbol&&Symbol.for&&Symbol.for("react.element")||60103,function(e,o,t,r){var a=e&&e.defaultProps,n=arguments.length-3;if(o||0===n||(o={}),o&&a)for(var l in a)void 0===o[l]&&(o[l]=a[l]);else o||(o=a||{});if(1===n)o.children=r;else if(n>1){for(var s=Array(n),d=0;d<n;d++)s[d]=arguments[d+3];o.children=s}return{$$typeof:i,type:e,key:void 0===t?null:""+t,ref:null,props:o,_owner:null}}),a=t("./node_modules/react/index.js"),n=(j(a),j(t("./node_modules/@material-ui/core/esm/Button/index.js"))),l=j(t("./node_modules/@material-ui/core/esm/Typography/index.js")),s=j(t("./node_modules/@material-ui/core/esm/DialogActions/index.js")),d=j(t("./node_modules/@material-ui/core/esm/DialogContent/index.js")),u=j(t("./node_modules/@material-ui/core/esm/DialogTitle/index.js")),c=j(t("./node_modules/@material-ui/core/esm/withMobileDialog/index.js")),f=j(t("./node_modules/semver/semver.js")),p=j(t("./app/components/dialogs/GenericDialog.js")),g=j(t("./app/assets/images/icon100x100.svg")),m=j(t("./app/services/i18n.js")),h=j(t("./app/version.json")),v=j(t("./app/services/platform-io.js")),w=t("./app/pro/index.js"),b=t("./app/reducers/settings.js"),y=j(t("./app/config.js"));function j(e){return e&&e.__esModule?e:{default:e}}let k=h.default.commitId;k&&k.length>=11&&(k=k.slice(0,11));const C=h.default.name+(w.Pro?" Pro":"");document.title=C+" "+h.default.version;var T=r(u.default,{},void 0,C),A=r("br",{}),P=r("strong",{},void 0,C),S=r("br",{}),U=r("span",{},void 0,"This program is free software: you can redistribute it and/or modify it under the terms of the GNU Affero General Public License (version 3) as published by the Free Software Foundation."),_=r("br",{}),D=r("br",{}),L=r("br",{});o.default=(0,c.default)()(e=>{const[o,t]=(0,a.useState)(!1),[i,u]=(0,a.useState)("");function c(){o?v.default.openUrl(y.default.downloadURL):(0,b.getLastVersionPromise)().then(e=>{console.log("Last version on server: "+e);const o=f.default.coerce(e),i=f.default.coerce(h.default.version);return f.default.valid(o)&&f.default.gt(o,i)?(t(!0),u(o.version)):u(h.default.version),!0}).catch(e=>{console.warn("Error while checking for update: "+e)})}const{fullScreen:j,open:x,onClose:R}=e;return r(p.default,{fullScreen:j,open:x,onClose:R,renderTitle:function(){return T},renderContent:function(){return r(d.default,{},void 0,r("img",{alt:"TagSpaces logo",src:g.default,style:{float:"left",marginRight:10,width:120,height:120}}),r(l.default,{variant:"subtitle1",title:"Build on: "+h.default.buildTime},void 0,"Version: ",h.default.version," / BuildID: ",k),A,r(l.default,{id:"aboutContent",variant:"body1"},void 0,P," is made possible by the TagSpaces(github.com/tagspaces) open source project and other"," ",r(n.default,{onClick:e.toggleThirdPartyLibsDialog},void 0,"open source software"),".",S,!w.Pro&&U,_,"This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the License for more details.",D,L,r(n.default,{onClick:()=>{v.default.openUrl("https://www.tagspaces.org/about/imprint/")}},void 0,"Imprint"),r(n.default,{onClick:()=>{v.default.openUrl("https://www.tagspaces.org/about/privacy/")}},void 0,"Privacy Policy"),r(n.default,{onClick:()=>{v.default.openUrl("https://www.tagspaces.org/whatsnew/")}},void 0,"Changelog"),r(n.default,{"data-tid":"openLicenseDialog",onClick:e.toggleLicenseDialog},void 0,"License Agreement")))},renderActions:function(){let t="Check for updates";return i&&i.length>1&&(t=o?m.default.t("getNewVersion",{newVersion:i}):m.default.t("latestVersion",{productName:C})),r(s.default,{},void 0,!w.Pro&&r(n.default,{"data-tid":"checkForUpdates",title:m.default.t("core:checkForNewVersion"),onClick:()=>{v.default.openUrl("https://www.tagspaces.org/products/")},color:"primary"},void 0,"Upgrade to PRO"),r(n.default,{"data-tid":"checkForUpdates",title:m.default.t("core:checkForNewVersion"),onClick:c,color:"primary"},void 0,t),r(n.default,{"data-tid":"closeAboutDialog",onClick:e.onClose,color:"primary"},void 0,m.default.t("core:ok")))}})}),e.exports=o.default}}]);
//# sourceMappingURL=2.bundle.js.map