// async function like(user_id, article_id) {
//     let jsonBody = JSON.stringify({'user_id':user_id,'article_id':article_id});
//     let response = await fetch("api/articles/like/" + article_id, {
//         method: 'POST',
//         json: jsonBody,
//         headers: {
//             'Content-Type': 'application/json'
//         }
//     });

//     return response;
// }

// function function_like() {
//     document.getElementById('like').style.display = 'none';

//     like(1,50).then((response) => {

//         console.log("RESPONSE: ", response)

//         return response.json();

//     }).then((json) => {

//         console.log(json);

//         //console.log("RESPONSE AFTER JSON CONVERSION: ", json);

//     })

// }

// function function_dislike() {
//     document.getElementById('dislike').style.display = 'none';
// }
