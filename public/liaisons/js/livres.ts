let requestLivre = {
    async trouverToutLivre(classe, action, id) {
        let test = null;
        let response = await fetch('index.php?controleur=requete&classe=' + classe + '&action=' + action + '&id=' + id)
            .then(response => {
                return response.json();
            })
            .catch(function (error) {
                console.log(error);
            });
        console.log(response)
        return response
    },
}
//*******************
// Écouteurs d'événements
//*******************
//document.getElementById('courriel').addEventListener('focusout', function () {request.trouverToutCompte('compte', 'trouverTout', '')});

document.getElementById('testRequest').addEventListener('click', function () {requestLivre.trouverToutLivre('livre', 'trouverTout', '')});