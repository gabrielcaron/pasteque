/**
 * @file Fichier js servant à l'ajout du loader au body
 * @author Michel Veillette <1965623@csfoy.ca>
 * @version 1.2.3
 */

/** Les différent div pour le loader **/
const divPageLoader:HTMLDivElement = document.createElement('div') as HTMLDivElement;
const divLoader:HTMLDivElement = document.createElement('div') as HTMLDivElement;
const divBinding:HTMLDivElement = document.createElement('div') as HTMLDivElement;
const divPad:HTMLDivElement = document.createElement('div') as HTMLDivElement;
const divText:HTMLDivElement = document.createElement('div') as HTMLDivElement;
const divLineUn:HTMLDivElement = document.createElement('div') as HTMLDivElement;
const divLineDeux:HTMLDivElement = document.createElement('div') as HTMLDivElement;
const divLineTrois:HTMLDivElement = document.createElement('div') as HTMLDivElement;

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