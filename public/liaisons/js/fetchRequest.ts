let request = {
    trouverToutLivre(controleur, action, id) {
        let test = null;
        this.fetchRequest(controleur, action, id).then(function (result){
            console.log('avant');
            test = result;
            console.log('apres');
        });
        console.log(test)
    },
    fetchRequest(controleur, action, id) {
        return fetch('request.php?controleur=' + controleur + '&action=' + action + '&id=' + id)
            .then(response => {
                return response.json();
            })
            .catch(function (error) {
                console.log(error);
            });
    }
}
//*******************
// Écouteurs d'événements
//*******************
document.getElementById('testRequest').addEventListener('click', function () {request.trouverToutLivre('livre', 'trouverTout', '')});


