var divPageLoader = document.createElement('div');
var divLoader = document.createElement('div');
var divBinding = document.createElement('div');
var divPad = document.createElement('div');
var divText = document.createElement('div');
var divLineUn = document.createElement('div');
var divLineDeux = document.createElement('div');
var divLineTrois = document.createElement('div');
divPageLoader.setAttribute('id', 'page-loader');
divPageLoader.setAttribute('class', 'page-loader');
divLoader.setAttribute('class', 'loader');
divBinding.setAttribute('class', 'binding');
divPad.setAttribute('class', 'pad');
divText.setAttribute('class', 'text');
divText.innerText = 'Chargement...';
divLineUn.setAttribute('class', 'line line1');
divLineDeux.setAttribute('class', 'line line2');
divLineTrois.setAttribute('class', 'line line3');
divPad.append(divLineUn, divLineDeux, divLineTrois);
divLoader.append(divBinding, divPad, divText);
divPageLoader.append(divLoader);
document.querySelector('body').prepend(divPageLoader);
/**
 *
<div id="page-loader" class="page-loader">
     <div class="loader">
         <div class="binding"></div>
         <div class="pad">
             <div class="line line1"></div>
             <div class="line line2"></div>
             <div class="line line3"></div>
         </div>
         <div class="text">
            Chargement...
         </div>
     </div>
 </div>
 */ 
