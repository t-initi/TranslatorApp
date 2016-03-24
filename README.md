# TranslatorApp : Applicationde traduction de mots en anglais



Fonctionnement Technique

Lors que l'application est lancée en appuyant "Start":
- En utilisant du jQuery l'appli lit tous les mots qui sont contenu dans le fichier "verbes.txt" ensuite les charge dans un tableau
- Ensuite elle charge aleatoirement un mot à partir du tableau de mots et l'affiche
- Lorsque le mot est chargé et affiché, l'appli utilise du PHP CURL qui permet d'extraire des éléments ou des informations à partir du lien d'un site web
- En utilisant un dictionnaire enligne du nom de "http://www.systranet.com/dictionary" nous l'envoyons le mot choisi comme paramètre, il se charge de faire la traduction
- Ensuite en utilisant un objet DOMDocument l'application parse la page web et recupère le mot anglais recherché
- Lorsque l'utilisateur tape sa réponse, l'application vérifie que la réponse de l'utilisateur est similaire au mot anglais
- On incrémente les points du joueur si c'est le cas sinon on le décrémente
- Lorsqu'il atteint 20, il est rédirigé sur une page l'annonçant qu'il a gagner et lui donne la possibilité de faire une autre partie
- Lorsqu'il atteint 0, il est rédirigé sur une page l'annonçant qu'il a perdu et lui donne la possibilité de faire une autre partie


Amélioration

Cette application peut être améliorer.
- En améliorant le design de l'interface graphique et en rendant le requêtes et réponses un peu plus fluide
- En utilisant une meilleure api pour la traduction (google api est coûteux et j'ai eu des difficultés à l'implémenter dans l'appli)
- Api de traduction n'a pas assez de traduction comparé à Google. Ce qui fait que certains mots n'ont pas de traduction
- Gestion des erreurs restantes où qui peuvent se présentées
- Elargir le champs de traduction et ne pas se limité à l'anglais / français

Temps de travail

- J'ai passé en environ 4h-5h par jours sur une période de 3 jours
- Je tiens juste à préciser que j'étais en période de révision et d'examens pendant ces trois jours