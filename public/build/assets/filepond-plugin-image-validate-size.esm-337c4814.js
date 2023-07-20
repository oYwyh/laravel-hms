/*!
 * FilePondPluginImageValidateSize 1.2.7
 * Licensed under MIT, https://opensource.org/licenses/MIT/
 * Please visit https://pqina.nl/filepond/ for details.
 */const R=l=>/^image/.test(l.type),V=l=>new Promise((A,i)=>{const a=document.createElement("img");a.src=URL.createObjectURL(l),a.onerror=s=>{clearInterval(o),i(s)};const o=setInterval(()=>{a.naturalWidth&&a.naturalHeight&&(clearInterval(o),URL.revokeObjectURL(a.src),A({width:a.naturalWidth,height:a.naturalHeight}))},1)}),c=({addFilter:l,utils:A})=>{const{Type:i,replaceInString:a,isFile:o}=A,s=(t,e,n)=>new Promise((L,E)=>{const T=({width:_,height:I})=>{const{minWidth:G,minHeight:M,maxWidth:O,maxHeight:g,minResolution:S,maxResolution:m}=e,d=_*I;_<G||I<M?E("TOO_SMALL"):_>O||I>g?E("TOO_BIG"):S!==null&&d<S?E("TOO_LOW_RES"):m!==null&&d>m&&E("TOO_HIGH_RES"),L()};V(t).then(T).catch(()=>{if(!n){E();return}n(t,e).then(T).catch(()=>E())})});return l("LOAD_FILE",(t,{query:e})=>new Promise((n,L)=>{if(!o(t)||!R(t)||!e("GET_ALLOW_IMAGE_VALIDATE_SIZE")){n(t);return}const E={minWidth:e("GET_IMAGE_VALIDATE_SIZE_MIN_WIDTH"),minHeight:e("GET_IMAGE_VALIDATE_SIZE_MIN_HEIGHT"),maxWidth:e("GET_IMAGE_VALIDATE_SIZE_MAX_WIDTH"),maxHeight:e("GET_IMAGE_VALIDATE_SIZE_MAX_HEIGHT"),minResolution:e("GET_IMAGE_VALIDATE_SIZE_MIN_RESOLUTION"),maxResolution:e("GET_IMAGE_VALIDATE_SIZE_MAX_RESOLUTION")},T=e("GET_IMAGE_VALIDATE_SIZE_MEASURE");s(t,E,T).then(()=>{n(t)}).catch(_=>{const I=_?{TOO_SMALL:{label:e("GET_IMAGE_VALIDATE_SIZE_LABEL_IMAGE_SIZE_TOO_SMALL"),details:e("GET_IMAGE_VALIDATE_SIZE_LABEL_EXPECTED_MIN_SIZE")},TOO_BIG:{label:e("GET_IMAGE_VALIDATE_SIZE_LABEL_IMAGE_SIZE_TOO_BIG"),details:e("GET_IMAGE_VALIDATE_SIZE_LABEL_EXPECTED_MAX_SIZE")},TOO_LOW_RES:{label:e("GET_IMAGE_VALIDATE_SIZE_LABEL_IMAGE_RESOLUTION_TOO_LOW"),details:e("GET_IMAGE_VALIDATE_SIZE_LABEL_EXPECTED_MIN_RESOLUTION")},TOO_HIGH_RES:{label:e("GET_IMAGE_VALIDATE_SIZE_LABEL_IMAGE_RESOLUTION_TOO_HIGH"),details:e("GET_IMAGE_VALIDATE_SIZE_LABEL_EXPECTED_MAX_RESOLUTION")}}[_]:{label:e("GET_IMAGE_VALIDATE_SIZE_LABEL_FORMAT_ERROR"),details:t.type};L({status:{main:I.label,sub:_?a(I.details,E):I.details}})})})),{options:{allowImageValidateSize:[!0,i.BOOLEAN],imageValidateSizeLabelFormatError:["Image type not supported",i.STRING],imageValidateSizeMeasure:[null,i.FUNCTION],imageValidateSizeMinResolution:[null,i.INT],imageValidateSizeMaxResolution:[null,i.INT],imageValidateSizeLabelImageResolutionTooLow:["Resolution is too low",i.STRING],imageValidateSizeLabelImageResolutionTooHigh:["Resolution is too high",i.STRING],imageValidateSizeLabelExpectedMinResolution:["Minimum resolution is {minResolution}",i.STRING],imageValidateSizeLabelExpectedMaxResolution:["Maximum resolution is {maxResolution}",i.STRING],imageValidateSizeMinWidth:[1,i.INT],imageValidateSizeMinHeight:[1,i.INT],imageValidateSizeMaxWidth:[65535,i.INT],imageValidateSizeMaxHeight:[65535,i.INT],imageValidateSizeLabelImageSizeTooSmall:["Image is too small",i.STRING],imageValidateSizeLabelImageSizeTooBig:["Image is too big",i.STRING],imageValidateSizeLabelExpectedMinSize:["Minimum size is {minWidth} × {minHeight}",i.STRING],imageValidateSizeLabelExpectedMaxSize:["Maximum size is {maxWidth} × {maxHeight}",i.STRING]}}},u=typeof window<"u"&&typeof window.document<"u";u&&document.dispatchEvent(new CustomEvent("FilePond:pluginloaded",{detail:c}));export{c as default};