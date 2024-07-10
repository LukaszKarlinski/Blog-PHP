//get dom elements
const showDeletePopupButtons = document.querySelectorAll('.showDeletePopup');
const closeDeletePopupButtons = document.querySelectorAll('.closePopup');
const deletePopup = document.querySelectorAll('.deletePopup');
const deleteButtons = document.querySelectorAll('.deleteArticleButton');

//handle showing popup
showDeletePopupButtons.forEach((showPopupButton, index) =>{
    showPopupButton.addEventListener('click', ()=>{
        deletePopup[index].classList.remove('hidden');  
    });
});

//handle closing popup
closeDeletePopupButtons.forEach((closeButton, index) =>{
    closeButton.addEventListener('click', ()=>{
        deletePopup[index].classList.add('hidden');
    });
});

//handle delete article
deleteButtons.forEach(deleteButton =>{
    deleteButton.addEventListener('click', ()=>{
        const articleId = deleteButton.dataset.articleid;

        const data = new URLSearchParams();
        data.append('articleId', articleId);
    
        fetch('http://localhost/blog-php/includes/deleteArticle.php',{
            method: "POST",
            headers: {
                'Content-Type' : 'application/x-www-form-urlencoded',
            },
            body: data.toString(),
        }).then(response =>{
            if(!response.ok){
                throw new Error('response not ok: ' + response.statusText);
            }
            location.reload();
            return response.text();
        }).then(data =>{
            console.log(data);
        }).catch(error =>{
            console.error('problem with fetch ', error);
        })
    });

});