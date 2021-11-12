import axios from 'axios';
/*
../request.php
request.php
/request.php
public/request.php
/public/request.php
http://localhost:8888/rpni3/projet2/gr1_veillettem/gr1_camarines_projet2/public/request.php
*/
/*
fetch('request.php')
    .then(response => {
        console.log(response);
    })
*/
axios({
    url: 'request.php',
    method: 'get'
})
.then(function (response) {
    console.log(response);
})
.catch(function (error) {
    console.log(error);
});