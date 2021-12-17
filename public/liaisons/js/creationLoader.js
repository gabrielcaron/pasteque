/**
 * @file Fichier js servant à l'ajout du loader au body
 * @author Michel Veillette <1965623@csfoy.ca>
 * @version 1.2.3
 */
/** Les différent div pour le loader **/
var divPageLoader = document.createElement('div');
var divLoader = document.createElement('div');
var divBinding = document.createElement('div');
var divPad = document.createElement('div');
var divText = document.createElement('div');
var divLineUn = document.createElement('div');
var divLineDeux = document.createElement('div');
var divLineTrois = document.createElement('div');
/** Les différent attributs pour le loader **/
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
/** Les différent append pour le loader **/
divPad.append(divLineUn, divLineDeux, divLineTrois);
divLoader.append(divBinding, divPad, divText);
divPageLoader.append(divLoader);
document.querySelector('body').prepend(divPageLoader);
