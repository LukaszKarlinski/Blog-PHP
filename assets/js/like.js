//get all like buttons
const likeButtons = document.querySelectorAll('.likeButton');

//get like elements
const svgs = document.querySelectorAll('.likeButton svg');
const pLike = document.querySelectorAll('.likesAmount');


likeButtons.forEach((like, index) =>{
    //set on click function
    like.addEventListener('click', ()=>{

        //get article id
        const articleId = like.dataset.articleid;
        


        //fetch data to php script
        const data = new URLSearchParams();
        data.append('articleId', articleId);

        fetch('http://localhost/blog-php/includes/like/likeHandle.php',{
            method: 'POST',
            headers:{
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: data.toString(),
        })
        .then(response => {
            if(!response.ok){
                throw new Error('response not ok' + response.statusText);
            }
            return response.text()
        })
        .then(data => {
            console.log(data);

            //show new like without refreshing page
            const isUserLogin = like.dataset.isuserlogin;
            if(isUserLogin==="true"){
                svgs[index].setAttribute('fill', 'currentColor');
    
                const amountLikes = pLike[index].textContent;
                const amountLikesUpdated = Number(amountLikes) + 1;
                pLike[index].textContent = amountLikesUpdated;
            }
        })
        //handle errors
        .catch(e =>{
            console.error(e);
        })

    });
});
