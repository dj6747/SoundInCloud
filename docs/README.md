#SoundInCloud
https://dj6747.github.io/SoundInCloud/public/html/index.html

## Opis aplikacije
Aplikacija SoundInCloud omogoča deljenje glasbe. Uporabnik se lahko prijavi, poišče prijatelje in deli glasbo z njimi. 
Začetna stran aplikacije je stran z novostmi od prijateljem(kaj je kdo zadnji naložil). Prav tako je iz tega
zaslona možno naložiti svojo glasbo. Ko uporabnik glasbo naloži, ji lahko doda efekte in jo nato deli naprej. 


## Ciljna publika in naprave
Ciljna publika za aplikacijo so glasbeniki in skupine, lahko za shranjevanje in obdelavo uporabljajo tudi ostali ljudje. 
Aplikacija deluje v spletnem brskalniku, podprti brskalniki so Google Chrome, Opera ter Apple Safari. Aplikacija deluje
tudi v mobilnih brskalnikih na Android in iOS. 

## Težave v brskalnikih
Aplikacija najbolje deluje na najnovejših verzijah Google Chrome in Opera. V brskalniku Safari se pojavlja problem pri nalaganju datotek;
trenutno se ne prikaže nova ploščica na časovnici po uploadu datotek. V brskalniku Safari občasno ne zazna uporabnikove lokacije. 
Do oblikovnih razlik med brskalniki ne prihaja.

## 2 zmogljivosti ali gradnika spletne strani, v katere ste vložili poseben trud in ste nanju ponosni
Naredil sem svoje html elemente za nalaganje datotek in časovnico. Posukušal sem narediti da bi 
se custom elementi elementi obnašali čim bolj podobno kot v znanih knjižnicah. Vsak element ima definiran template,
datoteko s kodo, ter css datoteko. Posamezne komponente se generirajo v "shadow DOM", tako da ne vplivajo na ostalo aplikacijo,
in se jih lahko neodvisno prenese tudi v kakšen drug projekt.

## Problemi/komentar
Ker html "importi",  "template" in "shadow DOM" še nisto popolnoma podprta v večini brskalnikov, aplikacija popolnoma brez 
dodatnih knjižnic deluje samo v brskalniku Google Chrome. Za podporo v ostalih brskalnikih sem moral dodati knjižnico 
webcomponents.js, ki omogoči, da custom elementi delujejo v ostalih brskalnikih. Če knjižnica ni vključena aplikacija razen
nalaganja datotek deluje tudi v ostalih brskalnikih, okno za nalaganje datotek se takrat ne prikaže v drugih brskalnikih.

